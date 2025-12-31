<?php

class Model_childMenu extends CI_Model {
    /* function MCats(){
      parent::Model();
      }
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getChildMenu($childmenu_id) {
        $data = array();
        $options = array('childmenu_id' => $childmenu_id);
        $Q = $this->db->get_where('childmenu', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function getAllChildMenu() {
        $data = array();
        $this->db->order_by('childmenu_priority', 'asc');
        $Q = $this->db->get('childmenu');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getTopChildMenu() {
        $data[0] = 'root';
        $this->db->where('childmenu_id', 0);
        $Q = $this->db->get('childmenu');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['childmenu_id']] = $row['childmenu_name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addChildMenu() {
        $data = array(
            'childmenu_parent' => $_POST['childmenu_parent'],
            'childmenu_name' => $_POST['childmenu_name'],
            'childmenu_url' => $_POST['childmenu_url'],
            'childmenu_status' => $_POST['childmenu_status'],
            'childmenu_priority' => $_POST['childmenu_priority'],
            'top_bar' => $_POST['top_bar']
        );
        $this->db->insert('childmenu', $data);
    }

    function updateChildMenu() {
        $data = array(
            'childmenu_parent' => $_POST['childmenu_parent'],
            'childmenu_name' => $_POST['childmenu_name'],
            'childmenu_url' => $_POST['childmenu_url'],
            'childmenu_status' => $_POST['childmenu_status'],
            'childmenu_priority' => $_POST['childmenu_priority'],
            'top_bar' => $_POST['top_bar']
        );
        $this->db->where('childmenu_id', $_POST['childmenu_id']);
        $this->db->update('childmenu', $data);
    }

    function deleteChildMenu($childmenu_id) {
        $data = array('childmenu_status' => 'Inactive');
        $this->db->where('childmenu_id', $childmenu_id);
        $this->db->update('childmenu', $data);
    }

    function drpFillChildMenu() {
        $query = $this->db->query('select submenu_id, submenu_name from submenu');
        return $query->result();
    }

}

?>