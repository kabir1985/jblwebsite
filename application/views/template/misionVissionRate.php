<html>
    <head>
        <style>
            .table-sm  > thead > tr{
                background: #FF1493;
                color: #ffffff;
                font-size: 13px;
                padding: 3px !important;
            }

            .table-bordered  th{
                border: 1px solid #fff;
                font-size: 12px;
                padding: 2px !important;
            }

            .curreny > .table > tbody > tr > td{
                border: 1px solid #fff;
                font-size: 12px;
                padding: 3px !important;
                font-weight: 600;
            }
        </style> 
    </head>
    <body>
        <div class="row">
            <!--chairman message-->
            <div class="col-md-4 col-sm-12">
                <h4 style="background: #0099cc;color:#ffffff;padding:6px;"><center> Vision </center></h4>
                <div  style="float:left; padding:0px 10px 0px 0px;">
                    <img style="background: #eef6f9" src="<?php echo base_url(); ?>assets/images/others/vision.png" class="rounded-circle" width="100"> 
                </div>
                <p id="hiddenChairman" style="text-align:justify;font-size:12px;padding: 1px;">To become the effective largest commercial bank in Bangladesh to support socio-economic 
                    development of the country and to be a leading bank in South Asia.</p>
               <!-- <p id="hiddenChairman"></p>-->
