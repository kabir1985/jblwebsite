<?php

class User_hr extends CI_Controller{
 
    public function __construct() {     
        parent::__construct();
       //$this->load->model('MAdminhrd');
        //session_start();
			if ($_SESSION['userid'] < 1){
    	redirect('Welcome/index','refresh');
		}
    }
    
    function Index(){
        $data['title']="Manage User";
        $data['main']="admin_hrd_home";
        $data['admins']=$this->MAdminhrd->getUser();
        $data['tinymce'] = '';
	$data['varcss']='admin_dashboard.css';
	$this->load->vars($data);
	$this->load->view('dashboard');
    }
    
    function edit(){
  	$this->load->library('encrypt');
  	if ($this->input->post('username')){
  		$this->MAdminhrd->updateUser();
  		$this->session->set_flashdata('message','Updated Successfully !!!');
  		redirect('admin/Admin_humanresource/index','refresh');
  	}else{
		$data['title'] = "Update User/Password";
		$data['main'] = 'admin_hrd_edit';
		//$data['admin'] = $this->MAdminhrd->getFixedUser();
		$data['tinymce'] = '';
		$data['varcss']='admin_dashboard.css';
		$this->load->vars($data);
		$this->load->view('dashboard');    
	}
  }
    
    
}
