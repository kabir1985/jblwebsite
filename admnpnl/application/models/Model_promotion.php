<?php

class Model_promotion extends CI_Model {
    /* function MCats(){
      parent::Model();
      }
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getPromotion($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('ms_files', $options, 1);

        $data = $Q->row_array();

        $Q->free_result();
        return $data;
    }

    function getAllPromotion() {
        $data = array();
        $this->db->where('name', 'promotion');
        $Q = $this->db->get('ms_files');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getTopPromotion() {
        $data[0] = 'root';
        $this->db->where('name', 'promotion');
        $Q = $this->db->get('ms_files');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['title'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addPromotion() {

        $date = date("Y-m-d");
        $time = strtotime($date);
        $year = date('Y', $time);

        $set_file_name = $_POST['prfrom'] . '_' . 'to' . '_' . $_POST['prto'] . '_' . $year . '_' . time() . '.pdf';
        $file_tmp = $_FILES['path']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/documents/';

        $data = array(
            'name' => $_POST['prname'],
            'title' => $_POST['title'],
            'path' => $set_file_name,
            'status' => $_POST['status'],
            'page_mainmenu' => $_POST['page_mainmenu']
        );

        move_uploaded_file($file_tmp, $file_loc . $set_file_name);

        $this->db->insert('ms_files', $data);
    }

    function updatePromotion() {

        $date = date("Y-m-d");
        $time = strtotime($date);
        $year = date('Y', $time);

        //$set_file_name= $_POST['prfrom'].'_'.'to'.'_'.$_POST['prto'].'_'.$year.'_'.time().'.pdf';

        $file_tmp = $_FILES['path']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/documents/';

        if ($_POST['prfrom'] != "" && $_POST['prto'] != "") {

            $set_file_name = $_POST['prfrom'] . '_' . 'to' . '_' . $_POST['prto'] . '_' . $year . '_' . time() . '.pdf';
            $data = array(
                'title' => $_POST['title'],
                'path' => $set_file_name,
                'status' => $_POST['status']
            );
            
          move_uploaded_file($file_tmp, $file_loc . $set_file_name);
          
        } else {
            $data = array(
                'title' => $_POST['title'],
                'status' => $_POST['status']
            );
        }

        //move_uploaded_file($file_tmp, $file_loc . $set_file_name);

        $this->db->where('id', $_POST['id']);
        $this->db->update('ms_files', $data);
    }

    function deletePromotion($id) {
        $data = array('status' => 'inactive');
        $this->db->where('id', $id);
        $this->db->update('ms_files', $data);
    }

/////////////
    function add_link_file($my_file = '', $set_file_name = '') {

        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/file/promotion/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $config['file_name'] = $set_file_name;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload($my_file)) {

                return 'No File Name';
            }
            $U = $this->upload->data();

            if ($U['file_name']) {
                return $U;
            } else
                return 'No File Name';

            print_r($U);
        }
    }

/////////////
}

?>