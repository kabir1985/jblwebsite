<?php

class Model_files extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getFile($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('ms_files', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllFiles() {
        $data = array();
        $Q = $this->db->get('ms_files');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    /*  function addFile() {
      $submenu = $this->input->post('submenu_id');
      $childmenu = $this->input->post('childmenu_id');
      $data = array(
      'page_mainmenu' => $_POST['mainmenu_id'],
      //'page_submenu' => $_POST['submenu_id'],
      'page_submenu' => (!empty($submenu)) ? $submenu : NULL,
      //'page_childmenu' => $_POST['childmenu_id'],
      'page_childmenu' => (!empty($childmenu)) ? $childmenu : NULL,
      'name' => $_POST['page_name'],
      'title' => $_POST['title'],
      'status' => $_POST['status']);
      // echo '<pre>';
      //print_r($data); die();
      $my_file = array();
      $my_file = $this->add_link_file('path');

      if ($my_file != 'No File Name') {
      $data['path'] = $my_file['file_name'];
      } else {
      $data['path'] = 'No File Name';
      }

      $my_file1 = array();
      $my_file1 = $this->add_link_file('image');

      if ($my_file1 != 'No File Name') {
      $data['image'] = $my_file1['file_name'];
      } else {
      $data['image'] = 'No File Name';
      }
      $this->db->insert('ms_files', $data);
      }
     */

    function addFile($file_name, $image_name) {
        $submenu = $this->input->post('submenu_id');
        $childmenu = $this->input->post('childmenu_id');

        $data = array(
            'page_mainmenu' => $_POST['mainmenu_id'],
            'page_submenu' => (!empty($submenu)) ? $submenu : NULL,
            'page_childmenu' => (!empty($childmenu)) ? $childmenu : NULL,
            'name' => $_POST['page_name'],
            'title' => $_POST['title'],
            'path' => $file_name,
            'image' => $image_name,
            'status' => $_POST['status']
        );
        // print_r($data); die();
        $this->db->insert('ms_files', $data);
    }

    function updateFile() {
        $mainmenu = $this->input->post('mainmenu_id');
        //print_r($mainmenu);
        if ($mainmenu == '22') {
            $submenu = '';
            $childmenu = '';
        } else {
            $submenu = $this->input->post('submenu_id');
            //print_r($submenu);
            $childmenu = $this->input->post('childmenu_id');
            //print_r($childmenu);
        }
        $page = $this->input->post('page_name');
        //echo '<pre>';
        //print_r($page); die();

        if (is_uploaded_file($_FILES['path']['tmp_name'])) {
            $file_tmp = $_FILES['path']['tmp_name'];
            $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/documents/';
            $ext_file = pathinfo($_FILES['path']['name'], PATHINFO_EXTENSION);
            $ext_file = strtolower($ext_file);
            date_default_timezone_set("Asia/Dhaka");
            $dt = date("Y-m-d_h-i-sa");
            $file_name = $page . '_' . $dt . '.' . $ext_file;

            $data = array(
                'page_mainmenu' => $_POST['mainmenu_id'],
                //'page_submenu' => $_POST['submenu_id'],
                'page_submenu' => (!empty($submenu)) ? $submenu : NULL,
                //'page_childmenu' => $_POST['childmenu_id'],
                'page_childmenu' => (!empty($childmenu)) ? $childmenu : NULL,
                'name' => $_POST['page_name'],
                'title' => $_POST['title'],
                'path' => $file_name,
                'status' => $_POST['status']);

            move_uploaded_file($file_tmp, $file_loc . $file_name);

            $this->db->where('id', $_POST['id']);
            $this->db->update('ms_files', $data);
        } else if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            $page = $this->input->post('page_name');
            date_default_timezone_set("Asia/Dhaka");
            $dt = date("Y-m-d_h-i-sa");
            $img_tmp = $_FILES['image']['tmp_name'];
            $img_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/others/';
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $ext = strtolower($ext);
            $image_name = $page . '_' . $dt . '.' . $ext;

            $data = array(
                'page_mainmenu' => $_POST['mainmenu_id'],
                //'page_submenu' => $_POST['submenu_id'],
                'page_submenu' => (!empty($submenu)) ? $submenu : NULL,
                //'page_childmenu' => $_POST['childmenu_id'],
                'page_childmenu' => (!empty($childmenu)) ? $childmenu : NULL,
                'name' => $_POST['page_name'],
                'title' => $_POST['title'],
                'image' => $image_name,
                'status' => $_POST['status']);

            move_uploaded_file($img_tmp, $img_loc . $image_name);

            $this->db->where('id', $_POST['id']);
            $this->db->update('ms_files', $data);
        } else {
            $data = array(
                'page_mainmenu' => $_POST['mainmenu_id'],
                //'page_submenu' => $_POST['submenu_id'],
                'page_submenu' => (!empty($submenu)) ? $submenu : NULL,
                //'page_childmenu' => $_POST['childmenu_id'],
                'page_childmenu' => (!empty($childmenu)) ? $childmenu : NULL,
                'name' => $_POST['page_name'],
                'title' => $_POST['title'],
                'status' => $_POST['status']);

            $this->db->where('id', $_POST['id']);
            $this->db->update('ms_files', $data);
        }
    }

    function add_link_file($my_file) {
        if (isset($_FILES['path'])) {
            echo '<pre>';
            print_r($_FILES);
            echo '<pre>';
        }
        echo $_FILES['path']['error'];
        //die();
        $abs_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/documents/';
        if ($_FILES[$my_file]) {
            if ($my_file == 'path') {
                $config['upload_path'] = $abs_loc;
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

            if (!$this->upload->do_upload('path')) {
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

    function deleteFile($id) {
        $data = array('status' => 'inactive');
        $this->db->where('id', $id);
        $this->db->update('ms_files', $data);
        /* $this->db->select('path');
          $this->db->limit(1);
          $this->db->where('id', $id);
          $Q = $this->db->get('ms_files');

          $row = $Q->row();
          @unlink("../jbl/includes/pdf/" . $row->path);
          $Q->free_result();

          $this->db->where('id', $id);
          $this->db->delete('ms_files'); */
    }

    function fill_manual_category() {
        $sql = "SELECT manual_category_id,manual_category_title FROM manual_category WHERE manual_category_status='Active' ";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
    }

    function fill_manual_type() {
        $sql = "SELECT manual_type_id, manual_type FROM manual_type WHERE manual_type_status='Active' ";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
    }

    function td_upload() {
        $my_file = array();
        $my_file = $this->add_link_file_path('path');
    }

    function add_link_file_path($path) {
        if (isset($_FILES[$path])) {
            $config['upload_path'] = '../includes/pdf/';
            $config['allowed_types'] = 'pdf|doc|xls|docx|jpg|png|gif|jpeg';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload($path)) {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('upload_success', $data);
            }
            $U = $this->upload->data();
            if ($U['file_name']) {
                return
                ;
            }
        }
    }

    function cad_upload() {
        $my_file = array();
        $my_file = $this->add_link_file_cad('path1');
    }

    function add_link_file_cad($path1) {
        if (isset($_FILES[$path1])) {
            $config['upload_path'] = '../includes/board of directors/';
            $config['allowed_types'] = 'pdf|doc|xls|docx|jpg|png|gif|jpeg';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload($path1)) {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('upload_success', $data);
            }
            $U = $this->upload->data();
            if ($U['file_name']) {
                return
                ;
            }
        }
    }

    function homepage_upload() {
        $my_file = array();
        $my_file = $this->add_link_file_home('path');
    }

    function add_link_file_home($path) {
        if (isset($_FILES[$path])) {
            $config['upload_path'] = '../application/views/';
            $config['allowed_types'] = '*';
            //$config['disallowed_types'] = 'zip|html|swf';
            //$config['overwrite'] = true;
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload($path)) {
                $data = array('upload_data' => $this->upload->data());
                //$this->load->view('upload_success',$data);
                $this->session->set_flashdata('message', 'Successfully Added');
                //redirect('admin/homepage/index','refresh');
                echo 'Successfully Uploaded';
                redirect('admin/dashboard/index', 'refresh');
            }
//                else{
//                    $this->load->view('upload_success');
//                }
            $U = $this->upload->data();
            if ($U['file_name']) {
                return
                ;
            }
        }
    }

    function bredcrumb_upload() {
        $my_file = array();
        $my_file = $this->add_link_file_bredcrumb('path');
    }

    function add_link_file_bredcrumb($path) {
        if (isset($_FILES[$path])) {
            $config['upload_path'] = '../application/views/template/';
            $config['allowed_types'] = '*';
            //$config['disallowed_types'] = 'zip|html|swf';
            //$config['overwrite'] = true;
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload($path)) {
                $data = array('upload_data' => $this->upload->data());
                //$this->load->view('upload_success',$data);
                $this->session->set_flashdata('message', 'Successfully Added');
                //redirect('admin/homepage/index','refresh');
                echo 'Successfully Uploaded';
                redirect('admin/dashboard/index', 'refresh');
            }
//                else{
//                    $this->load->view('upload_success');
//                }
            $U = $this->upload->data();
            if ($U['file_name']) {
                return
                ;
            }
        }
    }
}
