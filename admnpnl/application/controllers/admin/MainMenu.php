<?php

class MainMenu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_mainMenu');
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_mainMenu_home';
            $data['mm'] = $this->Model_mainMenu->getAllMainMenu();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $this->load->vars($data);
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addMainMenu() {
        if ($this->input->post('name')) {
            $this->Model_mainMenu->addMainMenu();
            $this->session->set_flashdata('message', 'Menu Added Successfully');
            redirect('admin/MainMenu/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_mainMenu_add';
                $data['mm'] = $this->Model_mainMenu->getTopMainMenu();
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard', $data);
        }
    }

    function edit($mainmenu_id = 0) {
        if ($this->input->post('mainmenu_id')) {
            $this->Model_mainMenu->updateMainMenu();
            $this->session->set_flashdata('message', 'Main Menu Updated Successfully');
            redirect('admin/MainMenu/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_mainMenu_edit';
                $data['mm'] = $this->Model_mainMenu->getMainMenu($mainmenu_id);
                //$data['mm'] = $this->Model_mainMenu->getTopMainMenu();
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard', $data);
        }
    }

    function delete($mainmenu_id) {
        if ($_SESSION['username'] == 'batayan') {
            $this->Model_mainMenu->deleteMainMenu($mainmenu_id);
            $this->session->set_flashdata('message', 'Main Menu Deleted/InActivated');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/MainMenu/index', 'refresh');
    }

}

?>
