<?php

class Model_exhouses extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getTopHouse($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('exchange_house', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllExchange() {
        $data = array();
        $Q = $this->db->get('exchange_house');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function addHouse() {
        $data = array(
            'exchg_house_name' => $_POST['exchg_house_name'],
            'exchg_house_address' => $_POST['exchg_house_address'],
            'exchg_house_phone' => $_POST['exchg_house_phone'],
            'exchg_house_fax' => $_POST['exchg_house_fax'],
            'exchg_house_email' => $_POST['exchg_house_email'],
            'exchg_house_country' => $_POST['exchg_house_country'],
            'exchg_house_status' => $_POST['exchg_house_status']
        );
        $this->db->insert('exchange_house', $data);
    }

    function updateHouse() {
        $data = array(
            'exchg_house_name' => $_POST['exchg_house_name'],
            'exchg_house_address' => $_POST['exchg_house_address'],
            'exchg_house_phone' => $_POST['exchg_house_phone'],
            'exchg_house_fax' => $_POST['exchg_house_fax'],
            'exchg_house_email' => $_POST['exchg_house_email'],
            'exchg_house_country' => $_POST['exchg_house_country'],
            'exchg_house_status' => $_POST['exchg_house_status']
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('exchange_house', $data);
    }

    function add_link_file($my_file) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../includes/images/Retired_MD/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|xls|zip|swf|txt|html';
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

    function deleteHouse($id) {
        $data = array('exchg_house_status' => 'Inactive');
        $this->db->where('id', $id);
        $this->db->update('exchange_house', $data);
    }

    function exportCsv() {
        $this->load->dbutil();
        $Q = $this->db->query("select * from board_of_director");
        return $this->dbutil->csv_from_result($Q, ",", "\n");
    }

}
