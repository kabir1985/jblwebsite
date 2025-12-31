<?php

class Model_userlog extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAllLog() {
        $sql = 'select * from userlog order by id desc';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

}
