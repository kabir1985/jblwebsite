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
        <h3>Foreign Trade</h3>
        <div class="my-scroll">
            <a href="<?php echo base_url();?>international_trade/facilities"> <i class="fa fa-angle-right"></i> Facilities to the Remitters</a>
            <a href="<?php echo base_url();?>international_trade/takaRemittance"> <i class="fa fa-angle-right"></i> Taka Remittance</a>
            <a target="_blank" href="<?php echo base_url();?>international_trade/subsidiaries"> <i class="fa fa-angle-right"></i> Subsidiaries</a>
            <a target="_blank" href="<?php echo base_url();?>international_trade/exchangeHouses"> <i class="fa fa-angle-right"></i> Exchange Houses</a>
            <a target="_blank" href="<?php echo base_url();?>international_trade/forex_trading"> <i class="fa fa-angle-right"></i> Forex Trading</a>
            <a href="<?php echo base_url();?>assets/file/FCAOF.pdf"> <i class="fa fa-angle-right"></i> FCA Opening Form</a>
            <a href="<?php echo base_url();?>international_trade/exchange_rate"> <i class="fa fa-angle-right"></i> Exchange Rate</a>
            <a href="<?php echo base_url();?>international_trade/export_finance"> <i class="fa fa-angle-right"></i> Export Finance</a>
            <a href="<?php echo base_url();?>international_trade/export_performance"> <i class="fa fa-angle-right"></i> Export Performance</a>
            <a href="<?php echo base_url();?>international_trade/import_finance"> <i class="fa fa-angle-right"></i> Import Finance</a>
             <a href="<?php echo base_url();?>international_trade/import_performance"> <i class="fa fa-angle-right"></i> Import Performance</a>                                                                                                  
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
