<?php
class Awards extends CI_Controller
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

    function index()
    {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan')
        {
            $data['main'] = 'vw_award_home';
            $data['awards'] = $this->Model_awards->getAllAwards();
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addAward()
    {
        if ($this->input->post('award_title'))
        {
            $this->load->helper(array('form','url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'award_title',
                    'label' => 'award_title',
                    'rules' => 'required'
                ) ,
                array(
                    'field' => 'award_status',
                    'label' => 'award_status',
                    'rules' => 'required'
                )
            );

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false)
            {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan')
                {
                    $data['main'] = 'vw_award_add';
                }
                else
                {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            }
            else
            {
                $this->Model_awards->addAward();
                $this->session->set_flashdata('message', 'Award Added Successfully');
                redirect('admin/Awards/index', 'refresh');
            }
        }

        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan')
            {
                $data['main'] = 'vw_award_add';
            }
            else
            {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function edit($award_id = 0)
    {
        if ($this->input->post('award_id'))
        {
            $this->Model_awards->updateAward();
            $this->session->set_flashdata('message', 'Award Updated');
            redirect('admin/Awards/index', 'refresh');
        }
        else
        {
            $data['title'] = "Edit Award";
            if ($_SESSION['username'] == 'batayan')
            {
                $data['main'] = 'vw_award_edit';
                $data['award'] = $this->Model_awards->getAwards($award_id);
                $data['awards'] = $this->Model_awards->getTopAwards();
            }
            else
            {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($award_id)
    {
        if ($_SESSION['username'] == 'batayan')
        {
            $pd_id = $this->uri->segment(4);
            $this->Model_awards->deleteAward($award_id);
            $this->session->set_flashdata('message', 'Award Deleted Successfully');
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Awards/index', 'refresh');
    }
}

