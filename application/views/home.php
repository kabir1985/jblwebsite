<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/custom_css/mega.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/animation/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom_js/menu.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/others/logo.png">
</head>

<body>


    <!--Start--Logo--Other--Logo-->
    <div class="container">
        <?php $this->load->view('template/logo_section'); ?>
    </div>
    <!--End--Logo--Other--Logo-->

    <!--Start--Menu Bar-->
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('template/menu'); ?>
        </div>
    </div>
    <!--Start--Menu Bar-->



    <!--Start--carousel--&-- Quick Link-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-md-3 col-lg-3">
                <?php $this->load->view('template/chairman_message'); ?>
            </div>

            <div class="col-sm-12 col-md-9 col-lg-9">
                <?php $this->load->view('template/carousel'); ?>
            </div>

        </div>
    </div>
    <!--End--carousel--&-- Quick Link-->

    <!--Start Box Government Services-->
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <?php $this->load->view('template/md_message'); ?>
                <?php $this->load->view('template/quicklink'); ?>
                <?php $this->load->view('template/notice_board'); ?>
                <?php $this->load->view('template/tender'); ?>

                <?php $this->load->view('template/visitor_counter', [
                    'total_visitors' => $total_visitors,
                    'today_visitors' => $today_visitors
                ]); ?>

                 <?php $this->load->view('template/exchange_rate'); ?>
                   
            </div>

            <div class="col-sm-12 col-md-9 col-lg-9">
                <?php $this->load->view('template/services_box'); ?>
                <?php $this->load->view('template/jbl_services'); ?>
                <?php $this->load->view('template/productslider'); ?>
                <?php $this->load->view('template/youtubeFacebook'); ?>
                <?php $this->load->view('template/newssection'); ?>
            </div>
        </div>

    </div>
    <!--End Box Services-->





    <!--Start--Welcome Section--&-- Notice Board-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-lg-9">
                <?php //$this->load->view('template/welcome'); ?>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <?php //$this->load->view('template/notice'); ?>
            </div>
        </div>
    </div>

    <!--Start Chairman-MD message-Exchange rate & Tender-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-lg-9">
                <?php //$this->load->view('template/chair_md_msg_exrate'); ?>
                <?php //$this->load->view('template/misionVissionRate'); ?>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <?php // $this->load->view('template/tender'); ?>
            </div>
        </div>

    </div>
    <!--End Chairman-MD message-Exchange rate & Tender-->



    <!--Start Products Slider Section-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-lg-12">
                <?php //$this->load->view('template/productslider'); ?>
            </div>
            <!--<div class="col-sm-12 col-md-3 col-lg-3">
                <?php //$this->load->view('template/tender'); ?>
                 </div>-->
        </div>
    </div>
    <!--End Products Slider Section-->

    <!--Start Service Section-->
    <!-- <section id="services" class="mb-2 wow fadeInUp" data-wow-duration="0.3">
        <div class="container">
            <div class="services-title">
                <h4>Our Services</h4>
                <hr>
            </div>
            <div class="services-detail">
                <div class="row"> -->
    <?php //$this->load->view('template/services'); ?>
    <!-- </div>
            </div>
        </div>
    </section> -->
    <!--End Service Section-->


    <!--Start Social Media Section-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?php //$this->load->view('template/iframe_facebook'); ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?php //$this->load->view('template/iframe_youtube'); ?>
            </div>
        </div>
    </div>
    <!--End Social Media Section-->


    <!--Start Forms & Others Section-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?php //$this->load->view('template/others'); ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?php //$this->load->view('template/apps'); ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?php //$this->load->view('template/convenientLinks'); ?>
            </div>
        </div>
    </div>
    <!--End Forms & Others Section-->

    <!--Start Footer Section-->
    <footer class="footer container-fluid">
        <div class="container">
            <div class="row">
                <?php $this->load->view('template/footer'); ?>
            </div>
        </div>
        <div class="copyright row justify-content-center">
            <p>Copyright © Janata Bank PLC. All Rights Reserved.</p>
        </div>
    </footer>
    <!--End Footer Section-->

    <!--start back to top-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?php $this->load->view('template/back_to_top'); ?>
            </div>
        </div>
    </div>
    <!--end back to top-->

    <!--start bottom modal-marquee-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?php $this->load->view('template/modal_bottom'); ?>
            </div>
        </div>
    </div>
    <!--end bottom modal-marquee-->

    <!--js files-->
    <!--        <script type="text/javascript" src="<?php echo base_url(); ?>style/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>style/js/popper.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap_46/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>style/js/menu.js"></script>-->
    <!--js files-->
    <script src="<?php echo base_url(); ?>assets/animation/js/wow.min.js"></script>
    <script>
        var wow = new WOW({
            mobile: false
        });
        wow.init();
    </script>
</body>

</html>