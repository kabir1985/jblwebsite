<?php

class ChildMenu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_childMenu');
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_childMenu_home';
            $data['cm'] = $this->Model_childMenu->getAllChildMenu();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard', $data);
    }

    function addChildMenu() {
        if ($this->input->post('childmenu_name')) {
            $this->Model_childMenu->addChildMenu();
            $this->session->set_flashdata('message', 'Child Menu Added Successfully');
            redirect('admin/ChildMenu/index', 'refresh');
        } else {
            $data['title'] = "Fill Up Carefully";
            if ($_SESSION['username'] == 'batayan') {
                $data['cm'] = $this->Model_childMenu->drpFillChildMenu();
                $data['main'] = 'vw_childMenu_add';
                $data['chm'] = $this->Model_childMenu->getTopChildMenu();
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

    function edit($childmenu_id = 0) {
        if ($this->input->post('childmenu_id')) {
            $this->Model_childMenu->updateChildMenu();
            $this->session->set_flashdata('message', 'Child Menu updated');
            redirect('admin/ChildMenu/index', 'refresh');
        } else {
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_childMenu_edit';
                $data['cm'] = $this->Model_childMenu->getChildMenu($childmenu_id);
                $data['chm'] = $this->Model_childMenu->getTopChildMenu();
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

    function delete($childmenu_id) {
        if ($_SESSION['username'] == 'batayan') {
            $this->Model_childMenu->deleteChildMenu($childmenu_id);
            $this->session->set_flashdata('message', 'Child Menu Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/ChildMenu/index', 'refresh');
    }

}

?>
