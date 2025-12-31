<?php

class Model_bod extends CI_Model {
    /* function MCats(){
      parent::Model();
      }
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getTopBod($bod_id) {
        $data = array();
        $options = array('bod_id' => $bod_id);
        $Q = $this->db->get_where('board_of_director', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllBod() {
        $data = array();
        $Q = $this->db->get('board_of_director');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function addBod() {
        $ext_file = pathinfo($_FILES['bod_image']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $bod = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['bod_name']);
        //print_r($bod);
        $s = ucfirst($bod);
        //echo '<pre>';
        //print_r($s);
        $bar = ucwords(strtolower($s));
        //echo '<pre>';
        //print_r($bar);
        $bodName = preg_replace('/\s+/', '', $bar);
        //echo '<pre>';
        //print_r($bodName);
        $imgFile = $bodName . '.' . $ext_file;
        //echo '<pre>';
        //print_r($imgFile); die();
        $file_tmp = $_FILES['bod_image']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/bod/';

        $data = array(
            //'bod_priority' => preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['bod_priority']),
            'bod_priority' => $_POST['bod_priority'],
            'bod_name' => $_POST['bod_name'],
            'bod_office_phone_no' => preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['bod_office_phone_no']),
            'bod_designation' => $_POST['bod_designation'],
            'bod_email' => $_POST['bod_email'],
            'bod_extra_quali' => preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['bod_extra_quali']),
            'bod_status' => $_POST['bod_status'],
            'bod_image' => $imgFile
        );

        move_uploaded_file($file_tmp, $file_loc . $imgFile);

        /* $my_image1 = array();
          $my_image1 = $this->add_link_file('bod_image');
          if ($my_image1 != 'No File Name') {
          if ($_POST['bod_designation'] === 'Chairman' || $_POST['bod_designation'] === 'MD_CEO') {
          $data['bod_image'] = $_POST['bod_designation'] . '.png';
          } else {
          $data['bod_image'] = $my_image1['file_name'];
          }
          } else {
          $data['bod_image'] = 'No File Name';
          } */


        /* $my_file1=array();		
          $my_file1= $this->add_link_file('bod_profile');

          if 	($my_file1 != 'No File Name')
          {
          $data['bod_profile'] = $my_file1['file_name'];
          }
          else
          {
          $data['bod_profile'] = '';
          } */

        $this->db->insert('board_of_director', $data);
    }

    function updateBod() {
        $ext_file = pathinfo($_FILES['bod_image']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $bod = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['bod_name']);
        //print_r($bod);
        $s = ucfirst($bod);
        //echo '<pre>';
        //print_r($s);
        $bar = ucwords(strtolower($s));
        //echo '<pre>';
        //print_r($bar);
        $bodName = preg_replace('/\s+/', '', $bar);
        //echo '<pre>';
        //print_r($bodName);
        $imgFile = $bodName . '.' . $ext_file;
        //echo '<pre>';
        //print_r($imgFile); die();
        $file_tmp = $_FILES['bod_image']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/bod/';

        if (is_uploaded_file($_FILES['bod_image']['tmp_name'])) {
            $data = array(
                'bod_id' => $_POST['bod_id'],
                'bod_priority' => $_POST['bod_priority'],
                'bod_name' => $_POST['bod_name'],
                'bod_office_phone_no' => $_POST['bod_office_phone_no'],
                'bod_designation' => $_POST['bod_designation'],
                'bod_email' => $_POST['bod_email'],
                'bod_extra_quali' => $_POST['bod_extra_quali'],
                'bod_status' => $_POST['bod_status'],
                'bod_image' => $imgFile
            );
        } else {
            $data = array(
                'bod_id' => $_POST['bod_id'],
                'bod_priority' => $_POST['bod_priority'],
                'bod_name' => $_POST['bod_name'],
                'bod_office_phone_no' => $_POST['bod_office_phone_no'],
                'bod_designation' => $_POST['bod_designation'],
                'bod_email' => $_POST['bod_email'],
                'bod_extra_quali' => $_POST['bod_extra_quali'],
                'bod_status' => $_POST['bod_status']
            );
        }
        move_uploaded_file($file_tmp, $file_loc . $imgFile);

        /* $my_image1 = array();
          $my_image1 = $this->add_link_file('bod_image');
          if ($my_image1 != 'No File Name') {
          $data['bod_image'] = $my_image1['file_name'];
          } */
        /* else
          {
          $data['bod_profile'] = 'No File Name';
          } */

        //start profile file
        /* $my_file1=array();		
          $my_file1= $this->add_link_file('bod_profile');

          if 	($my_file1 != 'No File Name')
          {
          $data['bod_profile'] = $my_file1['file_name'];
          } */
        /* else
          {
          $data['bod_profile'] = '';
          } */
        //end profile file

        $this->db->where('bod_id', $_POST['bod_id']);
        $this->db->update('board_of_director', $data);
    }

    function add_link_file($my_file) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/images/bod/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            if ($_POST['bod_designation'] === 'Chairman' || $_POST['bod_designation'] === 'MD_CEO') {
                $config['file_name'] = $_POST['bod_designation'] . '.png';
            }
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

    function deleteBod($bod_id) {
        $data = array('bod_status' => 'Inactive');
        $this->db->where('bod_id', $bod_id);
        $this->db->update('board_of_director', $data);
    }

    function exportCsv() {
        $this->load->dbutil();
        $Q = $this->db->query("select * from board_of_director");
        return $this->dbutil->csv_from_result($Q, ",", "\n");
    }

    function directorsInfo() {
        
        /*echo "hi!";
        die();*/
        $ext_file = pathinfo($_FILES['dirRelatedInfo']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        //$date = date("Y-m-d_h-i-sa");
        $date = date("d-m-Y");
        $fileName = "directors_related_info_" . $date . '.' . $ext_file;
        //$fileName ="directors_related_info";
        //$my_file = array();
        //$my_file = $this->add_link_file_directorsInfo('path1', $fileName);
        $file_tmp = $_FILES['dirRelatedInfo']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/bod/';
        //die();
        move_uploaded_file($file_tmp, $file_loc . $fileName);
    }

    function add_link_file_directorsInfo($path1, $fileName) {
        if (isset($_FILES[$path1])) {
            $config['upload_path'] = '../assets/images/bod/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $config['file_name'] = $fileName;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload($path1)) {
                return 'No File Name';
            }
            $U = $this->upload->data();
            if ($U['file_name']) {
                return
                ;
            }
        }
    }
}

?>