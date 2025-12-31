<?php
class User_studymaterial extends CI_Controller
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
        $data['title'] = "Manage User/Password";
        if ($_SESSION['username'] == 'jbsc' || $_SESSION['username'] == 'admin')
        {
            $data['main'] = "vw_studymaterialUser_home";
            $data['admins'] = $this->Model_studyMaterialJBSC->getUser();
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
            $this->Model_studyMaterialJBSC->updateUser();
            $this->session->set_flashdata('message', 'Updated Successfully !!!');
            redirect('admin/Adminprd/index', 'refresh');
        }
        else
        {
            $data['title'] = "Update User/Password";
            if ($_SESSION['username'] == 'jbsc' || $_SESSION['username'] == 'admin')
            {
                $data['main'] = 'vw_studymaterialUser_edit';
                $data['admin'] = $this->Model_studyMaterialJBSC->getFixedUser();
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

