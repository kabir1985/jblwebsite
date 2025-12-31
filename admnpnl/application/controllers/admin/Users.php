<?php

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        $otherUser = $_SESSION['username'];
        if ($_SESSION['username'] == 'batayan' || $otherUser) {
            $data['main'] = 'vw_users_home';
            $data['admins'] = $this->Model_users->getOtherUser($otherUser);
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function addUser() {
        $this->load->library('encryption');
        if ($this->input->post('username')) {
            $this->Model_users->addUser();
            $this->session->set_flashdata('message', 'User Added Successfully');
            redirect('admin/Users/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['officeCodes'] = $this->Model_users->getOfficeCodes();
                $data['officeNames'] = $this->Model_users->getOfficeNames();
                $data['main'] = 'vw_user_add';
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function edit($id = 0) {
        $otherUser = $_SESSION['username'];
        $this->load->library('encryption');
        if ($this->input->post('username')) {
            $this->Model_users->updateUser();
            $this->session->set_flashdata('message', 'User Updated');
            redirect('admin/Users/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan' || $otherUser) {
                $data['officeCodes'] = $this->Model_users->getOfficeCodes();
                $data['officeNames'] = $this->Model_users->getOfficeNames();
                $data['main'] = 'vw_user_edit';
                $data['admin'] = $this->Model_users->getUser($id);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function delete($id) {
        $otherUser = $_SESSION['username'];
        if ($_SESSION['username'] == 'batayan' || $otherUser) {
            $this->Model_users->deleteUser($id);
            $this->session->set_flashdata('message', 'User Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Users/index', 'refresh');
    }

}

?>
