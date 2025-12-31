<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Janata Bank Limited</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Janata Bank Administrator Panel - Login">
        <meta name="JBL" content="Admin Panel">
        <!-- The styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mytheme-cerulean.css">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/janata.png" sizes="16x16" type="image/png" />
        <!--<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico"  type="image/x-icon" />-->

        <style type="text/css">
            body {
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>

        <link href='<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/charisma-app.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo base_url(); ?>assets/css/jquery-ui.min.css' rel="stylesheet">
        <link href='<?php echo base_url(); ?>assets/css/fullcalendar.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
        <link href='<?php echo base_url(); ?>assets/css/chosen.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/uniform.default.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/colorbox.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/jquery.cleditor.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/jquery.noty.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/noty_theme_default.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/elfinder.min.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/elfinder.theme.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/opa-icons.css' rel='stylesheet'>
        <link href='<?php echo base_url(); ?>assets/css/uploadify.css' rel='stylesheet'>

        <script type="text/javascript" language="javascript" src= "<?php echo base_url(); ?>assets/js/jquery-1.8.3.js"></script>
        <script type="text/javascript" language="javascript" src= "<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/tiny_mce/tiny_mce.js"></script>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row-fluid">

                <div class="row-fluid">
                    <div class="span12_header center login-header">
                        <?php //$this->load->view('header'); ?>
                        <!--<h2>Welcome to JBL Web Admin Panel</h2>-->
                    </div><!--/span-->
                </div><!--/row-->
                <br/>
                <?php $this->load->view('nav'); ?>

                <div class="row-fluid">

                    <?php $this->load->view($main); ?>
                </div><!--/row-->
            </div><!--/fluid-row-->

        </div><!--/.fluid-container-->

        <!-- external javascript
                ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <!-- jQuery UI -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
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
        <!-- data table plugin -->
        <script src='<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js'></script>

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
