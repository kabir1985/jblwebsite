<?php

class Marquee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Janata Bank Limited";
        if ($_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_marquee_home';
            $data['marquee'] = $this->Model_marquee->getAllMarquee();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addMarquee() {
        if ($this->input->post('title')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $config = array(
                array(
                    'field' => 'title',
                    'label' => 'title',
                    'rules' => 'required'
                )
            );

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank Limited";
                if ($_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_marquee_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_marquee->addMarquee();
                $this->session->set_flashdata('message', 'Added Successfully!');
                redirect('admin/Marquee/index', 'refresh');
            }
        } else {
            $data['title'] = "Janata Bank Limited";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_marquee_add';
                //$data['marquee'] = $this->Model_marquee->getTopMarquee();
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
            $this->Model_marquee->updateMarquee();
            $this->session->set_flashdata('message', 'Successfully Updated!');
            redirect('admin/Marquee/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank Limited";
            if ($_SESSION['username'] == 'batayan') {
                $data['marquee'] = $this->Model_marquee->getMarquee($id);
                $data['main'] = 'vw_marquee_edit';
                //$data['notice_all'] = $this->model_notice->getTopNotice();
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
            $this->Model_marquee->deleteMarquee($id);
            $this->session->set_flashdata('message', 'Successfully Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Marquee/index', 'refresh');
    }

}
