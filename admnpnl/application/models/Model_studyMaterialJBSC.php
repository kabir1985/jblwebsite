<?php

class Model_studyMaterialJBSC extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getStudy($study_id) {
        $data = array();
        $options = array('id' => $study_id);
        $Q = $this->db->get_where('ms_files', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllStudyDownload() {
        $data = array();
        $this->db->where('name', 'study_material');
        $this->db->where('status', 'active');
        $this->db->order_by('id', 'desc');
        $Q = $this->db->get('ms_files');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getAllStudy() {
        $data = array();
        $this->db->where('name', 'study_material');
        $this->db->order_by('id', 'desc');
        $Q = $this->db->get('ms_files');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getTopStudy() {
        $data[0] = 'root';
        $this->db->where('name', 'study_material');
        $Q = $this->db->get('ms_files');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['title']; // I couldn't Understand............
            }
        }
        $Q->free_result();
        return $data;
    }

    function addStudy() {
        $data = array(
            'name' => $_POST['stname'],
            'title' => $_POST['title'],
            'status' => $_POST['status']            
        );

        $my_file1 = array();
        $my_file1 = $this->add_link_file('myfile');
        if ($my_file1 != 'No File Name') {
            $data['path'] = $my_file1['file_name'];
        } else {
            $data['path'] = 'No File Name';
        }
        $this->db->insert('ms_files', $data);
    }

    function updateStudy($file_name) {
        $data = array(
            'title' => $_POST['title'],
            'status' => $_POST['status']
                //'path' => $_POST['path']
        );

        $my_file1 = array();
        $my_file1 = $this->add_link_file('myfile');
        if ($my_file1 != 'No File Name') {
            $data['path'] = $my_file1['file_name'];
        } else {
            $data['path'] = $file_name;
            // print_r($data['path']); die();
        }
        $this->db->where('id', $_POST['id']);
        $this->db->update('ms_files', $data);
    }

    function deleteStudy($id) {
        $data = array('status' => 'inactive');
        $this->db->where('id', $id);
        $this->db->update('ms_files', $data);
    }

    /////////////
    function add_link_file($my_file) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/file/studyMaterial/';
            $config['allowed_types'] = 'pdf|doc|docx|pptx|ppt';
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
            } else
                return 'No File Name';
        }
    }

    public function download_files($id) {
        $query = $this->db->get_where('ms_files', array('id' => $id));
        return $query->row_array();
    }

    public function pdfname_files($id) {
        $query = $this->db->query("SELECT path FROM ms_files WHERE id= '$id'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->path;
        }
    }

}

?>