<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Financial_reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->helper('breadcrumb_helper');
        $this->load->library('pagination');
    }

    public function financial_highlights() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('financial_highlights');
        $data['image_details'] = $this->About_model->GetImageInfo('financial_highlights');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('financial_highlights');
        $data['financial'] = $this->About_model->financial_overview();
        $data['main_content'] = 'financialHighlights_view';
        $this->load->view('template/common_template', $data);
    }

    public function annual_reports() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('annual_report');
        $data['image_details'] = $this->About_model->GetImageInfo('annual_report');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('annual_report');
        $data['annual_reports'] = $this->About_model->annual_report();
        $data['main_content'] = 'annualReports_view';
        $this->load->view('template/common_template', $data);
    }

    public function credit_rating() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('credit_rating');
        $data['image_details'] = $this->About_model->GetImageInfo('credit_rating');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('credit_rating');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function auditors_report() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('auditors_report');
        $data['image_details'] = $this->About_model->GetImageInfo('auditors_report');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('auditors_report');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function apa() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('apa');
        $data['image_details'] = $this->About_model->GetImageInfo('apa');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('apa');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function apa_focalPoint() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('apa_focalPoint');
        $data['image_details'] = $this->About_model->GetImageInfo('apa_focalPoint');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('apa_focalPoint');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }
	
	 public function division_agreement(){
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('division_agreement');
        $data['image_details'] = $this->About_model->GetImageInfo('division_agreement');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('division_agreement');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }
	
	 public function area_agreement(){
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('area_agreement');
        $data['image_details'] = $this->About_model->GetImageInfo('area_agreement');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('area_agreement');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

}
