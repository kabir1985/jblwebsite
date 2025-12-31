<?php

class StudyMaterial_jbsc extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //session_start();
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jbsc' || $_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_studyMaterialJBSC_home';
            $data['study_all'] = $this->Model_studyMaterialJBSC->getAllStudy();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function downloadMaterial() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jbsc' || $_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jblwebuser') {
            $data['main'] = 'vw_studyMaterial_download';
            $data['study_all'] = $this->Model_studyMaterialJBSC->getAllStudyDownload();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    public function download_files($id) {
        $url = substr(base_url(), 0, -8);
        $this->load->helper('download');
        $fileinfo = $this->Model_studyMaterialJBSC->download_files($id);
        $matchingFile = $url . 'assets/file/studyMaterial/' . $fileinfo['path'];
        if (!empty($matchingFile)) {
            $file = file_get_contents($matchingFile);
            $name = $this->Model_studyMaterialJBSC->pdfname_files($id);
            force_download($name, $file);
        } else {
            redirect('/page404');
        }
    }

    function addStudyMaterial() {
        if ($this->input->post('title')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'title',
                    'label' => 'title',
                    'rules' => 'required'
                ),
            );

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'jbsc' || $_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_studyMaterialJBSC_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_studyMaterialJBSC->addStudy();
                $this->session->set_flashdata('message', 'Study Material Added Successfully!');
                redirect('admin/StudyMaterial_jbsc/index', 'refresh');
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'jbsc' || $_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_studyMaterialJBSC_add';
                $data['study_all'] = $this->Model_studyMaterialJBSC->getTopStudy();
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
            $study_id = $this->input->post('id');
            $file_path = $this->Model_studyMaterialJBSC->getStudy($study_id);
            $file_name = $file_path['path'];
            $this->Model_studyMaterialJBSC->updateStudy($file_name);
            $this->session->set_flashdata('message', 'Study Material Successfully Updated!');
            redirect('admin/StudyMaterial_jbsc/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'jbsc' || $_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_studyMaterialJBSC_edit';
                $data['study'] = $this->Model_studyMaterialJBSC->getStudy($id);
                $data['study_all'] = $this->Model_studyMaterialJBSC->getTopStudy();
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
        if ($_SESSION['username'] == 'jbsc' || $_SESSION['username'] == 'batayan') {
            $study_id = $this->uri->segment(4);
            $this->Model_studyMaterialJBSC->deleteStudy($id);
            $this->session->set_flashdata('message', 'Study Material Successfully Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/StudyMaterial_jbsc/index', 'refresh');
    }

}

?>
