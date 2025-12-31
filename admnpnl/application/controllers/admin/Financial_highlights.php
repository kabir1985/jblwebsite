<?php

class Financial_highlights extends CI_Controller {

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
            $data['main'] = 'vw_fh_home';
            $data['fh'] = $this->Model_financialHighlights->getAllHighlights();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function addFinancialItem() {

        /* if (isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT') {
          $this->Model_financialHighlights->addHighlights();
          $this->session->set_flashdata('message', 'Successfully Added');
          redirect('admin/financial_highlights/index', 'refresh');
          } else {
          $data['title'] = "Janata Bank PLC.";
          if ($_SESSION['username'] == 'batayan') {
          $data['main'] = 'vw_fh_add';
          $data['fh'] = $this->Model_financialHighlights->getAllHighlights();
          } else {
          $data['msg'] = 'You are not allowed to access this module';
          $data['main'] = 'authorization_page';
          }
          $data['tinymce'] = '';
          $data['varcss'] = 'admin_dashboard.css';
          $this->load->vars($data);
          $this->load->view('dashboard');
          } */
    }

    function add_new_year() {
        if (isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT') {
            $this->Model_financialHighlights->addNewYear();
            $this->session->set_flashdata('message', 'Successfully Added');
            redirect('admin/Financial_highlights/index', 'refresh');
        } else {
            $data['title'] = "Add New Year To your Database";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_fh_add_new_year';
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function edit($id = 0) {
        if (isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT') {
            $this->Model_financialHighlights->updateHighlights();
            $this->session->set_flashdata('message', 'Updated Successfully');
            redirect('admin/Financial_highlights/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_fh_edit';
                $data['fh'] = $this->Model_financialHighlights->getTopHighlights($id);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function delete($id) {
        if ($_SESSION['username'] == 'batayan') {
            $this->Model_financialHighlights->deleteHighlights($id);
            $this->session->set_flashdata('message', 'Deleted Successfully');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Financial_highlights/index', 'refresh');
    }

}

?>