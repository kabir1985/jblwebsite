<?php

class Innovation extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jblrpsd' || $_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_innovationTeam_home';
            $data['team'] = $this->Model_innovation->getAllMembers();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $this->load->vars($data);
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addMember() {
        if (isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT') {
            $priority_id = $_POST['priority'];

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
                    'field' => 'offdesig',
                    'label' => 'offdesig',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'posting',
                    'label' => 'posting',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'innodesig',
                    'label' => 'innodesig',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblrpsd') {
                    $data['main'] = 'vw_innovMember_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
// duplicate checking for priority
                $retV = $this->Model_innovation->addInnovationmember($priority_id);
                if ($retV == 1) {
                    $this->session->set_flashdata('message', 'Innovation Member Added Successfully!');
                    redirect('admin/Innovation', 'refresh');
                } else {
                    $this->data['error_mssg'] = "Priority Already Taken!";
                    $this->data['main'] = 'vw_innovMember_add';
                    $this->data['title'] = "Janata Bank PLC.";
                    $this->load->view('dashboard', $this->data);
                }
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblrpsd') {
                $data['main'] = 'vw_innovMember_add';
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function edit($innovation_id = 0) {

        if ($this->input->post('innovation_id')) {
            $innovation_id = $this->input->post('innovation_id');
            $priority_id = $_POST['priority'];

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
                    'field' => 'offdesig',
                    'label' => 'offdesig',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'posting',
                    'label' => 'posting',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'innodesig',
                    'label' => 'innodesig',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'status',
                    'label' => 'status',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblrpsd') {
                    $data['main'] = 'vw_innovation_edit';
                    $data['innovation'] = $this->Model_innovation->getSpecificMember($innovation_id);
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {

// duplicate checking for priority
                $retV = $this->Model_innovation->updateInnovation($priority_id, $innovation_id);

                if ($retV == 1) {
                    $this->session->set_flashdata('message', 'Innovation Member Successfully Updated!');
                    redirect('admin/Innovation/index', 'refresh');
                } else {
                    $this->data['innovation'] = $this->Model_innovation->getSpecificMember($innovation_id);
                    $this->data['error_mssg'] = "Priority Already Taken!";
                    $this->data['main'] = 'vw_innovation_edit';
                    $this->data['title'] = "Janata Bank PLC.";
                    $this->load->view('dashboard', $this->data);
                }
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblrpsd') {
                $data['main'] = 'vw_innovation_edit';
                $data['innovation'] = $this->Model_innovation->getSpecificMember($innovation_id);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }

            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($innovation_id) {
        if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblrpsd') {
            $this->Model_innovation->deleteInnovationMember($innovation_id);
            $this->session->set_flashdata('message', 'Innovation Member Successfully Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Innovation/index', 'refresh');
    }

// Upload innovation category files

    function uploadcatfiles() {
        if (isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT') {

            $filetype = $_POST['filetype'];

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'filetype',
                    'label' => 'filetype',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false || (isset($_FILES['myfile']['error']) && $_FILES['myfile']['error'] != 0)) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblrpsd') {
                    $data['main'] = 'vw_innovFile_upload';
                    $data['error_mssg'] = "Please, choose file!";
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $retV = $this->Model_innovation->uploadInnovationCatFiles($filetype);
                if ($retV == 1) {
                    $this->session->set_flashdata('message', 'File Uploaded Successfully!');
                    redirect('admin/Innovation/uploadcatfiles', 'refresh');
                } else {
                    $this->session->set_flashdata('message', 'File Updated Successfully!');
                    redirect('admin/Innovation/uploadcatfiles', 'refresh');
                }
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblrpsd') {
                $data['main'] = 'vw_innovFile_upload';
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function download_dompdf() {
        $this->load->library('Pdf');

        $data['details'] = $this->Model_innovation->get_details_idea();
//echo "<pre>";
//print_r($data['details']); die();
//$this->dompdf->allow_charset_conversion = true;
//$this->dompdf->charset_in = 'UTF-8';

        $pdf_filename = 'innovation.pdf';
        $pdf_content = $this->load->view('vw_innovative_idea', $data, true);
        $this->dompdf->loadHtml($pdf_content);

        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream($pdf_filename);
    }

    function download() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jblrpsd' || $_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_innovative_idea';
            $data['details'] = $this->Model_innovation->get_details_idea();
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
