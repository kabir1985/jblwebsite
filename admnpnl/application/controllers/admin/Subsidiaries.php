<?php

class Subsidiaries extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_subsidiaries_home';
            $data['sub'] = $this->Model_subsidiaries->getAll_subsidiaries();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $this->load->vars($data);
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addSubsidiary() {
        if ($this->input->post('name')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'name',
                    'label' => 'name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'address',
                    'label' => 'address',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'contacts',
                    'label' => 'contacts',
                    'rules' => 'required'
                ),
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_subsidiary_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_subsidiaries->addcompany();
                $this->session->set_flashdata('message', 'Successfully Added');
                redirect('admin/Subsidiaries/index', 'refresh');
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_subsidiary_add';
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function edit($id = 0) {
        if ($this->input->post('id')) {
            $this->Model_subsidiaries->update_company();
            $this->session->set_flashdata('message', 'Company Updated');
            redirect('admin/Subsidiaries/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_subsidiary_edit';
                $data['sub'] = $this->Model_subsidiaries->getTopCompany($id);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $this->load->vars($data);
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($id) {
        if ($_SESSION['username'] == 'batayan') {
            $pa_id = $this->uri->segment(4);
            $this->Model_subsidiaries->deleteCompany($id);
            $this->session->set_flashdata('message', 'Company Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Subsidiaries/index', 'refresh');
    }

}
