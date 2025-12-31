<?php

class Breadcrumb_model extends CI_Model {

    function __construct() {
        parent::__construct();
//        $this->load->model('menu_model');
    }

    public function childmenu_information() {
        $sql = "SELECT	mainmenu.name, submenu.submenu_name,			
childmenu.childmenu_name, childmenu.childmenu_url, childmenu.childmenu_id FROM mainmenu
			Left Join submenu ON mainmenu.mainmenu_id = submenu.submenu_parent
			Left Join childmenu ON submenu.submenu_id = childmenu.childmenu_parent
			WHERE 
			mainmenu.status = 'Active' AND 
			submenu.submenu_status = 'Active' AND
			childmenu.childmenu_status = 'Active' ORDER BY `childmenu`.`childmenu_url` ASC";

        $query = $this->db->query($sql);


        $data = $query->result_array(); //more than one row			   
        return $data;
    }

    public function submenu_information() {
        $sql = "SELECT	mainmenu.name, submenu.submenu_name, submenu.submenu_url FROM mainmenu
			Left Join submenu ON mainmenu.mainmenu_id = submenu.submenu_parent
			
			WHERE 
			mainmenu.status = 'Active' AND 
			submenu.submenu_status = 'Active' AND
			submenu.submenu_url !=''";

        $query = $this->db->query($sql);

        $data = $query->result_array(); //more than one row			   
        return $data;
    }

}
