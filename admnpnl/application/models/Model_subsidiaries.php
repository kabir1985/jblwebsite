<?php

class Model_subsidiaries extends CI_Model {
    /* function MCats(){
      parent::Model();
      }
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getTopCompany($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('subsidiary_company', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAll_subsidiaries() {
        $data = array();
        $Q = $this->db->get('subsidiary_company');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function addcompany() {
        $data = array(
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'contacts' => $_POST['contacts'],
            'status' => $_POST['status']
        );
        $my_image = array();
        $my_image = $this->add_link_file('image');
        if ($my_image != 'No File Name') {
            $data['image'] = $my_image['file_name'];
        } else {
            $data['image'] = 'No File Name';
        }
        $this->db->insert('subsidiary_company', $data);
    }

    function update_company() {
        $data = array(
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'contacts' => $_POST['contacts'],
            'status' => $_POST['status']
        );

        $my_image = array();
        $my_image = $this->add_link_file('image');
        if ($my_image != 'No File Name') {
            $data['image'] = $my_image['file_name'];
        }
        /* else
          {
          $data['bod_profile'] = 'No File Name';
          } */
        $this->db->where('id', $_POST['id']);
        $this->db->update('subsidiary_company', $data);
    }

    function add_link_file($my_file) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/images/jec/';
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

    function deleteCompany($id) {
        $data = array('status' => 'Inactive');
        $this->db->where('id', $id);
        $this->db->update('subsidiary_company', $data);
    }

    function exportCsv() {
        $this->load->dbutil();
        $Q = $this->db->query("select * from board_of_director");
        return $this->dbutil->csv_from_result($Q, ",", "\n");
    }

}
