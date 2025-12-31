<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Services extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->helper('breadcrumb_helper');
    }

    public function atm() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('atm');
        //echo '<pre>';
        //print_r($data['page_details']); die();
        $data['image_details'] = $this->About_model->GetImageInfo('atm');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('atm');
        $data['district'] = $this->Service_model->getDistrict();
        $data['atm'] = $this->Service_model->atmList();
        $data['main_content'] = 'atm_view';
        $this->load->view('template/common_template', $data);
    }

    public function atm_list() {
        $data['atm_search'] = $this->Service_model->atmList();
        //$this->load->view('atm_districtDrp_view', $data);
        $this->load->view('atmSearch_view', $data);
    }

    public function search_result() {
        $district_id = $this->input->post('search');
        //$data['search_list'] = $this->Service_model->searches($district_id);
        $data['atm_search'] = $this->Service_model->searches($district_id);
        //$this->load->view('atm_districtDrpSearch_view', $data);
        $this->load->view('atmSearch_view', $data);
    }

    public function buildDropUpazilas() {
        $id_district = $this->input->post('id', true);
        $upazilaData['upazilaDrop'] = $this->Service_model->getUpazilaByDistrict($id_district);
        $output = null;
        $output .= "<option value=''>--Select--</option>";
        foreach ($upazilaData['upazilaDrop'] as $row) {
            $output .= "<option value='" . $row->upazila_name . "'>" . $row->upazila_name . "</option>";
        }
        echo $output;
    }

    public function search_result_upazila() {
        $upazila = $this->input->post('searches');
        $data['atm_search'] = $this->Service_model->searches_upazila($upazila);
        //$data['atm'] = $this->Service_model->searches_upazila($upazila);
        $this->load->view('atmSearch_view', $data);
    }

    public function jbPinCash() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('jbPinCash');
        $data['image_details'] = $this->About_model->GetImageInfo('jbPinCash');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('jbPinCash');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function beftn() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('beftn');
        $data['image_details'] = $this->About_model->GetImageInfo('beftn');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('beftn');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function rtgs() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rtgs');
        $data['image_details'] = $this->About_model->GetImageInfo('rtgs');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rtgs');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function swift() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('swift');
        $data['image_details'] = $this->About_model->GetImageInfo('swift');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('swift');
        $data['swift'] = $this->Service_model->swiftBranches('swift');
        $data['main_content'] = 'swift_view';
        $this->load->view('template/common_template', $data);
    }

    public function acs() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('acs');
        $data['image_details'] = $this->About_model->GetImageInfo('acs');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('acs');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function onlineBanking() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('onlineBanking');
        $data['image_details'] = $this->About_model->GetImageInfo('onlineBanking');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('onlineBanking');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function smsAlert() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('smsAlert');
        $data['image_details'] = $this->About_model->GetImageInfo('smsAlert');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('smsAlert');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function nationalSavings() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('nationalSavings');
        $data['image_details'] = $this->About_model->GetImageInfo('nationalSavings');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('nationalSavings');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function lockerService() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('lockerService');
        $data['image_details'] = $this->About_model->GetImageInfo('lockerService');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('lockerService');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function utility() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('utility');
        $data['image_details'] = $this->About_model->GetImageInfo('utility');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('utility');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function aof() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('aof');
        $data['image_details'] = $this->About_model->GetImageInfo('aof');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('aof');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }

    public function scheduleOfCharges() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('scheduleOfCharges');
        $data['image_details'] = $this->About_model->GetImageInfo('scheduleOfCharges');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('scheduleOfCharges');
        $data['main_content'] = 'textFile_view_iframe';
        $this->load->view('template/common_template', $data);
    }

    public function additional() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('additional');
        $data['image_details'] = $this->About_model->GetImageInfo('additional');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('additional');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }

    public function jb_remittance() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('jb_remittance');
        $data['image_details'] = $this->About_model->GetImageInfo('jb_remittance');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('jb_remittance');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function one_stop_service(){
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('one_stop_service');
        $data['image_details'] = $this->About_model->GetImageInfo('one_stop_service');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('one_stop_service');
        $data['main_content'] = 'text_view';
        $this->load->view('template/common_template', $data);
    }
	
	// Web based Green PIN Service starts- 31.07.2025
	public function greenPin() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('greenPin');
        $data['image_details'] = $this->About_model->GetImageInfo('greenPin');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('greenPin');
        $data['main_content'] = 'green_pin_view';
        $this->load->view('template/common_template', $data);
    }
	
	public function greenPin_execute()
	{
		$this->load->library('jbcrypto');
		$this->load->library('jbapiclient');
		
		$username = "JANA";
        	//$password = "ITC#2025#@!";
		$password = "ITC#2025@#jAnA";
		
        $this->jbcrypto->setPrivateKey($_SERVER['DOCUMENT_ROOT'] . '/application/keys/private.pem', 'optional_passphrase', true);

		// $url      = "https://testgpin.qcashbd.com:18286/api/request/v1/gettoken";
		   $url      = "https://greenpin.qcashbd.com:8081/api/request/v1/gettoken";

        $data     = [
            'operation' => 'GetTokenInfo',
            'bank_id'  =>  $this->jbcrypto->base64Encode('7'),
			'user_name' => $this->jbcrypto->base64Encode($username),
			'password' => $this->jbcrypto->base64Encode($password),
			'external_id' => $this->jbcrypto->base64Encode('JANA'.$this->generate10DigitUniqueId())
        ];
		
		// to track transaction id
		$this->Service_model->addgpininfo($data);

        $result = $this->jbapiclient->postJsonAuth($url, $data, $username, $password);

        if ($result === false) {
            echo "API request failed.";
			die();
        } 
		
		$responseBody = json_decode($result['body']);
		$statusCode = $responseBody -> status_code;
		$encryptedRedirectUrl = $responseBody -> redirecturl;
		
		$redirectUrl = "";
		
		if($statusCode != 200) {		
			echo "API request failed.";
			die();
		}
		

		$decryptedRedirectUrl = $this->jbcrypto->decryptWithPrivate($encryptedRedirectUrl);
		$redirectUrl = $this->jbcrypto->base64Decode($decryptedRedirectUrl);
		redirect($redirectUrl);
	}
	
	function generate10DigitUniqueId(): string {
		$timePart = substr(strval(microtime(true) * 10000), -7); // use microseconds
		$randPart = strval(random_int(100, 999)); // 3-digit random
		return $timePart . $randPart; // total 10 digits
	}

}
