<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Service_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function atmList() {
        $sql = "SELECT branch_name,address,map FROM atm_position WHERE status='Active' Order BY `branch_name` ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getDistrict() {
        $sql = "select district_id,district_name from district_atm order by district_name ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function searches($district_id) {
        $sql = "SELECT * FROM atm_position WHERE district= '$district_id'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getUpazilaByDistrict($district_id = string) {
        $this->db->select('upazila_id,upazila_name');
        $this->db->from('upazila_atm');
        $this->db->where('district_id', $district_id);
        $query = $this->db->get();
        return $query->result();
    }

    function searches_upazila($upazila) {
        $sql = "SELECT * FROM atm_position WHERE upazila= '$upazila'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function swiftBranches(){
        $sql = "SELECT * FROM jbl_branches WHERE SwiftCode !=''";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	// green pin info track- 14.08.2025
	
	function addgpininfo($data)
	{
		//echo "hi!";
		$this->db->insert('gpin_id', $data);
	}

}
