<?php

class Model_extidlog extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAllLog() {
        $sql = 'SELECT gpid,bank_id,user_name,external_id,dt_tm FROM `gpin_id` ORDER BY gpid DESC';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

}
