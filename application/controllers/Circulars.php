<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Circulars extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->helper('menu_helper');
        //$this->load->helper('home_helper');
        $this->load->library('pagination');
        $this->load->helper('download');
        $this->load->helper('breadcrumb_helper');
        
        //Private Circulars '.. Restrict direct access to circular
         if (!isset($_SERVER['HTTP_REFERER'])) {
           redirect('/page404');
        } 
    }

    public function index() {

        $config = array();
        $config['base_url'] = base_url('Circulars/index/');

        $config['total_rows'] = $this->CircularPrivate_model->count_private();
        //print_r($config['total_rows']); die();
        $config['per_page'] = 10;
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
        $page = $this->uri->segment(3);
        $data['circular_new'] = $this->CircularPrivate_model->fetch_circular($config['per_page'], $page);
        $data['hoDept'] = $this->CircularPrivate_model->getAllDepartments();
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Circulars');
        //$data['image_details'] = $this->About_model->GetImageInfo('index');
        // $data['document_details'] = $this->About_model->GetPageDocumentInfo('index');
        //$data['main_content'] = 'public_circular';
        //$this->load->view('template/common_template', $data);
        $this->load->view('private_circular', $data);
    }

    public function download_files($circular_id) {
        $this->load->helper('download');
        $fileinfo = $this->CircularPrivate_model->download($circular_id);
        $file = file_get_contents('assets/file/circular/' . $fileinfo['circular_pdf_link']);
        $name = $this->CircularPrivate_model->pdfname($circular_id);
        force_download($name, $file);
    }

    public function searchBy_no() {

       /* $circular_no = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars($this->input->post('search', TRUE))); */
         $circular_no1 = trim($this->input->post('search'));
        $circular_no2 = htmlspecialchars($circular_no1);
        $circular_no = stripcslashes($circular_no2);
        
        if (isset($circular_no) and !empty($circular_no)) {
            $data['message'] = $circular_no;
            $data['title'] = "Janata Bank PLC.";
            $data['circular_new'] = $this->CircularPrivate_model->searchBy_no($circular_no);
            $this->load->view('circular_search', $data);
        } else {
            redirect('/page404');
        }
    }

    public function searchBy_title() {
        /*$circular_title = htmlspecialchars($this->input->post('search')); */
        $circular_title1 = trim($this->input->post('search'));
        $circular_title2 = htmlspecialchars($circular_title1);
        $circular_title = stripcslashes($circular_title2);
        
        if (isset($circular_title) and !empty($circular_title)) {
            $data['message'] = $circular_title;
            $data['title'] = "Janata Bank PLC.";
            $data['circular_new'] = $this->CircularPrivate_model->searchBy_title($circular_title);
            $this->load->view('circular_search', $data);
        } else {
            redirect('/page404');
        }
    }

    public function searchBy_dept() {
        $circular_department = $this->input->post('search');
		//print_r($circular_department);
        if (isset($circular_department) and !empty($circular_department)) {
            $data['message'] = $this->CircularPrivate_model->codeToDept($circular_department);
			//echo '<pre>';
			//print_r($data['message']); 
            $data['title'] = "Janata Bank PLC.";
            $data['circular_new'] = $this->CircularPrivate_model->searchBy_dept($circular_department);
			//echo '<pre>';
            // print_r($data['circular_new']);die();  
            $this->load->view('circular_search', $data);
        } else {
            redirect('/page404');
        }
    }

    public function searchBy_type() {
        $circular_type = $this->input->post('search');
        if (isset($circular_type) and !empty($circular_type)) {
            $data['message'] = $circular_type;
            $data['title'] = "Janata Bank PLC.";
            $data['circular_new'] = $this->CircularPrivate_model->searchBy_type($circular_type);
            $this->load->view('circular_search', $data);
        } else {
            redirect('/page404');
        }
    }

    public function searchBy_date() {
        $circular_fromdate = $this->input->post('fromdate');
        $circular_todate = $this->input->post('todate');
        if (isset($circular_fromdate) and !empty($circular_fromdate)) {
            $data['message'] = $circular_fromdate;
            $data['title'] = "Janata Bank PLC.";
            $data['circular_new'] = $this->CircularPrivate_model->searchBy_date($circular_fromdate, $circular_todate);
            $this->load->view('circular_search', $data);
        } else {
            redirect('/page404');
        }
    }
    
    public function pdfIframeView($circular_id) {
        if (!isset($_SERVER['HTTP_REFERER'])) {
            redirect('/page404');
        } else {
            $data['title'] = "Janata Bank PLC.";
            $fileinfo = $this->CircularPrivate_model->pdfname_files($circular_id);
            $data['fileLink'] = base_url("assets/file/circular/$fileinfo");
            $data['main_content'] = 'template/iframe';
            $this->load->view('template/iframe_template_pmis', $data);
        }
    }

}
