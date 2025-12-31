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
        <h3>About JBL</h3>
        <div class="my-scroll">
            <a href="<?php echo base_url();?>about_us/board_of_directors"> <i class="fa fa-angle-right"></i> Board of Directors</a>
            <a target="_blank" href="https://pmis.janatabank-bd.com/managementinfo.aspx"> <i class="fa fa-angle-right"></i> Top Management</a>
            <a target="_blank" href="https://pmis.janatabank-bd.com/hodivision.aspx"> <i class="fa fa-angle-right"></i> Head Office Divisions</a>
            <a target="_blank" href="https://pmis.janatabank-bd.com/hodepartment.aspx"> <i class="fa fa-angle-right"></i> Head Office Departments</a>
            <a target="_blank" href="https://pmis.janatabank-bd.com/divisioninfo.aspx"> <i class="fa fa-angle-right"></i> Divisional Offices of JBL</a>
            <a href="<?php echo base_url();?>about_us/swift_branches"> <i class="fa fa-angle-right"></i> Swift Branches</a>
            <a href="https://pmis.janatabank-bd.com/WebStaffCollageInfo.aspx"> <i class="fa fa-angle-right"></i> Staff Colleges</a>
            <a href="<?php echo base_url();?>financial_reports/annual_report"> <i class="fa fa-angle-right"></i> Annual Reports</a>
             <a href="<?php echo base_url();?>financial_reports/auditors_report"> <i class="fa fa-angle-right"></i> Auditor's Report</a>
            <a href="<?php echo base_url();?>financial_reports/apa"> <i class="fa fa-angle-right"></i> Annual Performance Agreement</a>
            <a href="<?php echo base_url();?>home/nrb_overview"> <i class="fa fa-angle-right"></i> NRB Branch</a>
            <a href="<?php echo base_url();?>about_us/risk_based_capital"> <i class="fa fa-angle-right"></i> Disclosures (BASEL-III)</a>
            <a href="<?php echo base_url();?>home/aml"> <i class="fa fa-angle-right"></i> Money Laundering</a>                                  
            <a href="<?php echo base_url();?>about_us/manuals"> <i class="fa fa-angle-right"></i> Manuals & Guidelines</a>                   
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
