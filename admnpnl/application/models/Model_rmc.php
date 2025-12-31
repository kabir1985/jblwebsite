<?php

class Model_rmc extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getallRMC() {
        $sql = 'select id,priority,name,designation,committee_status,status from riskmanagement_committee';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getTopRMC($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('riskmanagement_committee', $options, 1);
            $data = $Q->row_array();
        $Q->free_result();
        return $data;
    }

    function addRMC() {
        $data = array(
            'priority' => $_POST['priority'],
            'name' => $_POST['name'],
            'designation' => $_POST['designation'],
            'committee_status' => $_POST['committee_status'],
            'status' => $_POST['status']
        );
        $this->db->insert('riskmanagement_committee', $data);
    }

    function delete($id) {
        $data = array('status' => 'Inactive');
        $this->db->where('id', $id);
        $this->db->update('riskmanagement_committee', $data);
    }

    function updateRMC($id) {
        $data = array(
            'priority' => $_POST['priority'],
            'name' => $_POST['name'],
            'designation' => $_POST['designation'],
            'committee_status' => $_POST['committee_status'],
            'status' => $_POST['status']
        );
        $this->db->where('id', $id);
        $this->db->update('riskmanagement_committee', $data);
    }

    function get_order() {
        $sql = "select bod_priority,bod_name from board_of_director where bod_status='Active' order by bod_priority ASC";
        $query = $this->db->query($sql);
            $data[0] = '--Please Select--';
            foreach ($query->result_array() as $row) {
                $data[$row['bod_priority']] = $row['bod_priority'] . ' - ' . $row['bod_name'];
            }
            return $data;
    }

    function get_name() {
        $sql = "select bod_priority,bod_name from board_of_director where bod_status='Active' order by bod_priority ASC";
        $query = $this->db->query($sql);
            $data[0] = '--Please Select--';
            foreach ($query->result_array() as $row) {
                $data[$row['bod_name']] = $row['bod_priority'] . ' - ' . $row['bod_name'];
            }
            return $data;
    }

    function get_designation() {
        $sql = "select designation from riskmanagement_committee";
        $query = $this->db->query($sql);
            $data[0] = '--Please Select--';
            $data['Chairman'] = 'Chairman';
            $data['Director'] = 'Director';
            $data['Company Secretary'] = 'Company Secretary';
            foreach ($query->result_array() as $row) {
                $data[$row['designation']] = $row['designation'];
            }
            return $data;
    }

    function get_comstatus() {
        $sql = "select committee_status from riskmanagement_committee";
        $query = $this->db->query($sql);
            $data[0] = '--Please Select--';
            $data['Chairman'] = 'Chairman';
            $data['Member'] = 'Member';
            $data['Secretary'] = 'Secretary';
            foreach ($query->result_array() as $row) {
                $data[$row['committee_status']] = $row['committee_status'];
            }
            return $data;
    }

    function get_status() {
        $sql = "select status from riskmanagement_committee";
        $query = $this->db->query($sql);
            $data[0] = '--Please Select--';
            $data['Active'] = 'Active';
            $data['Inactive'] = 'Inactive';
            foreach ($query->result_array() as $row) {
                $data[$row['status']] = $row['status'];
            }
            return $data;
    }

}
