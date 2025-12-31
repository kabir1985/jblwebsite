<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->helper('breadcrumb_helper');
        $this->load->library('pagination');
    }

    public function photo_gallery() {

        $data['title'] = "Janata Bank PLC.";
        //pagination starts
        $config['base_url'] = base_url('Gallery/photo-gallery/');
        $config['total_rows'] = $this->Album_model->count_rows();
        $config['per_page'] = 8;
        $config['num_links'] = 1;
        $config['display_pages'] = FALSE;

        $config['full_tag_open'] = '<div class="pagination"><li>';
        $config['full_tag_close'] = '</li></div>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $page = $this->uri->segment(3);
        //pagination ends
        $data['page_details'] = $this->About_model->GetPageInformation('photo_gallery');
        $data['image_details'] = $this->About_model->GetImageInfo('photo_gallery');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('photo_gallery');
        //$data['results'] = $this->album_model->queryAll();
        $data['results'] = $this->Album_model->albumPagination($config['per_page'], $page);
        $data['main_content'] = 'album_view';
        $this->load->view('template/gallery_template', $data);
    }

    public function images($albumID) {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('images');
        $data['image_details'] = $this->About_model->GetImageInfo('images');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('images');
        $data['image'] = $this->Album_model->imageAll($albumID);
        $data['main_content'] = 'gallery_view';
        $this->load->view('template/gallery_template', $data);
    }

    public function video_gallery() {
        $data['title'] = "Janata Bank PLC.";
        $config['base_url'] = site_url('Gallery/video_gallery/');
        $config['total_rows'] = $this->Album_model->count_videos();
        $config['per_page'] = 8;
        $config['num_links'] = 1;
        $config['display_pages'] = FALSE;

        $config['full_tag_open'] = '<div class="pagination"><li>';
        $config['full_tag_close'] = '</li></div>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $page = $this->uri->segment(3);
        $data['page_details'] = $this->About_model->GetPageInformation('video_gallery');
        $data['image_details'] = $this->About_model->GetImageInfo('video_gallery');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('video_gallery');
        $data['results'] = $this->Album_model->videoPagination($config['per_page'], $page);
        $data['main_content'] = 'video_view';
        $this->load->view('template/videoGallery_template', $data);
    }

}
