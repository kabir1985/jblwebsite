<?php

class Model_atm extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getSelectBranch() {
        $sql = "select id,branchname from jbl_branches order by branchname ASC ";
        $Q = $this->db->query($sql);
        /*if ($Q->num_rows() > 0) {*/
            $data[0] = '--select--';
            foreach ($Q->result_array() as $row) {
                $data[$row['branchname']] = $row['branchname'];
            }
        /*}*/
        $Q->free_result();
        return $data;
    }

    function getSelectAddress() {
        $sql = "select id,address from jbl_branches order by branchname ASC ";
        $Q = $this->db->query($sql);
        /*if ($Q->num_rows() > 0) {*/
            $data[0] = '--select--';
            foreach ($Q->result_array() as $row) {
                $data[$row['address']] = $row['address'];
            }
        /*}*/
        $Q->free_result();
        return $data;
    }

    function getHighlights() {
        $data[0] = 'root';
        $this->db->where('id', 0);
        $Q = $this->db->get('financial_highlights');
        /*if ($Q->num_rows() > 0) {*/
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['particular'];
            }
        /*}*/
        $Q->free_result();
        return $data;
    }

    function getAllATM() {
        $sql = "SELECT atm_position.id,atm_position.branch_name,atm_position.address,atm_position.upazila,atm_position.status, district_atm.district_name FROM atm_position LEFT JOIN district_atm ON atm_position.district=district_atm.district_id ORDER BY atm_position.id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getTopATM($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('atm_position', $options, 1);
       /* if ($Q->num_rows() > 0) {*/
            $data = $Q->row_array();
       /* }*/
        $Q->free_result();
        return $data;
    }

    function addATM() {
        $data = array(
            'branch_name' => $_POST['branch_name'],
            'address' => $_POST['address'],
            'district' => $_POST['district'],
            'upazila' => $_POST['upazila'],
            'map' => $_POST['map'],
            'status' => $_POST['status']);
        $this->db->insert('atm_position', $data);
    }

    function get_district() {
        $sql = "select district_id,district_name from district_atm ORDER BY trim(district_atm . district_name) ASC";
        $query = $this->db->query($sql);
            return $query->result_array();
    }

    function get_location() {
        $sql = "select district_id, district_name from district_atm order by district_name ASC";
        $Q = $this->db->query($sql);
            $data[0] = '--select--';
            foreach ($Q->result_array() as $row) {
                $data[$row['district_id']] = $row['district_name'];
            }
        $Q->free_result();
        return $data;
    }

    function get_upazila() {
        $sql = "select upazila_name from upazila_atm order by upazila_name ASC";
        $Q = $this->db->query($sql);
            $data[0] = '--select--';
            foreach ($Q->result_array() as $row) {
                $data[$row['upazila_name']] = $row['upazila_name'];
            }
        $Q->free_result();
        return $data;
    }

    function get_status() {
        $sql = "select status from atm_position";
        $query = $this->db->query($sql);
            $data[0] = '--Please Select--';
            $data['Active'] = 'Active';
            $data['Inactive'] = 'Inactive';
            $data['Under Process'] = 'Under Process';
            foreach ($query->result_array() as $row) {
                $data[$row['status']] = $row['status'];
            }
            return $data;
    }

    function updateATM($id) {
        $data = array(
            'branch_name' => $_POST['branch_name'],
            'address' => $_POST['address'],
            'district' => $_POST['district'],
            'upazila' => $_POST['upazila'],
            'map' => $_POST['map'],
            'status' => $_POST['status']);
        $this->db->where('id', $id);
        $this->db->update('atm_position', $data);
    }

    function delete($id) {
        $data = array('status' => 'Inactive');
        $this->db->where('id', $id);
        $this->db->update('atm_position', $data);
    }

    function exportCsv() {
        $this->load->dbutil();
        $Q = $this->db->query("select * from ms_categories");
        return $this->dbutil->csv_from_result($Q, ",", "\n");
    }

    public function getUpazilaByDistrict($district_id = string) {
        $this->db->select('upazila_id,upazila_name');
        $this->db->from('upazila_atm');
        $this->db->where('district_id', $district_id);
        $query = $this->db->get();
        return $query->result();
    }

}
