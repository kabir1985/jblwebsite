<?php
class User_prd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();     
        //session_start();
        if ($_SESSION['userid'] < 1)
        {
            redirect('Welcome/index', 'refresh');
        }
    }

    function Index()
    {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jbprd' || $_SESSION['username'] == 'admin')
        {
            $data['main'] = "vw_userPRD_home";
            $data['admins'] = $this->Model_userPRD->getUser();
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function edit()
    {
        $this->load->library('encrypt');
        if ($this->input->post('username'))
        {
            $this->Model_userPRD->updateUser();
            $this->session->set_flashdata('message', 'Updated Successfully !!!');
            redirect('admin/Userprd/index', 'refresh');
        }
        else
        {
            $data['title'] = "Update User/Password";
            if ($_SESSION['username'] == 'jbprd' || $_SESSION['username'] == 'admin')
            {
                $data['main'] = 'vw_userPRD_edit';
                $data['admin'] = $this->Model_userPRD->getFixedUser();
            }
            else
            {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

}

