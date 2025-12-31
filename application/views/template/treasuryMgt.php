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
            height: 162px;
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
        <h3>Treasury Management</h3>
        <div class="my-scroll">
            <a target="_blank" href="http://jcilbd.com/"> <i class="fa fa-angle-right"></i> JCIL</a>
            <a href="<?php echo base_url();?>treasury/merchant_banking"> <i class="fa fa-angle-right"></i> Merchant Banking</a>
            <a target="_blank" href="<?php echo base_url();?>treasury/investment_portfolio"> <i class="fa fa-angle-right"></i> Investment Portfolio</a>            
            <a href="<?php echo base_url();?>treasury/govt_securities"> <i class="fa fa-angle-right"></i> Govt. Securities & Investment Window</a>                                                                                         
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
