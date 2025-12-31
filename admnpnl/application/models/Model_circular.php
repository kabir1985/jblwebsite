<?php

class Model_circular extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getCircular($circular_id) {
        $data = array();
        $options = array('circular_id' => $circular_id);
        $Q = $this->db->get_where('circular_new', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllCircular() {
        $data = array();
        //$this->db->where('circular_status', 'Active');
        $this->db->select('circular_id,circular_date,circular_type,circular_no,circular_title,publish_status,circular_department');
        $this->db->order_by('circular_id', 'desc');
        $Q = $this->db->get('circular_new');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getAllCircularByDept($circular_department) {
        $data = array();
        $this->db->where('circular_status', 'Active');
        $this->db->where('circular_department', $circular_department);
        $this->db->select('circular_id,circular_date,circular_type,circular_no,circular_title,publish_status,circular_department');
        $this->db->order_by('circular_id', 'DESC');
        $Q = $this->db->get('circular_new');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getSubCategories($catid) {
        $data = array();
        $this->db->select('id,name,shortdesc');
        $this->db->where('parentid', $catid);
        $this->db->where('status', 'active');
        $this->db->order_by('sortorder', 'asc');
        $Q = $this->db->get('ms_categories');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'shortdesc' => $row['shortdesc']
                );
            }
        }
        $Q->free_result();

        return $data;
    }

