<?php

class Deposit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_deposit_home';
            $data['deposits'] = $this->Model_deposit->getAllDeposits();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard', $data);
    }

    function addDepositProduct() {
        $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
        if ($this->input->post('product_scheme') != "") {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'product_group',
                    'label' => 'product_group',
                    'rules' => 'required'
                ),
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
                )
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_deposit_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $this->load->vars($data);
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_deposit->addDeposit();
                $this->session->set_flashdata('message', 'Deposit Product Added Successfully');
                redirect('admin/Deposit/index', 'refresh');
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_deposit_add';
                //$data['deposits'] = $this->Model_deposit->getTopDeposits();
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

    function edit($product_id = 0) {
        $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
        if ($this->input->post('product_id')) {
            $this->Model_deposit->updateDeposit();
            $this->session->set_flashdata('message', 'Deposit Updated');
            redirect('admin/Deposit/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_deposit_edit';
                $data['deposit'] = $this->Model_deposit->getDeposits($product_id);
                //$data['deposits'] = $this->Model_deposit->getTopDeposits();
                $data['product_status'] = $this->Model_deposit->getStatus();
                
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

    function delete($product_id) {
        if ($_SESSION['username'] == 'batayan') {
            $product_id = $this->uri->segment(4);
            $this->Model_deposit->deleteDeposit($product_id);
            $this->session->set_flashdata('message', 'Deposit Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Deposit/index', 'refresh');
    }

}

?>
