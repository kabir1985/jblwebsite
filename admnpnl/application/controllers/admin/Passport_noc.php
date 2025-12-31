<?php

class Passport_noc extends CI_Controller {

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
        if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblnocmisd' || $_SESSION['username'] == 'jblnochr' || $_SESSION['username'] == 'jblnocrang' || $_SESSION['username'] == 'jblnocraj' || $_SESSION['username'] == 'jblnockhul' || $_SESSION['username'] == 'jblnocbari' || $_SESSION['username'] == 'jblnocfarid' || $_SESSION['username'] == 'jblnocdhknor' || $_SESSION['username'] == 'jblnocdhksouth' || $_SESSION['username'] == 'jblnocmymen' || $_SESSION['username'] == 'jblnocsyl' || $_SESSION['username'] == 'jblnoccom' || $_SESSION['username'] == 'jblnocctg' || $_SESSION['username'] == 'jblnocjbcb' || $_SESSION['username'] == 'jblnoclo' || $_SESSION['username'] == 'jblnocnoa') {
            $data['main'] = 'vw_passportNOC_home';
            $data['noc_all'] = $this->Model_passportNOC->getAllNoc();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addNOC() {
        $this->load->library('form_validation');
        $userName = $_SESSION['username'];
        $data['designation'] = $this->Model_passportNOC->getDesignation();
        //print_r($data); die();
        $data['fileNoPrefix'] = $this->Model_passportNOC->getFileNoPrefix();
        $data['allBranchs'] = $this->Model_passportNOC->getAllBranches($userName);
        $this->form_validation->set_rules('myfile', '', 'callback_file_check');

        if (isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT') {

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array('field' => 'employeename', 'label' => 'Employee Name', 'rules' => 'required'),
                array('field' => 'employeedesig', 'label' => 'Designation', 'rules' => 'required'),
                /*                 * new addition for prefix */
                array('field' => 'fileNoPrefix', 'label' => 'File No Prefix', 'rules' => 'required'),
                /*                 * new addition for prefix */
                array('field' => 'employeefile', 'label' => 'File No', 'rules' => 'required'),
                array('field' => 'employeefathername', 'label' => 'Employee father\'s name', 'rules' => 'required'),
                array('field' => 'employeeposting', 'label' => 'Place of posting', 'rules' => 'required'),
                array('field' => 'nocdate', 'label' => 'Noc issue date ', 'rules' => 'required')
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false || (isset($_FILES['myfile']['error']) && $_FILES['myfile']['error'] != 0)) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblnocnoa' || $_SESSION['username'] == 'jblnochr' || $_SESSION['username'] == 'jblnocrang' || $_SESSION['username'] == 'jblnocraj' || $_SESSION['username'] == 'jblnockhul' || $_SESSION['username'] == 'jblnocbari' || $_SESSION['username'] == 'jblnocfarid' || $_SESSION['username'] == 'jblnocdhknor' || $_SESSION['username'] == 'jblnocdhksouth' || $_SESSION['username'] == 'jblnocmymen' || $_SESSION['username'] == 'jblnocsyl' || $_SESSION['username'] == 'jblnoccom' || $_SESSION['username'] == 'jblnocctg' || $_SESSION['username'] == 'jblnocjbcb' || $_SESSION['username'] == 'jblnoclo') {
                    $data['main'] = 'vw_passportNOC_add';
                    $data['error_mssg'] = "Please, choose file!";
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {

                if ($this->Model_passportNOC->checkDuplicateFileNo()) {
                    echo "NOC exists against this File No";
                    $data['main'] = 'vw_passportNOC_add';
                    $data['duplicateFile'] = "NOC existis against this File No!";
                } else {
                    $this->Model_passportNOC->addNoc();
                    $this->session->set_flashdata('message', 'NOC Added Successfully!');
                    redirect('admin/Passport_noc/index', 'refresh');
                }
                $data['title'] = "Janata Bank PLC.";
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblnocnoa' || $_SESSION['username'] == 'jblnochr' || $_SESSION['username'] == 'jblnocrang' || $_SESSION['username'] == 'jblnocraj' || $_SESSION['username'] == 'jblnockhul' || $_SESSION['username'] == 'jblnocbari' || $_SESSION['username'] == 'jblnocfarid' || $_SESSION['username'] == 'jblnocdhknor' || $_SESSION['username'] == 'jblnocdhksouth' || $_SESSION['username'] == 'jblnocmymen' || $_SESSION['username'] == 'jblnocsyl' || $_SESSION['username'] == 'jblnoccom' || $_SESSION['username'] == 'jblnocctg' || $_SESSION['username'] == 'jblnocjbcb' || $_SESSION['username'] == 'jblnoclo') {
                $data['main'] = 'vw_passportNOC_add';
                $data['noc_all'] = $this->Model_passportNOC->getTopNoc();
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
        if (!empty($_FILES['myfile']['name'])) {

            $mime = get_mime_by_extension($_FILES['myfile']['name']);
            if (isset($_FILES['myfile']['name']) && $_FILES['myfile']['name'] != "") {
                if (in_array($mime, $allowed_mime_type_arr)) {
                    return true;
                } else {
                    //$this->form_validation->set_message('file_check', 'Please select only pdf/doc/docx/gif/jpg/png file.');
                    $this->session->set_flashdata('message', 'Please select only pdf/doc/docx file');
                    //return false;
                    redirect('admin/Passport_noc/addNOC');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'No File Choosen');
            redirect('admin/Passport_noc/addNOC');
        }
    }

    function edit($employee_id = 0) {
        $userName = $_SESSION['username'];
        $data['designation'] = $this->Model_passportNOC->getDesignation();
        $data['fileNoPrefix'] = $this->Model_passportNOC->getFileNoPrefix();
        $data['allBranchs'] = $this->Model_passportNOC->getAllBranches($userName);

        if ($this->input->post('employee_id')) {
            $this->Model_passportNOC->updateNoc();
            $this->session->set_flashdata('message', 'Noc Successfully Updated!');
            redirect('admin/Passport_noc/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblnocmisd' || $_SESSION['username'] == 'jblnochr' || $_SESSION['username'] == 'jblnocrang' || $_SESSION['username'] == 'jblnocraj' || $_SESSION['username'] == 'jblnockhul' || $_SESSION['username'] == 'jblnocbari' || $_SESSION['username'] == 'jblnocfarid' || $_SESSION['username'] == 'jblnocdhknor' || $_SESSION['username'] == 'jblnocdhksouth' || $_SESSION['username'] == 'jblnocmymen' || $_SESSION['username'] == 'jblnocsyl' || $_SESSION['username'] == 'jblnoccom' || $_SESSION['username'] == 'jblnocctg' || $_SESSION['username'] == 'jblnocjbcb' || $_SESSION['username'] == 'jblnoclo' || $_SESSION['username'] == 'jblnocnoa') {
                $data['main'] = 'vw_passportNOC_edit';
                $data['noc'] = $this->Model_passportNOC->getNoc($employee_id);
                $data['noc_all'] = $this->Model_passportNOC->getTopNoc();
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($employee_id) {
        if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblnocmisd' || $_SESSION['username'] == 'jblnochr' || $_SESSION['username'] == 'jblnocrang' || $_SESSION['username'] == 'jblnocraj' || $_SESSION['username'] == 'jblnockhul' || $_SESSION['username'] == 'jblnocbari' || $_SESSION['username'] == 'jblnocfarid' || $_SESSION['username'] == 'jblnocdhknor' || $_SESSION['username'] == 'jblnocdhksouth' || $_SESSION['username'] == 'jblnocmymen' || $_SESSION['username'] == 'jblnocsyl' || $_SESSION['username'] == 'jblnoccom' || $_SESSION['username'] == 'jblnocctg' || $_SESSION['username'] == 'jblnocjbcb' || $_SESSION['username'] == 'jblnoclo') {
            $noc_id = $this->uri->segment(4);

            $this->Model_passportNOC->deleteNoc($employee_id);
            $this->session->set_flashdata('message', 'NOC Successfully Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Passport_noc/index', 'refresh');
    }
}
