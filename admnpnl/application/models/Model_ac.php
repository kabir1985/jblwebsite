<?php

class Model_ac extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getallAC() {
        $sql = 'select id,priority,name,designation,committee_status,status from audit_committee';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getTopAC($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('audit_committee', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function addAC() {
        $data = array(
            'priority' => $_POST['priority'],
            'name' => $_POST['name'],
            'designation' => $_POST['designation'],
            'committee_status' => $_POST['committee_status'],
            'status' => $_POST['status']
        );
        $this->db->insert('audit_committee', $data);
    }

    function delete($id) {
        $data = array('status' => 'Inactive');
        $this->db->where('id', $id);
        $this->db->update('audit_committee', $data);
    }

    function updateAC($id) {
        $data = array(
            'priority' => $_POST['priority'],
            'name' => $_POST['name'],
            'designation' => $_POST['designation'],
            'committee_status' => $_POST['committee_status'],
            'status' => $_POST['status']
        );
        $this->db->where('id', $id);
        $this->db->update('audit_committee', $data);
    }

    function get_order() {
        $sql = "select bod_priority,bod_name from board_of_director where bod_status='Active' order by bod_priority ASC";
        $query = $this->db->query($sql);
            //return $query->result_array();
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
        $sql = "select designation from audit_committee";
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
        $sql = "select committee_status from audit_committee";
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
        $sql = "select status from audit_committee";
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
