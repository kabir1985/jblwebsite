<?php

class Images extends CI_Controller {

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
            //$data['categorized_page'] = $this->Model_images->getCategorizedPages();
            $data['main'] = 'vw_image_home';
            $data['images'] = $this->Model_images->getAllImages();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addImage() {
        // echo '<pre>';
        //print_r( $data['categorized_page']); die();       
        if ($this->input->post('image_title')) {
            $evnt = $_POST['event'];
            //print_r($evnt); die();           
            $this->Model_images->addImage($evnt);
            $this->session->set_flashdata('message', 'Image Added Successfully');
            redirect('admin/images/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
                //$data['order'] = $this->Model_images->getExistingOrder();
                $data['main'] = 'vw_image_add';
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

    function edit($image_id = 0) {
        if ($this->input->post('image_id')) {
            //$evnt = $_POST['event'];
            $this->Model_images->updateImage();
            $this->session->set_flashdata('message', 'Image Updated');
            redirect('admin/Images/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
                $data['main'] = 'vw_image_edit';
                $data['image'] = $this->Model_images->getImage($image_id);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($image_id) {
        if ($_SESSION['username'] == 'batayan') {
            $image_id = $this->uri->segment(4);
            $this->Model_images->deleteImage($image_id);
            $this->session->set_flashdata('message', 'Image Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Images/index', 'refresh');
    }

}

?>
