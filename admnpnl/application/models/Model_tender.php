<?php

class Model_tender extends CI_Model {
    /* function MCats(){
      parent::Model();
      }
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getTender($tender_id) {
        $data = array();
        $options = array('tender_id' => $tender_id);
        $Q = $this->db->get_where('tender', $options, 1);
        $data = $Q->row_array();
        $Q->free_result();
        return $data;
    }

    function getTenderType() {
        $existingTenderType = array(
            $data[0] = 'SELECT',
            "Tender" => "Tender",
            "LTM" => "LTM",
            "OTM" => "OTM",
            "RFQ" => "RFQ",
            "Addenda" => "Addenda",
            "Other" => "Other");
        return $existingTenderType;
    }

    function tenderOffering() {
        //$query = 'select brcode as code, branchname  as offered_by FROM jbl_branches union select office_code as code,office_name as offered_by FROM jbl_ho_department';
        //$query = "select brcode as code,concat(branchname, ' ', 'BRANCH') as offered_by FROM jbl_branches union select office_code as code,concat(office_name, ' ', 'DEPARTMENT') as offered_by FROM jbl_ho_department";
        $query = "select branchname  as offered_by FROM jbl_branches 
                     union
                 select office_name as offered_by FROM jbl_ho_department
                    union
                 select concat('DIVISIONAL OFFICE', '-', dvname) as offered_by FROM jbl_division"; 
        $runQuery = $this->db->query($query);
        //return $runQuery->result_array();
        $data[0] = '--Please Select--';
        foreach ($runQuery->result_array() as $row) {
            $data[$row['offered_by']] = $row['offered_by'];
        }
        return $data;
    }

    function getAllTender() {
        $data = array();
        //$this->db->where('tender_closing_date >=now( )');
        if ($_SESSION['username'] != "batayan") {
            $this->db->where('tender_uploaded_by', $_SESSION['username']);
        }
        $Q = $this->db->get('tender');
        $this->db->order_by('tender_id', 'desc');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getTopTender() {
        $data[0] = 'root';
        //$this->db->where('parentid',0);   we dont have parent id
        $Q = $this->db->get('tender');
        //if ($Q->num_rows() > 0) {
        foreach ($Q->result_array() as $row) {
            //$data[$row['id']] = $row['name'];
            $data[$row['tender_id']] = $row['tender_title'];
        }
        //}
        $Q->free_result();
        return $data;
    }

    function getPublishTender() {
        $data[0] = 'root';
        $this->db->where('parentid', 0);
        $this->db->where('status', 'active');
        // $this->db->order_by('sortorder','asc');
        $Q = $this->db->get('tender');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addTender() {
        $ext_file = pathinfo($_FILES['tender_pdf_link']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $dt = date("Y-m-d_h-i-sa");
        $customFileName = $_POST['tender_type'] . "_" . $_POST['tender_uploaded_by'] . "_" . substr($_POST['tender_closing_date'], 0, 10) . $dt . '.' . $ext_file;
        $file_tmp = $_FILES['tender_pdf_link']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/tender/';   
        //local pc file location
        //$file_loc = $_SERVER['DOCUMENT_ROOT'] . '/jb.com.bd-New_Server/assets/file/tender/';

        $data = array(
            'tender_title' => $_POST['tender_title'],
            'tender_type' => $_POST['tender_type'],
            'tender_reference' => $_POST['tender_reference'],
            'tender_offered_by' => $_POST['tender_offered_by'],
            'tender_starting_date' => $_POST['tender_starting_date'],
            'tender_closing_date' => $_POST['tender_closing_date'],
            'tender_status' => $_POST['tender_status'],
            'tender_uploaded_by' => $_POST['tender_uploaded_by'],
            'tender_ip_address' => $_SERVER['REMOTE_ADDR'],
            'tender_pdf_link' => $customFileName
        );

        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        /* $my_file = $this->add_link_file('tender_pdf_link', $customFileName);

          if ($my_file != 'No File Name') {
          $data['tender_pdf_link'] = $my_file['file_name'];
          } else {
          $data['tender_pdf_link'] = 'No File Name';
          } */

        $this->db->insert('tender', $data);
    }

    function updateTender() {
        $ext_file = pathinfo($_FILES['tender_pdf_link']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $dt = date("Y-m-d_h-i-sa");
        $customFileName = $_POST['tender_type'] . "_" . $_POST['tender_uploaded_by'] . "_" . substr($_POST['tender_closing_date'], 0, 10) . $dt . '.' . $ext_file;
        $file_tmp = $_FILES['tender_pdf_link']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/tender/';
        //local pc file location
        //$file_loc = $_SERVER['DOCUMENT_ROOT'] . '/jb.com.bd-New_Server/assets/file/tender/';

        if (is_uploaded_file($_FILES['tender_pdf_link']['tmp_name'])) {
            $data = array(
                'tender_title' => $_POST['tender_title'],
                'tender_type' => $_POST['tender_type'],
                'tender_reference' => $_POST['tender_reference'],
                'tender_offered_by' => $_POST['tender_offered_by'],
                'tender_starting_date' => $_POST['tender_starting_date'],
                'tender_closing_date' => $_POST['tender_closing_date'],
                'tender_status' => $_POST['tender_status'],
                'tender_uploaded_by' => $_SESSION['username'],
                'tender_ip_address' => $_SERVER['REMOTE_ADDR'],
                'tender_pdf_link' => $customFileName
            );
        } else {
            $data = array(
                'tender_title' => $_POST['tender_title'],
                'tender_type' => $_POST['tender_type'],
                'tender_reference' => $_POST['tender_reference'],
                'tender_offered_by' => $_POST['tender_offered_by'],
                'tender_starting_date' => $_POST['tender_starting_date'],
                'tender_closing_date' => $_POST['tender_closing_date'],
                'tender_status' => $_POST['tender_status'],
                'tender_uploaded_by' => $_SESSION['username'],
                'tender_ip_address' => $_SERVER['REMOTE_ADDR']
            );
        }
        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        $this->db->where('tender_id', $_POST['tender_id']);
        $this->db->update('tender', $data);
    }

    function deleteTender($tender_id) {
        echo $tender_id;
        $data = array('tender_status' => 'Inactive');
        $this->db->where('tender_id', $tender_id);
        $this->db->update('tender', $data);
    }

    function exportCsv() {
        $this->load->dbutil();
        $Q = $this->db->query("select * from tender");
        return $this->dbutil->csv_from_result($Q, ",", "\n");
    }

    /////////////
    function add_link_file($my_file, $customFileName) {
        if ($_FILES[$my_file]) {
            //$config['upload_path'] = '../assets/file/tender/';
            $config['allowed_types'] = 'pdf|doc|docx';
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
            } else
                return 'No File Name';
        }
    }
}
