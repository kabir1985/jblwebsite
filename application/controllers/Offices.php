<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Offices extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->helper('home_helper');
        $this->load->helper('breadcrumb_helper');
    }

    public function Barishal() {
        $divName = $this->uri->segment(2);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Barishal');
        $data['image_details'] = $this->About_model->GetImageInfo('Barishal');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Barishal');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
    
     public function Chattogram() {
        $divName = $this->uri->segment(2);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Chattogram');
        $data['image_details'] = $this->About_model->GetImageInfo('Chattogram');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Chattogram');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function Cumilla() {
        $divName = $this->uri->segment(2);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Cumilla');
        $data['image_details'] = $this->About_model->GetImageInfo('Cumilla');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Cumilla');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function Dhaka_North() {
        $Name = $this->uri->segment(2);
        $divName = str_replace("_"," ",$Name);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Dhaka_North');
        $data['image_details'] = $this->About_model->GetImageInfo('Dhaka_North');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Dhaka_North');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function Dhaka_South() {
        $Name = $this->uri->segment(2);
        $divName = str_replace("_"," ",$Name);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Dhaka_South');
        $data['image_details'] = $this->About_model->GetImageInfo('Dhaka_South');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Dhaka_South');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function Faridpur() {
        $divName = $this->uri->segment(2);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Faridpur');
        $data['image_details'] = $this->About_model->GetImageInfo('Faridpur');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Faridpur');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function Khulna() {
        $divName = $this->uri->segment(2);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Khulna');
        $data['image_details'] = $this->About_model->GetImageInfo('Khulna');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Khulna');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function Mymensingh() {
        $divName = $this->uri->segment(2);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Mymensingh');
        $data['image_details'] = $this->About_model->GetImageInfo('Mymensingh');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Mymensingh');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function Noakhali() {
        $divName = $this->uri->segment(2);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Noakhali');
        $data['image_details'] = $this->About_model->GetImageInfo('Noakhali');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Noakhali');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
    
     public function Rajshahi() {
        $divName = $this->uri->segment(2);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Rajshahi');
        $data['image_details'] = $this->About_model->GetImageInfo('Rajshahi');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Rajshahi');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function Rangpur() {
        $divName = $this->uri->segment(2);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Rangpur');
        $data['image_details'] = $this->About_model->GetImageInfo('Rangpur');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Rangpur');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function Sylhet() {
        $divName = $this->uri->segment(2);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Sylhet');
        $data['image_details'] = $this->About_model->GetImageInfo('Sylhet');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Sylhet');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
	
	// new update on 03.07.2025
	public function Bogura() {
        $divName = $this->uri->segment(2);
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('Bogura');
        $data['image_details'] = $this->About_model->GetImageInfo('Bogura');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('Bogura');
        $data['branches'] = $this->Offices_model->branches_division($divName);
        $data['main_content'] = 'divOffices_view';
        $this->load->view('template/common_template', $data);
    }
}
