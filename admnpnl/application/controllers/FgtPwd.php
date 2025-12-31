<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FgtPwd extends CI_Controller {

    public function __construct() {
        parent::__construct();      
        //session_start();
        $this->load->library('email');
    }

    function index() {
        $data['main'] = 'vw_fgtPwdMail';
        $data['varcss'] = 'admin.css';
        $this->load->view('template', $data);
    }

    function send_mail($emailTo, $message) {
        $this->load->library('email');
        $config = array(
            'protocol' => 'smtp',
            //'smtp_host' => 'ssl://smtp.googlemail.com',
            //'smtp_port' => 465,
            //'smtp_user' => 'marufjanatabank@gmail.com',
            //'smtp_pass' => '',
            'smtp_host' => 'mail.janatabank-bd.com',
            'smtp_port' => 25,
            'smtp_user' => 'mis@janatabank-bd.com',
            'smtp_pass' => 'Misjb-1234',
            'mailtype'  => 'html',
            //'protocol'  => 'sendmail',
      	    //'mailpath'  => '/usr/sbin/sendmail',
            'charset'   => 'iso-8859-1',
            'wordwrap'  => TRUE
    
        );
        $this->email->initialize($config);
        //$this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $from_email = "mis@janatabank-bd.com";
        //$to_email = $this->input->post('email');
        $this->email->from($from_email);
        $this->email->to($emailTo);
        $this->email->subject('Your OTP is :');
        $this->email->message("$message");
        //$this->email->send();
         if ($this->email->send()) {
            //die();
            $this->session->set_flashdata("email_send", "An OTP has been sent to your email.");
            //echo 'mail send';
        } else {
            $this->session->set_flashdata("email_send", "Error in sending Email!Contact with MISD");
            //die();            
            //redirect('FgtPwd', 'refresh'); 
            //temporary solution
            redirect('FgtPwd/otpVerification', 'refresh');
        }
    }

    function mailVerification() {
        $mail = $this->input->post('email');
        $mailCheck = "SELECT * FROM ms_admins WHERE email='$mail'";
        $runSQL = $this->db->query($mailCheck);
        if ($runSQL->num_rows() > 0) {
            $code = rand(999999, 111111);
            $insertCode = "UPDATE ms_admins SET otp = '$code' WHERE email = '$mail'";
            $runQuery = $this->db->query($insertCode);
            if ($runQuery) {
                //$this->session->set_flashdata('message', 'Em.');
                $emailTo = $mail;
                $message = "Your password reset code is $code";
                $this->send_mail($emailTo, $message);
                //echo 'Maruf-mail send';
                redirect('FgtPwd/otpVerification', 'refresh');
            } else {
                echo 'Email doesnt exist';
            }
        } else {
            $this->session->set_flashdata('error', "Email doesn't exist !");
            redirect('FgtPwd', 'refresh');
        }
    }

    function otpVerification() {
        $otp = $this->input->post('otp');
        //print_r($otp); die();
		//$q=$this->Model_users->otpVerify($otp);
		//print_r($q); die();
        if ($this->Model_users->otpVerify($otp)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('otp', 'otp', 'required|exact_length[6]|integer');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', "Wrong OTP !");
                redirect('FgtPwd/otpVerification', 'refresh');
            } else {
                $checkOTP = $this->Model_users->otpVerify($otp);
                //echo '<pre>';
                //print_r($checkOTP); 
                $id = $checkOTP[0]['id'];
                //print_r($id);
                $pwd = $checkOTP[0]['password'];
                //echo '<pre>';
                // print_r($pwd); die();               
                $data['main'] = 'login_reset';
                $data['adminID'] = $id;
                $data['adminPwd'] = $pwd;
                $data['varcss'] = 'admin.css';
                $this->load->view('template', $data);
            }
        } else {
			//echo 'last part';
            $data['main'] = 'vw_otpVerification';
            $data['varcss'] = 'admin.css';
            $this->load->view('template', $data);
        }
    }

}
