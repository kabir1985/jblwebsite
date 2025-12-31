<html>
    <head>
        <style>
            #thover{
                position:fixed;
                /*background:#000;*/
                width:100%;
                height:100%;
                /*opacity: .6*/
            }

            #tpopup{
                position:absolute;
                /*width:100%;*/
                height:auto;
                background: #D9ECF3;
                left:15%;
                right:15%;
                top:20%;
                border-radius:5px;
                padding:15px 0;
                /*margin-left:-320px;  width/2 + padding-left;*/
                /*margin-top:-150px;  height/2 + padding-top */
                text-align:center;
                /*box-shadow:0 0 10px 0 #000;*/
                z-index: 1000;
                display: block;
                /*margin-left: 50%;*/
                /* margin-right: 50%;*/
                /*width: 55%;*/
            }
            #tpopup img{
                /*width: 55%;*/
            }

            #tclose{
                position:absolute;
                background:black;
                color:white;
                right:50%;
                left: 95%;
                top: 10px;
                border-radius:50%;
                width:30px;
                height:30px;
                line-height:30px;
                text-align:center;
                font-size:8px;
                font-weight:bold;
                font-family:'Arial Black', Arial, sans-serif;
                cursor:pointer;
                box-shadow:0 0 10px 0 #000;
            }

            @media (max-width: 768px) {
                #tpopup{
                    top: 40% !important;
                }

                #tclose{
                    left: 85%;
                    top: 30px;
                }
            }
        </style>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/jquery-3.6.0.min.js"></script>   		  

        <script>
            $(document).ready(function () {

                $("#thover").click(function () {
                    $(this).fadeOut();
                    $("#tpopup").fadeOut();
                });


                $("#tclose").click(function () {
                    $("#thover").fadeOut();
                    $("#tpopup").fadeOut();
                });

            });
        </script>

    </head>
    <body>


        <div id="tpopup">
		
		<?php
            foreach ($mdl as $row) {               
                ?>

            <h4 style="font-family:kalpurush !important;color:#f33b51;font-size: 25px; font-weight:bold"><?php echo $row->title; ?></h4>
            <div class="row d-flex justify-content-center"> 

                <!--for chairman-->
                
                <div style="border-collapse:collapse; border:1px solid; border-radius:7px; border-color:#0C6;" class="col-sm-12 col-md-4 col-lg-4">
                                    <h4 style="font-family: kalpurush !important; padding:2px;font-size: 20px; color:#AD5A5A; font-weight:bold;"><center> চেয়ারম্যান মহোদয়ের বাণী </center></h4>
                
                                    <div  style="float:left; padding:0px 10px 0px 0px;">
                                        <img style="background: #eef6f9" src="<?php echo base_url(); ?>assets/images/bod/Mrmfazlurrahman.jpg" class="rounded-circle" height="90"> 
                                    </div>
                
                                    <p style="font-family: kalpurush !important;text-align: justify;" >"<?php echo $row->chairman_msg; ?>" 
                                        <br>
                                    <p style="color:#AD5A5A; font-family: kalpurush !important";>-জনাব মুহঃ ফজলুর রহমান, চেয়ারম্যান, পরিচালনা পর্ষদ, জনতা ব্যাংক পিএলসি.</p>
                                    </p>
                                </div>
                                
<!--chairman ends -->
<div>&nbsp;&nbsp;&nbsp;</div>
                <!--for md-->
                
                <div style=" border-collapse:collapse; border:1px solid; border-radius:7px; border-color:#0C6;" class="col-sm-12 col-md-4 col-lg-4">
                    <h4 style="font-family: kalpurush !important; padding:2px;font-size: 20px; color:#007CB9; font-weight:bold;"><center> এমডি মহোদয়ের বাণী </center></h4>

                    <div  style="float:left; padding:0px 10px 0px 0px;">
                        <img style="background: #eef6f9" src="<?php echo base_url(); ?>assets/images/bod/Mrmdmaziburrahman.png" class="rounded-circle" height="90"> 
                    </div>

                    <p style="font-family: kalpurush !important;text-align: justify;"> "<?php echo $row->md_msg; ?>"<br><p style="color:#007CB9; font-family: kalpurush !important";> -জনাব মোঃ মজিবর রহমান, এমডি,<br>জনতা ব্যাংক পিএলসি.</p></p>
                </div>
                
                <!--md ends -->

                <div id="tclose">X</div>    

            </div>
			 <?php } ?>
        </div>

    </body>

</html>