<!--                <span id="toggleChairman" style="display: none">
                    <div id="hiddenChairman">
                        <p style="text-align:justify;font-size:12px;">Being the Chairman of the Board of Directors, I am delighted and proud to have the opportunity to welcome respected shareholders, customers and well-wishers at the 13th Annual General Meeting of Janata Bank Limited. We would like to express our gratitude for your continuous support and cooperation in all our endeavors. At the same time, its my pleasure to present before you the annual report for the year 2019 along with the audited financial statements and the achievements of the bank for your review, opinion and approval.</p>              
                        <p style="text-align:justify;font-size:12px;">Bangabandhu  himself  established  Janata  Bank  by  integrating  the  then  United  Bank  Limited  and  The  Union   Bank   Limited   through   the   issuance   of   Bangladesh  Banks  Order,  1972.  Since  its  inception  with  having  the  glorious  history  of  maintaining  the  account  of  Bangabandhu,  Janata  Bank  Limited  is  one of the leading partners in progress of the nation. The  Janata  Bank  family  proudly  recalls  that  Father  of the Nation Bangabandhu Sheikh Mujibur Rahman had  been  operating  his  account  at  this  bank  since  1961.</p>
                        <p style="text-align:justify;font-size:12px;">In 15 November, 2007 Janata Bank got registered with the Joint Stock of Registrars and restructured it as a public limited company with the name Janata Bank Limited.</p>
                        <a  id="displayChairman" href="javascript:toggleChairman();" style="cursor:pointer;color:#0099cc">CLOSE <i class="fa fa-times-circle-o" aria-hidden="true"></i> </a>
                    </div>
                </span>-->
            </div>
            <!--chairman message-->

            <!--MD Message-->
            <div class="col-md-4 col-sm-12">
                <h4 style="background: #0099cc;color:#ffffff;padding:6px;"><center> Mission </center></h4>
                <div  style="float:left; padding:0px 10px 0px 0px;">
                    <img style="background: #eef6f9" src="<?php echo base_url(); ?>assets/images/others/mission.png" class="rounded-circle" width="100"> 
                </div>

                <p id="hiddenMD" style="text-align:justify;font-size:12px;padding: 1px;">
                    Janata Bank PLC. will be an effective commercial bank by maintaining a stable growth strategy, delivering high quality financial products, providing excellent customer service through an experienced management team and ensuring good corporate governance in every step of banking network.</p>
                                  <!-- <p id="hiddenChairman"></p>-->
                    <!--                <span id="toggleMD" style="display: none">
                                        <div id="hiddenMD">
                                            <p style="text-align:justify;font-size:12px;">I feel honored to welcome you all at the 13th Annual General  Meeting  of  Janata  Bank  Limited.  Today  I  have  got  the  opportunity  to  present  the  business  performance of our beloved Janata Bank before you. As you know, Janata Bank as a trusted partner of the country's    industrial,    trade    and    socio-economic    development  has  been  playing  a  unique  role.  I  do  think   that   it   is   your   unflinching   support   and   inspiration  that  paved  the  way  for  our  continuous  success and progress.</p>             
                                            <p style="text-align:justify;font-size:12px;">At this auspicious moment of Janata Bank, I would like to remember with great deference the dreamer of independence, greatest Bengali of all times, Father of the Nation, Bangabandhu Sheikh Mujibur Rahman, whose undisputed leadership led the country to achieve independent status in the world map. Today, under the capable leadership of Honorable Prime Minister Sheikh Hasina, daughter of Bangabandhu, we are dauntlessly marching forward by tackling all the challenges of becoming a developed wealthy country.</p>
                                            <p style="text-align:justify;font-size:12px;">In 15 November, 2007 Janata Bank got registered with the Joint Stock of Registrars and restructured it as a public limited company with the name Janata Bank Limited.</p>
                    
                                            <a  id="displayMD" href="javascript:toggleMD();" style="cursor:pointer;color:#0099cc">CLOSE <i class="fa fa-times-circle-o" aria-hidden="true"></i> </a>
                                        </div>
                                    </span>-->
            </div>

            <!--MD Message-->

            <!--Exchange Rate Table Starts here-->

            <div class="col-md-4 col-sm-12" style="margin-top: 5px;">          
                <div>
                    <h4 style="color:#FF1493"><img src="<?php echo base_url(); ?>assets/images/others/ex-rate.png" alt="ex-rate-image" width="45"/> Exchange Rate</h4>

                    <small style="text-transform:none;font-size: 13px;color: #0099cc;"> as on 
                        <?php
                        $CI = & get_instance();
                        $CI->load->model('Home_model');
                        $rate = $CI->Home_model->jblRateCash();

                        $count = 0;
                        foreach ($rate as $row) {
                            $count++;
                            if ($count == 4) {
                                if (date('D') == 'Fri' || date('D') == 'Sat') {
                                    $today = date('Y-m-d');
                                    echo date("jS F - Y", strtotime($today));
                                } else {
                                    $today = $row['date'];
                                    echo date("jS F - Y", strtotime($today));
                                }
                            }
                        }
                        ?> 
                        <a target="_blank"
                        <?php
                        $CI = & get_instance();
                        $CI->load->model('InTrade_model');
                        $rateIframe = $CI->InTrade_model->todayRateforIframe();
                        foreach ($rateIframe as $row) {
                            $vw = $row->ex_file_path;
                        }
                        //print_r($rateIframe); die();
                        ?>
                           href="<?php echo base_url(); ?>assets/file/ExchangeRate/<?php echo $vw; ?>"> <i class="fa fa-mouse-pointer" aria-hidden="true"></i>View Full List <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </small> 
                </div>

                <?php
                $CI = & get_instance();
                $CI->load->model('Home_model');
                $rate = $CI->Home_model->jblRateCash();
                if (isset($rate)) {
                    echo '<div class="curreny">';
                    echo '<table class="table table-sm table-bordered"><thead><tr><th>Currency</th><th>Selling Rate</th><th>Buying Rate</th></tr></thead><tr class="alert-danger"><td colspan="3"> JANATA BANK PLC. CASH</td></tr>';
                    foreach ($rate as $row) {
                        echo '<tr class="alert-success"><td>' . $row['currency'] . '</td><td>' . $row['selling'] . '</td><td>' . $row['buying'] . '</td></tr>';
                    }
                    echo '</table>';
                    echo '</div>';
                }
                ?> 

                <div style="text-align:right;padding:3px 12px 8px;">
                    <a target="_blank" id="exrate"
                       href="<?php echo base_url(); ?>international_trade/exchange-rate" style="cursor:pointer; color:#333">View Previous List <i class="fa fa-angle-right" aria-hidden="true"></i>

                    </a>
                </div> 

            </div>
            <!--Exchange Rate Table Ends here-->

        </div> 

        <script type="text/javascript">
            function toggle() {
                var msg = document.getElementById("toggle");
                var welcome = document.getElementById("hidden");
                var text = document.getElementById("display");
                if (msg.style.display === "block") {
                    msg.style.display = "none";
                    welcome.style.display = "block";
                    text.innerHTML = "<span style='color:#0099cc;font-family:Helvetica;'>READ MORE <i class='fa fa-angle-right' aria-hidden='true'></i></span>";
                } else {
                    msg.style.display = "block";
                    welcome.style.display = "none";
                    text.innerHTML = "<span style='color:#003399;font-family:Helvetica;'>ClOSE <i class='fa fa-times-circle-o' aria-hidden='true'></i></span>";
                }
            }

            function toggleChairman() {
                var msg = document.getElementById("toggleChairman");
                var welcome = document.getElementById("hiddenChairman");
                var text = document.getElementById("displayChairman");
                if (msg.style.display === "block") {
                    msg.style.display = "none";
                    welcome.style.display = "block";
                    text.innerHTML = "<span style='color:#0099cc;font-family:Helvetica;'>READ MORE <i class='fa fa-angle-right' aria-hidden='true'></i></span>";
                } else {
                    msg.style.display = "block";
                    welcome.style.display = "none";
                    text.innerHTML = "<span style='color:#0099cc;font-family:Helvetica;'>ClOSE <i class='fa fa-times' aria-hidden='true'></i></span>";
                }
            }

            function toggleMD() {
                var msg = document.getElementById("toggleMD");
                var welcome = document.getElementById("hiddenMD");
                var text = document.getElementById("displayMD");
                if (msg.style.display === "block") {
                    msg.style.display = "none";
                    welcome.style.display = "block";
                    text.innerHTML = "<span style='color:#0099cc;font-family:Helvetica;'>READ MORE <i class='fa fa-angle-right' aria-hidden='true'></i></span>";
                } else {
                    msg.style.display = "block";
                    welcome.style.display = "none";
                    text.innerHTML = "<span style='color:#0099cc;font-family:Helvetica;'>ClOSE <i class='fa fa-times' aria-hidden='true'></i></span>";
                }
            }
        </script>

    </body>
</html>