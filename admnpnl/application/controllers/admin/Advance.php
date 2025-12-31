<?php

class Advance extends CI_Controller {

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
            $data['main'] = 'vw_advance_home';
            $data['advances'] = $this->Model_advance->getAllAdvances();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard', $data);
    }

    function addAdvanceProduct() {
        $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
        if ($this->input->post('product_group') && $this->input->post('product_scheme') && $this->input->post('product_type')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'product_scheme',
                    'label' => 'product_scheme',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'product_type',
                    'label' => 'product_type',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'product_status',
                    'label' => 'product_status',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'product_group',
                    'label' => 'product_group',
                    'rules' => 'required'
                )
            );

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_advance_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_advance->addAdvance();
                $this->session->set_flashdata('message', 'Advance Product Added Successfully');
                redirect('admin/Advance/index', 'refresh');
            }
        } else {

            if ($_SESSION['username'] == 'batayan') {
                $data['title'] = "Janata Bank PLC.";
                $data['main'] = 'vw_advance_add';
                $data['advances'] = $this->Model_advance->getTopAdvances();
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function edit($product_id = 0) {
        $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
        if ($this->input->post('product_id')) {
            $this->Model_advance->updateAdvance();
            $this->session->set_flashdata('message', 'Advance Product Updated');
            redirect('admin/Advance/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.t";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_advance_edit';
                $data['product_type'] = $this->Model_advance->get_prodtype();
                //$data['installment_type'] = $this->Model_advance->get_installtype();
               // $data['status'] = $this->Model_advance->get_status();
                $data['advance'] = $this->Model_advance->getAdvances($product_id);
                $data['advances'] = $this->Model_advance->getTopAdvances();
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($product_id) {
        if ($_SESSION['username'] == 'batayan') {
            $product_id = $this->uri->segment(4);
            $this->Model_advance->deleteAdvance($product_id);
            $this->session->set_flashdata('message', 'Deposit Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Advance/index', 'refresh');
    }

}
