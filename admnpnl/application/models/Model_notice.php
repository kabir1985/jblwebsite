<?php

class Model_notice extends CI_Model {
    /* function MCats(){
      parent::Model();
      }
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getNotice($notice_id) {
        $data = array();
        $options = array('id' => $notice_id);
        $Q = $this->db->get_where('ms_files', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllNotice() {
        //$data = array();
        // AND (expiry_date >=CURDATE() OR expiry_date is NULL OR expiry_date='0000-00-00') AND status='active' order by id DESC
        /* $this->db->where('name', 'notice');
          $this->db->where('expiry_date', '>=CURDATE()');
          $this->db->OR_where('expiry_date', 'NULL');
          $this->db->OR_where('expiry_date', '0000-00-00');
          $this->db->where('status', 'active'); */
        //$this->db->order_by('id', 'desc');
        //$Q = $this->db->get('ms_files');
        
        //$Q = "select id,name,title,path,status,image from ms_files where name ='notice' AND (expiry_date >=CURDATE() OR expiry_date is NULL OR expiry_date='0000-00-00') AND status='active' order by id DESC";
        $Q = "select id,name,title,path,status,image,expiry_date from ms_files where name ='notice' order by id DESC";
        $query = $this->db->query($Q);
        return $query->result_array();
    }

    function getTopNotice() {
        $data[0] = 'root';
        $this->db->where('name', 'notice');
        $Q = $this->db->get('ms_files');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['title'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addNotice() {
        $ext_file = pathinfo($_FILES['path']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);

        $submenu = $this->input->post('submenu_id');
        $childmenu = $this->input->post('childmenu_id');

        $expiryDate = date("Ymd", strtotime($_POST['expiry_date']));

        $customFileName = "notice_" . date("Ymd") . $expiryDate . '.' . $ext_file;
        $file_tmp = $_FILES['path']['tmp_name'];
        //live server file location
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/documents/';
        //local pc file location
        //$file_loc = $_SERVER['DOCUMENT_ROOT'] . '/jb.com.bd-New_Server/assets/file/documents/';

        $data = array(
            'page_mainmenu' => $_POST['mainmenu_id'],
            'page_submenu' => (!empty($submenu)) ? $submenu : NULL,
            'page_childmenu' => (!empty($childmenu)) ? $childmenu : NULL,
            'name' => $_POST['page_name'],
            'title' => $_POST['title'],
            'path' => $customFileName,
            'expiry_date' => $_POST['expiry_date'],
            'status' => $_POST['status']
        );

        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        $this->db->insert('ms_files', $data);
    }

    function updateNotice() {
        $ext_file = pathinfo($_FILES['path']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);

        $submenu = $this->input->post('submenu_id');
        $childmenu = $this->input->post('childmenu_id');

        $expiryDate = date("Ymd", strtotime($_POST['expiry_date']));

        $customFileName = "notice_" . 'update' . date("Ymd") . $expiryDate . '.' . $ext_file;
        $file_tmp = $_FILES['path']['tmp_name'];
        //live server file location
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/documents/';
        //local pc file location
        //$file_loc = $_SERVER['DOCUMENT_ROOT'] . '/jb.com.bd-New_Server/assets/file/documents/';   

        if (is_uploaded_file($_FILES['path']['tmp_name'])) {
            $data = array(
                'page_mainmenu' => $_POST['mainmenu_id'],
                'page_submenu' => (!empty($submenu)) ? $submenu : NULL,
                'page_childmenu' => (!empty($childmenu)) ? $childmenu : NULL,
                'name' => $_POST['page_name'],
                'title' => $_POST['title'],
                'path' => $customFileName,
                'expiry_date' => $_POST['expiry_date'],
                'status' => $_POST['status']
            );
        } else {
            $data = array(
                'page_mainmenu' => $_POST['mainmenu_id'],
                'page_submenu' => (!empty($submenu)) ? $submenu : NULL,
                'page_childmenu' => (!empty($childmenu)) ? $childmenu : NULL,
                'name' => $_POST['page_name'],
                'title' => $_POST['title'],
                //'path' => $customFileName,
                'expiry_date' => $_POST['expiry_date'],
                'status' => $_POST['status']
            );
        }

        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        $this->db->where('id', $_POST['id']);
        $this->db->update('ms_files', $data);
    }

    function deleteNotice($id) {
        $data = array('status' => 'inactive');
        $this->db->where('id', $id);
        $this->db->update('ms_files', $data);
    }

    /////////////
    function add_link_file($my_file, $customTitle) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/file/documents/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = false;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $config['file_name'] = $customTitle;

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

/////////////
}

?>
