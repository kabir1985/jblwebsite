<?php

class Bod extends CI_Controller {

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
            $data['main'] = 'vw_bod_home';
            $data['bod'] = $this->Model_bod->getAllBod();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $this->load->vars($data);
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addDirector() {
        if ($this->input->post('bod_name')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('bod_image', '', 'callback_file_check');

            $config = array(
                array(
                    'field' => 'bod_priority',
                    'label' => 'bod_priority',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'bod_name',
                    'label' => 'bod_name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'bod_designation',
                    'label' => 'bod_designation',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'bod_status',
                    'label' => 'bod_status',
                    'rules' => 'required'
                ),
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'jbcad' || $_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_bod_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_bod->addBod();
                $this->session->set_flashdata('message', 'Board of Director Successfully Added');
                redirect('admin/Bod/index', 'refresh');
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'jbcad' || $_SESSION['username'] == 'batayan') {

                $data['main'] = 'vw_bod_add';
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
        $allowed_mime_type_arr = array('image/jpeg', 'image/jpg', 'image/png');
        if (!empty($_FILES['bod_image']['name'])) {

            $mime = get_mime_by_extension($_FILES['bod_image']['name']);
            if (isset($_FILES['bod_image']['name']) && $_FILES['bod_image']['name'] != "") {
                if (in_array($mime, $allowed_mime_type_arr)) {
                    return true;
                } else {
                    //$this->form_validation->set_message('file_check', 'Please select only pdf/doc/docx/gif/jpg/png file.');
                    $this->session->set_flashdata('message', 'Please select only jpeg/jpg/png file');
                    //return false;
                    redirect('admin/Bod/addDirector');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'No File Choosen');
            redirect('admin/Bod/addDirector');
        }
    }

    function edit($bod_id = 0) {
        if ($this->input->post('bod_name')) {
            $this->Model_bod->updateBod();
            $this->session->set_flashdata('message', 'BOD Updated Successfully');
            redirect('admin/Bod/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'jbcad' || $_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_bod_edit';
                $data['bod'] = $this->Model_bod->getTopBod($bod_id);
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

    function delete($bod_id) {
        if ($_SESSION['username'] == 'jbcad' || $_SESSION['username'] == 'batayan') {
            $this->Model_bod->deleteBod($bod_id);
            $this->session->set_flashdata('message', 'BOD Deleted Successfully');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Bod/index', 'refresh');
    }

    function directorsInfo() {
        $data['title'] = "Janata Bank PLC.";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('dirRelatedInfo', '', 'callback_fileCheck');

        if ($_SESSION['username'] == 'jbcad' || $_SESSION['username'] == 'batayan') {

            if ($this->form_validation->run() == FALSE) {
                $data['main'] = 'vw_directors_info';
            } else {
                $ext_file = pathinfo($_FILES['dirRelatedInfo']['name'], PATHINFO_EXTENSION);
                $ext_file = strtolower($ext_file);
                //$date = date("Y-m-d_h-i-sa");
                $date = date("d-m-Y");
                $fileName = "directors_related_info_" . $date . '.' . $ext_file;
                //$fileName ="directors_related_info";
                //$my_file = array();
                //$my_file = $this->add_link_file_directorsInfo('path1', $fileName);
                $file_tmp = $_FILES['dirRelatedInfo']['tmp_name'];
                $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/bod/';
                move_uploaded_file($file_tmp, $file_loc . $fileName);
                $this->session->set_flashdata('message', 'File is uploaded successfully');
                redirect('admin/Bod/index', 'refresh');
            }
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    public function fileCheck() {
        $allowed_mime_type_arr = array('application/msword', 'application/pdf');
        if (!empty($_FILES['dirRelatedInfo']['name'])) {

            $mime = get_mime_by_extension($_FILES['dirRelatedInfo']['name']);
            // print_r($mime); die();
            if (isset($_FILES['dirRelatedInfo']['name']) && $_FILES['dirRelatedInfo']['name'] != "") {
                if (in_array($mime, $allowed_mime_type_arr)) {
                    return true;
                } else {
                    //$this->form_validation->set_message('file_check', 'Please select only pdf/doc/docx/gif/jpg/png file.');
                    $this->session->set_flashdata('message', 'Please select only word/pdf file');
                    //return false;
                    redirect('admin/Bod/directorsInfo');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'No File Choosen');
            redirect('admin/Bod/directorsInfo');
        }
    }
}

?>
