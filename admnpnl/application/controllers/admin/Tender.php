<?php

class Tender extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        $userWithPermission = array("batayan", "jblnocsyl", "jblnocrang", "jblnocraj", "jblnocnoa", "jblnocmymen", "jblnocmisd", "jblnoclo", "jblnockhul", "jblnocjbcb", "jblnochr", "jblnocfarid", "jblnocdhksouth", "jblnocdhknor", "jblnocctg", "jblnoccom", "jblnocbari", "jblnoc", "jbhrd", "jbcmd", "jbcad", "itop");
        if (in_array($_SESSION['username'], $userWithPermission)) {
            $data['main'] = 'vw_tender_home';
            $data['tender_all'] = $this->Model_tender->getAllTender();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard', $data);
    }

    function addTender() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tender_type', 'Type', 'required');
        $this->form_validation->set_rules('tender_closing_date', 'Closing Date', 'required');
        $this->form_validation->set_rules('tender_offered_by', 'Offered Branch', 'required');
        $this->form_validation->set_rules('tender_pdf_link', '', 'callback_file_check');
        $data['tender_type'] = $this->Model_tender->getTenderType();

        if ($this->input->post('tender_title')) {
            $config = array(
                array(
                    'field' => 'tender_title',
                    'label' => 'tender_title',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'tender_reference',
                    'label' => 'tender_reference',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'tender_offered_by',
                    'label' => 'tender_offered_by',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'tender_starting_date',
                    'label' => 'tender_starting_date',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'tender_closing_date',
                    'label' => 'tender_closing_date',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'tender_status',
                    'label' => 'tender_status',
                    'rules' => 'required'
                ),
            );

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";

                $userWithPermission = array("batayan", "jblnocsyl", "jblnocrang", "jblnocraj", "jblnocnoa", "jblnocmymen", "jblnocmisd", "jblnoclo", "jblnockhul", "jblnocjbcb", "jblnochr", "jblnocfarid", "jblnocdhksouth", "jblnocdhknor", "jblnocctg", "jblnoccom", "jblnocbari", "jblnoc", "jbhrd", "jbcmd", "jbcad", "itop");
                $userName = $_SESSION['username'];

                if (in_array($userName, $userWithPermission)) {
                    $data['main'] = 'vw_tender_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard_tender', $data);
            } else {
                $this->Model_tender->addTender();
                $this->session->set_flashdata('message', 'Tender Added Successfully!');
                redirect('admin/Tender/index', 'refresh');
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            $userWithPermission = array("batayan", "jblnocsyl", "jblnocrang", "jblnocraj", "jblnocnoa", "jblnocmymen", "jblnocmisd", "jblnoclo", "jblnockhul", "jblnocjbcb", "jblnochr", "jblnocfarid", "jblnocdhksouth", "jblnocdhknor", "jblnocctg", "jblnoccom", "jblnocbari", "jblnoc", "jbhrd", "jbcmd", "jbcad", "itop");
            $userName = $_SESSION['username'];
            $data['allBranchs'] = $this->Model_tender->tenderOffering();

            if (in_array($userName, $userWithPermission)) {
                $data['main'] = 'vw_tender_add';
                $data['tender_all'] = $this->Model_tender->getTopTender();
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    public function file_check() {
        $allowed_mime_type_arr = array('application/msword', 'application/pdf');
        if (!empty($_FILES['tender_pdf_link']['name'])) {

            $mime = get_mime_by_extension($_FILES['tender_pdf_link']['name']);
            if (isset($_FILES['tender_pdf_link']['name']) && $_FILES['tender_pdf_link']['name'] != "") {
                if (in_array($mime, $allowed_mime_type_arr)) {
                    return true;
                } else {
                    //$this->form_validation->set_message('file_check', 'Please select only pdf/doc/docx/gif/jpg/png file.');
                    $this->session->set_flashdata('message', 'Please select only pdf/doc/docx file');
                    //return false;
                    redirect('admin/Tender/addTender');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'No File Choosen');
            redirect('admin/Tender/addTender');
        }
    }

    function edit($tender_id = 0) {
        $data['tender_type'] = $this->Model_tender->getTenderType();
        if ($this->input->post('tender_id')) {
            $this->Model_tender->updateTender();
            $this->session->set_flashdata('message', 'Tender Updated Successfully');
            redirect('admin/Tender/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            $userWithPermission = array("batayan", "jblnocsyl", "jblnocrang", "jblnocraj", "jblnocnoa", "jblnocmymen", "jblnocmisd", "jblnoclo", "jblnockhul", "jblnocjbcb", "jblnochr", "jblnocfarid", "jblnocdhksouth", "jblnocdhknor", "jblnocctg", "jblnoccom", "jblnocbari", "jblnoc", "jbhrd", "jbcmd", "jbcad", "itop");
            $userName = $_SESSION['username'];
            //$data['allBranchs'] = $this->Model_tender->getAllBranches($userName);
            $data['allBranchs'] = $this->Model_tender->tenderOffering($userName);
            
            if (in_array($userName, $userWithPermission)) {
                $data['main'] = 'vw_tender_edit';
                $data['tender'] = $this->Model_tender->getTender($tender_id);
                //echo '<pre>';
                // print_r( $data['tender']); die();
                //$data['tender_all'] = $this->Model_tender->getTopTender();
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($id) {
        $userWithPermission = array("batayan", "jblnocsyl", "jblnocrang", "jblnocraj", "jblnocnoa", "jblnocmymen", "jblnocmisd", "jblnoclo", "jblnockhul", "jblnocjbcb", "jblnochr", "jblnocfarid", "jblnocdhksouth", "jblnocdhknor", "jblnocctg", "jblnoccom", "jblnocbari", "jblnoc", "jbhrd", "jbcmd", "jbcad", "itop");
        $userName = $_SESSION['username'];

        if (in_array($userName, $userWithPermission)) {
            $tender_id = $this->uri->segment(4);
            $this->Model_tender->deleteTender($tender_id);
            $this->session->set_flashdata('message', 'Tender Deleted Successfully');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Tender/index', 'refresh');
    }
}
