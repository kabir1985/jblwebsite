<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .marquee {
                position: relative;
                animation: marquee 2s linear infinite;
                text-align:center;
                color:red;
            }
            @keyframes marquee {
                0% {
                    top: 10em
                }
                100% {
                    top: -2em
                }
            }
        </style>
    </head>
    <body>
        <!--start test area-->
            <?php
            $CI = & get_instance();
            $CI->load->model('Home_model');
            $citSrvMarquee = $CI->Home_model->citSrv_marquee();
            $marqueeText = '';
            foreach ($citSrvMarquee as $row) {
                $marqueeText = $marqueeText . $row->services . '(সেবার নাম )' . '  ' . $row->natureOfCharge . '(চার্জের প্রকৃতি)' . '  ' . $row->description . '(বিবরণ)' . '  ' . $row->rate . '(হার)' . ' <br><br> ';
            }
            ?>
            <marquee bgcolor="#D9ECF3" height="93%" class="" scrollamount="4" align="left" behavior="scroll" direction="up" loop="true" class="text" onmouseover="this.stop()"    onmouseout="this.start()" style="font-family: kalpurush !important;">
                <?php echo $marqueeText; ?>
            </marquee>
        <?php
        ?>

        <!--end test area-->
    </body>
</html>