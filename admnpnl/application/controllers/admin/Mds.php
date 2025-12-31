<?php
class Mds extends CI_Controller
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
            $data['main'] = 'vw_md_home';
            $data['md'] = $this->Model_mds->getAllMD();
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $this->load->vars($data);
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addMD()
    {
        if ($this->input->post('name'))
        {
            $this->load->helper(array('form','url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'priority',
                    'label' => 'priority',
                    'rules' => 'required'
                ) ,
                array(
                    'field' => 'name',
                    'label' => 'name',
                    'rules' => 'required'
                ) ,

                array(
                    'field' => 'designation',
                    'label' => 'designation',
                    'rules' => 'required'
                ) ,

                array(
                    'field' => 'duration',
                    'label' => 'duration',
                    'rules' => 'required'
                ) ,
                array(
                    'field' => 'status',
                    'label' => 'status',
                    'rules' => 'required'
                ) ,
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false)
            {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan')
                {
                    $data['main'] = 'vw_md_add';
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
                $this->Model_mds->addMD();
                $this->session->set_flashdata('message', 'Successfully Added');
                redirect('admin/Mds/index', 'refresh');
            }
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan')
            {
                $data['main'] = 'vw_md_add';
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

    function edit($id = 0)
    {
        if ($this->input->post('id'))
        {
            $this->Model_mds->updateMD();         
            $this->session->set_flashdata('message', 'Updated Successfully');
            redirect('admin/Mds/index', 'refresh');
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan')
            {
                $data['main'] = 'vw_md_edit';
                $data['md'] = $this->Model_mds->getTopMD($id);
            }
            else
            {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $this->load->vars($data);
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($id)
    {
        if ($_SESSION['username'] == 'batayan')
        {
            $this->Model_mds->deleteMD($id);
            $this->session->set_flashdata('message', 'Deleted Successfully');
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Mds/index', 'refresh');
    }
}

