
<?php

class Model_news extends CI_Model {
    /* function MCats(){
      parent::Model();
      }
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getNews($news_id) {
        $data = array();
        $options = array('news_id' => $news_id);
        $Q = $this->db->get_where('news', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllNews() {
        $data = array();
        $sql = "SELECT * FROM `news` order by `news_id` desc LIMIT 0,100";
        $Q = $this->db->query($sql);
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getNews_notapproved() {
        $data = array();
        $sql = "SELECT * FROM news order by news_id DESC LIMIT 0,7";
        $Q = $this->db->query($sql);
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
        //$this->db->groupby('parentid,id');
        $Q = $this->db->get('ms_categories');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function getTopNews() {
        $data[0] = 'root';
        //$this->db->where('parentid',0);   we dont have parent id
        $Q = $this->db->get('news');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                //$data[$row['id']] = $row['name'];
                $data[$row['news_id']] = $row['news_title'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function getPublishNews() {
        $data[0] = 'root';
        $this->db->where('parentid', 0);
        $this->db->where('status', 'active');
        // $this->db->order_by('sortorder','asc');
        $Q = $this->db->get('news');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addNews() {
        $ext_file = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $customFileName = $_POST['news_date'] . '.' . $ext_file;
        $file_tmp = $_FILES['myfile']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/news/'; 

        $data = array(
            'news_title' => $_POST['news_title'],
            'news_date' => $_POST['news_date'],
            'news_links' => $customFileName,
            'news_status' => $_POST['news_status']
        );

        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        $this->db->insert('news', $data);
    }

    function updateNews() {
         $ext_file = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $customFileName = $_POST['news_date'] . 'update'. '.' . $ext_file;
        $file_tmp = $_FILES['myfile']['tmp_name'];
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/news/';
        
         if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
            $data = array(
                'news_title' => $_POST['news_title'],
                'news_date' => $_POST['news_date'],
                'news_links' => $customFileName
            );
        } else {
            $data = array(
                'news_title' => $_POST['news_title'],
                'news_date' => $_POST['news_date']
            );
        }
        
        move_uploaded_file($file_tmp, $file_loc . $customFileName);
        
        $this->db->where('news_id', $_POST['news_id']);
        $this->db->update('news', $data);
    }

    function updateNews_approval() {
        $data = array(
            'news_status' => $_POST['news_status']
        );
        $this->db->where('news_id', $_POST['news_id']);
        $this->db->update('news', $data);
    }

    function deleteNews($news_id) {
        $data = array('news_status' => 'Not Approved');
        $this->db->where('news_id', $news_id);
        $this->db->update('news', $data);
    }

    function approveNews($news_id) {
        $data = array('news_status' => 'Approved');
        $this->db->where('news_id', $news_id);
        $this->db->update('news', $data);
    }

    function exportCsv() {
        $this->load->dbutil();
        $Q = $this->db->query("select * from news");
        return $this->dbutil->csv_from_result($Q, ",", "\n");
    }

    /////////////
    function add_link_file($my_file) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/file/news/';
            $config['allowed_types'] = 'pdf|doc|docx';
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
            } else
                return 'No File Name';
        }
    }

/////////////
}

?>