<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/jquery-3.6.0.min.js"></script>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/custom_css/mega.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/custom_css/page_style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css"> 
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/others/logo.png">         
    </head>

    <body>

        <!--Start--Logo-->
        <div class="container">
            <div class="row">
                <div class="col-12 logo">
                    <a href="#"> <img src="<?php echo base_url(); ?>assets/images/others/jblogo.png" class="img-fluid" alt="logo"></a>
                </div>
            </div>
        </div>
        <!--End--Logo-->

    

        <!--Start-Banner-->
        <div class="container-fluid">
            <div class="row">
                <?php
                if (isset($image_details)) {
                    foreach ($image_details as $image_info) {
                        ?>   
                        <img class="img-fluid" id="banner" src="<?php echo base_url(); ?>assets/images/banner/<?php echo $image_info->image_path; ?>" alt="<?php echo $image_info->image_title; ?>">
                        <?php
                    }
                } else {
                    
                }
                ?>   
            </div>
        </div>
        <!--End-Banner-->

        <!--Start-Page-Title-->
        <div class="page_header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 page_title">
                        <!--page details is hidden for iframe purpose-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <?php echo breadcrumb(); ?>
                        <?php if ($this->uri->segment(1) == "home"): ?>
                            <?php echo breadcrumbHomeItem(); ?>
                        <?php endif; ?>

                    </div>
                </div>          
            </div>
        </div> 
        <!--Start-Page-Title-->

        <!--Start-content-text-file-->
        <div class="container mt-2">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-9 content">
                    <?php $this->load->view($main_content); ?> 
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <?php if ($this->uri->segment(1) == "about_us"): ?>
                        <?php $this->load->view('template/aboutus'); ?>
                    <?php endif; ?>

                    <?php if ($this->uri->segment(1) == "products"): ?>
                        <?php $this->load->view('template/product'); ?>
                    <?php endif; ?>

                    <?php if ($this->uri->segment(1) == "services"): ?>
                        <?php $this->load->view('template/service'); ?>
                    <?php endif; ?>

                    <?php if ($this->uri->segment(1) == "international_trade"): ?>
                        <?php $this->load->view('template/ftd'); ?>
                    <?php endif; ?>

                    <?php if ($this->uri->segment(1) == "treasury"): ?>
                        <?php $this->load->view('template/treasuryMgt'); ?>
                    <?php endif; ?>

                    <?php if ($this->uri->segment(1) == "financial_reports"): ?>
                        <?php $this->load->view('template/financialReports'); ?>
                    <?php endif; ?>

                    <?php if ($this->uri->segment(1) == "forms"): ?>
                        <?php $this->load->view('template/formsFiles'); ?>
                    <?php endif; ?>

                    <?php if ($this->uri->segment(1) == "contact_us"): ?>
                        <?php $this->load->view('template/contacts'); ?>
                    <?php endif; ?>

                    <?php if ($this->uri->segment(1) == "home"): ?>
                        <?php $this->load->view('template/aboutus'); ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <!--End-content-text-file-->

     

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/popper.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom_js/menu.js"></script>
    </body>
</html>