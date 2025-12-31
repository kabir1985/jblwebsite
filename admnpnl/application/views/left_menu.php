<html>
    <head>
        <link href='<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
        <link href="<?php echo base_url(); ?>assets/scrollbar/jquery.mCustomScrollbar.css" type="text/css"  rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/scrollbar/jquery.mCustomScrollbar.min.js"></script>  

        <style>

            .home{
                padding: 5px;
            }

            .home:hover a{
                text-decoration: none;
            }

            .accordion {
                /*background-color: #eee;*/
                color: #02274b;
                cursor: pointer;
                padding: 5px;
                width: 100%;
                border: none;
                text-align: left;
                outline: none;
                font-size: 12px;
                transition: 0.4s;
            }

            .accordion:visited{
                background-color: #0099cc;
                color: #fff;
            }

            .active, .accordion:hover {
                /*background-color: #ccc;*/
            }

            .accordion:after {
                content: '\002B';
                color: #777;
                font-weight: bold;
                float: right;
                margin-left: 5px;
            }

            .active:after {
                content: "\2212";
            }

            .panel {
                padding: 0 18px;
                /*background-color: white;*/
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.2s ease-out;
            }

            i{
                color: #a3171c;
            }

            /*Starts  ScrollBar Style*/

            .my-scroll{
                height: 375px;
                width: 100%;
                overflow-y: hidden;
                /*background-color: #D9ECF3;*/
            }

            .my-scroll a{
                /*                display:block;
                                padding: 5px;
                                color: #444;
                                border-bottom: 1px solid white;
                                text-align: justify;
                                font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;
                                font-size: 14px;
                                text-decoration: none;
                                text-transform: uppercase;*/
            }

            .my-scroll a i{
                /*                font-size: 13px;			
                                color: #0099cc;*/
            }

            .my-scroll a:hover{
                /*                color: #0099CC;
                                text-decoration: none;*/
            }

            /*End ScrollBar Style*/

            /*Responsive style*/

            @media (max-width: 768px){
                .my-scroll{
                    height: 100%;
                }
            }
        </style>

    </head>

    <body>
        <div class="ScrollBar">
            <div class="my-scroll">
                <div class="well nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <?php
                        if ($_SESSION['username'] == 'batayan') {
                            ?>

                            <!--Starts Home-->

                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <!--End Home-->

                            <!--Start Menus-->
                            <button class="accordion">Menu</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/MainMenu/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Main Menu</span>'); ?></li>
                                <li><?php echo anchor("admin/SubMenu/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Sub Menu</span>'); ?></li>
                                <li><?php echo anchor("admin/ChildMenu/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Child Menu</span>'); ?></li>

                            </div>
                            <!--End Menus-->

                            <!--Start Products-->
                            <button class="accordion">Products</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Deposit/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Deposits</span>'); ?></li>
                                <li><?php echo anchor("admin/Advance/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Loan &amp; Advance</span>'); ?></li>
                            </div>                   
                            <!--End Products-->


                            <!--Start Corporate Governance-->
                            <button class="accordion">Corporate Governance</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Bod/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Board of Directors</span>'); ?></li>
                                <li><?php echo anchor("admin/Ec/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Executive Committee</span>'); ?></li>
                                <li><?php echo anchor("admin/Ac/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Audit Committee</span>'); ?></li>
                                <li><?php echo anchor("admin/Rmc/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Risk Mgt Committee</span>'); ?></li>
                                <li><?php echo anchor("admin/Mds/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Managing Director & CEO</span>'); ?></li>
                            </div>
                            <!--End Corporate Governance-->



                            <!--Start Services-->
                            <button class="accordion">Services</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Atm/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> ATM</span>'); ?></li>
                            </div>
                            <!--End Services-->

                            <!--Award starts-->
                            <button class="accordion">Awards</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Awards/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Awards</span>'); ?></li>                   
                            </div>
                            <!--End Award-->

                            <!--Start Quick Links-->
                            <button class="accordion">Quick Links</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Promotion/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Promotion</span>'); ?></li>
                                <li><?php echo anchor("admin/News/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> News</span>'); ?></li>
                                <li><?php echo anchor("admin/Notice/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Notice</span>'); ?></li>
                                <li><?php echo anchor("admin/Tender/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Tender</span>'); ?></li>                  
                            </div>                 
                            <!--End Quick Links-->


                            <!-- Start Gallery-->		
                            <button class="accordion">Gallery</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Photo_gallery/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet">  Album</span>'); ?></li>
                                <li><?php echo anchor("admin/Photo_gallery/uploadImageToAlbum/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet">  Photos</span>'); ?></li>
                                <li><?php echo anchor("admin/Videos/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Video Gellery</span>'); ?></li>
                            </div>

                            <!--End Gallery-->


                            <!--Add Circular-->
                            <button class="accordion">Circulars</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Circular/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Circulars</span>'); ?></li>
                                <li><?php echo anchor("admin/Circular/addCircular", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add Circular</span>'); ?></li>                   
                            </div>
                            <!--End Circular-->


                            <!--FAQ Module-->
                            <!--<li class="nav-header hidden-tablet">FAQ Module</li>-->
                            <!--<li><?php //echo anchor("admin/faq/", '<i class="icon-question-sign"></i><span class="hidden-tablet"> FAQ</span>');                                                                                     ?></li>-->
                            <!--FAQ Module-->


                            <!--Starts Financial Highlights-->
                            <button class="accordion">Financial Reports</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Financial_highlights/", '<i class="fa fa-line-chart"></i><span class="hidden-tablet"> Financial Highlights</span>'); ?></li>
                                <li><?php echo anchor("admin/Annual_reports/", '<i class="fa fa-pie-chart"></i><span class="hidden-tablet"> Annual Reports</span>'); ?></li>                 
                            </div>
                            <!--End Financial Highlights-->


                            <!--Starts Branches -->
                            <button class="accordion">Branches</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Branches/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> JB Branches</span>'); ?></li>
                            </div>
                            <!--End Branches-->


                            <!--Starts Trade Finance-->
                            <button class="accordion">Trade Finance</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Subsidiaries/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Subsidiaries</span>'); ?></li>
                                <li><?php echo anchor("admin/Exchange_houses/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Exchange Houses</span>'); ?></li>                
                                <li><?php echo anchor("admin/Exchange_rates/home/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Exchange Rates</span>'); ?></li>                                          
                                <li><?php echo anchor("admin/Exchange_rates/jblRateCash", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> JBL CASH</span>'); ?></li>                          
                            </div>
                            <!---End Trade Finance-->



                            <!--Starts JBSC(Dhaka) Study Material-->
                            <button class="accordion">JBSC Study Material</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/StudyMaterial_jbsc/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Study Material Home</span>'); ?></li>
                                <li><?php echo anchor("admin/StudyMaterial_jbsc/addStudyMaterial", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add Study Material</span>'); ?></li>
                                <li><?php echo anchor("admin/StudyMaterial_jbsc/downloadMaterial/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Download</span>'); ?></li>               
                            </div>
                            <!--End JBSC(Dhaka) Study Material-->


                            <!--Starts Passport NOC-->
                            <button class="accordion">Passport NOC</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Passport_noc/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Passport NOC Home</span>'); ?></li>
                                <li><?php echo anchor("admin/Passport_noc/addNOC/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add Passport NOC</span>'); ?></li>                  
                                <li><?php echo anchor("admin/Immigration_noc/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Immigration NOC</span>'); ?></li>                                                      
                            </div>
                            <!--End Passport NOC-->


                            <!--Starts Govt HBL/Flat Loan-->
                            <button class="accordion">Govt HBL / Flat Loan</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Govtloan/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> All Loan Applicants</span>'); ?></li>
                                <li><?php echo anchor("admin/Govtloan/govtloanhouse/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> House Loan Applicants</span>'); ?></li>
                                <li><?php echo anchor("admin/Govtloan/govtloanflat/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Flat Loan Applicants</span>'); ?></li>                   
                            </div>
                            <!--End Govt HBL/Flat Loan-->



                            <!--Starts Pages & Files & Images-->
                            <button class="accordion">Pages/Files/Images</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <!--li><?php //echo anchor("admin/manual_type/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Manual Type</span>');                                                      ?></li>
                                <li><?php //echo anchor("admin/manual_category/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Manual Category</span>');                                                      ?></li-->
                                <li><?php echo anchor("admin/Pages/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Pages</span>'); ?></li>
                                <li><?php echo anchor("admin/Files/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Files</span>'); ?></li>
                                <li><?php echo anchor("admin/Images/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Banner / Slide Show</span>'); ?></li>                  
                            </div>
                            <!--End Pages & Files & Images-->

                            <!--Start Modal Module-->
                            <button class="accordion">Modal</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/TopModal/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Top Modal</span>'); ?></li>                                         
                                <li><?php echo anchor("admin/Marquee/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Bottom Modal</span>'); ?></li>
                            </div>
                            <!--End Modal Module-->

                            <!--Start Innovation Module-->
                            <button class="accordion">Innovation Corner</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">                                         
                                <li><?php echo anchor("admin/Innovation/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Innovation Team</span>'); ?></li>
                                <li><?php echo anchor("admin/Innovation/uploadcatfiles", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Upload Innovation Category Files</span>'); ?></li>    
                                <li><?php echo anchor("admin/Innovation/download", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Download Innovative Idea</span>'); ?></li>    
                            </div>

                            <!--End Innovation Module-->


                            <!--Starts--Citizen --Charter Module-->
                            <button class="accordion">Citizen Charter</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Citizen_charter/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Citizen Charter</span>'); ?></li>
                            </div>

                            <!--End--Citizen --Charter Module-->
                            
                            <!-- Green PIN Info-->
                            <button class="accordion">Green PIN Transaction System</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Green_pin/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> View Transaction Profile</span>'); ?></li>
                            </div>
                            <!-- Green PIN Info-->
                            

                            <!--Starts Innovation Module-->
                            <!--button class="accordion">Innovation Corner</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php //echo anchor("admin/innovation/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Innovation Team</span>');                                            ?></li>
                                <li><?php //echo anchor("admin/innovation/create", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add Member</span>');                                            ?></li>
                                <li><?php //echo anchor("admin/innovation/uploadcatfiles", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Upload Innovation Category Files</span>');                                            ?></li>
                            </div-->
                            <!--End Innovation Module-->


                            <!--Starts Users/Administrator-->
                            <button class="accordion">User Settings</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Users / Admins</span>'); ?></li>
                                <li><?php echo anchor("admin/Userlog/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Users Log</span>'); ?></li>
                                <li><?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Logout</span>'); ?></li>                 
                            </div>
                            <!--End Users/Administrators-->


                            <!--Start Department Wise ID-->

                            <?php
                        }

                        /* if ($_SESSION['username'] == 'itop') {
                          ?>
                          <li class="nav-header hidden-tablet">Branch Info.</li>
                          <!--Branch Info. Module-->
                          <li><?php echo anchor("admin/dashboard/index", '<i class="icon-home"></i><span class="hidden-tablet"> Home</span>'); ?></li>
                          <li><?php echo anchor("admin/branch/", '<i class="icon-edit"></i><span class="hidden-tablet"> Branch Info.</span>'); ?></li>
                          <li><?php echo anchor("admin/branch/online/", '<i class="icon-edit"></i><span class="hidden-tablet"> Online Branches</span>'); ?></li>
                          <li><?php echo anchor("admin/dashboard/logout/", '<i class="icon-off"></i><span class="hidden-tablet"> Logout</span>'); ?></li>
                          <!--Branch Info. Module-->
                          <?php
                          } */

                        if ($_SESSION['username'] == 'jbcad') {
                            ?>
                            <!--company affairs department-->  
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">BOD & Committee</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Home</span>'); ?></li>
                                <li><?php echo anchor("admin/Bod/", '<i class="fa fa-angle-right""></i><span class="hidden-tablet"> Board of Directors / MD</span>'); ?></li>
                                <li><?php echo anchor("admin/Ec/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Executive Committee</span>'); ?></li>
                                <li><?php echo anchor("admin/Ac/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Audit Committee</span>'); ?></li>
                                <li><?php echo anchor("admin/Rmc/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Risk Mgt Committee</span>'); ?></li>                       
                                <li><?php echo anchor("admin/Bod/directorsInfo", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Upload File (Director Related Information)</span>'); ?></li>
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> User / Password</span>'); ?></li>
                                <li><?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>
                            </div>
                            <?php
                        }

                        if ($_SESSION['username'] == 'jbhrd') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">Promotion</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Home</span>'); ?></li>
                                <li><?php echo anchor("admin/Promotion/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Promotion</span>'); ?></li>
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-key"></i><span class="hidden-tablet"> User / Password</span>'); ?></li>
                                <li><?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>
                            </div>
                            <?php
                        }

                        //Study Material Module
                        if ($_SESSION['username'] == 'jbsc') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">Study Material</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">                 
                                <li><?php echo anchor("admin/StudyMaterial_jbsc/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Study Material Home</span>'); ?></li>
                                <li><?php echo anchor("admin/StudyMaterial_jbsc/addStudyMaterial/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add Study Material</span>'); ?></li>
                                <li><?php echo anchor("admin/StudyMaterial_jbsc/downloadMaterial/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Download Study Material</span>'); ?></li>
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-key"></i><span class="hidden-tablet"> User / Password</span>'); ?></li>
                                <li><?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>
                            </div>

                            <?php
                        }

                        //News Clipping upload module for PRD

                        if ($_SESSION['username'] == 'jbprd') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">News</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu"> 
                                <li><?php echo anchor("admin/News/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> News</span>'); ?></li>                                                                  
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-key"></i><span class="hidden-tablet"> User / Password</span>'); ?></li>                          
                            </div>
                            <?php
                        }

                        //ATM module for Card Management Department

                        if ($_SESSION['username'] == 'jbcmd') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">ATM</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Atm/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> ATM Home</span>'); ?></li>      
                                <li><?php echo anchor("admin/Atm/addATM", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add ATM</span>'); ?></li>
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-key"></i><span class="hidden-tablet"> User / Password</span>'); ?></li>                          
                            </div>
                            
                            <!-- Green PIN Info-->
                            <button class="accordion">Green PIN Transaction System</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Green_pin/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> View Transaction Profile</span>'); ?></li>
                            </div>
                            <!-- Green PIN Info-->

                            <?php
                        }

                        //Study Material module

                        if ($_SESSION['username'] == 'jblwebuser') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">Study Material</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/StudyMaterial_jbsc/downloadMaterial/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Download Study Material</span>'); ?></li>
                                <li><?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>
                            </div>

                            <?php
                        }

                         //NOC module for specially HRD
                        if ($_SESSION['username'] == 'jblnochr') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">NOC-Passport</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Passport_noc/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Passport NOC Home</span>'); ?></li>
                                <li><?php echo anchor("admin/Passport_noc/addNOC/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add Passport NOC</span>'); ?></li>                                 
                            </div>

                            <!--<button class="accordion">NOC-Immigration</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php //echo anchor("admin/Immigration_noc/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> NOC Home</span>'); ?></li>
                                <li><?php //echo anchor("admin/Immigration_noc/addNOC/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add NOC</span>'); ?></li>                                                       
                            </div>-->

                            <button class="accordion">User / Password</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-key"></i><span class="hidden-tablet"> User / Password</span>'); ?></li>                                                       
                            </div>
                            <?php
                        }
                        
                        //NOC-Immigration Module for HRD
                        
                        if ($_SESSION['username'] == 'jbnocforeignleave') {
                            ?>
                             <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            
                            <button class="accordion">NOC-Foreign Leave</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Immigration_noc/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> NOC Home</span>'); ?></li>
                                <li><?php echo anchor("admin/Immigration_noc/addNOC/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add NOC</span>'); ?></li>                                                       
                            </div>
                            
                            <button class="accordion">User / Password</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-key"></i><span class="hidden-tablet"> User / Password</span>'); ?></li>                                                       
                            </div>
                            <?php
                        }
                        
                        //Passport NOC & Tender Module--for Divisional Offices

                        if ($_SESSION['username'] == 'jblnocrang' || $_SESSION['username'] == 'jblnocraj' || $_SESSION['username'] == 'jblnockhul' || $_SESSION['username'] == 'jblnocbari' || $_SESSION['username'] == 'jblnocfarid' || $_SESSION['username'] == 'jblnocdhknor' || $_SESSION['username'] == 'jblnocdhksouth' || $_SESSION['username'] == 'jblnocmymen' || $_SESSION['username'] == 'jblnocsyl' || $_SESSION['username'] == 'jblnoccom' || $_SESSION['username'] == 'jblnocctg' || $_SESSION['username'] == 'jblnocjbcb' || $_SESSION['username'] == 'jblnoclo' || $_SESSION['username'] == 'jblnocnoa') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">NOC & Tender</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Passport_noc/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Passport NOC Home</span>'); ?></li>
                                <li><?php echo anchor("admin/Passport_noc/addNOC/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add Passport NOC</span>'); ?></li>   
                                <li><?php echo anchor("admin/Tender/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Tender Home</span>'); ?></li>
                                <li><?php echo anchor("admin/Tender/addTender/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add Tender</span>'); ?></li>
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-key"></i><span class="hidden-tablet"> User / Password</span>'); ?></li>                                
                            </div>

                            <?php
                        }

                        //govt. loan module

                        if ($_SESSION['username'] == 'jblrcd1') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">HBL & Flat Loan</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Govtloan/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> All Loan Applicants</span>'); ?></li>
                                <li><?php echo anchor("admin/Govtloan/govtloanhouse/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> House Loan Applicants</span>'); ?></li>
                                <li><?php echo anchor("admin/Govtloan/govtloanflat/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Flat Loan Applicants</span>'); ?></li>
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-key"></i><span class="hidden-tablet"> User / Password</span>'); ?></li>
                            </div>
                            <?php
                        }
                        ?>
                        <!-- govt. loan module-->

                        <!-- prd_approve_executive_id-->
                        <?php
                        if ($_SESSION['username'] == 'jbprd2') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">Approve-News</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu"> 							
                                <li><?php echo anchor("admin/News/news_approval/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> News</span>'); ?></li>
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-key"></i><span class="hidden-tablet"> User / Password</span>'); ?></li>
                            </div>
                            <?php
                        }
                        ?>
                        <!--APA Report Module-->
                        <?php
                        if ($_SESSION['username'] == 'jblmisd_apa') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">APA Report Module</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu"> 
                                <li> <?php echo anchor("admin/Apa_report/view_report", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> APA Report</span>'); ?></li>
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> User/Password</span>'); ?></li>
                            </div>
                            <?php
                        }
                        ?>

                        <!--Treasury dept: exchange rate upload-->
                        <?php
                        if ($_SESSION['username'] == 'jbtd') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">Exchange Rate</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">                           
                                <li><?php echo anchor("admin/Exchange_rates/home/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> All Ex. Rate Files</span>'); ?></li>  
                                <li><?php echo anchor("admin/Exchange_rates/upload/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Upload Ex.Rate File</span>'); ?></li>								
                                <li><?php echo anchor("admin/Exchange_rates/jblRateCash", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> JBL CASH</span>'); ?></li>
                                <li><?php echo anchor("admin/Users/", '<i class="fa fa-key"></i><span class="hidden-tablet"> User / Password</span>'); ?></li>
                            </div>
                            <?php
                        }
                        ?>

                        <!--RPSD Module-->
                        <?php
                        if ($_SESSION['username'] == 'jblrpsd') {
                            ?>
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>
                            <button class="accordion">Innovation Corner</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">                           
                                <li><?php echo anchor("admin/Innovation/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Innovation Team</span>'); ?></li>
                                <li><?php echo anchor("admin/Innovation/addMember", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Add Member</span>'); ?></li>
                                <li><?php echo anchor("admin/Innovation/uploadcatfiles", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Upload Innovation Category Files</span>'); ?></li>    
                                <li><?php echo anchor("admin/Innovation/download", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Download Innovative Idea</span>'); ?></li>    
                            </div>
                            <?php
                        }
                        ?>

                        <!--Starts--Citizen --Charter Module-->
                        <?php
                        if ($_SESSION['username'] == 'bdmd') {
                            ?>	
                            <div class="home">
                                <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                    <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                            </div>							
                            <button class="accordion">Citizen Charter</button>
                            <div class="panel nav nav-tabs nav-stacked main-menu">
                                <li><?php echo anchor("admin/Citizen_charter/", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Citizen Charter</span>'); ?></li>
                            </div>                        
                        <?php }
                        ?>
                        <!--End--Citizen --Charter Module-->
                        
                         <!--Citizen_charter for Branches-->
                        <?php
                        $CI = & get_instance();
                        $CI->load->model('Model_charter');
                        $brcode = $CI->Model_charter->getAllBranchCode();
                        foreach ($brcode as $row) {
                            $id = $row->brcode;
                            //print_r($row);
                            //return $row;
                            //return $row->branch_code;

                            if ($_SESSION['username'] == $row->brcode) {
                                ?>	
                                <div class="home">
                                    <li><?php echo anchor("admin/Dashboard/index", '<i class="fa fa-home"></i><span class="hidden-tablet"> Home</span>'); ?> &nbsp;
                                        <?php echo anchor("admin/Dashboard/logout/", '<i class="fa fa-sign-out"></i><span class="hidden-tablet"> Logout</span>'); ?></li>  
                                </div>							
                                <button class="accordion">Citizen Charter</button>
                                <div class="panel nav nav-tabs nav-stacked main-menu">
                                    <li><?php echo anchor("admin/Citizen_charter/index_branches/$id", '<i class="fa fa-angle-right"></i><span class="hidden-tablet"> Citizen Charter</span>'); ?></li>
                                </div>                        
                            <?php }
                        }
                        ?>
                        <!--Citizen_charter for Branches-->

                    </ul>      
                </div>
            </div>
        </div>

        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function () {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }
        </script>

        <!--Script for ScrollBar-->
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
        <!--Script for ScrollBar-->



    </body>
</html>