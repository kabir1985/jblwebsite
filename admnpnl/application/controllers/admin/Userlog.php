<?php

class Userlog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('MUserlog');
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function Index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan') {
            $data['main'] = "vw_userlog_home";
            $data['log'] = $this->Model_userlog->getAllLog();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function print_log() {
        $this->load->library('pdf');
        $data = array();
        $data['log'] = $this->Model_userlog->getAllLog();
        $pdf_filename = 'LOG_REPORT';
        $pdf_content = $this->load->view('vw_log_report', $data, true);
        $this->pdf->createPDF($pdf_content, $pdf_filename, true);
    }

}
