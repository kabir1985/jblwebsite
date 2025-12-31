<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('breadcrumbHomeItem')) {

    function breadcrumbHomeItem() {?>

        <ol class = "breadcrumb">
        <li class = "breadcrumb-item"><a>Home</a></li>
        <li class = "breadcrumb-item active" aria-current = "page" style="color:#0099cc">About US</li>
        </ol>
   <?php }

}

