<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class International_trade extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->helper('breadcrumb_helper');
    }

    public function facilities() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('facilities');
        $data['image_details'] = $this->About_model->GetImageInfo('facilities');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('facilities');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function takaRemittance() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('takaRemittance');
        $data['image_details'] = $this->About_model->GetImageInfo('takaRemittance');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('takaRemittance');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function subsidiaries() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('subsidiaries');
        $data['image_details'] = $this->About_model->GetImageInfo('subsidiaries');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('subsidiaries');
        $data['subsidiary'] = $this->InTrade_model->subsidiaries();
        $data['main_content'] = 'subsidiaries_view';
        $this->load->view('template/common_template', $data);
    }

    public function exchangeHouses() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('exchangeHouses');
        $data['image_details'] = $this->About_model->GetImageInfo('exchangeHouses');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('exchangeHouses');
        $data['exhouse'] = $this->InTrade_model->exchangeHouse();
        $data['main_content'] = 'exchangeHouses_view';
        $this->load->view('template/common_template', $data);
    }

    public function forex_trading() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('forex_trading');
        $data['image_details'] = $this->About_model->GetImageInfo('forex_trading');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('forex_trading');
        $data['main_content'] = 'textImage_view';
        $this->load->view('template/common_template', $data);
    }

    public function export_finance() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('export_finance');
        $data['image_details'] = $this->About_model->GetImageInfo('export_finance');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('export_finance');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function export_performance() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('export_performance');
        $data['image_details'] = $this->About_model->GetImageInfo('export_performance');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('export_performance');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function import_finance() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('import_finance');
        $data['image_details'] = $this->About_model->GetImageInfo('import_finance');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('import_finance');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function import_performance() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('import_performance');
        $data['image_details'] = $this->About_model->GetImageInfo('import_performance');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('import_performance');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function exchange_rate() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('exchange_rate');
        $data['image_details'] = $this->About_model->GetImageInfo('exchange_rate');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('exchange_rate');
        $data['exrate'] = $this->InTrade_model->exchangeRate();
        $data['main_content'] = 'exchangeRate_view';
        $this->load->view('template/common_template', $data);
    }

}
