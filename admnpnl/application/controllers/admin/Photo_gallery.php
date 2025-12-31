<?php

class Photo_gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Gallery";
        if ($_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_gallery_home';
            $data['albums'] = $this->Model_gallery->getAllAlbums();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addPhotoGallery() {
        if ($this->input->post('albumName')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('default_image', '', 'callback_file_check');
            
            $config = array(
                array(
                    'field' => 'albumName',
                    'label' => 'albumName',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'albumDescription',
                    'label' => 'albumDescription',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'albumStatus',
                    'label' => 'albumStatus',
                    'rules' => 'required'
                ),
            );

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_album_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_gallery->addAlbum();
                $this->session->set_flashdata('message', 'Album Added Successfully');
                redirect('admin/Photo_gallery/index', 'refresh');
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_album_add';
                $data['albums'] = $this->Model_gallery->getTopAlbum();
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }
    
     public function file_check() {
        $allowed_mime_type_arr = array('image/jpeg', 'image/jpg', 'image/png');
        if (!empty($_FILES['default_image']['name'])) {

            $mime = get_mime_by_extension($_FILES['default_image']['name']);
            if (isset($_FILES['default_image']['name']) && $_FILES['default_image']['name'] != "") {
                if (in_array($mime, $allowed_mime_type_arr)) {
                    return true;
                } else {
                    //$this->form_validation->set_message('file_check', 'Please select only pdf/doc/docx/gif/jpg/png file.');
                    $this->session->set_flashdata('message', 'Please select only jpeg/jpg/png file');
                    //return false;
                    redirect('admin/Photo_gallery/addPhotoGallery');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'No File Choosen');
            redirect('admin/Photo_gallery/addPhotoGallery');
        }
    }

    function edit($albumID = 0) {
        if ($this->input->post('albumID')) {
            $this->Model_gallery->updateAlbum();
            $this->session->set_flashdata('message', 'Gallery Updated Successfully');
            redirect('admin/Photo_gallery/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_album_edit';
                $data['album'] = $this->Model_gallery->getAlbums($albumID);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($albumID) {
        if ($_SESSION['username'] == 'batayan') {
            $this->Model_gallery->deleteAlbum($albumID);
            $this->session->set_flashdata('message', 'Album Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Photo_gallery/index', 'refresh');
    }

    function uploadImageToAlbum() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan') {
            //$data['categorized_page'] = $this->MImages->getCategorizedPages();
            $data['main'] = 'vw_imageGallery_home';
            $data['photos'] = $this->Model_gallery->getAllImages();
            //print_r( $data['photos']); die();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addImageToAlbum() {
        if ($this->input->post('caption')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('imageName', '', 'callback_check_file');
            
            $config = array(
                array(
                    'field' => 'albumID',
                    'label' => 'albumID',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'imageStatus',
                    'label' => 'imageStatus',
                    'rules' => 'required'
                ),
            );

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_imageToAlbum_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_gallery->addImage();
                $this->session->set_flashdata('message', 'Photo Uploaded to Album Successfully');
                redirect('admin/Photo_gallery/uploadImageToAlbum', 'refresh');
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['ID'] = $this->Model_gallery->getAlbumID();
                $data['main'] = 'vw_imageToAlbum_add';
                $data['albums'] = $this->Model_gallery->getTopImages();
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }
    
     public function check_file() {
        $allowed_mime_type_arr = array('image/jpeg', 'image/jpg', 'image/png');
        if (!empty($_FILES['imageName']['name'])) {

            $mime = get_mime_by_extension($_FILES['imageName']['name']);
            if (isset($_FILES['imageName']['name']) && $_FILES['imageName']['name'] != "") {
                if (in_array($mime, $allowed_mime_type_arr)) {
                    return true;
                } else {
                    //$this->form_validation->set_message('file_check', 'Please select only pdf/doc/docx/gif/jpg/png file.');
                    $this->session->set_flashdata('message', 'Please select only jpeg/jpg/png file');
                    //return false;
                    redirect('admin/Photo_gallery/addImageToAlbum');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'No File Choosen');
            redirect('admin/Photo_gallery/addImageToAlbum');
        }
    }

    function imageToAlbumEdit($galleryID = 0) {
        if ($this->input->post('galleryID')) {
            $this->Model_gallery->updateImageToAlbum();
            $this->session->set_flashdata('message', 'Image Updated Successfully');
            redirect('admin/Photo_gallery/uploadImageToAlbum', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['ID'] = $this->Model_gallery->getAlbumID();
                $data['main'] = 'vw_imageToAlbum_Edit';
                $data['images'] = $this->Model_gallery->getImages($galleryID);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function imageToAlbumDelete($galleryID) {
        if ($_SESSION['username'] == 'batayan') {
            $this->Model_gallery->deleteImageToAlbum($galleryID);
            $this->session->set_flashdata('message', 'Image Deleted Successfully');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Photo_gallery/uploadImageToAlbum', 'refresh');
    }

}

?>
