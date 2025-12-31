<!DOCTYPE html>
<html>
    <head>
    <link href="<?php echo base_url(); ?>assets/scrollbar/jquery.mCustomScrollbar.css" type="text/css"  rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/scrollbar/jquery.mCustomScrollbar.min.js"></script>  
    <link rel="stylesheet" href="<?php echo base_url(); ?>includes/font-awesome/css/font-awesome.css" type="text/css" media="screen" />
    <style type="text/css"> 
        .ScrollBar h3{
            background: #0099cc;
            padding: 5px;
            color: #fff;
            font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;
            font-size: 20px;
            text-align: center;
        }
        .my-scroll{
            height: 400px;
            width:100%;
            overflow-y: hidden;
            background-color: #D9ECF3;
        }
        .my-scroll a{
            display:block;
            padding: 7px;
            color: #666;
            border-bottom: 1px solid white;
            /*text-align: justify;*/
            font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;
            font-size: 14px;
            text-decoration: none;
            /*text-transform: uppercase;*/
        }
        .my-scroll a :hover{
            color: #0099CC;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="ScrollBar">
        <h3>Services</h3>
        <div class="my-scroll">
            <a href="<?php echo base_url();?>about_us/aof"> <i class="fa fa-angle-right"></i> Account Opening Form</a>
            <a href="<?php echo base_url();?>services/atm"> <i class="fa fa-angle-right"></i> ATM Service</a>
            <a target="_blank" href="<?php echo base_url();?>services/acs"> <i class="fa fa-angle-right"></i> Automated Challan System</a>
            <a target="_blank" href="<?php echo base_url();?>services/beftn"> <i class="fa fa-angle-right"></i> BEFTN</a>
            <a target="_blank" href="https://www.eprocure.gov.bd/BranchDetail.jsp?sbankdevelopid=3&name=Janata%20Bank%20Limited"> <i class="fa fa-angle-right"></i> e-GP</a>
            <a target="_blank" href="<?php echo base_url();?>services/jbPinCash"> <i class="fa fa-angle-right"></i> JB PIN Cash</a>
            <a href="<?php echo base_url();?>services/lockerService"> <i class="fa fa-angle-right"></i> Locker Services</a>
            <a href="<?php echo base_url();?>services/nationalSavings"> <i class="fa fa-angle-right"></i> National Savings</a>
            <a href="<?php echo base_url();?>services/onlineBanking"> <i class="fa fa-angle-right"></i> Online Banking</a>
            <a href="<?php echo base_url();?>services/rtgs"> <i class="fa fa-angle-right"></i> RTGS</a>
            <a href="<?php echo base_url();?>services/schedule_charges"> <i class="fa fa-angle-right"></i> Schedule of Charges</a>
             <a href="<?php echo base_url();?>services/smsAlert"> <i class="fa fa-angle-right"></i> SMS Alert Service</a>
            <a href="<?php echo base_url();?>services/swift"> <i class="fa fa-angle-right"></i> SWIFT</a>
            <a href="<?php echo base_url();?>services/utility"> <i class="fa fa-angle-right"></i> Utility Bill Collection</a>                                                                                         
        </div>
    </div>
    <script>
        (function ($) {
            $(window).on("load", function () {
                $(".my-scroll").mCustomScrollbar({
                    theme: "dark-3",
                    autoHideScrollbar: true,
                    autoDraggerLength: false,
                    scrollInertia: 0
                });
            });
        })(jQuery);
    </script>
</body>
</html>
