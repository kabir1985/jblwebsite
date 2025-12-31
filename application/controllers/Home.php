<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->helper('home_helper');
        $this->load->helper('breadcrumb_helper');
    }

    public function index()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['mainmenu'] = $this->Home_model->mainmenu();
        $data['submenu'] = $this->Home_model->submenu();
        $data['childmenu'] = $this->Home_model->childmenu();
        $data['slide'] = $this->Home_model->slider();
        //$data['notice'] = $this->Home_model->notice_board();
        $data['tender'] = $this->Home_model->active_tender();
        $data['marquee'] = $this->Home_model->marquee_modal();
        $data['mdl'] = $this->Home_model->home_modal();

        $this->load->model('Visitor_model');
        $data['total_visitors'] = $this->Visitor_model->total_visitors();
        $data['today_visitors'] = $this->Visitor_model->today_visitors();

        $this->load->view('home', $data);
    }

    public function forms()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('forms');
        $data['image_details'] = $this->About_model->GetImageInfo('forms');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('forms');
        $data['main_content'] = 'textFile_view_iframe';
        $this->load->view('template/common_template', $data);
    }

    public function search()
    {
        if (!isset($_SERVER['HTTP_REFERER'])) {
            redirect('/page404');
        } else {
            $keyword1 = trim($this->input->post("search"));
            $keyword2 = htmlspecialchars($keyword1);
            $keyword = stripcslashes($keyword2);
            $data['page_details'] = $this->About_model->GetPageInformation('search');
            $data['image_details'] = $this->About_model->GetImageInfo('search');
            /*$keyword = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars($this->input->post("search", TRUE))); */
            $data['results'] = $this->Home_model->searchItem($keyword);
            $data['title'] = "$keyword";
            $data['main_content'] = 'search_view';
            $this->load->view('template/common_template', $data);
        }
    }

    public function nrb_overview()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('nrb_overview');
        $data['image_details'] = $this->About_model->GetImageInfo('nrb_overview');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('nrb_overview');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function aml()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('aml');
        $data['image_details'] = $this->About_model->GetImageInfo('aml');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('aml');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function news()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('news');
        $data['image_details'] = $this->About_model->GetImageInfo('news');
        $data['news'] = $this->Home_model->getNews();
        $data['main_content'] = 'news_view';
        $this->load->view('template/common_template', $data);
    }

    public function promotion()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('promotion');
        $data['image_details'] = $this->About_model->GetImageInfo('promotion');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('promotion');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function notice()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('notice');
        $data['image_details'] = $this->About_model->GetImageInfo('notice');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('notice');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function tender()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('tender');
        $data['image_details'] = $this->About_model->GetImageInfo('tender');
        $data['tender'] = $this->Home_model->active_tender();
        $data['main_content'] = 'tender_view';
        $this->load->view('template/common_template', $data);
    }

    public function noc()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('noc');
        $data['image_details'] = $this->About_model->GetImageInfo('noc');
        $data['noc'] = $this->Home_model->passportNOC();
        $data['main_content'] = 'noc_view';
        $this->load->view('template/common_template', $data);
    }

    public function innovation()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('innovation');
        $data['image_details'] = $this->About_model->GetImageInfo('innovation');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('innovation');
        $data['actplan'] = $this->Home_model->innovation_actionPlan();
        $data['initiative'] = $this->Home_model->innovation_initiative();
        $data['main_content'] = 'textFile_view';
        $data['main_content_others'] = 'innovation';
        $this->load->view('template/common_template', $data);
    }

    public function innovTeam()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('innovTeam');
        $data['image_details'] = $this->About_model->GetImageInfo('innovTeam');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('innovTeam');
        $data['team'] = $this->Home_model->innovation_team();
        $data['main_content'] = 'innovationTeam_view';
        $this->load->view('template/common_template', $data);
    }

    public function rightToInfoAct()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rightToInfoAct');
        $data['image_details'] = $this->About_model->GetImageInfo('rightToInfoAct');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rightToInfoAct');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function catalog()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('catalog');
        $data['image_details'] = $this->About_model->GetImageInfo('catalog');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('catalog');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function nis()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('nis');
        $data['image_details'] = $this->About_model->GetImageInfo('nis');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('nis');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function rate()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rate');
        $data['image_details'] = $this->About_model->GetImageInfo('rate');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rate');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function declared_rate()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('declared_rate');
        $data['image_details'] = $this->About_model->GetImageInfo('declared_rate');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('declared_rate');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function training_plan()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('training_plan');
        $data['image_details'] = $this->About_model->GetImageInfo('training_plan');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('training_plan');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function important_links()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('important_links');
        $data['image_details'] = $this->About_model->GetImageInfo('important_links');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('important_links');
        $data['main_content'] = 'links';
        $this->load->view('template/common_template', $data);
    }

    public function pdfIframeView($id)
    {
        if (!isset($_SERVER['HTTP_REFERER'])) {
            redirect('/page404');
        } else {
            $data['title'] = "Janata Bank PLC.";
            $fileinfo = $this->Download_model->pdfname_files($id);
            //$data['fileLink'] = "http://localhost/jb.com.bd-responsive/assets/file/documents/$fileinfo";
            $data['fileLink'] = base_url("assets/file/documents/$fileinfo");
            //print_r($data['fileLink']); die();
            $data['main_content'] = 'template/iframe';
            $this->load->view('template/iframe_template', $data);
        }
    }

    /*public function bangladesher_subarnajanti() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('bangladesher_subarnajanti');
        $data['image_details'] = $this->About_model->GetImageInfo('bangladesher_subarnajanti');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('bangladesher_subarnajanti');
        $data['main_content'] = 'bangladesher_subarnajanti_vw';
        $this->load->view('template/common_template', $data);
    }*/

    public function rti_focal_point()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rti_focal_point');
        $data['image_details'] = $this->About_model->GetImageInfo('rti_focal_point');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rti_focal_point');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function rti_appeal_form()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rti_appeal_form');
        $data['image_details'] = $this->About_model->GetImageInfo('rti_appeal_form');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rti_appeal_form');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function rti_action_plan()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rti_action_plan');
        $data['image_details'] = $this->About_model->GetImageInfo('rti_action_plan');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rti_action_plan');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function rti_timely_infomation_delivery()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rti_timely_infomation_delivery');
        $data['image_details'] = $this->About_model->GetImageInfo('rti_timely_infomation_delivery');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rti_timely_infomation_delivery');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function rti_information_disclose()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rti_information_disclose');
        $data['image_details'] = $this->About_model->GetImageInfo('rti_information_disclose');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rti_information_disclose');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function rti_advertisement()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rti_advertisement');
        $data['image_details'] = $this->About_model->GetImageInfo('rti_advertisement');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rti_advertisement');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function rti_training()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rti_training');
        $data['image_details'] = $this->About_model->GetImageInfo('rti_training');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rti_training');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function rti_quarterly_report()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rti_quarterly_report');
        $data['image_details'] = $this->About_model->GetImageInfo('rti_quarterly_report');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rti_quarterly_report');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function rti_law()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rti_law');
        $data['image_details'] = $this->About_model->GetImageInfo('rti_law');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rti_law');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function citizen_charter_notice()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('citizen_charter_notice');
        $data['image_details'] = $this->About_model->GetImageInfo('citizen_charter_notice');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('citizen_charter_notice');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function citizen_charter_focalPoint()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('citizen_charter_focalPoint');
        $data['image_details'] = $this->About_model->GetImageInfo('citizen_charter_focalPoint');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('citizen_charter_focalPoint');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function grs_actionplan()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('grs_actionplan');
        $data['image_details'] = $this->About_model->GetImageInfo('grs_actionplan');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('grs_actionplan');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    /* public function pdfView($id) {
      if (!isset($_SERVER['HTTP_REFERER'])) {
      redirect('/page404');
      } else {
      $data['title'] = "Janata Bank PLC.";
      $fileinfo = $this->download_model->pdfname_file($id);
      // print_r($fileinfo); die();
      //$data['fileLink'] = "http://localhost/jb.com.bd-responsive/assets/file/documents/$fileinfo";
      $data['fileLink'] = base_url("assets/file/circular/$fileinfo");
      // print_r($data['fileLink']); die();
      $data['main_content'] = 'template/iframe';
      $this->load->view('template/iframe_template', $data);
      }
      } */

    public function pdfView()
    {
        if (!isset($_SERVER['HTTP_REFERER'])) {
            redirect('/page404');
        } else {
            $data['title'] = "Janata Bank PLC.";
            //$fileinfo = $this->download_model->pdfname_file($id);
            // print_r($fileinfo); die();
            //$data['fileLink'] = "http://localhost/jb.com.bd-responsive/assets/file/documents/$fileinfo";
            $data['fileLink'] = base_url("assets/file/documents/sme_masterCircular.pdf");
            // print_r($data['fileLink']); die();
            $data['main_content'] = 'template/iframe';
            $this->load->view('template/iframe_template', $data);
        }
    }

    public function welfare_service()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('welfare_service');
        $data['image_details'] = $this->About_model->GetImageInfo('welfare_service');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('welfare_service');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function govt_service()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('govt_service');
        $data['image_details'] = $this->About_model->GetImageInfo('govt_service');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('govt_service');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function money_transfer()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('money_transfer');
        $data['image_details'] = $this->About_model->GetImageInfo('money_transfer');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('money_transfer');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function financial_literacy()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('financial_literacy');
        $data['image_details'] = $this->About_model->GetImageInfo('financial_literacy');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('financial_literacy');
        $data['finlit'] = $this->Home_model->getFinLitImages();
        $data['main_content'] = 'financialLteracy_view';
        $this->load->view('template/common_template', $data);
    }

    public function innovative_idea()
    {

        $data['title'] = "Janata Bank PLC.";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('objective', 'Objective', 'required');
        $this->form_validation->set_rules('proced', 'Procedure', 'required');
        $this->form_validation->set_rules('usefullness', 'Usefullness', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['page_details'] = $this->About_model->GetPageInformation('innovative_idea');
            $data['image_details'] = $this->About_model->GetImageInfo('innovative_idea');
            $data['document_details'] = $this->About_model->GetPageDocumentInfo('innovative_idea');
            $data['main_content'] = 'innovativeIdea_view';
            $this->load->view('template/common_template', $data);
        } else {
            $this->Home_model->addInnovative_idea();
            $this->session->set_flashdata('message', 'Idea Successfully Submitted!');
            redirect('Home/innovative_idea', 'refresh');
        }
    }

    public function citizen_services()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('chitizen_services');
        $data['charter'] = $this->Home_model->citizen_services();
        $data['citSrvMarquee'] = $this->Home_model->citSrv_marquee();
        $data['products'] = $this->Home_model->citizenServices_products();
        $data['main_content'] = 'citizenServices_view';
        $this->load->view('template/citizen_services', $data);
    }

    public function citizen_charter_branches()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('citizen_charter_breanches');
        $data['image_details'] = $this->About_model->GetImageInfo('citizen_charter_breanches');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('citizen_charter_breanches');
        $data['division'] = $this->Home_model->getDivision();
        //$data['district'] = $this->Home_model->getDistrict();
        $data['branches'] = $this->Home_model->display_branches();
        $data['main_content'] = 'citizenSrvBranches_view_1';
        $this->load->view('template/common_template', $data);
    }
    /*public function branch_details($brcode){
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('branch_details');
        $data['image_details'] = $this->About_model->GetImageInfo('branch_details');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('branch_details');
        $data['branchCodeWise'] = $this->Home_model->specific_branch($brcode);
        $data['main_content'] = 'branchDetails_view';
        $this->load->view('template/template_allBranch', $data);
    } */

    public function buildDropDistricts()
    {
        $id_division = $this->input->post('id', true);
        $districtData['districtDrop'] = $this->Home_model->getDistrictByDivision($id_division);
        $output = null;
        $output .= "<option value=''>--Select--</option>";
        foreach ($districtData['districtDrop'] as $row) {
            //$output .= "<option value='" . $row->district_id . "'>" . $row->district_name . "</option>";
            $output .= "<option value='" . $row->administrative_district_code . "'>" . $row->administrative_district_name . "</option>";
        }
        echo $output;
    }

    public function buildDropUpazilas()
    {
        $id_district = $this->input->post('id', true);
        $upazilaData['upazilaDrop'] = $this->Home_model->getUpazilaByDistrict($id_district);
        $output = null;
        $output .= "<option value=''>--Select--</option>";
        foreach ($upazilaData['upazilaDrop'] as $row) {
            //$output .= "<option value='" . $row->upazila_name . "'>" . $row->upazila_name . "</option>";
            $output .= "<option value='" . $row->administrative_upazila_code . "'>" . $row->administrative_upazila_name . "</option>";
        }
        echo $output;
    }

    public function displayBranchesByDivision()
    {
        $division_id = $this->input->post('id');
        $data['branches'] = $this->Home_model->branchDivisionWise($division_id);
        $this->load->view('branchDivisionWise_view', $data);
    }

    public function displayBranchesByDistrict()
    {
        $district_id = $this->input->post('id');
        $data['branches'] = $this->Home_model->branchDistrictWise($district_id);
        $this->load->view('branchDivisionWise_view', $data);
    }

    public function displayBranchesByUpazila()
    {
        $upazila_id = $this->input->post('id');
        $data['branches'] = $this->Home_model->branchUpazilaWise($upazila_id);
        $this->load->view('branchDivisionWise_view', $data);
    }

    public function displayBranchesWhileClear()
    {
        $data['branches'] = $this->Home_model->display_branches();
        $this->load->view('branchDivisionWise_view', $data);
    }

    public function noc_immigration()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('noc_immigration');
        $data['image_details'] = $this->About_model->GetImageInfo('noc_immigration');
        $data['noc'] = $this->Home_model->immigration_noc();
        $data['main_content'] = 'nocImmigration_view';
        $this->load->view('template/common_template', $data);
    }

    // for service box
    // new bond related forms updated on 09.07.2025

    public function bond_forms()
    {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('bond_forms');
        $data['image_details'] = $this->About_model->GetImageInfo('bond_forms');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('bond_forms');
        $data['main_content'] = 'textFile_view_bond';
        $this->load->view('template/common_template', $data);
    }


    // public function visitor_counter()
// {

    // $this->load->model('Visitor_model');
// $data['total_visitors'] = $this->Visitor_model->total_visitors();
// $data['today_visitors'] = $this->Visitor_model->today_visitors();
// $this->load->view('home', $data);
// }




}
