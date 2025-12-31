<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('menu')) {

    function menu() {

        $CI = & get_instance();
        $CI->load->model('home_model');
        $data['mainmenu'] = $CI->home_model->mainmenu();
        $data['submenu'] = $CI->home_model->submenu();
        $data['childmenu'] = $CI->home_model->childmenu();
        $CI->load->view('template/menu', $data);
    }

}

