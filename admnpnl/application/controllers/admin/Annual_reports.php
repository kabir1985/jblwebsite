<?php
class Annual_reports extends CI_Controller
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
            $data['main'] = 'vw_reports_home';
            $data['report'] = $this->Model_reports->getAllReports();
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';      
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard', $data);
    }

    function addAnnualReports()
    {
        if ($this->input->post('annual_report_title'))
        {
            $this->load->helper(array('form','url'));
            $this->load->library('form_validation');
            $config = array(

                array(
                    'field' => 'annual_report_title',
                    'label' => 'annual_report_title',
                    'rules' => 'required'
                ) ,
                array(
                    'field' => 'annual_report_year',
                    'label' => 'annual_report_year',
                    'rules' => 'required'
                ) ,

                array(
                    'field' => 'annual_report_status',
                    'label' => 'annual_report_status',
                    'rules' => 'required'
                ) ,
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false)
            {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan')
                {
                    $data['main'] = 'vw_annualReports_add';
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
                $this->Model_reports->addReport();
                $this->session->set_flashdata('message', 'Successfully Added');
                redirect('admin/Annual_reports/index', 'refresh');
            }

        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan')
            {
                $data['main'] = 'vw_annualReports_add';
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

    function edit($annual_report_id = 0)
    {
        if ($this->input->post('annual_report_id'))
        {
            $this->Model_reports->updateReport();
            $this->session->set_flashdata('message', 'Updated Succesfully');
            redirect('admin/Annual_reports/index', 'refresh');
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan')
            {
                $data['main'] = 'vw_annualReports_edit';
                $data['report'] = $this->Model_reports->getTopreport($annual_report_id);
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

    function delete($annual_report_id)
    {
        if ($_SESSION['username'] == 'batayan')
        {
            $pa_id = $this->uri->segment(4);
            $this->Model_reports->deleteReport($annual_report_id);
            $this->session->set_flashdata('message', 'Deleted');
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Annual_reports/index', 'refresh');
    }
}

