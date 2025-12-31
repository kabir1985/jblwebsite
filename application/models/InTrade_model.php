<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class InTrade_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function subsidiaries() {
        $sql = "select image,name,address,contacts from subsidiary_company";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function exchangeHouse() {
        $sql = "select * from exchange_house where exchg_house_status= 'Active'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function exchangeRate() {
        $this->db->select('ex_id,ex_file_path,upload_dt');
        $this->db->from('exchange_rate');
        $this->db->order_by('ex_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function todayRateforIframe() {
        $sql = "SELECT ex_file_path FROM jbwebsite.exchange_rate ORDER BY ex_id DESC LIMIT 1;";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