    function getCategoriesNav() {
        $data = array();
        $this->db->select('id,name,parentid');
        $this->db->where('status', 'active');
        $this->db->order_by('parentid', 'asc');
        $this->db->order_by('sortorder', 'asc');
        $this->db->group_by('parentid,id');
        $Q = $this->db->get('ms_categories');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result() as $row) {
                if ($row->parentid > 0) {
                    $data[0][$row->parentid]['children'][$row->id] = $row->name;
                } else {
                    $data[0][$row->id]['name'] = $row->name;
                }
            }
        }
        $Q->free_result();
        return $data;
    }

    function getCategoriesDropDown() {
        $data = array();
        $this->db->select('id,name');
        $this->db->where('parentid !=', 0);
        $Q = $this->db->get('ms_categories');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function getTopCircular() {
        $data[0] = 'root';
        $Q = $this->db->get('circular_new');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['circular_id']] = $row['circular_title'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function getPublishCircular() {
        $data[0] = 'root';
        $this->db->where('parentid', 0);
        $this->db->where('status', 'active');
        $Q = $this->db->get('circular_new');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function circularDept() {
        //$query = "select concat(office_name, ' ', 'DEPARTMENT') as offered_by FROM jbl_ho_department";
        $query = "select office_code, office_name  FROM jbl_ho_department order by office_name asc";
        $runQuery = $this->db->query($query);
        //return $runQuery->result_array();
        $data[0] = '--Please Select--';
        foreach ($runQuery->result_array() as $row) {
            $data[$row['office_code']] = $row['office_name'];
        }
        return $data;
    }

    function addCircular() {
        $ext_file = pathinfo($_FILES['circular_pdf_link']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        /* $keyword = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars($this->input->post("circular_no", TRUE))); */
        $cirNoField = str_replace('/', '-', $_POST['circular_no']);
        $cirNo = preg_replace('/[^A-Za-z0-9\-]/', '', $cirNoField);
        //print_r($cirNo); die();
        $customFileName = $_POST['circular_type'] . "-" . $cirNo . '.' . $ext_file;
        $file_tmp = $_FILES['circular_pdf_link']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/circular/';

        $data = array(
            'circular_title' => $_POST['circular_title'],
            'circular_no' => $cirNo,
            'circular_type' => $_POST['circular_type'],
            'circular_department' => $_POST['circular_department'],
            'circular_date' => $_POST['circular_date'],
            'publish_status' => $_POST['publish_status'],
            'circular_status' => $_POST['circular_status'],
            'circular_pdf_link' => $customFileName
        );

        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        /*
          $my_file = array();
          $my_file = $this->add_link_file('circular_pdf_link', $customFileName);
          if ($my_file != 'No File Name') {
          $data['circular_pdf_link'] = $my_file['file_name'];
          } else {
          $data['circular_pdf_link'] = 'No File Name';
          }
         */

        $this->db->insert('circular_new', $data);
    }

    function updateCircular() {
        //$customFileName = $_POST['circular_type'] . "-" . $_POST['circular_no'] . "-update";
        $ext_file = pathinfo($_FILES['circular_pdf_link']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        /* $keyword = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars($this->input->post("circular_no", TRUE))); */
        $cirNoField = str_replace('/', '-', $_POST['circular_no']);
        $cirNo = preg_replace('/[^A-Za-z0-9\-]/', '', $cirNoField);
        //print_r($cirNo); die();
        $customFileName = $_POST['circular_type'] . "-" . $cirNo . "-update" . '.' . $ext_file;
        $file_tmp = $_FILES['circular_pdf_link']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/circular/';

        if (is_uploaded_file($_FILES['circular_pdf_link']['tmp_name'])) {
            $data = array(
                'circular_title' => $_POST['circular_title'],
                'circular_no' => $cirNo,
                'circular_type' => $_POST['circular_type'],
                'circular_department' => $_POST['circular_department'],
                'circular_date' => $_POST['circular_date'],
                'publish_status' => $_POST['publish_status'],
                'circular_status' => $_POST['circular_status'],
                'circular_pdf_link' => $customFileName
            );
        } else {
            $data = array(
                'circular_title' => $_POST['circular_title'],
                'circular_no' => $cirNo,
                'circular_type' => $_POST['circular_type'],
                'circular_department' => $_POST['circular_department'],
                'circular_date' => $_POST['circular_date'],
                'publish_status' => $_POST['publish_status'],
                'circular_status' => $_POST['circular_status']
            );
        }

        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        $this->db->where('circular_id', $_POST['circular_id']);
        $this->db->update('circular_new', $data);
    }

    function deleteCircular($circular_id) {
        // echo $circular_id;die;
        // $data = array('circular_status' => 'inactive');
        // $this->db->where('circular_id', $circular_id);
        // $this->db->update('circular_new', $data);	

        $data = array('circular_status' => 'Inactive');
        $this->db->where('circular_id', $circular_id);
        $this->db->update('circular_new', $data);
    }

    function get_type() {
        $sql = "select distinct circular_type from circular_new where circular_status='Active'";
        $Q = $this->db->query($sql);
        if ($Q->num_rows() > 0) {
            $data[0] = '--select--';
            $data['Instruction Circular'] = 'Instruction Circular';
            $data['Information Circular'] = 'Information Circular';
            $data['Circular Letter'] = 'Circular Letter';
            $data['RCD Circular'] = 'RCD Circular';
            $data['ID Circular Letter'] = 'ID CIrcular Letter';
            $data['FD Circular'] = 'FD Circular';
            $data['FD Circular Letter'] = 'FD Circular Letter';
            $data['Lost Notification'] = 'Lost Notification';
            foreach ($Q->result_array() as $row) {
                $data[$row['circular_type']] = $row['circular_type'];
            }
        }
        $Q->free_result();
        return $data;
    }

// function get_department()
// {
//     $sql="select distinct circular_department from circular_new where circular_status='Active'";
//         $Q= $this->db->query($sql);
//         if ($Q->num_rows() > 0){
//         $data[0]='--select--';       
//         foreach ($Q->result_array() as $row){
//                $data[$row['circular_department']] = $row['circular_department'];
// }
//         }
//         $Q->free_result();  
//    return $data;
// }
    function get_pubstatus() {
        $sql = "select distinct publish_status from circular_new where circular_status='Active'";
        $Q = $this->db->query($sql);
        if ($Q->num_rows() > 0) {
            $data[0] = '--select--';
            $data['Private'] = 'Private';
            $data['Public'] = 'Public';
            foreach ($Q->result_array() as $row) {
                $data[$row['publish_status']] = $row['publish_status'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function get_status() {
        $sql = "select distinct circular_status from circular_new where circular_status='Active'";
        $Q = $this->db->query($sql);
        if ($Q->num_rows() > 0) {
            $data[0] = '--select--';
            $data['Active'] = 'Active';
            $data['Inactive'] = 'Inactive';
            foreach ($Q->result_array() as $row) {
                $data[$row['circular_status']] = $row['circular_status'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function exportCsv() {
        $this->load->dbutil();
        $Q = $this->db->query("select * from circular_new");
        return $this->dbutil->csv_from_result($Q, ",", "\n");
    }

/////////////
    function add_link_file($my_file, $customFileName) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/file/circular/';
            $config['allowed_types'] = 'pdf|doc';
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

?>