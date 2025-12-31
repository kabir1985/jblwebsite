<?php
class User_divisionalOffices extends CI_Controller
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
        if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == 'jblnocmisd' || $_SESSION['username'] == 'jblnochr' || $_SESSION['username'] == 'jblnocrang' || $_SESSION['username'] == 'jblnocraj' || $_SESSION['username'] == 'jblnockhul' || $_SESSION['username'] == 'jblnocbari' || $_SESSION['username'] == 'jblnocfarid' || $_SESSION['username'] == 'jblnocdhknor' || $_SESSION['username'] == 'jblnocdhksouth' || $_SESSION['username'] == 'jblnocmymen' || $_SESSION['username'] == 'jblnocsyl' || $_SESSION['username'] == 'jblnoccom' || $_SESSION['username'] == 'jblnocctg' || $_SESSION['username'] == 'jblnocjbcb' || $_SESSION['username'] == 'jblnoclo')
        {
            $data['main'] = "vw_userDo_home";
            $data['admins'] = $this->Model_userDvisionalOffices->getUser();
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
            $this->Model_userDvisionalOffices->updateUser();
            $this->session->set_flashdata('message', 'Updated Successfully !!!');
            redirect('admin/User_DivisionalOffices/index', 'refresh');
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == 'jblnocmisd' || $_SESSION['username'] == 'jblnochr' || $_SESSION['username'] == 'jblnocrang' || $_SESSION['username'] == 'jblnocraj' || $_SESSION['username'] == 'jblnockhul' || $_SESSION['username'] == 'jblnocbari' || $_SESSION['username'] == 'jblnocfarid' || $_SESSION['username'] == 'jblnocdhknor' || $_SESSION['username'] == 'jblnocdhksouth' || $_SESSION['username'] == 'jblnocmymen' || $_SESSION['username'] == 'jblnocsyl' || $_SESSION['username'] == 'jblnoccom' || $_SESSION['username'] == 'jblnocctg' || $_SESSION['username'] == 'jblnocjbcb' || $_SESSION['username'] == 'jblnoclo')
            {
                $data['main'] = 'vw_userDo_edit';
                $data['admin'] = $this->Model_userDvisionalOffices->getFixedUser();
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

