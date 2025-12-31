
<?php

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        //session_start();

        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
        $this->tinyMce = '
		<!-- TinyMCE -->
		<script type="text/javascript" src="' . base_url() . 'assets/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript" src="' . base_url() . 'assets/tiny_mce/my_tinymce.js"></script>
		<!-- /TinyMCE -->
		';
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan') {
            $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
            $data['main'] = 'vw_pages_home';
            $data['pages'] = $this->Model_pages->getAllPages();
            $data['cats'] = $this->Model_mainMenu->getTopMainMenu();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function addPage() {
        $data['mainMenu'] = $this->Model_pages->getMainMenus();
        $data['otherMenu'] = $this->Model_pages->getOtherMenu();
        // echo '<pre>';
        //print_r( $data['categorized_page']); die();
        if ($this->input->post('name')) {
            $this->Model_pages->addPage();
            $this->session->set_flashdata('message', 'Page Added Successfully');
            redirect('admin/Pages/index', 'refresh');
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_page_add';
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = $this->tinyMce;
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function edit($id = 0) {
        $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
        $data['mainMenu'] = $this->Model_pages->getMainMenusForEdit();
        $data['otherMenu'] = $this->Model_pages->getOtherMenu();
        if ($this->input->post('name')) {
            $this->Model_pages->updatePage($id);
            $this->session->set_flashdata('message', 'Page updated successfully');
            //print_r($data); die();
            redirect('admin/Pages/index', 'refresh');
        } else {
            //$data['mainMenu'] = $this->Model_pages->getMainMenusForEdit();
            $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
            $data['page'] = $this->Model_pages->getPage($id);
            //echo '<pre>';
            //print_r( $data['page']); die();
            //$cats = $this->model_mainMenu->getCategoriesNav();
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_page_edit';
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = $this->tinyMce;
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

    function delete($id) {
        if ($_SESSION['username'] == 'batayan') {
            $this->Model_pages->deletePage($id);
            $this->session->set_flashdata('message', 'Page deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Pages/index', 'refresh');
    }

    function _flatten_cats($cats) {
        $F = array();
        $F[0] = '/';
        foreach ($cats as $root => $list) {
            foreach ($list as $key => $cat) {
                $F[$key] = "/" . $cat['name'];
                if (isset($cat['children'])) {
                    foreach ($cat['children'] as $k => $v) {
                        $F[$k] = "/" . $cat['name'] . "/" . $v;
                    }
                }
            }
        }
        return $F;
    }

    function ajax_populate_select_based_on_another_select() {
        $id = $this->input->post('mainmenu_id');
        if ($id == 22) {
            $data['drpDnPages'] = $this->Model_pages->selectDropdownPagesMainMenu($id);
            $this->load->view('vw_selectDrpPages', $data);
        } else {
            $this->db->select('submenu_name,submenu_id');
            $this->db->from('submenu');
            $this->db->join('mainmenu', 'mainmenu.mainmenu_id = submenu.submenu_parent');
            $this->db->where('submenu_parent', $id);
            $this->db->where('submenu_status', 'Active');
            $records = $this->db->get('');
            $output = null;
            echo '<option value="">--select--</option>';
            foreach ($records->result() as $row) {
                $output .= "<option value='" . $row->submenu_id . "'>" . $row->submenu_name . "</option>";
            }
            echo $output;
        }
    }

    function ajax_populate_html_based_on_another_select() {
        /* $id = $this->input->post('submenu_id'); //receiving the ajax post from view       
          $sql = "select *from ms_pages a, submenu b where
          b.submenu_id = a.submenu_id and
          b.submenu_id =$id";
          $records = $this->db->query($sql);
          $output = "<table id='dataTable' class='table-striped table-bordered table-responsive-sm'>" . "<thead><tr>" . "<th>ID</th><th>Name</th><th>Title</th><th>Content</th><th>Status</th><th>Actions</th>" . "</tr></thead>";
          foreach ($records->result() as $row) {
          $output .= "<tr>" . "<td>" . $row->id . "</td>" . "<td>" . $row->name . "</td>" . "<td>" . $row->title . "</td>" . "<td>" . $row->content . "</td>" . "<td>" . $row->status . "</td>" . '<td  class="center">' . anchor('admin/pages/edit/' . $row->id, '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' . anchor('admin/pages/delete/' . $row->id, '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>' . '</tr>';
          }

          $output .= '</table>';
          echo $output; */
        $smid = $this->input->post('submenu_id');
        $data['drpDnPages'] = $this->Model_pages->selectDropdownPages($smid);
        $this->load->view('vw_selectDrpPages', $data);
    }

    function ajax_populate_childcategorypage_based_on_subcategorypage() {

        $id = $this->input->post('submenu_id'); //receiving the ajax post from view
        $this->db->select('id,name');
        $this->db->from('ms_pages');
        $this->db->where('submenu_id', $id);
        $this->db->where('status ', 'Active');
        $records = $this->db->get('');
        $output = null;
        foreach ($records->result() as $row) {
            $output .= "<option value='" . $row->name . "'>" . $row->name . "</option>";
        }
        echo $output;
    }

    function ajax_populate_childMenuPage_based_on_subMenuPage() {

        $id = $this->input->post('submenu_id'); //receiving the ajax post from view
        $this->db->select('id,name');
        $this->db->from('ms_pages');
        $this->db->where('childmenu_id', $id);
        $this->db->where('status ', 'Active');
        $records = $this->db->get('');
        $output = null;
        foreach ($records->result() as $row) {
            $output .= "<option value='" . $row->name . "'>" . $row->name . "</option>";
        }
        echo $output;
    }

    function ajax_populate_subMenuPage_based_on_subMenu() {
        $id = $this->input->post('submenuid'); //receiving the ajax post from view
        /* $this->db->select('id,name');
          $this->db->from('ms_pages');
          $this->db->where('submenu_id', $id);
          $this->db->where('status ', 'Active');
          $records = $this->db->get(''); */
        $query = "SELECT id, name FROM ms_pages WHERE submenu_id=$id AND childmenu_id IS NULL AND status='active' ";
        $runQuery = $this->db->query($query);
        $output = null;
        foreach ($runQuery->result() as $row) {
            $output .= "<option value='" . $row->name . "'>" . $row->name . "</option>";
        }
        echo $output;
    }

    function otherPage_based_on_otherMenu() {
        $id = $this->input->post('mainmenu_id');
        $query = "SELECT id, name FROM ms_pages WHERE mainmenu_id=$id AND status='active' ";
        $runQuery = $this->db->query($query);
        $output = null;
        foreach ($runQuery->result() as $row) {
            $output .= "<option value='" . $row->name . "'>" . $row->name . "</option>";
        }
        echo $output;
    }

    function ajax_populate_childMenu_based_on_subMenu() {
        $id = $this->input->post('submenu_id');
        print_r($id);
        $page_level = $this->input->post('page_level');
        if ($page_level == 3) {
            $this->db->select('childmenu_name,childmenu_id');
            $this->db->from('childmenu');
            $this->db->join('submenu', 'submenu.submenu_id = childmenu.childmenu_parent');
            $this->db->where('childmenu_parent', $id);
            $this->db->where('childmenu_status', 'Active');
            $records = $this->db->get('');
            $output = null;
            foreach ($records->result() as $row) {
                $output .= "<option value='" . $row->childmenu_id . "'>" . $row->childmenu_name . "</option>";
            }
            echo $output;
        }
    }

    function buildDropSubMenus() {
        $id_mainmenu = $this->input->post('id', TRUE);
        //print_r($id_mainmenu);
        $subMenuData['subMenuDrop'] = $this->Model_pages->getSubMenuByMainMenu($id_mainmenu);
        //print_r($subMenuData['subMenuDrop']); die();
        $output = null;
        $output .= "<option value=''>--select--</option>";
        foreach ($subMenuData['subMenuDrop'] as $row) {
            $output .= "<option value='" . $row->submenu_id . "'>" . $row->submenu_name . "</option>";
        }
        echo $output;
    }

    function buildDropChildMenus() {
        $id_submenu = $this->input->post('submenuid', TRUE);
        $childMenuData['childMenuDrop'] = $this->Model_pages->getChildMenuBySubMenu($id_submenu);
        $output = null;
        $output .= "<option value=''>--select--</option>";
        foreach ($childMenuData['childMenuDrop'] as $row) {
            $output .= "<option value='" . $row->childmenu_id . "'>" . $row->childmenu_name . "</option>";
        }
        echo $output;
    }

}
