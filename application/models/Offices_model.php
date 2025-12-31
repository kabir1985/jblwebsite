<?php

class Offices_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function branches_division($divName) {
        $Name = strtoupper($divName);
        $sql = "SELECT * FROM `jbl_branches` WHERE dvname='$Name' order by branchname ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
