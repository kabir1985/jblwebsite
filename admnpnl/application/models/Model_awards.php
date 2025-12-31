<?php

class Model_awards extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        //$this->gallery_path = realpath(APPPATH . '../images');
        //$this->gallery_path = realpath(APPPATH . '../includes/uploads');
        //$this->gallery_path = realpath(APPPATH . '../images');
    }

    function getAwards($award_id) {
        $data = array();
        $options = array('award_id' => $award_id);
        $Q = $this->db->get_where('awards', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllAwards() {
        $data = array();
        $Q = $this->db->get('awards');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getTopAwards() {
        $data[0] = 'root';
        //$this->db->where('parentid',0);   we dont have parent id
        $Q = $this->db->get('awards');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                //$data[$row['id']] = $row['name'];
                $data[$row['award_id']] = $row['award_title'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addAward() {
        date_default_timezone_set("Asia/Dhaka");
        $dt = date("Y-m-d_h-i-sa");
        $ext_file = pathinfo($_FILES['award_image']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $imgFile = $dt . '.' . $ext_file;
        $file_tmp = $_FILES['award_image']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/awards/';

        $data = array(
            'award_title' => $_POST['award_title'],
            'award_description' => $_POST['award_description'],
            'award_receive_date' => $_POST['award_receive_date'],
            'award_status' => $_POST['award_status'],
            'award_image' => $imgFile
        );
    
        move_uploaded_file($file_tmp, $file_loc . $imgFile);

        $this->db->insert('awards', $data);
    }

    function updateAward() {
        date_default_timezone_set("Asia/Dhaka");
        $dt = date("Y-m-d_h-i-sa");
        $ext_file = pathinfo($_FILES['award_image']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $imgFile = $dt . '.' . $ext_file;
        $file_tmp = $_FILES['award_image']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/awards/';

        if (is_uploaded_file($_FILES['award_image']['tmp_name'])) {
            $data = array(
                'award_title' => $_POST['award_title'],
                'award_description' => $_POST['award_description'],
                'award_receive_date' => $_POST['award_receive_date'],
                'award_status' => $_POST['award_status'],
                'award_image' => $imgFile
            );
        } else {
            $data = array(
                'award_title' => $_POST['award_title'],
                'award_description' => $_POST['award_description'],
                'award_receive_date' => $_POST['award_receive_date'],
                'award_status' => $_POST['award_status']
            );
        }
        
        move_uploaded_file($file_tmp, $file_loc . $imgFile);

        $this->db->where('award_id', $_POST['award_id']);
        $this->db->update('awards', $data);
    }

    function add_link_file($my_file) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/images/awards/';
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

    function deleteAward($award_id) {
        $data = array('award_status' => 'Inactive');
        $this->db->where('award_id', $award_id);
        $this->db->update('awards', $data);
    }
}
