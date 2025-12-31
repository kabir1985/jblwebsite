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

            <h4 style="font-family:kalpurush !important;color:#f33b51;font-size: 25px;">২৬শে মার্চ, মহান স্বাধীনতা ও জাতীয়  দিবস </h4>
            <div class="row d-flex justify-content-center"> 

                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <h4 style="font-family: kalpurush !important; background: #0099cc;color:#ffffff;padding:2px;font-size: 20px;"><center> চেয়ারম্যান মহোদয়ের বাণী </center></h4>
                
                                    <div  style="float:left; padding:0px 10px 0px 0px;">
                                        <img style="background: #eef6f9" src="<?php echo base_url(); ?>assets/images/bod/Dr._S_._M_._Mahfuzur_Rahman_.jpg" class="rounded-circle" height="90"> 
                                    </div>
                
                                    <p style="font-family: kalpurush !important;text-align: justify;" >”২৬শে মার্চ মহান স্বাধীনতা দিবস ও জাতীয় দিবস। বাঙালি জাতির এক অনন্য গৌরবোজ্জ্বল দিন। মহান স্বাধীনতা দিবসে সর্বকালের সর্বশ্রেষ্ঠ বাঙালি, জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানসহ সকল শহীদদের প্রতি গভীর শ্রদ্ধা ও তাঁদের রুহের মাগফিরাত কামনা করছি। বঙ্গবন্ধুর স্বপ্নের সোনার বাংলা গড়ার পথে সমস্ত বাধা ডিঙিয়ে এগিয়ে যাবে বাংলাদেশ, এটাই হোক এবারের স্বাধীনতা দিবসের দৃপ্ত অঙ্গীকার।” 
                                        <br>
                                    <p style="color:#0099cc; font-family: kalpurush !important";>-ড. এস. এম. মাহফুজুর রহমান, চেয়ারম্যান, পরিচালনা পর্ষদ, জনতা ব্যাংক পিএলসি.</p>
                                    </p>
                                </div>


                <div class="col-sm-12 col-md-4 col-lg-4">
                    <h4 style="font-family: kalpurush !important; background: #0099cc;color:#ffffff;padding:2px;font-size: 20px;"><center> এমডি অ্যান্ড সিইও মহোদয়ের বাণী </center></h4>

                    <div  style="float:left; padding:0px 10px 0px 0px;">
                        <img style="background: #eef6f9" src="<?php echo base_url(); ?>assets/images/bod/Mrmdabduljabber.png" class="rounded-circle" height="90"> 
                    </div>

                    <p style="font-family: kalpurush !important;text-align: justify;"> ”২৬শে মার্চ, মহান স্বাধীনতা ও জাতীয় দিবসে কৃতজ্ঞচিত্তে স্মরণ করছি সর্বকালের সর্বশ্রেষ্ঠ বাঙালী স্বাধীনতার মহান রুপকার জাতির জনক বঙ্গবন্ধু শেখ মুজিবুর রহমানসহ আত্মত‌্যাগী লাখো মুক্তিযোদ্ধাকে যাদের আত্মত‌্যাগে আমরা পেয়েছি একটি স্বাধীন সার্বভৌম রাষ্ট্র। এই শুভক্ষণে জনতা ব‌্যাংক পিএলসির সম্মানিত পরিচালনা পর্ষদের সকল সদস‌্য, কর্মচারী, গ্রাহক ও শুভানুধ‌্যায়ীদের জানাই আন্তরিক শুভেচ্ছা। স্বাধীনতার দীপ্ত চেতনায় বলীয়ান হয়ে জনতা ব‌্যাংক পিএলসিকে এগিয়ে নেওয়ার পাশাপাশি দেশ গঠনে কার্যকর ভুমিকা রাখার প্রত‌্যয় পুনঃব‌্যক্ত করছি।”<br><p style="color:#0099cc; font-family: kalpurush !important";> -মোঃ আব্দুল জব্বার, এমডি অ্যান্ড সিইও,  <br>জনতা ব্যাংক পিএলসি.</p></p>
                </div>

                <div id="tclose">X</div>    

            </div>
        </div>

    </body>

</html>