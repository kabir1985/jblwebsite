<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Home Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>bootstrap_46/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>bootstrap44/css/mega.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>style/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>style/js/popper.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap_46/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>style/js/menu.js"></script>
    </head>

    <body>
        <!--Start--Top Menu-->
        <div class="container-fluid topbar">
            <div class="container">
                <div class="row">
                    <?php $this->load->view('template/topbar'); ?>
                </div>
            </div>
        </div>
        <!--End--Top Menu-->

        <!--Start--Logo-->
        <div class="container">
            <div class="row">
                <div class="col-12 logo">
                    <img src="<?php echo base_url(); ?>assets/images/others/jblogo.png" class="img-fluid" alt="logo">
                </div>
            </div>
        </div>
        <!--End--Logo-->

        <!--Start--Menu Bar-->
        <div class="container-fluid">
            <div class="row">
                <?php $this->load->view('template/menu'); ?>
            </div>
        </div>
        <!--Start--Menu Bar-->

        <!--Start--carousel--&-- Quick Link-->
        <div class="container">
            <div class="row">           
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <?php $this->load->view('template/carousel'); ?>
                    <!--<img src="<?php echo base_url(); ?>assets/images/graphical_line.png" style="width:100%; margin-top: -20px;z-index: -1;" class="img-fluid" alt="Graphical Line">-->
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <?php $this->load->view('template/quicklink'); ?>
                </div>
            </div>
        </div>
        <!--End--carousel--&-- Quick Link-->

        <!--Start--Welcome Section--&-- Notice Board-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <?php $this->load->view('template/welcome'); ?>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <?php $this->load->view('template/notice'); ?>
                </div>
            </div>
        </div>
        <!--Start Products Slider Section-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <?php $this->load->view('template/productslider'); ?>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <?php $this->load->view('template/tender'); ?>
                </div>
            </div>
        </div>
        <!--End Products Slider Section-->

        <!--Start Service Section-->
        <section id="services" class="mb-2">
            <div class="container">
                <div class="services-title">
                    <h4>Our Services</h4>
                    <hr>
                </div>
                <div class="services-detail">
                    <div class="row">
                        <?php $this->load->view('template/services'); ?>
                    </div>
                </div>
            </div>
        </section>
        <!--End Service Section-->

        <!--Start Forms & Others Section-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <?php $this->load->view('template/others'); ?>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <?php $this->load->view('template/videoslider'); ?>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <?php $this->load->view('template/forms'); ?>
                </div>
            </div>
        </div>
        <!--End Forms & Others Section-->

        <!--Start Footer Section-->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <?php $this->load->view('template/footer'); ?>
                </div>
            </div>
            <div class="copyright">
                <p>Copyright © Janata Bank Limited. All Rights Reserved.</p>
            </div>
        </footer>
        <!--End Footer Section-->
        
        <!--js files-->
<!--        <script type="text/javascript" src="<?php echo base_url(); ?>style/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>style/js/popper.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap_46/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>style/js/menu.js"></script>-->
        <!--js files-->
        
    </body>

</html>