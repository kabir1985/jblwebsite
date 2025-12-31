<?php

class Dashboard extends CI_Controller {
    /* function Dashboard(){
      parent::Controller();
      session_start();

      if (!isset($_SESSION['target_ready'])){ $_SESSION['target_ready'] = false;  }

      if ($_SESSION['userid'] < 1){
      redirect('welcome/index','refresh');
      }
      } */

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        //session_start();
        if (!isset($_SESSION['target_ready'])) {
            $_SESSION['target_ready'] = false;
        }

        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Dashboard Home";
        $data['main'] = 'dashboard_home';
        $data['tinymce'] = '';
        //$this->load->vars($data);
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }


    function logout() {
        //date_default_timezone_set('Asia/Dhaka');
        //$currentDateTime = date('Y-m-d h:i:s');
        //$newDateTime = date('Y-m-d h:i:s A', strtotime($currentDateTime));
        $date = array(
            'logout' => date('Y-m-d h:i:s')
        );
        $this->Model_users->logout($date);
        unset($_SESSION['userid']);
        $this->session->set_flashdata('error', "You've been logged out!");
        redirect('Welcome/index', 'refresh');
    }

}

?>