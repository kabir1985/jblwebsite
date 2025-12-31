<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Errors extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {   
	    $this->output->set_status_header('404'); 
        $this->load->view('error.php');
    }
  
}
