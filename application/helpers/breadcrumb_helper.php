<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('breadcrumb')) {

    function breadcrumb() {

        $CI = & get_instance();
        $CI->load->model('breadcrumb_model');
        $data['child'] = $CI->breadcrumb_model->childmenu_information();
        $data['sub'] = $CI->breadcrumb_model->submenu_information();

        $selectedcat = '';

        $breadcrumb = '';
        $breadcrumb .= '<ul class="breadcrumb">';

        foreach ($data['child'] as $cinfo) {
            if ($cinfo['childmenu_url'] == uri_string()) {
                $selectedcat = $cinfo['name'];
                $breadcrumb .= '<li class="breadcrumb-item">' . $cinfo['name'] . '</li> <li class="breadcrumb-item">' . $cinfo['submenu_name'] . '</li> <li class="breadcrumb-item" style="color:#0099cc">' . $cinfo['childmenu_name'] . '</li>';
            } else {
                
            }
        }

        foreach ($data['sub'] as $sinfo) {
            if ($sinfo['submenu_url'] == uri_string()) {
                $selectedcat = $sinfo['name'];
                $breadcrumb .= '<li class="breadcrumb-item">' . $sinfo['name'] . '</li> <li class="breadcrumb-item" style="color:#0099cc">' . $sinfo['submenu_name'] . '</li>';
            }
        }
        $breadcrumb .= '</ul>';

        //$data['breadcrumb'] = $breadcrumb;
        //$data['selectedcat'] = $selectedcat;
        //print_r($data);exit;	

        return $breadcrumb;
    }

}

