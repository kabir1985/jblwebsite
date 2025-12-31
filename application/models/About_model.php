<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function GetPageInformation($name) {
        /*$sql = "select a.id,a.mainmenu_id,a.name,a.title,a.path,a.content,a.status from ms_pages a,
                submenu b where a.status = 'active' and a.mainmenu_id=b.submenu_id and 
                a.name = '$name'"; */
        $sql = "SELECT title,content FROM ms_pages WHERE name='$name' AND status='active'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function GetImageInfo($imageforpage) {
        $sql = "select image_title,image_path from images where image_status='Active' and imageforpage=TRIM('" . $imageforpage . "')";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function GetPageDocumentInfo($page_title) {
        $sql = "select id,name,title,path,status,image from ms_files where
        name LIKE '" . $page_title . "%' AND (expiry_date >=CURDATE() OR expiry_date is NULL OR expiry_date='0000-00-00') AND status='active' order by id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function GetAllAwards() {
        $sql = "select award_title,award_image,award_description from awards where award_status='Active' order by  award_receive_date desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function financial_overview() {
        $sql = "select * from financial_highlights";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function annual_report() {
        $sql = "select  *from  annual_report where annual_report_status = 'Active' order by annual_report_year desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function board_of_directors() {
        $sql = "SELECT * FROM `board_of_director` WHERE `bod_designation`!='Company Secretary' AND `bod_status`='Active' ORDER By `bod_priority` ASC ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function executive_committee() {
        $sql = "Select name,designation,committee_status from executive_committee where status='Active' order by case when committee_status like 'chairman%' then 0 else 1 end, priority";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function audit_committee() {
        $sql = "Select name,designation,committee_status from audit_committee where status='Active' order by case when committee_status like 'chairman%' then 0 else 1 end, priority";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function risk_committee() {
        $sql = "Select name,designation,committee_status from riskmanagement_committee where status='Active' order by case when committee_status like 'chairman%' then 0 else 1 end, priority";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function ceo_md() {
        $sql = "SELECT * FROM retired_md WHERE status='Active'order by id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function publication($limit, $offset) {
//        $sql = "SELECT * FROM ms_files WHERE name='publication' order by id DESC";
//        $query = $this->db->query($sql);
//        return $query->result_array();
        $this->db->limit($limit, $offset);
        $this->db->where('name', 'publication');
		$this->db->where('status','active');
        $this->db->order_by('id', 'desc');
        //$this->db->distinct();
        $query = $this->db->get('ms_files');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return $query->result_array();
        }
    }

    function count_rows() {
        //return $this->db->count_all('ms_files');
        $query = $this->db->where('name', 'publication')
                ->get('ms_files');
        return $query->num_rows();
    }

    function getManualCategory($manual_type) {
        $sql = "select a.*, count(a.manual_category_id) as count_cat from manual_category a, ms_files b
                where a.manual_category_id = b.manual_category and b.manual_type=$manual_type
                group by a.manual_category_id
                order by a.manual_category_title";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getManual($manual_type) {
        $sql = "select a.manual_category_id, a.manual_category_title, b.* from manual_category a, ms_files b
                where b.manual_type=$manual_type and a.manual_category_id = b.manual_category and status='active'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function swift_branches(){
        $sql = "select * from jbl_branches where SwiftCode != '' ";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
