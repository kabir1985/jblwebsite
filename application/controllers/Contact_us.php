<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_us extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->helper('breadcrumb_helper');
        $this->load->library('pagination');
    }

    public function ho() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('ho');
        $data['image_details'] = $this->About_model->GetImageInfo('ho');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('ho');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function complaint_cell() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('complaint_cell');
        $data['image_details'] = $this->About_model->GetImageInfo('complaint_cell');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('complaint_cell');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function apa_cell() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('apa_cell');
        $data['image_details'] = $this->About_model->GetImageInfo('apa_cell');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('apa_cell');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

}
