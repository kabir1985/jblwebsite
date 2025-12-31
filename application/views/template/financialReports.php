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
                height: 200px;
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
            <h3>Financial Reports</h3>
            <div class="my-scroll">
                <a href="<?php echo base_url(); ?>financial_reports/annual-reports"> <i class="fa fa-angle-right"></i> Annual Reports</a>
                <a href="<?php echo base_url(); ?>financial_reports/apa"> <i class="fa fa-angle-right"></i> APA</a>
                <a target="_blank" href="<?php echo base_url(); ?>financial_reports/auditors-report"> <i class="fa fa-angle-right"></i> Auditors' Report</a>
                <a target="_blank" href="<?php echo base_url(); ?>financial_reports/credit-rating"> <i class="fa fa-angle-right"></i> Credit Rating</a>
                <a target="_blank" href="<?php echo base_url(); ?>financial_reports/financial-highlights"> <i class="fa fa-angle-right"></i> Financial Highlights</a>
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
