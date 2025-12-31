<?php

class Model_mds extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getTopMD($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('retired_md', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllMD() {
        $data = array();
        $Q = $this->db->get('retired_md');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function addMD() {
        $ext_file = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/ceomd/';
        $customFileName = "ceomd_" . date("Ymd") . '.' . $ext_file;
        $data = array(
            'priority' => $_POST['priority'],
            'name' => $_POST['name'],
            'designation' => $_POST['designation'],
            'image' => $customFileName,
            'duration' => $_POST['duration'],
            'status' => $_POST['status']
        );
        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        $this->db->insert('retired_md', $data);
    }

    function updateMD() {
        $ext_file = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/ceomd/';
        $customFileName = "ceomd_" . date("Ymd") . '.' . $ext_file;
        
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $data = array(
            'priority' => $_POST['priority'],
            'name' => $_POST['name'],
            'designation' => $_POST['designation'],
            'image' => $customFileName,
            'duration' => $_POST['duration'],
            'status' => $_POST['status']
        );
        } else {
          $data = array(
            'priority' => $_POST['priority'],
            'name' => $_POST['name'],
            'designation' => $_POST['designation'],
            'duration' => $_POST['duration'],
            'status' => $_POST['status']
        );  
        }
        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        $this->db->where('id', $_POST['id']);
        $this->db->update('retired_md', $data);
    }

    function add_link_file($my_file) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/images/ceomd/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
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

    function deleteMD($id) {
        $data = array('status' => 'Inactive');
        $this->db->where('id', $id);
        $this->db->update('retired_md', $data);
    }

    function exportCsv() {
        $this->load->dbutil();
        $Q = $this->db->query("select * from board_of_director");
        return $this->dbutil->csv_from_result($Q, ",", "\n");
    }
}
