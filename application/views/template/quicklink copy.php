<!DOCTYPE html>
<html>
    <head>
        <link href="<?php echo base_url(); ?>assets/scrollbar/jquery.mCustomScrollbar.css" type="text/css"  rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/scrollbar/jquery.mCustomScrollbar.min.js"></script>  
        <link rel="stylesheet" href="<?php echo base_url(); ?>includes/font-awesome/css/font-awesome.css" type="text/css" media="screen" />
        <style type="text/css">

            .my-scroll{
                height: 420px;
                width: 100%;
                overflow-y: hidden;
                background-color: #D9ECF3;
            }

            .my-scroll a{
                display:block;
                padding: 5px;
                color: #444;
                border-bottom: 1px solid white;
                /*text-align: justify;*/
                font-family: kalpurush !important;
                font-size: 14px;
                text-decoration: none;
                text-transform: uppercase;
            }

            /*.my-scroll a p::first-letter{
                font-size: 100%;
                text-transform: lowercase;
            } */


            .my-scroll a p{
                text-decoration: underline dotted #0099cc;
            }

            .my-scroll a i{
                font-size: 13px;
                color: #0099cc;
            }

            .my-scroll a:hover{
                color: #0099CC;
                text-decoration: none;
            }




        </style>
    </head>
    <body>
        <a href="#"><img src="<?php echo base_url(); ?>assets/images/quicklink/quick_link.png" width="100%" /></a>
        <div class="ScrollBar">
            <div class="my-scroll">		
		         <!--a style="color: #f33b51;font-size: medium;font-family:kalpurush!important;" target="_blank" href="<?php echo base_url(); ?>assets/file/home/Re-Advertisement_CITO_Final.pdf"> 
                    <i class="fa fa-briefcase" aria-hidden="true"></i> সিআইটিও পদে পুনঃনিয়োগ বিজ্ঞপ্তি </a-->		 
          			
                <a target="_blank" href="<?php echo base_url(); ?>products/govt_loan"> 
                    <i class="fa fa-file-text-o" aria-hidden="true"></i> সরকারি কর্মচারীদের জন্য গৃহ নির্মাণ/ফ্ল্যাট ঋণের অনলাইনে আবেদন </a>	

                <a target="_blank" href="<?php echo base_url(); ?>assets/file/home/bank_note_security_feature_poster.pdf"> 
                    <i class="fa fa-money" aria-hidden="true"></i>  আসল ১০০, ২০০, ৫০০,১০০০ টাকা নোটের নিরাপত্তা বৈশিষ্ট্য সম্বলিত পোস্টার </a>	


                <a href="#">  
                    <p class="mb-0" style="color: #f33b51;"><i class="fa fa-address-book-o" aria-hidden="true"></i> <span style="text-transform: lowercase;">e</span>Janata Help Desk</p>
                    <span style=""><i class="fa fa-mobile-phone" aria-hidden="true"></i> 01313080101</span><br>
                    <span style=""><i class="fa fa-mobile-phone" aria-hidden="true"></i> 01313080102</span><br>
                    <span style=""><i class="fa fa-mobile-phone" aria-hidden="true"></i> 01313080195</span><br>
                    <span style=""><i class="fa fa-mobile-phone" aria-hidden="true"></i> 01313080196</span><br>
                    <span style="text-transform: lowercase; font-size: 89%;"><i class="fa fa-envelope" aria-hidden="true"></i> helpdesk.ejanata@janatabank-bd.com</span>
                </a>
                
                
                <!--Web Based JB Green PIN -->            
					<!--<style>
                    .button {
                    background-color: #04AA6D; /* Green */
                    border: none;
                    color: white;
                    padding: 10px 14px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 14px;
                    margin: 2px 2px;
                    cursor: pointer;
                    }
                    </style>-->
					<!--<a href="<?php //echo base_url(); ?>services/greenPin"><button class="button">GREEN PIN SERVICE</button></a>-->
                     <a href="<?php echo base_url(); ?>services/greenPin"> 
                    <img class="ml-0" src="<?php echo base_url(); ?>assets/images/quicklink/green_pin.png"></a>
                    <!--Web Based JB Green PIN -->


                <a href="<?php echo base_url(); ?>services/jbPinCash"> 
                    <img class="ml-0" src="<?php echo base_url(); ?>assets/images/quicklink/PIN.gif" height="" width=""></a>
                
                <!--<a target="_blank" href="<?php echo base_url(); ?>home/news"> <i class="fa fa-newspaper-o" aria-hidden="true"></i>  দৈনিক পত্রিকাসমূহের ক্লিপিং নিউজ </a>-->
                
				<a target="_blank" href="<?php echo base_url(); ?>home/financial_literacy"> <i class="fa fa-university" aria-hidden="true"></i> Financial Literacy</a>

                <a target="_blank" href="<?php echo base_url(); ?>home/training_plan"><i class="fa fa-user-circle" aria-hidden="true"></i> Annual Training Plan of JBSC</a>

                <a target="_blank" href="<?php echo base_url(); ?>services/aof"><i class="fa fa-sticky-note" aria-hidden="true"></i> Account Opening Form</a>

                <a target="_blank" href="<?php echo base_url(); ?>home/promotion"><i class="fa fa-briefcase" aria-hidden="true"></i> Employee Promotion</a>

                <a target="_blank" href="http://114.130.43.51/"><i class="fa fa-gavel" aria-hidden="true"></i> e-Tender (BB Link)</a>

                <a target="_blank" href="<?php echo base_url(); ?>home/nrb_overview"><i class="fa fa-users" aria-hidden="true"></i> NRB (Non Resident Bangladeshi) Branch</a>

                <a target="_blank" href="<?php echo base_url(); ?>home/aml"><i class="fa fa-money" aria-hidden="true"></i> Money Laundering And Terrorist Financing Prevention</a>

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
