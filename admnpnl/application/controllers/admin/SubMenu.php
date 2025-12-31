<?php

class SubMenu extends CI_Controller {

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
            $data['main'] = 'vw_subMenu_home';
            $data['sm'] = $this->Model_subMenu->getAllSubMenu();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $this->load->vars($data);
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addSubMenu() {
        if ($this->input->post('submenu_name')) {
            $this->Model_subMenu->addSubMenu();
            $this->session->set_flashdata('message', 'Sub Menu Added Successfully');
            redirect('admin/SubMenu/index', 'refresh');
        } else {
            $data['title'] = "Fill Up Carefully";
            if ($_SESSION['username'] == 'batayan') {
                $data['smdrp'] = $this->Model_subMenu->drpFillMainMenu();
                $data['main'] = 'vw_subMenu_add';
                $data['sm'] = $this->Model_subMenu->getTopSubMenu();
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

    function edit($submenu_id = 0) {
        if ($this->input->post('submenu_id')) {
            $this->Model_subMenu->updateSubMenu();
            $this->session->set_flashdata('message', 'Sub Menu Updated Successfully');
            redirect('admin/SubMenu/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_subMenu_edit';
                $data['sm'] = $this->Model_subMenu->getSubMenu($submenu_id);
                $data['sbm'] = $this->Model_subMenu->getTopSubMenu();
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

    function delete($submenu_id) {
        if ($_SESSION['username'] == 'batayan') {
            $this->Model_subMenu->deleteSubMenu($submenu_id);
            $this->session->set_flashdata('message', 'Sub Menu Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/SubMenu/index', 'refresh');
    }

}

?>
