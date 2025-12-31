<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Treasury extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->helper('breadcrumb_helper');
    }
    
    public function merchant_banking(){
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('merchant_banking');
        $data['image_details'] = $this->About_model->GetImageInfo('merchant_banking');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('merchant_banking');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    } 
    
    public function investment_portfolio(){
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('investment_portfolio');
        $data['image_details'] = $this->About_model->GetImageInfo('investment_portfolio');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('investment_portfolio');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function govt_securities(){
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('govt_securities');
        $data['image_details'] = $this->About_model->GetImageInfo('govt_securities');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('govt_securities');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }
}
