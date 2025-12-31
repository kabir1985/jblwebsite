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
            <h3>JB Products</h3>
            <div class="my-scroll">
                <a href="<?php echo base_url(); ?>products/current_deposit"> <i class="fa fa-angle-right"></i> Current Deposit</a>
                <a href="<?php echo base_url(); ?>products/savings_deposit"> <i class="fa fa-angle-right"></i> Savings Deposit</a>
                <a href="<?php echo base_url(); ?>products/special_notice_deposit"> <i class="fa fa-angle-right"></i> Special Notice Deposit</a>  
                <a href="<?php echo base_url(); ?>products/term_deposit"> <i class="fa fa-angle-right"></i> Special Notice Deposit</a>
                <a href="<?php echo base_url(); ?>products/scheme_deposit"> <i class="fa fa-angle-right"></i> Scheme Deposit</a>
                <a href="<?php echo base_url(); ?>products/credit_card"> <i class="fa fa-angle-right"></i> Credit Card</a>    
                <a href="<?php echo base_url(); ?>products/agriculture_loans"> <i class="fa fa-angle-right"></i> Agriculture Loan</a>
                <a href="<?php echo base_url(); ?>products/govt_loan"> <i class="fa fa-angle-right"></i> House Building/Flat LoanL</a>
                <a href="<?php echo base_url(); ?>products/rural_credit"> <i class="fa fa-angle-right"></i> Rural Credit</a>
                <a href="<?php echo base_url(); ?>products/consumer_financing"> <i class="fa fa-angle-right"></i> Consumer Financing</a>
                <a href="<?php echo base_url(); ?>products/green_financing"> <i class="fa fa-angle-right"></i> Green Financing</a>
                <a href="<?php echo base_url(); ?>products/real_estate_loan"> <i class="fa fa-angle-right"></i> Real State Loan</a>
                <a href="<?php echo base_url(); ?>products/education_loan"> <i class="fa fa-angle-right"></i> Education Loan</a>
                <a href="<?php echo base_url(); ?>products/health_service"> <i class="fa fa-angle-right"></i> Janatacare-Health Services</a>
                <a href="<?php echo base_url(); ?>products/pensioner_loan"> <i class="fa fa-angle-right"></i> Janatasupport-Pensioner Loan</a>                      
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
