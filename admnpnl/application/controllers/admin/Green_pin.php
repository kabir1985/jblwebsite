<?php

class Green_pin extends CI_Controller {

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
        if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jbcmd'){
            $data['main'] = "vw_extid_home";
            $data['log'] = $this->Model_extidlog->getAllLog();
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
