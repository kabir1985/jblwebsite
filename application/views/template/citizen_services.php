<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/jquery-3.6.0.min.js"></script>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/custom_css/mega.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/custom_css/page_style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css"> 
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/others/logo.png">         
    </head>

    <body>


        <!--Start--Logo-->
        <div class="container" style="border: 5px solid #dee2e6!important; border-bottom: none!important;">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <?php $this->load->view('template/citCharterNewProduct'); ?> 
                </div>
                <div class="col-sm-12 col-md-4 col-lg-5">
                    <h1 style="color:#0099cc;">Citizen Charter</h1>
                </div>
                <!--div class="col-sm-12 col-md-4 col-lg-5 logo">
                    <a href="<?php //echo base_url(); ?>"> <img src="<?php echo base_url(); ?>assets/images/others/jblogo.png" class="img-fluid" alt="logo"></a>
                </div-->
                <!--div class="col-sm-12 col-md-4 col-lg-3">
                    <?php //$this->load->view('template/blinkingImgRight'); ?> 
                </div-->
            </div>
        </div>
        <!--End--Logo-->



        <!--Start--Products-->
        <div style="border: 5px solid #dee2e6; border-bottom: none!important;" class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-12">   
                    <?php $this->load->view('template/citizenServices_products'); ?> 
                </div>
            </div>
        </div>
        <!--End--Products--> 



        <!--Start--Chitizen--Services-->
        <div style="border: 5px solid #dee2e6;" class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-8">   
                    <?php $this->load->view($main_content); ?> 
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <?php $this->load->view('template/citSrvMarqUp'); ?> 
                </div>
            </div>
        </div>
        <!--End--Chitizen--Services-->

        <!--Start separator-->
        <div class="container alert-info" style="border: 5px solid #dee2e6;  border-top: none!important;">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-12"> 

                </div>
            </div>
        </div>
        <!--End separator-->

        <div style="border: 5px solid #dee2e6; border-top: none!important;" class="container">
            <div class="row"> 
                <div class="col-sm-12 col-md-4 col-lg-12">   
                    <?php $this->load->view('template/citizenServices_exRate'); ?> 
                </div>
            </div>
        </div>


        <!--Start Footer Section-->
        <!--<footer class="footer">-->
        <div class="container d-flex justify-content-center" style="border: 5px solid #dee2e6; border-top: none!important;">
            <div class="row">
                <img class="img-fluid" style="width: 83vw; height: 16vh;" src="<?php echo base_url(); ?>assets/images/others/graphical_line.png"/>
            </div>
        </div>

        <!--</footer>-->
        <!--End Footer Section-->

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/popper.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom_js/menu.js"></script>
    </body>
</html>