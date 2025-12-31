<?php
class User_cmd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if ($_SESSION['userid'] < 1)
        {
            redirect('Welcome/index', 'refresh');
        }
    }

    function Index()
    {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jbcmd' || $_SESSION['username'] == 'admin')
        {
            $data['main'] = "vw_cmd_home";
            $data['admins'] = $this->Model_userCmd->getUser();
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
            //$this->MAdmincmd->updateUser();
            $this->session->set_flashdata('message', 'Updated Successfully !!!');
            redirect('admin/User_cmd/index', 'refresh');
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'jbcmd' || $_SESSION['username'] == 'admin')
            {
                $data['main'] = 'vw_cmd_edit';
                $data['admin'] = $this->Model_userCmd->getFixedUser();
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

