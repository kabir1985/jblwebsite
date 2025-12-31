<?php

class Exchange_rates extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function home() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jbtd' || $_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_exrate_home';
            $data['exrate_all'] = $this->Model_exrates->getAllExrate();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function upload() {
        $data['title'] = "Janata Bank PLC.";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('myfile', '', 'callback_file_check');

        if ($_SESSION['username'] == 'jbtd' || $_SESSION['username'] == 'batayan') {

            if ($this->form_validation->run() == FALSE) {
                $data['main'] = 'vw_exrate_upload';
            } else {
                // duplicate checking for same day file upload
                $retV = $this->Model_exrates->uploadExRateFile();
                if ($retV == 1) {
                    $this->Model_exrates->uploadExRateFile();
                    $this->session->set_flashdata('message', 'File is uploaded successfully');
                    redirect('admin/Exchange_rates/home', 'refresh');
                } else {
                    $data['title'] = "Janata Bank PLC.";
                    $data['error_mssg'] = "একই তারিখে একাধিক ফাইল আপলোড করা যাবে না ! দয়া করে এডিট করূণ।";
                    $data['main'] = 'vw_exrate_upload';

                    $data['tinymce'] = '';
                    $data['varcss'] = 'admin_dashboard.css';
                    $this->load->view('dashboard', $data);
                }
            }
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');

        /*
          if (isset($_POST['submit']) && $_POST['submit'] == 'Upload') {
          $this->load->helper(array('form', 'url'));
          $this->load->library('form_validation');

          if (isset($_FILES['myfile']['error']) && $_FILES['myfile']['error'] != 0) {

          $data['title'] = "Janata Bank PLC.";
          if ($_SESSION['username'] == 'jbtd' || $_SESSION['username'] == 'batayan') {
          $data['main'] = 'vw_exrate_upload';
          $data['error_mssg'] = "Select File";
          } else {
          $data['msg'] = 'You are not allowed to access this module';
          $data['main'] = 'authorization_page';
          }
          $data['tinymce'] = '';
          $data['varcss'] = 'admin_dashboard.css';
          $this->load->view('dashboard', $data);
          } else {

          // duplicate checking for same day file upload
          $retV = $this->Model_exrates->uploadExRateFile();

          if ($retV == 1) {
          $this->session->set_flashdata('message', 'File is uploaded successfully');
          redirect('admin/Exchange_rates/home', 'refresh');
          } else {
          $data['title'] = "Janata Bank PLC.";
          $data['error_mssg'] = "একই তারিখে একাধিক ফাইল আপলোড করা যাবে না ! দয়া করে এডিট করূণ।";
          $data['main'] = 'vw_exrate_upload';

          $data['tinymce'] = '';
          $data['varcss'] = 'admin_dashboard.css';
          $this->load->view('dashboard', $data);
          }
          }
          } else {
          $data['title'] = "Janata Bank PLC.";
          if ($_SESSION['username'] == 'jbtd' || $_SESSION['username'] == 'batayan') {
          $data['main'] = 'vw_exrate_upload';
          } else {
          $data['msg'] = 'You are not allowed to access this module';
          $data['main'] = 'authorization_page';
          }
          $data['tinymce'] = '';
          $data['varcss'] = 'admin_dashboard.css';
          $this->load->view('dashboard', $data);
          }
         */
    }

    public function file_check() {
        $allowed_mime_type_arr = array('application/pdf');
        if (!empty($_FILES['myfile']['name'])) {

            $mime = get_mime_by_extension($_FILES['myfile']['name']);
            // print_r($mime); die();
            if (isset($_FILES['myfile']['name']) && $_FILES['myfile']['name'] != "") {
                if (in_array($mime, $allowed_mime_type_arr)) {
                    return true;
                } else {
                    //$this->form_validation->set_message('file_check', 'Please select only pdf/doc/docx/gif/jpg/png file.');
                    $this->session->set_flashdata('message', 'Please select only pdf file');
                    //return false;
                    redirect('admin/Exchange_rates/upload');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'No File Choosen');
            redirect('admin/Exchange_rates/upload');
        }
    }

    function edit($ex_id = 0) {
        if (isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT') {
            $ex_id = $_POST['ex_id'];
            //print_r($ex_id);
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('myfile', '', 'callback_file_check');
            if (isset($_FILES['myfile']['error']) && $_FILES['myfile']['error'] != 0) {

                $data['title'] = "ট্রেজারী ডিপার্টমেন্টঃ বৈদেশিক মুদ্রা বিনিময় ফাইল আপডেট করণ";
                if ($_SESSION['username'] == 'jbtd' || $_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_exrate_edit';
                    $data['error_mssg'] = "অনুগ্রহ করে ফাইল নির্বাচন করুণ !";
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_exrates->updateExRateFile($ex_id);

                $this->session->set_flashdata('message', 'বৈদেশিক মুদ্রা বিনিময় ফাইল আপডেট হয়েছে ! ধন্যবাদ।');
                redirect('admin/Exchange_rates/home', 'refresh');
            }
        } else {
            $data['title'] = "ট্রেজারী ডিপার্টমেন্টঃ বৈদেশিক মুদ্রা বিনিময় ফাইল আপডেট করণ";
            if ($_SESSION['username'] == 'jbtd' || $_SESSION['username'] == 'batayan') {
                $data['ex_file_info'] = $this->Model_exrates->getSpecificExRateFile($ex_id);
                //print_r($data['ex_file_info']); die();
                $data['main'] = 'vw_exrate_edit';
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function user() {
        $data['title'] = "ট্রেজারী ডিপার্টমেন্ট এর আইডি সমূহঃ";
        $data['main'] = "admin_user_home";
        $data['admins'] = $this->Model_exrates->getUser();

        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function user_edit() {
        $this->load->library('encrypt');
        if ($this->input->post('username')) {
            $this->Model_exrates->updateUser();
            $this->session->set_flashdata('message', 'পাসওয়ার্ড পরিবর্তন হয়েছে, ধন্যবাদ! !!!');
            redirect('admin/Exchange_rates/user', 'refresh');
        } else {
            $data['title'] = "ইউজার পাসওয়ার্ড পরিবর্তনঃ";
            $data['main'] = 'admin_user_edit';
            $data['admin'] = $this->Model_exrates->getFixedUser();
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function jblRateCash() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jbtd' || $_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_exrateCash_home';
            $data['exrate_all'] = $this->Model_exrates->rateCash();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function rateCashEdit($id) {
        if ($this->input->post('currency')) {
            $this->Model_exrates->rateCashEdit($id);
            $this->session->set_flashdata('message', 'Rate Updated');
            redirect('admin/Exchange_rates/jblRateCash', 'refresh');
        } else {
            $data['title'] = 'Janata Bank PLC.';
            if ($_SESSION['username'] == 'jbtd' || $_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_exrateCash_edit';
                $data['cash'] = $this->Model_exrates->getTopCashRate($id);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $this->load->vars($data);
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }
}

?>
