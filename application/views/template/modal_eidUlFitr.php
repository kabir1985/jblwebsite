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

            <h4 style="font-family:kalpurush !important;color:#f33b51;font-size: 25px;">পবিত্র ঈদ-উল-ফিতর, ২০২৪ </h4>
            <div class="row d-flex justify-content-center"> 

                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <h4 style="font-family: kalpurush !important; background: #0099cc;color:#ffffff;padding:2px;font-size: 20px;"><center> চেয়ারম্যান মহোদয়ের বাণী </center></h4>
                
                                    <div  style="float:left; padding:0px 10px 0px 0px;">
                                        <img style="background: #eef6f9" src="<?php echo base_url(); ?>assets/images/bod/Dr._S_._M_._Mahfuzur_Rahman_.jpg" class="rounded-circle" height="90"> 
                                    </div>
                
                                    <p style="font-family: kalpurush !important;text-align: justify;" >”দীর্ঘ ১ মাস সিয়াম সাধনায় অর্জিত পরিশুদ্ধতায় এসেছে পবিত্র ঈদ-উল-ফিতর। পবিত্র ঈদ-উল-ফিতরের আনন্দ সবার মাঝে ছড়িয়ে পড়ুক ও ত্যাগের মহিমায় উদ্ভাসিত হোক ঈদ আনন্দ। ব্যাংকের সম্মানিত গ্রাহক, পৃষ্ঠপোষক ও শুভানুধ্যায়ীদের জানাই আনন্দময় পবিত্র ঈদ-উল-ফিতরের প্রাণঢালা শুভেচ্ছা।” 
                                        <br>
                                    <p style="color:#0099cc; font-family: kalpurush !important";>-ড. এস. এম. মাহফুজুর রহমান, চেয়ারম্যান, পরিচালনা পর্ষদ, জনতা ব্যাংক পিএলসি.</p>
                                    </p>
                                </div>


                <div class="col-sm-12 col-md-4 col-lg-4">
                    <h4 style="font-family: kalpurush !important; background: #0099cc;color:#ffffff;padding:2px;font-size: 20px;"><center> এমডি অ্যান্ড সিইও মহোদয়ের বাণী </center></h4>

                    <div  style="float:left; padding:0px 10px 0px 0px;">
                        <img style="background: #eef6f9" src="<?php echo base_url(); ?>assets/images/bod/Mrmdabduljabber.png" class="rounded-circle" height="90"> 
                    </div>

                    <p style="font-family: kalpurush !important;text-align: justify;"> ”ঈদ মোবারক। আত্মশুদ্ধি ও ত্যাগের মহিমায় উদ্ভাসিত হোক সকলের ঈদ আনন্দ। ব্যাংকের সম্মানিত পরিচালনা পর্ষদের সদস্যবৃন্দ, ব্যাংকের সকল নির্বাহী-কর্মকর্তা-কর্মচারী, শুভানুধ্যায়ী ও সকল গ্রাহককে জানাই পবিত্র ঈদ-উল-ফিতরের আন্তরিক শুভেচ্ছা।”<br><p style="color:#0099cc; font-family: kalpurush !important";> -মোঃ আব্দুল জব্বার, এমডি অ্যান্ড সিইও,  <br>জনতা ব্যাংক পিএলসি.</p></p>
                </div>

                <div id="tclose">X</div>    

            </div>
        </div>

    </body>

</html>