<?php

class Files extends CI_Controller {

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
        if ($_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_files_home';
            $data['files'] = $this->Model_files->getAllFiles();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    /*
      function addFile() {
      $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
      if ($this->input->post('title')) {
      $this->Model_files->addFile();
      $this->session->set_flashdata('message', 'File Uploaded Successfully');
      redirect('admin/Files/index', 'refresh');
      } else {
      $data['title'] = "Janata Bank PLC.";
      if ($_SESSION['username'] == 'batayan') {
      $data['fill'] = $this->Model_files->fill_manual_category();
      $data['type'] = $this->Model_files->fill_manual_type();
      $data['main'] = 'vw_file_add';
      } else {
      $data['msg'] = 'You are not allowed to access this module';
      $data['main'] = 'authorization_page';
      }
      $data['tinymce'] = '';
      $data['varcss'] = 'admin_dashboard.css';
      $this->load->vars($data);
      $this->load->view('dashboard');
      }
      } */

    function addFile() {

        /* $processUser = posix_getpwuid(posix_geteuid());
          print $processUser['name'];
          if (isset($_FILES['image'])) {
          echo '<pre>';
          print_r($_FILES);
          echo '<pre>';
          //die();
          echo  $_FILES['image']['error'];
          die();
          } */

        $this->load->library('form_validation');

        $data['title'] = "Janata Bank PLC.";
        $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('page_name', 'Page Name', 'required');
        $this->form_validation->set_rules('mainmenu_id', 'Page Main Menu', 'required');
        $this->form_validation->set_rules('path', '', 'callback_file_check');
        $this->form_validation->set_rules('image', '', 'callback_img_check');

        if ($_SESSION['username'] == 'batayan') {

            if ($this->form_validation->run() == FALSE) {
                $data['main'] = 'vw_file_add';
            } else {

                $page = $this->input->post('page_name');

                date_default_timezone_set("Asia/Dhaka");
                $dt = date("Y-m-d_h-i-sa");

                //echo  $file_name = $_FILES['path']['name'];
                //$file_size = $_FILES['path']['size'];
                $file_tmp = $_FILES['path']['tmp_name'];
                //$file_type = $_FILES['path']['type'];
                //$error = $_FILES['path']['error'];
                //echo'<pre>';
                //echo  $img_name = $_FILES['image']['name'];
                //die();
                $img_tmp = $_FILES['image']['tmp_name'];

                //$location = base_url(). 'assets/file/documents/';
                //$abs_loc = str_replace("admnpnl/", "", $location);
                $img_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/others/';
                $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/documents/';

                $ext_file = pathinfo($_FILES['path']['name'], PATHINFO_EXTENSION);
                $ext_file = strtolower($ext_file);

                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $ext = strtolower($ext);

                if (!empty($ext_file)) {
                    $file_name = $page . '_' . $dt . '.' . $ext_file;
                } else {
                    $file_name = NULL;
                }

                if (!empty($ext)) {
                    $image_name = $page . '_' . $dt . '.' . $ext;
                } else {
                    $image_name = NULL;
                }


                $image_ext_arr = array('gif', 'jpg', 'png', 'jpeg');
                $file_ext_arr = array('doc', 'docx', 'pdf');

                if (in_array($ext, $image_ext_arr)) {
                    move_uploaded_file($img_tmp, $img_loc . $image_name);
                    //$error = $_FILES['image']['error'];
                    //print_r($error);
                    //die();
                }
                //elseif (in_array($ext_file, $file_ext_arr)) {
                if (in_array($ext_file, $file_ext_arr)) {
                    move_uploaded_file($file_tmp, $file_loc . $file_name);
                    //$error = $_FILES['path']['error'];
                    //print_r($error);
                    //die();
                }

                //$this->Model_files->addFile($file_name);
                //$this->Model_files->addFile((!empty($file_name)) ? $file_name : $image_name);
                $this->Model_files->addFile($file_name, $image_name);
                $this->session->set_flashdata('message', 'File Uploaded Successfully');
                redirect('admin/Files');
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

    /* file value and type check during validation */

    public function file_check() {
        $allowed_mime_type_arr = array('application/msword', 'application/pdf');

        if (!empty($_FILES['path']['name'])) {

            $mime = get_mime_by_extension($_FILES['path']['name']);
            if (isset($_FILES['path']['name']) && $_FILES['path']['name'] != "") {
                if (in_array($mime, $allowed_mime_type_arr)) {
                    return true;
                } else {
                    //$this->form_validation->set_message('file_check', 'Please select only pdf/doc/docx/gif/jpg/png file.');
                    $this->session->set_flashdata('message', 'Please select only pdf/doc/docx file');
                    //return false;
                    redirect('admin/Files/addFile');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'No File Choosen');
            redirect('admin/Files/addFile');
        }
    }

    /* Image value and type check during validation */

    public function img_check() {
        $allowed_mime_type_arr = array('image/jpeg', 'image/png');
        if (!empty($_FILES['image']['name'])) {

            $mime = get_mime_by_extension($_FILES['image']['name']);
            if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
                if (in_array($mime, $allowed_mime_type_arr)) {
                    return true;
                } else {
                    //$this->form_validation->set_message('file_check', 'Please select only pdf/doc/docx/gif/jpg/png file.');
                    $this->session->set_flashdata('message', 'Please select only jpg/png file');
                    //return false;
                    redirect('admin/Files/addFile');
                }
            } else {
                $this->session->set_flashdata('message', 'No File Choosen');
                redirect('admin/Files/addFile');
            }
        }
    }

    function upload() {
        $this->load->view('upload_form');
    }

    public function do_upload() {
        if (isset($_FILES['userfile'])) {
            echo '<pre>';
            print_r($_FILES);
            echo '<pre>';
        }


        echo $_FILES['userfile']['error'];
        echo '<pre>';
        //print_r($error);
        //die();
        //$abs_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/';
        $abs_loc = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
        $config['upload_path'] = $abs_loc;
        //$config['upload_path']   = './uploads/'; 
        print_r($config['upload_path']);
        $config['allowed_types'] = 'pdf|docx|doc|gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
            //$error = $_FILES['userfile']['error'];
            //print_r($error);
            //die();
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo 'success';
        }
    }

    function edit($id = 0) {
        //$this->load->library('form_validation');
        //$this->form_validation->set_rules('path', '', 'callback_file_check');
        if ($this->input->post('id')) {
            $this->Model_files->updateFile();
            $this->session->set_flashdata('message', 'File Updated Successfully');
            redirect('admin/Files/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['mainMenu'] = $this->Model_pages->getMainMenusForEdit();
                $data['subMenu'] = $this->Model_pages->getSubMenusForEdit();
                $data['childMenu'] = $this->Model_pages->getChildMenusForEdit();
                $data['pageName'] = $this->Model_pages->getPagesForEdit();
                $data['main'] = 'vw_file_edit';
                $data['file'] = $this->Model_files->getFile($id);
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

    function delete($id) {
        if ($_SESSION['username'] == 'batayan') {
            //$id = $this->uri->segment(4);
            $this->Model_files->deleteFile($id);
            $this->session->set_flashdata('message', 'File deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Files/index', 'refresh');
    }
}

?>
