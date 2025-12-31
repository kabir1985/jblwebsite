<?php

class User_hrd extends CI_Controller{
 
    public function __construct() {     
        parent::__construct();     
        //session_start();
			if ($_SESSION['userid'] < 1){
    	redirect('Welcome/index','refresh');
		}
    }
    
    function Index(){
        $data['title']="Janata Bank PLC.";
        $data['main']="vw_hrd_home";
        $data['admins']=$this->Model_userHRD->getUser();
        $data['tinymce'] = '';
	$data['varcss']='admin_dashboard.css';
	$this->load->vars($data);
	$this->load->view('dashboard');
    }
    
    function edit(){
  	$this->load->library('encrypt');
  	if ($this->input->post('username')){
  		$this->Model_userHRD->updateUser();
  		$this->session->set_flashdata('message','Updated Successfully !!!');
  		redirect('admin/User_hrd/index','refresh');
  	}else{
		$data['title'] = "Update User/Password";
		$data['main'] = 'vw_hrd_edit';
		$data['admin'] = $this->Model_userHRD->getFixedUser();
		$data['tinymce'] = '';
		$data['varcss']='admin_dashboard.css';
		$this->load->vars($data);
		$this->load->view('dashboard');    
	}
  }
    
    
}
