<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisitorHook {

    public function log()
    {
        $CI =& get_instance();
        $CI->load->model('Visitor_model');
        $ip = $CI->input->ip_address();
        $CI->Visitor_model->log_visit($ip);
    }
}
