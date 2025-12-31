<?php

class Model_images extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getImage($image_id) {
        $data = array();
        $options = array('image_id' => $image_id);
        $Q = $this->db->get_where('images', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllImages() {
        $data = array();
        $Q = $this->db->get('images');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getTopImages() {
        $data[0] = 'root';
        $Q = $this->db->get('images');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                //$data[$row['id']] = $row['name'];
                $data[$row['image_id']] = $row['image_title'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addImage($evnt) {
        $order = $_POST['slide_order'];
        date_default_timezone_set("Asia/Dhaka");
        $dt = date("Y-m-d_h-i-sa");
        $ext_file = pathinfo($_FILES['image_path']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $imgFile = $order . '-' . $dt . '.' . $ext_file;
        $file_tmp = $_FILES['image_path']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/slide/';

        if ($evnt === '1') {
            $page_name = $_POST['page_name'];
            $description = null;
            $extrainfo = null;
            $order = null;
        } else if ($evnt === '2') {
            $page_name = null;
            $description = $_POST['image_short_desc'];
            $extrainfo = $_POST['extra_information'];
            $order = $_POST['slide_order'];
        }

        $data = array(
            'image_title' => $_POST['image_title'],
            'imageforpage' => $page_name,
            'image_short_desc' => $description,
            'insert_user_name' => $_POST['insert_user_name'],
            'image_status' => $_POST['image_status'],
            'extra_information' => $extrainfo,
            'slide_order' => $order,
            'image_path' => $imgFile
        );

        move_uploaded_file($file_tmp, $file_loc . $imgFile);

        $this->db->insert("images", $data);
    }

    function updateImage() {
        /* if ($evnt === '1') {
          $page_name = $_POST['page_name'];
          $description = null;
          $extrainfo = null;
          $order = null;
          } else if ($evnt === '2') {
          $page_name = null;
          $description = $_POST['image_short_desc'];
          $extrainfo = $_POST['extra_information'];
          $order = $_POST['slide_order'];
          }
         */
        $order = $_POST['slide_order'];
        date_default_timezone_set("Asia/Dhaka");
        $dt = date("Y-m-d_h-i-sa");
        $ext_file = pathinfo($_FILES['image_path']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $imgFile = $order . '-' . $dt . '.' . $ext_file;
        $file_tmp = $_FILES['image_path']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/slide/';

        $extrainfo = $_POST['extra_information'];
        if ($extrainfo == 'slide_show') {
            $order = $_POST['slide_order'];
            $page_name = NULL;
        } else {
            $order = NULL;
            $page_name = $_POST['page_name'];
        }

        if (is_uploaded_file($_FILES['image_path']['tmp_name'])) {
            $data = array(
                'image_title' => $_POST['image_title'],
                'imageforpage' => $page_name,
                //'imageforpage' => $_POST['page_name'],
                //'image_short_desc' => $description,
                'image_short_desc' => $_POST['image_short_desc'],
                'insert_user_name' => $_POST['insert_user_name'],
                'image_status' => $_POST['image_status'],
                //'extra_information' => $extrainfo,
                'extra_information' => $_POST['extra_information'],
                'slide_order' => $order,
                'image_path' => $imgFile
            );
        } else {
            $data = array(
                'image_title' => $_POST['image_title'],
                'imageforpage' => $page_name,
                //'imageforpage' => $_POST['page_name'],
                //'image_short_desc' => $description,
                'image_short_desc' => $_POST['image_short_desc'],
                'insert_user_name' => $_POST['insert_user_name'],
                'image_status' => $_POST['image_status'],
                //'extra_information' => $extrainfo,
                'extra_information' => $_POST['extra_information'],
                'slide_order' => $order
            );
        }
        move_uploaded_file($file_tmp, $file_loc . $imgFile);

        $this->db->where('image_id', $_POST['image_id']);
        $this->db->update("images", $data);
    }

    function add_link_file($my_file, $extrainfo) {
        if ($extrainfo === 'slide_show') {
            if ($_FILES[$my_file]) {
                $config['upload_path'] = '../assets/images/slide/';
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
        } else {

            if ($_FILES[$my_file]) {
                $config['upload_path'] = '../assets/images/banner/';
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
    }

    function deleteImage($image_id) {
        $data = array(
            'image_status' => 'inactive'
        );
        $this->db->where('image_id', $image_id);
        $this->db->update('images', $data);
    }

    function getExistingOrder() {
        $query = "select slide_order from images where extra_information='slide_show' and image_status='active'";
        $runQuery = $this->db->query($query);
        //print_r($runQuery); die();
        return $runQuery->result_array();
    }
}

?>
