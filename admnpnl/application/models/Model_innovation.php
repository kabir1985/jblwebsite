<?php

class Model_innovation extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

// all members list
// updated on 13.01.2021
    function getAllMembers() {
        $data = array();
        $this->db->order_by("priority", "asc");
        $Q = $this->db->get('innovation_team');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

// add member
    function addInnovationmember($priority_id = 0) {

        $data = array();
        $this->db->where('priority', $priority_id);
        $this->db->where('status', '1');
        $Q = $this->db->get('innovation_team');
        if ($Q->num_rows() == 0) {
            $data = array(
                'priority' => $_POST['priority'],
                'name' => $_POST['name'],
                'official_designation' => $_POST['offdesig'],
                'posting' => $_POST['posting'],
                'innovation_desig' => $_POST['innodesig'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'status' => $_POST['status']
            );
            $this->db->insert('innovation_team', $data);
            return 1;
        } else {
            return 0;
        }
    }

// get specific member info when edit 
    function getSpecificMember($innovation_id) {
        $data = array();
        $options = array('id' => $innovation_id);
        $Q = $this->db->get_where('innovation_team', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

// update member info.
    function updateInnovation($priority_id = 0, $innovation_id = 0) {
        $data = array();
        $this->db->where('priority', $priority_id);
        $this->db->where('status', '1');
        $this->db->where('id !=', $innovation_id);
        $Q = $this->db->get('innovation_team');

        if ($Q->num_rows() == 0) {
            $data = array(
                'priority' => $_POST['priority'],
                'name' => $_POST['name'],
                'official_designation' => $_POST['offdesig'],
                'posting' => $_POST['posting'],
                'innovation_desig' => $_POST['innodesig'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'status' => $_POST['status']
            );

            $this->db->where('id', $_POST['innovation_id']);
            $this->db->update('innovation_team', $data);
            return 1;
        } else {
            return 0;
        }
    }

// edit member status
    function deleteInnovationMember($innovation_id) {
        $data = array('status' => '0');
        $this->db->where('id', $innovation_id);
        $this->db->update('innovation_team', $data);
    }

// upload innovation work plan

    function uploadInnovationCatFiles($filetype = "") {
        $ext_file = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);

        $circular_type = "";
        $date = date("Y-m-d");
        $time = strtotime($date);
        /* $current_year  = date('Y',$time);
          $previous_year= $current_year-1;

          $customFileName= $_POST['filetype'].'_'.$previous_year.'_'.$current_year.'_'.time(); */
        $customFileName = $_POST['filetype'] . '_' . time() . '.' . $ext_file;
        $file_tmp = $_FILES['myfile']['tmp_name'];
        //live server file location
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/innovation/';

        $data = array();
        $this->db->where('file_type', $filetype);
        $Q = $this->db->get('innovation_file');
        if ($Q->num_rows() == 0) {
            $data = array(
                'file_type' => $_POST['filetype'],
                'pdf_link'  => $customFileName
            );

            // file checking and upload

            /* $my_file = array();
              $my_file = $this->add_link_file('myfile', $customFileName);

              if ($my_file != 'No File Name') {
              $data['pdf_link'] = $my_file['file_name'];
              } else {
              $data['pdf_link'] = 'No File Name';
              } */
            move_uploaded_file($file_tmp, $file_loc . $customFileName);
            $this->db->insert('innovation_file', $data);
            //return 1;
        } else {
            $data = array(
                'file_type' => $_POST['filetype'],
                'pdf_link'  => $customFileName
            );

            // file checking and upload

            /*$my_file = array();
            $my_file = $this->add_link_file('myfile', $customFileName);

            if ($my_file != 'No File Name') {
                $data['pdf_link'] = $my_file['file_name'];
            } else {
                $data['pdf_link'] = 'No File Name';
            } */
            move_uploaded_file($file_tmp, $file_loc . $customFileName);
            $this->db->where('file_type', $_POST['filetype']);
            $this->db->update('innovation_file', $data);
            return 0;
        }
    }

/////////////
    function add_link_file($my_file, $customFileName) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/file/innovation/';
            $config['allowed_types'] = 'pdf|docx|doc';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = false;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $config['file_name'] = $customFileName;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($my_file)) {
                return 'No File Name';
            }
            $U = $this->upload->data();
            if ($U['file_name']) {
                return $U;
            } else {
                return 'No File Name';
            }
        }
    }

    /* Innovation user id and password change- 15.02.2021 */

    function getadminUser() {
        $data = array();
        $this->db->select('*');
        $this->db->where('username', 'jblrpsd');
        $Q = $this->db->get('ms_admins');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getFixedUser() {
        $data = array();
        $this->db->select('*');
        $this->db->where('username', 'jblrpsd');
        $Q = $this->db->get('ms_admins');
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function updateadminUser() {
        $data = array('username' => $_POST['username'],
            'email' => $_POST['email'],
            //'status' => $_POST['status'],                   
            'department' => $_POST['department'],
            //'user_group' => $_POST['user_group'],
            'password' => $_POST['password']
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('ms_admins', $data);
    }

    function get_details_idea() {
        $query = "SELECT * from innovativeIdea";
        $runQuery = $this->db->query($query);
        return $runQuery->result_array();
    }
}

?>