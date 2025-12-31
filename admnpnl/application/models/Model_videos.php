<?php
class Model_videos extends CI_Model{
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

function getVideo($id){
    $data = array();
    $options = array('id' => $id);
    $Q = $this->db->get_where('ms_files',$options,1);
    if ($Q->num_rows() > 0){
      $data = $Q->row_array();
    }
    $Q->free_result();    
    return $data;    
 }

function getAllVideos()
    {
	 $Q="select id,title,path,status from ms_files where name ='video_gallery' order by id DESC";
         $query=$this->db->query($Q);
	 //if($query->num_rows > 0){
	 return $query->result_array();         
         //}
    }
	
 function getTopVideos(){
     $data[0] = 'root';
     $this->db->where('name', 'video_gallery');
	 $Q = $this->db->get('ms_files');
     if ($Q->num_rows() > 0){
       foreach ($Q->result_array() as $row){
         $data[$row['id']] = $row['title'];
       }
    }
    $Q->free_result();  
    return $data; 
 }	

	
 function addVideo()
 {
	$data = array( 
                'page_mainmenu' => $_POST['page_mainmenu'],
                'page_submenu' => $_POST['page_submenu'],
		'name' => $_POST['name'],
		'title' => $_POST['title'],
		'path' => $_POST['video_path'],		
		'status' => $_POST['status']					
		);				
        
		$this->db->insert('ms_files', $data);	 
 }
  
 function updateVideo($id){
	$data = array(
                'page_mainmenu' => $_POST['page_mainmenu'],
		'page_submenu' => $_POST['page_submenu'],
		'name' => $_POST['name'],
		'title' => $_POST['title'],
		'path' => $_POST['path'],
		'status' => $_POST['status']
		);	
		
        $this->db->where('id', $id);	
        $this->db->update('ms_files', $data);
	}

 function deleteVideo($id){
 	$data = array('status' => 'inactive');
 	$this->db->where('id', $id);
	$this->db->update('ms_files', $data);	
 }

/*function add_link_file($my_file)
{
	if ($_FILES[$my_file])
	{
		$config['upload_path'] = '../includes/videos/'; 
		$config['allowed_types'] = 'avi|mp4|mpeg|mpg|mpe|mov|movie|mp3|dat|3gp|flv|qt|wmv';
		$config['max_size'] = '0';
		$config['remove_spaces'] = true;
		$config['overwrite'] = true;
		$config['max_width']  = '0';
		$config['max_height']  = '0';		
		$this->load->library('upload', $config);			
		if(!$this->upload->do_upload($my_file))
		{
			return 'No File Name';
		}
		$U = $this->upload->data();
		if ($U['file_name'])
		{	
			return $U;
		}
		else 
                {return 'No File Name';}
	}
}*/
	
}


