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
                height: 300px;
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
            <h3>Contacts</h3>
            <div class="my-scroll">
                <a target="_blank" href="https://pmis.janatabank-bd.com/managementinfo.aspx"> <i class="fa fa-angle-right"></i> Top Management</a>
                <a href="<?php echo base_url(); ?>contact_us/ho"> <i class="fa fa-angle-right"></i> Head Office</a>
                <a href="<?php echo base_url(); ?>contact_us/complaint-cell"> <i class="fa fa-angle-right"></i> Complaint</a>
                <a href="<?php echo base_url(); ?>contact_us/apa"> <i class="fa fa-angle-right"></i> APA</a>
                <a target="_blank" href="https://pmis.janatabank-bd.com/branchinfo.aspx"> <i class="fa fa-angle-right"></i> Branches</a>
                <a target="_blank" href="https://pmis.janatabank-bd.com/divisioninfo.aspx"> <i class="fa fa-angle-right"></i> Divisional Offices</a>
                <a target="_blank" href="https://pmis.janatabank-bd.com/areainfo.aspx"> <i class="fa fa-angle-right"></i> Area Offices</a>
                <a target="_blank" href="https://pmis.janatabank-bd.com/hodepartment.aspx"> <i class="fa fa-angle-right"></i> Head Office Departments</a>
                <a target="_blank" href="https://pmis.janatabank-bd.com/hodivision.aspx"> <i class="fa fa-angle-right"></i> Head Office Divisions</a>
                <a target="_blank" href="https://pmis.janatabank-bd.com/WebStaffCollageInfo.aspx"> <i class="fa fa-angle-right"></i> Staff College</a>
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
