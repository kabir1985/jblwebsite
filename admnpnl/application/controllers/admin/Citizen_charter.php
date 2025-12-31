<?php

class Citizen_charter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'bdmd') {
            $data['main'] = 'vw_charter_home';
            $data['charter'] = $this->Model_charter->getAllCitizenServices();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function index_branches($id = 0) {
        $CI = & get_instance();
        $CI->load->model('Model_charter');
        $brcode = $CI->Model_charter->getAllBranchCode();
        foreach ($brcode as $row) {
            $row->brcode;
        }
        $row->brcode = $_SESSION['username'];
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == $row->brcode || $_SESSION['username'] == $id) {
            $data['main'] = 'vw_charter_home_for_branches';
            // $data['charter'] = $this->Model_charter->getCitizenServicesByBranch($id);
            $data['charter'] = $this->Model_charter->getAllCitizenServices();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function addCitizenServices() {
        $this->load->library('form_validation');
        $data['title'] = "Janata Bank PLC.";
        //$data['hoDept'] = $this->Model_charter->getHoDepartment();
        $data['branches'] = $this->Model_charter->getAllBranches();
        $this->form_validation->set_rules('name_of_services', 'Service', 'required');
        //$this->form_validation->set_rules('branch_code', 'Branch Name', 'required');
        $this->form_validation->set_rules('name_of_services', 'Service Name', 'required');
        $this->form_validation->set_rules('period_of_service', 'Period of Service', 'required');

        if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'bdmd') {
            if ($this->form_validation->run() == FALSE) {
                $data['main'] = 'vw_citzenService_add';
            } else {
                $this->Model_charter->addService();
                $this->session->set_flashdata('message', 'Service Added Successfully!');
                redirect('admin/Citizen_charter', 'refresh');
            }
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function addCitizenServicesByBranches($id) {
        $this->load->library('form_validation');
        $data['title'] = "Janata Bank PLC.";
        //$data['hoDept'] = $this->Model_charter->getHoDepartment();
        $data['branches'] = $this->Model_charter->getAllBranches();
        $this->form_validation->set_rules('name_of_services', 'Service', 'required');
        $this->form_validation->set_rules('branch_code', 'Branch Name', 'required');
        $this->form_validation->set_rules('name_of_services', 'Service Name', 'required');
        $this->form_validation->set_rules('period_of_service', 'Period of Service', 'required');

        if ($_SESSION['username'] == $id) {
            if ($this->form_validation->run() == FALSE) {
                $data['main'] = 'vw_citzenServiceByBranches_add';
            } else {
                $this->Model_charter->addService();
                $this->session->set_flashdata('message', 'Service Added Successfully!');
                redirect('admin/Citizen_charter/index_branches', 'refresh');
            }
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function edit($sl = 0) {
        if ($this->input->post('sl')) {

            $this->Model_charter->updateCitizenService();
            $this->session->set_flashdata('message', 'Service Updated Successfully');
            redirect('admin/Citizen_charter', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'bdmd') {
                //$data['hoDept'] = $this->Model_charter->getHoDepartment();
                $data['branches'] = $this->Model_charter->getAllBranches();
                $data['main'] = 'vw_citizenService_edit';
                $data['citizenService'] = $this->Model_charter->getService($sl);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function editByBranches($service_id = 0) {

        /*  if ($this->input->post('sl')) {

          $this->Model_charter->updateCitSrvByBranches();
          $this->session->set_flashdata('message', 'Service Updated Successfully');
          redirect('admin/Citizen_charter/index_branches', 'refresh');
          } else {

          $CI = & get_instance();
          $CI->load->model('Model_charter');
          $brcode = $CI->Model_charter->getAllBranchCode();
          foreach ($brcode as $row) {
          $row->brcode;
          }
          $row->brcode=$_SESSION['username'];

          $data['title'] = "Janata Bank PLC.";
          if ($_SESSION['username'] == $row->brcode) {
          //$data['hoDept'] = $this->Model_charter->getHoDepartment();
          $data['branches'] = $this->Model_charter->getAllBranches();
          $data['main'] = 'vw_citizenService_edit_for_branches';
          $data['citizenService'] = $this->Model_charter->getService($service_id);
          }
          else {
          $data['msg'] = 'You are not allowed to access this module';
          $data['main'] = 'authorization_page';
          }

          $data['tinymce'] = '';
          $data['varcss'] = 'admin_dashboard.css';
          $this->load->view('dashboard', $data);
          }
         */
        //echo $_SESSION['username'];
        $CI = & get_instance();
        $CI->load->model('Model_charter');
        $brcode = $CI->Model_charter->getAllBranchCode();
        foreach ($brcode as $row) {
            $row->brcode;
        }
        $row->brcode = $_SESSION['username'];

        if ($_SESSION['username'] == $row->brcode) {
            //$id = $this->Model_charter->getService($service_id);
            //echo'<pre>';
            //print_r($id); die();
            $this->Model_charter->updateCitSrvByBranches($service_id);
            $this->session->set_flashdata('message', 'Service Updated Successfully');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Citizen_charter/index_branches', 'refresh');
    }

    function delete($sl) {
        if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'bdmd') {
            //$notice_id = $this->uri->segment(4);
            $this->Model_charter->deleteService($sl);
            $this->session->set_flashdata('message', 'Service is Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Citizen_charter', 'refresh');
    }
}
