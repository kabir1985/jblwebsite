<?php

class Ec extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jbcad' || $_SESSION['username'] == 'batayan') {
            $data['ec'] = $this->Model_ec->getallEC();
            $data['main'] = "vw_ec_home";
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $this->load->vars($data);
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addEC() {
        if ($this->input->post('name')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'priority',
                    'label' => 'priority',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'name',
                    'label' => 'name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'designation',
                    'label' => 'designation',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'committee_status',
                    'label' => 'committee_status',
                    'rules' => 'required'
                ),
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'jbcad' || $_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_ec_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_ec->addEC();
                $this->session->set_flashdata('message', 'EC Successfully Added');
                redirect('admin/Ec/index', 'refresh');
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'jbcad' || $_SESSION['username'] == 'batayan') {
                $data['order'] = $this->Model_ec->get_order();
                $data['name'] = $this->Model_ec->get_name();
                $data['main'] = 'vw_ec_add';
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
            $this->Model_ec->updateEC($id);
            $this->session->set_flashdata('message', 'EC Updated Successfully');
            redirect('admin/Ec/index', 'refresh');
        } else {
            $data['title'] = 'Janata Bank PLC.';
            if ($_SESSION['username'] == 'jbcad' || $_SESSION['username'] == 'batayan') {
                $data['order'] = $this->Model_ec->get_order();
                $data['name'] = $this->Model_ec->get_name();
                $data['designation'] = $this->Model_ec->get_designation();
                $data['committee_status'] = $this->Model_ec->get_comstatus();
                $data['status'] = $this->Model_ec->get_status();
                $data['main'] = 'vw_ec_edit';
                $data['ec'] = $this->Model_ec->getTopEC($id);
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
        if ($_SESSION['username'] == 'jbcad' || $_SESSION['username'] == 'batayan') {
            $this->Model_ec->delete($id);
            $this->session->set_flashdata('message', 'Deleted/Inactivated');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Ec/index', 'refresh');
    }

}
