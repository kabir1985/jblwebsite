<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">	
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="JBL" content="JBL File Upload">

        <style type="text/css">

            .sidebar-nav {
                padding: 9px 0;
            }

            .pull-right a{
                color: #fff;
                font-size: 20px;
                /*margin-top: 20px;*/
            }

            .pull-right a:hover{
                text-decoration: none;
                color: #02274b;
            }

            .footer img{
                width: 100%;
            }

        </style>
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mytheme-cerulean.css">
        <link href='<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css' rel='stylesheet'>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link href='<?php echo base_url(); ?>assets/css/charisma-app.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo base_url(); ?>assets/css/jquery-ui.min.css' rel="stylesheet">
        <link href='<?php echo base_url(); ?>assets/css/jquery-ui-timepicker-addon.min.css' rel="stylesheet">
        <link href='<?php echo base_url(); ?>assets/css/fullcalendar.min.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/fullcalendar.print.min.css' rel='stylesheet'  media='print'>
        <link href='<?php echo base_url(); ?>assets/css/chosen.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/uniform.default.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/colorbox.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/jquery.cleditor.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/jquery.noty.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/noty_theme_default.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/elfinder.min.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/elfinder.theme.min.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/opa-icons.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/uploadify.css' rel='stylesheet'>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png">


        <script type="text/javascript" language="javascript" src= "<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" language="javascript" src= "<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript" language="javascript" src= "<?php echo base_url(); ?>assets/js/jquery-ui-timepicker-addon.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tiny_mce.js"></script>

        <script type="text/javascript">
            $(function () {
                $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});
                $("#circular_description_tbl").css({width: '300px'});
            });
        </script>
        <?php echo $tinymce; ?>
    </head>

    <body>
        <!-- topbar starts -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="pull-right">
                        <?php //echo anchor("admin/dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?> 
                        <?php echo anchor("admin/dashboard/", '<i class="fa fa-refresh"></i><span class="hidden-tablet"> Refresh</span>'); ?>                    
                    </div>
                    <a class="brand" href="<?php echo base_url(); ?>index.php/admin/dashboard"> 
                        <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo-white.png"/></a>                     
                    <div class="top-nav nav-collapse">
                    </div>
                </div>

                <?php
                //$this->load->view('admin_header'); Blocked now.
                ?>
            </div>

        </div>
        <!-- topbar ends -->
        <div class="container-fluid">
            <div class="row-fluid">

                <!-- left menu starts -->
                <div class="span2 main-menu-span">
                    <?php $this->load->view('left_menu'); ?>  
                </div>
                <!-- left menu ends -->
                <div id="content" class="span10">
                    <!-- content starts -->
                    <div class="row-fluid">
                        <div class="box span12">

                            <div class="box-header well">
                                <!--                                <h2>
                                <?php
                                //echo $title;
                                ?>                                                               </h2>-->
                            </div>
                            <div class="box-content">
                                <?php $this->load->view($main); ?>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <!-- content ends -->
                </div>
            </div>
            <div class="footer">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/graphical_line.png">
            </div>

        </div>

        <!-- external javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <!-- jQuery -->
        <!--<script src="<?php echo base_url(); ?>includes/admin_js/js/jquery-1.7.2.min.js"></script>-->
        <!-- jQuery UI -->
        <!--<script src="<?php echo base_url(); ?>includes/admin_js/js/jquery-ui-1.8.21.custom.min.js"></script>-->
        <!-- transition / effect library -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-transition.js"></script>
        <!-- alert enhancer library -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-alert.js"></script>
        <!-- modal / dialog library -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-modal.js"></script>
        <!-- custom dropdown library -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-dropdown.js"></script>
        <!-- scrolspy library -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-scrollspy.js"></script>
        <!-- library for creating tabs -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-tab.js"></script>
        <!-- library for advanced tooltip -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-tooltip.js"></script>
        <!-- popover effect library -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-popover.js"></script>
        <!-- button enhancer library -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-button.js"></script>
        <!-- accordion library (optional, not used in demo) -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-collapse.js"></script>
        <!-- carousel slideshow library (optional, not used in demo) -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-carousel.js"></script>
        <!-- autocomplete library -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-typeahead.js"></script>
        <!-- tour library -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-tour.js"></script>
        <!-- library for cookie management -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>
        <!-- calander plugin -->
        <script src='<?php echo base_url(); ?>assets/js/fullcalendar.min.js'></script>     
        <!-- chart libraries start -->
        <script src="<?php echo base_url(); ?>assets/js/excanvas.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.pie.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.stack.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.resize.min.js"></script>
        <!-- chart libraries end -->

        <!-- select or dropdown enhancer -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.chosen.min.js"></script>
        <!-- checkbox, radio, and file input styler -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.uniform.min.js"></script>
        <!-- plugin for gallery image view -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.colorbox.min.js"></script>
        <!-- rich text editor library -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.cleditor.min.js"></script>
        <!-- notification plugin -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.noty.js"></script>
        <!-- file manager library -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.elfinder.min.js"></script>
        <!-- star rating plugin -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.raty.min.js"></script>
        <!-- for iOS style toggle switch -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.iphone.toggle.js"></script>
        <!-- autogrowing textarea plugin -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.autogrow-textarea.js"></script>
        <!-- multiple file upload plugin -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.uploadify-3.1.min.js"></script>
        <!-- history.js for cross-browser state change on ajax -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.history.js"></script>
        <!-- application script for Charisma demo -->
        <script src="<?php echo base_url(); ?>assets/js/charisma.js"></script>


    </body>
</html>
