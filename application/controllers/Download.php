<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->helper('home_helper');
        $this->load->library('pagination');
        $this->load->model('circularPublic_model');
        $this->load->helper('download');
    }

    public function download_tender($tender_id) {
        /* $this->load->helper('download');
          $fileinfo = $this->download_model->download($tender_id);
          $file = file_get_contents('assets/file/tender/' . $fileinfo['tender_pdf_link']);
          $name = $this->download_model->pdfname($tender_id);
          force_download($name, $file); */
        $this->load->helper('download');
        $fileinfo = $this->Download_model->download($tender_id);
        $matchingFile = realpath('assets/file/tender/' . $fileinfo['tender_pdf_link']);
        if (file_exists($matchingFile)) {
            $file = file_get_contents($matchingFile);
            $name = $this->Download_model->pdfname($tender_id);
            force_download($name, $file);
        } else {
            redirect('/page404');
        }
    }

    public function download_files($id) {
        /* $this->load->helper('download');
          $fileinfo = $this->Download_model->download_files($id);
          $file = file_get_contents('assets/file/documents/' . $fileinfo['path']);
          $name = $this->Download_model->pdfname_files($id);
          force_download($name, $file); */
        $this->load->helper('download');
        $fileinfo = $this->Download_model->download_files($id);
        $matchingFile = realpath('assets/file/documents/' . $fileinfo['path']);
        if (file_exists($matchingFile)) {
            $file = file_get_contents($matchingFile);
            $name = $this->Download_model->pdfname_files($id);
            force_download($name, $file);
        } else {
            redirect('/page404');
        }
    }

    public function download_exRate($ex_id) {
        $this->load->helper('download');
        /* $fileinfo = $this->Download_model->download_exRate($ex_id);
          $matchingFile = realpath('assets/file/exchangeRate/' . $fileinfo['ex_file_path']);
          if (file_exists($matchingFile)) {
          $file = file_get_contents($matchingFile);
          $name = $this->Download_model->pdfname_exRate($ex_id);
          force_download($name, $file);
          } else {
          redirect('/page404');
          } */
        $fileinfo = $this->Download_model->download_exRate($ex_id);
        //echo '<pre>';
        //print_r($fileinfo);
        //$file = file_get_contents('assets/file/exchangeRate/' . $fileinfo['ex_file_path']);
        //$file = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/exchangeRate/' . $fileinfo['ex_file_path'];
        $file = base_url() . '/assets/file/exchangeRate/' . $fileinfo['ex_file_path'];

        //echo '<pre>';
        //print_r($file); 
        $name = $this->Download_model->pdfname_exRate($ex_id);
        //echo '<pre>';
        //print_r($name); die();
        force_download($name, $file);
    }

    public function download_noc($employee_id) {
        $this->load->helper('download');
        $fileinfo = $this->Download_model->download_noc($employee_id);
        $matchingFile = realpath('assets/file/noc/' . $fileinfo['employee_noc_file']);
        if (file_exists($matchingFile)) {
            $file = file_get_contents($matchingFile);
            $name = $this->Download_model->pdfname_noc($employee_id);
            force_download($name, $file);
        } else {
            redirect('/page404');
        }
    }

    public function download_news($news_id) {
        $this->load->helper('download');
        $fileinfo = $this->Download_model->download_news($news_id);
        $matchingFile = realpath('assets/file/news/' . $fileinfo['news_links']);
        if (file_exists($matchingFile)) {
            $file = file_get_contents($matchingFile);
            $name = $this->Download_model->pdfname_news($news_id);
            force_download($name, $file);
        } else {
            redirect('/page404');
        }
    }

    public function download_report($annual_report_id) {
        $this->load->helper('download');
        $fileinfo = $this->Download_model->download_report($annual_report_id);
        $matchingFile = realpath('assets/file/annualReports/' . $fileinfo['annual_report_pdf_link']);
        if (file_exists($matchingFile)) {
            $file = file_get_contents($matchingFile);
            $name = $this->Download_model->pdfname_annualReport($annual_report_id);
            force_download($name, $file);
        } else {
            redirect('/page404');
        }
    }

    public function immigration_noc($id) {
        $this->load->helper('download');
        $fileinfo = $this->Download_model->immigration_noc($id);
        $matchingFile = realpath('assets/file/noc/' . $fileinfo['noc_file']);
        if (file_exists($matchingFile)) {
            $file = file_get_contents($matchingFile);
            $name = $this->Download_model->pdfname_immiNoc($id);
            force_download($name, $file);
        } else {
            redirect('/page404');
        }
    }
}
