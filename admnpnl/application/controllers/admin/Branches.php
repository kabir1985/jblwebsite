<?php

class Branches extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
        $this->tinyMce = '
		<!-- TinyMCE -->
		<script type="text/javascript" src="' . base_url() . 'includes/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript" src="' . base_url() . 'includes/js/my_tinymce.js"></script>
		<!-- /TinyMCE -->
		';
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_branches_home';
            $data['branch'] = $this->Model_branches->getAllBranch();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = $this->tinyMce;
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addBranch() {
        if ($this->input->post('branchname')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'branchname',
                    'label' => 'branchname',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'brcode',
                    'label' => 'brcode',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'address',
                    'label' => 'address',
                    'rules' => 'required'
                )
            );

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_branch_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_branches->addBranch();
                $this->session->set_flashdata('message', 'Branch Added Successfully!');
                redirect('admin/Branches', 'refresh');
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_branch_add';
                $data['branch_all'] = $this->Model_branches->getTopBranch();
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
            $this->Model_branches->updateBranch();
            $this->session->set_flashdata('message', 'Successfully Updated!');
            redirect('admin/Branches/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_branch_edit';                
                $data['branch'] = $this->Model_branches->getBranch($id);
                $data['branch_all'] = $this->Model_branches->getTopBranch();
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
        if ($_SESSION['username'] == 'batayan') {
            $br_id = $this->uri->segment(4);
            $this->Model_branches->deleteBranch($id);
            $this->session->set_flashdata('message', 'Deleted/InActivated Successfully');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Branches/index', 'refresh');
    }

}

?>
