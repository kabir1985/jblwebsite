<?php

class Model_reports extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getTopreport($annual_report_id) {
        $data = array();
        $options = array('annual_report_id' => $annual_report_id);
        $Q = $this->db->get_where('annual_report', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function getAllReports() {
        $sql = "select * from annual_report order by annual_report_year desc";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    function addReport() {
        $ext_file = pathinfo($_FILES['annual_report_pdf_link']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $customFileName = $_POST['annual_report_year'] . '.' . $ext_file;
        $file_tmp = $_FILES['annual_report_pdf_link']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/annualReports/';

        $data = array(
            'annual_report_title' => $_POST['annual_report_title'],
            'annual_report_year' => $_POST['annual_report_year'],
            'annual_report_published_date' => $_POST['annual_report_published_date'],
            //'annual_report_cover_image' => $_POST['annual_report_cover_image'],
            'annual_report_pdf_link' => $customFileName,
            'annual_report_status' => $_POST['annual_report_status']
        );

        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        /* $my_file1=array();		
          $my_file1= $this->add_link_file('annual_report_pdf_link');

          if 	($my_file1 != 'No File Name')
          {
          $data['annual_report_pdf_link'] = $my_file1['file_name'];
          }
          else
          {
          $data['annual_report_pdf_link'] = '';
          } */

        $this->db->insert('annual_report', $data);
    }

    function updateReport() {
        $ext_file = pathinfo($_FILES['annual_report_pdf_link']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $customFileName = $_POST['annual_report_year'] . '.' . $ext_file;
        $file_tmp = $_FILES['annual_report_pdf_link']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/annualReports/';

        $data = array(
            //'bod_id' => $_POST['bod_id'],
            'annual_report_title' => $_POST['annual_report_title'],
            'annual_report_year' => $_POST['annual_report_year'],
            'annual_report_pdf_link' => $customFileName,
            'annual_report_status' => $_POST['annual_report_status']
        );

        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        $this->db->where('annual_report_id', $_POST['annual_report_id']);
        $this->db->update('annual_report', $data);
    }

    function add_link_file($my_file) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/file/annualReports/';
            $config['allowed_types'] = 'pdf';
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

    function deleteReport($annual_report_id) {
        $data = array('annual_report_status' => 'Inactive');
        $this->db->where('annual_report_id', $annual_report_id);
        $this->db->update('annual_report', $data);
    }

    function exportCsv() {
        $this->load->dbutil();
        $Q = $this->db->query("select * from board_of_director");
        return $this->dbutil->csv_from_result($Q, ",", "\n");
    }
}
