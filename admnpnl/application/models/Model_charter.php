<?php

class Model_charter extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getAllCitizenServices() {
        $query = "SELECT * FROM citizen_charter WHERE status='1'";
        $runQuery = $this->db->query($query);
        return $runQuery->result_array();
    }
    
    function getCitizenServicesByBranch($id){
         $query = "SELECT * FROM citizen_charter WHERE branch_code = '$id'";
        $runQuery = $this->db->query($query);
        return $runQuery->result_array();
    }

    function getHoDepartment() {
        $query = "SELECT office_code, office_name from jbl_ho_department";
        $runQuery = $this->db->query($query);
        return $runQuery->result();
    }

    function getAllBranches() {
        $query = "SELECT brcode, branchname FROM jbl_branches ORDER BY branchname ASC";
        $runQuery = $this->db->query($query);
        return $runQuery->result();
    }

    function getService($service_id) {
        $query = "SELECT * FROM citizen_charter WHERE service_id='$service_id' ";
        $runQuery = $this->db->query($query);
        return $runQuery->row_array();
    }

    function addService() {
        $data = array(
            'service_type' => $_POST['typesOfservices'],
            'category' => $_POST['category'],
            'sub_category' => $_POST['subcat'],
            'name_of_services' => $_POST['name_of_services'],
            'metohd_of_providing_services' => $_POST['metohd_of_providing_services'],
            'necessary_doc_and_receipt' => $_POST['necessary_doc_and_receipt'],
            'service_price_and_payment' => $_POST['service_price_and_payment'],
            'period_of_service' => $_POST['period_of_service'],
            'officer_in_charge' => $_POST['officer_in_charge'],
            'entryDate' => $_POST['entryDate'],
            'status' => $_POST['status']
        );

        $this->db->insert('citizen_charter', $data);
    }

    function updateCitizenService() {
        $data = array(
            'service_id' => $_POST['sl'],
            'service_type' => $_POST['typesOfservices'],
            'category' => $_POST['category'],
            'sub_category' => $_POST['subcat'],
            'name_of_services' => $_POST['name_of_services'],
            'metohd_of_providing_services' => $_POST['metohd_of_providing_services'],
            'necessary_doc_and_receipt' => $_POST['necessary_doc_and_receipt'],
            'service_price_and_payment' => $_POST['service_price_and_payment'],
            'period_of_service' => $_POST['period_of_service'],
            'officer_in_charge' => $_POST['officer_in_charge'],
            'entryDate' => $_POST['entryDate'],
            'status' => $_POST['status']
        );
  
        $this->db->where('service_id', $_POST['sl']);
        $this->db->update('citizen_charter', $data);       
    }
    
    function updateCitSrvByBranches($service_id) {
        $data = array(
            'brcode' => $_SESSION['username'],
            'service_id' => $service_id
        );   
        //echo'<pre>';
        //print_r($data); die();
        //$this->db->where('service_id', $_POST['service_id']);
        $this->db->insert('citizenservicesbybranches', $data);
    }

    function deleteService($sl) {
        $this->db->where('service_id', $sl);
        $this->db->delete('citizen_charter');
    }

    function getAllBranchCode() {
        $query = "SELECT brcode FROM jbl_branches";
        $runQuery = $this->db->query($query);
        return $runQuery->result(); 
    }
}
