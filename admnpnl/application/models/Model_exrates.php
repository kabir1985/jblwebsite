<?php

class Model_exrates extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

// Treasury: exchange rate file view

    function getAllExrate() {
        $data = array();
        $this->db->select('*');
        $this->db->order_by('ex_id', 'desc');
        $Q = $this->db->get('exchange_rate');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

// Treasury: exchange rate file upload

    function uploadExRateFile() {
        echo "<pre>";
        print_r($_FILES);

        $check_date = date("Y-m-d");

        $this->db->where('DATE(upload_dt)', $check_date);
        $Q = $this->db->get('exchange_rate');
        $row_count = $Q->num_rows();

        if ($Q->num_rows() == 0) {
            $date = date("d-m-Y");

            date_default_timezone_set('Asia/Dhaka');
            $up_dt = date('Y-m-d H:i:s');

            $data = array(
                'upload_by' => $_SESSION['username']
            );

            $ex_id = 0;
            if ($this->db->insert('exchange_rate', $data)) {
                $ex_id = $this->db->insert_id();

                if ($ex_id > 0) {
                    $ext_file = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
                    $ext_file = strtolower($ext_file);
                    $file_tmp = $_FILES['myfile']['tmp_name'];
                    print_r($file_tmp);
                    $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/ExchangeRate/';

                    $customFileName = $ex_id . '_' . "Rate" . '_' . $date . '.' . $ext_file;

                    $data = array('ex_file_path' => $customFileName, 'upload_dt' => $up_dt);

                    move_uploaded_file($file_tmp, $file_loc . $customFileName);
        // die();
                    // update the ex file path with reference to ex_id
                    $this->db->where('ex_id', $ex_id);
                    $this->db->update('exchange_rate', $data);                       
                }
            }
            return 1;
        } else {
            return 0;
        }
    }

    function getSpecificExRateFile($ex_id) {
        /* $data = array();
          $options = array('ex_id' => $ex_id);
          $Q = $this->db->get_where('exchange_rate', $options, 1);
          //if ($Q->num_rows() > 0) {
          $data = $Q->row_array();
          //}
          $Q->free_result();
          return $data; */
        $sql = "SELECT * FROM exchange_rate where ex_id = $ex_id ";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function updateExRateFile($ex_id) {
        $this->db->select('upload_dt,update_count');
        $this->db->where('ex_id', $ex_id);
        $Q = $this->db->get('exchange_rate');

        $dt = $Q->result_array();
        $upload_date = $dt[0]['upload_dt'];
        $update_count = $dt[0]['update_count'];

        //print_r($dt[0]['upload_dt']);
        // datetime to date separation
        $timestamp = strtotime($upload_date);
        $upload_date_conversion = date('Y-n-j', $timestamp);

        // update count for update naming
        $count = $update_count + 1;

        $date = date("d-m-Y");
        date_default_timezone_set('Asia/Dhaka');
        $ed_dt = date('Y-m-d H:i:s');

        $ext_file = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $file_tmp = $_FILES['myfile']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/ExchangeRate/';

        $customFileName = $ex_id . '_' . "Rate" . '_' . $upload_date_conversion . '_' . "update" . '_' . $count . '.' . $ext_file;

        $data = array(
            'ex_file_path' => $customFileName,
            'edited_by' => $_SESSION['username'],
            'edited_dt' => $ed_dt,
            'update_count' => $count
        );

        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        // update the ex file path with reference to ex_id
        $this->db->where('ex_id', $ex_id);
        $this->db->update('exchange_rate', $data);

        // file checking and upload
        /* $my_file = array();
          $my_file = $this->add_link_file('myfile', $customFileName);

          if ($my_file != 'No File Name') {
          $data['ex_file_path'] = $my_file['file_name'];
          } else {
          $data['ex_file_path'] = 'No File Name';
          } */
    }

    function add_link_file($my_file, $customFileName) {
        if ($_FILES[$my_file]) {
            $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/ExchangeRate/';
            //$config['upload_path'] = '../assets/file/ExchangeRate/';
            $config['upload_path'] = $file_loc;
            $config['allowed_types'] = 'pdf';
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

    function getUser() {
        $data = array();
        $this->db->select('*');
        $this->db->where('username', 'jbtd');
        $Q = $this->db->get('ms_admins');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getFixedUser() {
        $data = array();
        $this->db->select('*');
        $this->db->where('username', 'jbtd');
        $Q = $this->db->get('ms_admins');
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function updateUser() {
        $data = array('username' => $_POST['username'],
            'email' => $_POST['email'],
            'status' => $_POST['status'],
            'department' => $_POST['department'],
            'user_group' => $_POST['user_group'],
            'password' => $_POST['password']
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('ms_admins', $data);
    }

    function rateCash() {
        $sql = "SELECT * FROM jblratecash";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function rateCashEdit($id) {
        $data = array(
            'currency' => $_POST['currency'],
            'selling' => $_POST['selling'],
            'buying' => $_POST['buying'],
            'date' => $_POST['date']
        );
        $this->db->where('id', $id);
        $this->db->update('jblratecash', $data);
    }

    function getTopCashRate($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('jblratecash', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }
}

?>