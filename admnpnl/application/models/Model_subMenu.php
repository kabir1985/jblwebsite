<?php

class Model_subMenu extends CI_Model {
    /* function MCats(){
      parent::Model();
      }
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getSubMenu($submenu_id) {
        $data = array();
        $options = array('submenu_id' => $submenu_id);
        $Q = $this->db->get_where('submenu', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllSubMenu() {
        $data = array();
        $this->db->order_by('submenu_priority', 'asc');
        $Q = $this->db->get('submenu');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getTopSubMenu() {
        $data[0] = 'root';
        $this->db->where('submenu_id', 0);
        $Q = $this->db->get('submenu');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['submenu_id']] = $row['submenu_name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addSubMenu() {
        $data = array(
            'submenu_parent' => $_POST['submenu_parent'],
            'submenu_priority' => $_POST['submenu_priority'],
            'submenu_name' => $_POST['submenu_name'],
            'submenu_url' => $_POST['submenu_url'],
            'submenu_status' => $_POST['submenu_status']
        );
        $this->db->insert('submenu', $data);
    }

    function updateSubMenu() {
        $data = array(
            'submenu_id' => $_POST['submenu_id'],
            'submenu_parent' => $_POST['submenu_parent'],
            'submenu_name' => $_POST['submenu_name'],
            'submenu_url' => $_POST['submenu_url'],
            'submenu_status' => $_POST['submenu_status']
        );
        $this->db->where('submenu_id', $_POST['submenu_id']);
        $this->db->update('submenu', $data);
    }

    function deleteSubMenu($submenu_id) {
        $data = array('submenu_status' => 'Inactive');
        $this->db->where('submenu_id', $submenu_id);
        $this->db->update('submenu', $data);
    }

    function drpFillMainMenu() {
        $query = $this->db->query('select mainmenu_id,name from mainmenu');
        return $query->result();
    }

}
