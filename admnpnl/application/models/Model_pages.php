<?php

class Model_pages extends CI_Model {
    /* function MPages(){
      parent::Model();
      } */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getPage($id) {
        /* $data = array();
          $sql = "select a.*,b.submenu_name from ms_pages a,submenu b where a.submenu_id =b.submenu_id AND a.id=$id";
          $Q = $this->db->query($sql);
          if ($Q->num_rows() > 0) {
          $data = $Q->row_array();
          } else {
          $this->db->where('id', $id);
          $this->db->limit(1);
          $Q = $this->db->get('ms_pages');
          if ($Q->num_rows() > 0) {
          $data = $Q->row_array();
          }
          }
          $Q->free_result();
          return $data; */
        $query = "select mp.*,mm.name as mainmenu_name, sm.submenu_name as submenu_name, COALESCE(cm.childmenu_name,'N/A') as childmenu_name 
           from ms_pages mp
           left join mainmenu mm
           on mp.mainmenu_id=mm.mainmenu_id
           left join submenu sm
           on mp.submenu_id=sm.submenu_id
           left join childmenu cm
           on mp.childmenu_id=cm.childmenu_id
           where mp.id=$id";
        $runQuery = $this->db->query($query);
        return $runQuery->row_array();
    }

    function getAllPages() {
        $data = array();
        $Q = $this->db->get('ms_pages');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getCategorizedPages() {
        $data[0] = '--select first--';
        $this->db->where('status', 'Active');
        $Q = $this->db->get('mainmenu');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['mainmenu_id']] = $row['name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function getMainMenus() {
        $this->db->order_by('priority', 'ASC');
        $this->db->where_not_in('name', 'Other');
        $query = $this->db->get('mainmenu');
        return $query->result();
    }

    function getMainMenusForEdit() {
       /* $this->db->order_by('priority', 'ASC');
        //$this->db->where_not_in('name', 'Other');
        $query = $this->db->get('mainmenu');
        return $query->result(); */
        $sql = "select mainmenu_id,name from mainmenu where status='Active' order by name ASC";
        $query = $this->db->query($sql);
        $data[0] = '--Please Select--';
        foreach ($query->result_array() as $row) {
            $data[$row['mainmenu_id']] = $row['name'];
        }
        return $data;
    }

    function getSubMenusForEdit() {
        /*  $this->db->select("submenu_id, submenu_name");
          $this->db->order_by('submenu_name', 'ASC');
          //$this->db->where_not_in('name', 'Other');
          $query = $this->db->get('submenu');
          return $query->result_array(); */
        $sql = "select submenu_id,submenu_name from submenu where submenu_status='Active' order by submenu_name ASC";
        $query = $this->db->query($sql);
        $data[0] = '--Please Select--';
        foreach ($query->result_array() as $row) {
            $data[$row['submenu_id']] = $row['submenu_name'];
        }
        return $data;
    }

    function getChildMenusForEdit() {
        /* $this->db->select("childmenu_id, childmenu_name");
          $this->db->order_by('childmenu_name', 'ASC');
          //$this->db->where_not_in('name', 'Other');
          $query = $this->db->get('childmenu');
          return $query->result_array(); */
        $sql = "select childmenu_id, childmenu_name from childmenu where childmenu_status='Active' order by childmenu_name ASC";
        $query = $this->db->query($sql);
        $data[0] = '--Please Select--';
        foreach ($query->result_array() as $row) {
            $data[$row['childmenu_id']] = $row['childmenu_name'];
        }
        return $data;
    }

    function getPagesForEdit() {
        /* $this->db->select("name");
          $this->db->order_by('name', 'ASC');
          //$this->db->where_not_in('name', 'Other');
          $query = $this->db->get('ms_pages');
          return $query->result_array(); */
        $sql = "select name from ms_pages where status='active' order by name ASC";
        $query = $this->db->query($sql);
        $data[0] = '--Please Select--';
        foreach ($query->result_array() as $row) {
            $data[$row['name']] = $row['name'];
        }
        return $data;
    }

    function getOtherMenu() {
        $this->db->select("mainmenu_id, name");
        $this->db->order_by('priority', 'ASC');
        $this->db->where('name', 'Other / Home');
        $query = $this->db->get('mainmenu');
        return $query->result();
    }

    function getIndexPages() {
        $data = array();
        //$this->db->select('id,category_id,localname');
        $this->db->select('id,category_id,name');
        $this->db->like('path', 'index');
        $this->db->where('status', 'active');
        $Q = $this->db->get('ms_pages');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['category_id']] = array(
                    'id' => $row['id'],
                    //'localname' => $row['localname']
                    'name' => $row['name']
                );
            }
        }
        $Q->free_result();
        return $data;
    }

    function getPublishPages() {
        $data = array();
        $this->db->order_by('category_id asc, pageorder asc');
        $this->db->where('status', 'active');
        $Q = $this->db->get('ms_pages');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function addPage() {
        if ($_POST['childmenu_id'] === '') {
            $_POST['childmenu_id'] = null;
        }
        if ($_POST['submenu_id'] === '') {
            $_POST['submenu_id'] = null;
        }
        if ($_POST['othermenu_id'] !== '') {
            $_POST['mainmenu_id'] = $_POST['othermenu_id'];
        }
        $data = array(
            'mainmenu_id' => $_POST['mainmenu_id'],
            'submenu_id' => $_POST['submenu_id'],
            //'submenu_id' => isset($_POST['submenu_id']) ? $_POST['submenu_id'] : 0,
            'childmenu_id' => $_POST['childmenu_id'],
            'name' => $_POST['name'],
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'status' => $_POST['status']
        );

        $this->db->insert('ms_pages', $data);
    }

    function updatePage() {
        if ($_POST['childmenu_id'] === '') {
            $_POST['childmenu_id'] = null;
        }
        if ($_POST['submenu_id'] === '') {
            $_POST['submenu_id'] = null;
        }
        $data = array(
            'mainmenu_id' => $_POST['mainmenu_id'],
            'submenu_id' => $_POST['submenu_id'],
            'childmenu_id' => $_POST['childmenu_id'],
            'name' => $_POST['name'],
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'status' => $_POST['status']
        );
        //echo '<pre>';
        //print_r($data); die();

        $this->db->where('id', $_POST['id']);
        $this->db->update('ms_pages', $data);
    }

    function deletePage($id) {
        $data = array('status' => 'inactive');
        $this->db->where('id', $id);
        $this->db->update('ms_pages', $data);
    }

    function selectDropdownPages($smid) {
        $sql = "select *from ms_pages a, submenu b where b.submenu_id = a.submenu_id and b.submenu_id =$smid";
        $records = $this->db->query($sql);
        return $records->result_array();
    }

    function selectDropdownPagesMainMenu($id) {
        $sql = "select a.id, a.name, a.title, a.content, a.status  from ms_pages a, mainmenu b where b.mainmenu_id = a.mainmenu_id and b.mainmenu_id =$id";
        $records = $this->db->query($sql);
        return $records->result_array();
    }

    function getSubMenuByMainMenu($id_mainmenu) {
        $this->db->select('submenu_id,submenu_name');
        $this->db->from('submenu');
        $this->db->where('submenu_parent', $id_mainmenu);
        $query = $this->db->get();
        return $query->result();
    }

    function getChildMenuBySubMenu($id_submenu) {
        $this->db->select('childmenu_id,childmenu_name');
        $this->db->from('childmenu');
        $this->db->where('childmenu_parent', $id_submenu);
        $query = $this->db->get();
        return $query->result();
    }
}

?>