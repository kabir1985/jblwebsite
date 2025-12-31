<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        session_regenerate_id(TRUE);
    }

    function index() {
        if (($this->input->post('username'))) {
            $user = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars($this->input->post('username', true)));
            $givenPwd = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars($this->input->post('password', true)));
            $id_passwd_expDate = $this->Model_users->getExpiryDate($user, $givenPwd);
            $id = $id_passwd_expDate[0]['id'];
            $pwd = $id_passwd_expDate[0]['password'];
            $exp_date = $id_passwd_expDate[0]['expiryDate'];
            $exp = strtotime($exp_date);
            $today_date = date('Y-m-d');
            $today = strtotime($today_date);
            //print_r($today); die();
            //$row=$today <= $exp && $givenPwd == $pwd;
            //print_r($row); die();
            if ($today <= $exp) {
                $u = $this->input->post('username');
                $pw = $this->input->post('password');
                $row = $this->Model_users->verifyUser($u, $pw);
                if (count($row)) {
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['sessionid'] = session_id();
                   // print_r($_SESSION['sessionid']); die();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['department'] = $row['department'];
                    $this->Model_users->addLog(); //Session Saved
                    redirect('admin/dashboard', 'refresh');
                } else {
                    redirect('Welcome/index', 'refresh');
                }
            } else {
                //$this->session->set_flashdata('message', 'Your Password Changing Time is Expired !</br> Please Reset Your Password !');
                $data['main'] = 'login_reset';
                $data['adminID'] = $id;
                $data['adminPwd'] = $pwd;
                $data['varcss'] = 'admin.css';
                $this->load->view('template', $data);
            }
        } else {
            $this->session->set_flashdata('message', 'Welcome');
            $data['title'] = "Janata Bank PLC.";
            $data['main'] = 'login';
            $data['varcss'] = 'admin.css';
            $this->load->view('template', $data);
        }
    }

    function passwordReset() {
        $currentPwd = $this->input->post('oldPwd');
        //print_r($currentPwd ); 
        $newPasswd = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars($this->input->post('newPwd', true)));
        //print_r($newPasswd ); 
        $confirmPasswd = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars($this->input->post('confirmPwd', true)));
        //print_r($confirmPasswd); die();
        if (!(password_verify($newPasswd, $currentPwd)) && ($newPasswd == $confirmPasswd)) {
            $this->Model_users->pwdReset();
            $this->session->set_flashdata('message', 'Password Reset Successfully. Please Login.');
            redirect('Welcome/index', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'New Password and Old Password/Confirm Password is Same/Not Matching !<br>Try Again !');
            redirect('Welcome/index', 'refresh');
        }
    }

}
