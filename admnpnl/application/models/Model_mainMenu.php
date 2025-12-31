<?php

class Model_mainMenu extends CI_Model{

	/*function MCats(){
		parent::Model();
	}
    */
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

function getMainMenu($mainmenu_id){
    $data = array();
    $options = array('mainmenu_id' => $mainmenu_id);
    $Q = $this->db->get_where('mainmenu',$options,1);
    if ($Q->num_rows() > 0){
      $data = $Q->row_array();
    }

    $Q->free_result();    
    return $data;    
 }
	
 function getAllMainMenu(){
     $data = array();
     $Q = $this->db->get('mainmenu');
     if ($Q->num_rows() > 0){
       foreach ($Q->result_array() as $row){
         $data[] = $row;
       }
    }
    $Q->free_result();  
    return $data; 
 }



 function getCategoriesNav(){
     $data = array();
     $this->db->select('id,name,parentid');
     $this->db->where('status', 'active');
     $this->db->order_by('parentid','asc');
     $this->db->order_by('sortorder','asc');
     $this->db->group_by('parentid,id');
     $Q = $this->db->get('ms_categories');
     if ($Q->num_rows() > 0){
       foreach ($Q->result() as $row){
			if ($row->parentid > 0){
				$data[0][$row->parentid]['children'][$row->id] = $row->name;
			
			}else{
				$data[0][$row->id]['name'] = $row->name;
			}
		}
    }
    $Q->free_result(); 
    return $data; 
 } 


	
 function getTopMainMenu(){
     $data[0] = 'root';
     $this->db->where('mainmenu_id',0);
     $Q = $this->db->get('mainmenu');
     if ($Q->num_rows() > 0){
       foreach ($Q->result_array() as $row){
         $data[$row['mainmenu_id']] = $row['name'];
       }
    }
    $Q->free_result();  
    return $data; 
 }	

 
 function addMainMenu(){
	$data = array( 
		'parent' => $_POST['parent'],
                'priority' => $_POST['priority'],
		'name' => $_POST['name'],
		'url' => $_POST['url'],
		'status' => $_POST['status']
	);

	$this->db->insert('mainmenu', $data);	 
 }
 
 function updatemainMenu(){
	$data = array( 
		'parent' => $_POST['parent'],
                'priority' => $_POST['priority'],
		'name' => $_POST['name'],
		'url' => $_POST['url'],
		'status' => $_POST['status']
	);
 	$this->db->where('mainmenu_id', $_POST['mainmenu_id']);
	$this->db->update('mainmenu', $data);	
 }
 
 function deleteMainMenu($mainmenu_id){
 	$data = array('status' => 'Inactive');
 	$this->db->where('mainmenu_id', $mainmenu_id);
	$this->db->update('mainmenu', $data);	
 }
	
}

?>