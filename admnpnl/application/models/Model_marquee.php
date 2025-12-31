<?php

class Model_marquee extends CI_Model {
    /* function MCats(){
      parent::Model();
      }
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getMarquee($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('marquee_modal', $options);
        //if ($Q->num_rows() > 0) {
        $data = $Q->row_array();
        //}
        $Q->free_result();
        return $data;
    }

    function getAllMarquee() {
        $this->db->select('*');
        $this->db->from('marquee_modal');
        //$this->db->where('status', '1');
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->result_array();
        /*
          $query = "SELECT * FROM marquee_modal";
          $runQuery = $this->db->query($query);
          return $runQuery->result_array();
         */
    }

    function addMarquee() {
        $order = $_POST['priority'];
        $dt = date("Y-m-d_h-i-sa");
        $ext_file = pathinfo($_FILES['link']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $file = $order . '-' . $dt . '.' . $ext_file;
        $file_tmp = $_FILES['link']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/marquee/';
        //$file_loc = $_SERVER['DOCUMENT_ROOT'] . '/jb.com.bd-New_Server/assets/file/marquee/';

        $data = array(
            'title' => $_POST['title'],
            'link' => $file,
            'image' => $_POST['image'],
            'entryDate' => $_POST['entryDate'],
            'expiryDate' => $_POST['expiryDate'],
            'priority' => $_POST['priority'],
            'status' => $_POST['status']
        );

        move_uploaded_file($file_tmp, $file_loc . $file);
        $this->db->insert('marquee_modal', $data);
    }

    function updateMarquee() {
        if (is_uploaded_file($_FILES['link']['tmp_name'])) {
            $order = $_POST['priority'];
            $dt = date("Y-m-d_h-i-sa");
            $ext_file = pathinfo($_FILES['link']['name'], PATHINFO_EXTENSION);
            $ext_file = strtolower($ext_file);
            $file = $order . '-' . $dt . '.' . $ext_file;
            $file_tmp = $_FILES['link']['tmp_name'];
            $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/marquee/';
            //$file_loc = $_SERVER['DOCUMENT_ROOT'] . '/jb.com.bd-New_Server/assets/file/marquee/';

            $data = array(
                'title' => $_POST['title'],
                'link' => $file,
                'image' => $_POST['image'],
                'entryDate' => $_POST['entryDate'],
                'expiryDate' => $_POST['expiryDate'],
                'priority' => $_POST['priority'],
                'status' => $_POST['status']
            );

            move_uploaded_file($file_tmp, $file_loc . $file);

            $this->db->where('id', $_POST['id']);
            $this->db->update('marquee_modal', $data);
        } else {
            $data = array(
                'title' => $_POST['title'],
                'image' => $_POST['image'],
                'entryDate' => $_POST['entryDate'],
                'expiryDate' => $_POST['expiryDate'],
                'priority' => $_POST['priority'],
                'status' => $_POST['status']
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('marquee_modal', $data);
        }
    }

    function deleteMarquee($id) {
        $data = array('status' => '0');
        $this->db->where('id', $id);
        $this->db->update('marquee_modal', $data);
    }

    /////////////
    function add_link_file($my_file) {
        if ($_FILES[$my_file]) {
            if ($my_file == 'link') {
                $config['upload_path'] = '../assets/file/marquee/';
            } else {
                $config['upload_path'] = '../assets/images/others/';
            }
            $config['allowed_types'] = 'pdf|doc|docx|jpg|png';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
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
        }
    }
    
     function getAllTopModalContent() {
        $this->db->select('*');
        $this->db->from('top_modal');
        //$this->db->where('status', '1');
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
function addTopModal() {
        if (is_uploaded_file($_FILES['link']['tmp_name'])) {
            $dt = date("Y-m-d_h-i-sa");
            $ext_file = pathinfo($_FILES['link']['name'], PATHINFO_EXTENSION);
            $ext_file = strtolower($ext_file);
            $file = $dt . '.' . $ext_file;
            $file_tmp = $_FILES['link']['tmp_name'];
            $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/modal/';
            //$file_loc = $_SERVER['DOCUMENT_ROOT'] . '/jb.com.bd-New_Server/assets/images/modal/';

            $data = array(
                'title' => $_POST['title'],
                'chairman_msg' => $_POST['chairman_msg'],
                'md_msg' => $_POST['md_msg'],
                'description' => $_POST['description'],
                'valid_from' => $_POST['valid_from'],
                'valid_until' => $_POST['valid_until'],
                'type' => $_POST['type'],
                'image' => $file,
            );

            move_uploaded_file($file_tmp, $file_loc . $file);
            $this->db->insert('top_modal', $data);
        } else {
            $data = array(
                'title' => $_POST['title'],
                'chairman_msg' => $_POST['chairman_msg'],
                'md_msg' => $_POST['md_msg'],
                'description' => $_POST['description'],
                'valid_from' => $_POST['valid_from'],
                'valid_until' => $_POST['valid_until'],
                'type' => $_POST['type']
            );
            $this->db->insert('top_modal', $data);
        }
    }

    function updateTopModal() {
        if (is_uploaded_file($_FILES['link']['tmp_name'])) {
            //$order = $_POST['priority'];
            $dt = date("Y-m-d_h-i-sa");
            $ext_file = pathinfo($_FILES['link']['name'], PATHINFO_EXTENSION);
            $ext_file = strtolower($ext_file);
            $file = $dt . '.' . $ext_file;
            $file_tmp = $_FILES['link']['tmp_name'];
            $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/modal/';
            //$file_loc = $_SERVER['DOCUMENT_ROOT'] . '/jb.com.bd-New_Server/assets/images/modal/';

            $data = array(
                'title' => $_POST['title'],
                'chairman_msg' => $_POST['chairman_msg'],
                'md_msg' => $_POST['md_msg'],
                'description' => $_POST['description'],
                'valid_from' => $_POST['valid_from'],
                'valid_until' => $_POST['valid_until'],
                'type' => $_POST['type'],
                'image' => $file,
            );

            move_uploaded_file($file_tmp, $file_loc . $file);

            $this->db->where('id', $_POST['id']);
            $this->db->update('top_modal', $data);
        } else {
            $data = array(
                'title' => $_POST['title'],
                'chairman_msg' => $_POST['chairman_msg'],
                'md_msg' => $_POST['md_msg'],
                'description' => $_POST['description'],
                'valid_from' => $_POST['valid_from'],
                'valid_until' => $_POST['valid_until'],
                'type' => $_POST['type']
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('top_modal', $data);
        }
    }

    function getTopModal($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('top_modal', $options);
        //if ($Q->num_rows() > 0) {
        $data = $Q->row_array();
        //}
        $Q->free_result();
        return $data;
    }

    function deleteTopModal($id) {
        $this->db->where('id', $id);
        $this->db->delete('top_modal');
    }
}

?>
