<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About_us extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->helper('breadcrumb_helper');
        $this->load->library('pagination');
    }

    public function history() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('history');
        $data['image_details'] = $this->About_model->GetImageInfo('history');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('history');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function citizen_charter() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('citizen_charter');
        $data['image_details'] = $this->About_model->GetImageInfo('citizen_charter');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('citizen_charter');
        $data['main_content'] = 'textFile_view_iframe';
        $this->load->view('template/common_template', $data);
    }

    public function swift_branches() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('swift_branches');
        $data['image_details'] = $this->About_model->GetImageInfo('swift_branches');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('swift_branches');
        $data['swift'] = $this->About_model->swift_branches();
        $data['main_content'] = 'swift_view';
        $this->load->view('template/common_template', $data);
    }

    public function bank_at_a_glance() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('bank_at_a_glance');
        $data['image_details'] = $this->About_model->GetImageInfo('bank_at_a_glance');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('bank_at_a_glance');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function awards() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('awards');
        $data['image_details'] = $this->About_model->GetImageInfo('awards');
        $data['award'] = $this->About_model->GetAllAwards('awards');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('awards');
        $data['main_content'] = 'awards_view';
        $this->load->view('template/common_template', $data);
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

    public function annual_report() {
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
    
    
    public function board_of_directors() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('board_of_directors');
        $data['image_details'] = $this->About_model->GetImageInfo('board_of_directors');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('board_of_directors');
        $data['bod'] = $this->About_model->board_of_directors();
        $data['main_content'] = 'boardofDirectors_view';
        $this->load->view('template/common_template', $data);
    }
    

    public function executive_comittee() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('executive_comittee');
        $data['image_details'] = $this->About_model->GetImageInfo('executive_comittee');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('executive_comittee');
        $data['executive'] = $this->About_model->executive_committee();
        $data['main_content'] = 'committee_view';
        $this->load->view('template/common_template', $data);
    }
    

    public function audit_committee() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('audit_committee');
        $data['image_details'] = $this->About_model->GetImageInfo('audit_committee');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('audit_committee');
        $data['executive'] = $this->About_model->audit_committee();
        $data['main_content'] = 'committee_view';
        $this->load->view('template/common_template', $data);
    }
    

    public function risk_management_committee() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('risk_management_committee');
        $data['image_details'] = $this->About_model->GetImageInfo('risk_management_committee');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('risk_management_committee');
        $data['executive'] = $this->About_model->risk_committee();
        $data['main_content'] = 'committee_view';
        $this->load->view('template/common_template', $data);
    }
    

    public function MD_CEO_and_MD() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('MD_CEO_and_MD');
        $data['image_details'] = $this->About_model->GetImageInfo('MD_CEO_and_MD');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('MD_CEO_and_MD');
        $data['md'] = $this->About_model->ceo_md();
        $data['main_content'] = 'CEOMD_view';
        $this->load->view('template/common_template', $data);
    }
    
    
    public function publication() {
        $data['title'] = "Janata Bank PLC.";
        $config['base_url'] = base_url('About_us/publication/');
        $config['total_rows'] = $this->About_model->count_rows();
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
        $data['pagination'] = $this->pagination->create_links();
        $page = $this->uri->segment(3);
        $data['page_details'] = $this->About_model->GetPageInformation('publication');
        $data['image_details'] = $this->About_model->GetImageInfo('publication');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('publication');
        $data['pub'] = $this->About_model->publication($config['per_page'], $page);
        $data['main_content'] = 'publication_view';
        $this->load->view('template/common_template', $data);
    }

    public function manuals() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('manuals');
        $data['image_details'] = $this->About_model->GetImageInfo('manuals');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('manuals');
        //$data['manual_category_bb'] = $this->About_model->getManualCategory('1');
        //$data['manual_category_jb'] = $this->About_model->getManualCategory('2');
        //$data['manual_bb'] = $this->About_model->getManual('1');
        //$data['manual_jb'] = $this->About_model->getManual('2');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function risk_based_capital() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('risk_based_capital');
        $data['image_details'] = $this->About_model->GetImageInfo('risk_based_capital');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('risk_based_capital');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }   
    
     public function ceoandmd (){
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('board_of_directors');
        $data['image_details'] = $this->About_model->GetImageInfo('board_of_directors');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('board_of_directors');
        $data['bod'] = $this->About_model->board_of_directors();
        $data['main_content'] = 'template/ceoandmd_profile';
        $this->load->view('template/mdProfile_template', $data);
    }
	
}
