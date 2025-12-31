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
                font-size: 15px;
                padding: 2px !important;
            }

            .tbl > .table > tbody > tr > td{
                border: 1px solid #fff;
                font-size: 14px;
                padding: 3px !important;
                /*font-weight: 600;*/
            }
            
            @media (max-width: 768px){
                .mdImg{
                    display: flex;
                }
            }
            
        </style> 
    </head>
    <body>

        <?php
        $CI = & get_instance();
        $CI->load->model('About_model');
        $bod = $this->About_model->board_of_directors();
        foreach ($bod as $row) {
            if ($row['bod_designation'] === 'Chairman') {
                $chairName = $row['bod_name'];
                $chairImg = $row['bod_image'];
            }

            if ($row['bod_designation'] === 'MD & CEO') {
                $mdName = $row['bod_name'];
                $mdImg = $row['bod_image'];
            }
        }
        ?>

        <div class="row">
            <!--MD Message-->
            <div class="col-md-4 col-sm-12 col-lg-12">
                <div class="mdImg" style="float:left; padding:0px 10px 0px 0px;">
                    <img style="background: #eef6f9" src="<?php echo base_url(); ?>assets/images/bod/<?php echo $mdImg; ?>" class="rounded-circle img-fluid" width="225"> 
                </div>
                <p style="margin-bottom: 0px;font-size: 18px;font-weight:bold;text-align: left;"><a href="#" style="text-decoration:none; text-transform:capitalize;"><?php echo 'Md. Abdul Jabber'; ?></a></p>
                <span style="color:#000000;font-size: 16px; font-weight: bold;text-align: left;">Managing Director & CEO</span>
                <br><br>

                <p id="hiddenMD" style="text-align:justify;font-size:13px; ">
                    A visionary banker and a dynamic leader Md Abdul Jabber has been currently leading
                    Janata Bank PLC, the second largest state owned commercial bank of Bangladesh ,as the
                    Managing Director and CEO since May 03,2023 on contractual basis being appointed by
                    the Government of Bangladesh. Prior to assuming this new challenge he was with
                    Bangladesh Krishi Bank, the largest specialized commercial bank fostering the
                    agricultural needs of the country ,as the Managing Director and there he continued till
                    02.05.2023 to end his normal service age. Mr Jabber has always been a team person and
                    believes in developing human capital. Employee first and the right man in right place is
                    the bracing motto of his leadership.

                    <br><br>
                    <span style="color: #0099cc;font-weight: bold;">Early life and Education</span><br>
                    Hailed from Kamarali village of Kolaroa Upazila under Sathkhira District he was born to
                    Mr Md Amin Uddin Morol and Mrs Tara Banu on 03 May,1964. After completing SSC
                    from Kamar Ali High School, Satkhira in 1979 he passed HSC exam from B L College
                    ,Khulna in 1981. Thereafter he got admitted to Dhaka University and completed both
                    BSS (hons:) and MSS degrees in Sociology in 1984 & 1985 respectively.

                    <br><br>
                    <span style="color: #0099cc;font-weight: bold;">Career</span><br>
                    Started as a Management Trainee (Senior Officer) in 1988 with Janata Bank Limited Mr
                    Jabber climbed to the apex position of this institution treading every steps of his career
                    successfully and to the satisfaction of all concerned. During his journey from Senior
                    Officer to Deputy Managing Director before being appointed in the current role ie;MD
                    &CEO he was entrusted with varied responsibilities as the departmental head of viz;
                    credit/foreign trade/ treasury/ administration/ law/ audit/ ICT departments at head
                    office level. He had also played due role as the head of different branches, areas and
                    divisions of the same bank located around the country. His definite touch in core fields
                    of banking especially in Retail Credit & Project Finance have a longer impact in
                    industrialization and socio economic development of the country.....


                    <a  id="displayMD" href="javascript:toggleMD();" style="cursor:pointer;">READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i> </a></p>

                    <span id="toggleMD" style="display: none">
                    <div id="hiddenMD">
                        <p style="text-align:justify;font-size:13px;">                            
                            A visionary banker and a dynamic leader Md Abdul Jabber has been currently leading
                            Janata Bank PLC, the second largest state owned commercial bank of Bangladesh ,as the
                            Managing Director and CEO since May 03,2023 on contractual basis being appointed by
                            the Government of Bangladesh. Prior to assuming this new challenge he was with
                            Bangladesh Krishi Bank, the largest specialized commercial bank fostering the
                            agricultural needs of the country ,as the Managing Director and there he continued till
                            02.05.2023 to end his normal service age. Mr Jabber has always been a team person and
                            believes in developing human capital. Employee first and the right man in right place is
                            the bracing motto of his leadership.</p> 

                        <p style="text-align:justify;font-size:13px;">
                            <span style="color: #0099cc;font-weight: bold;">Early life and Education</span><br>
                            Hailed from Kamarali village of Kolaroa Upazila under Sathkhira District he was born to
                            Mr Md Amin Uddin Morol and Mrs Tara Banu on 03 May,1964. After completing SSC
                            from Kamar Ali High School, Satkhira in 1979 he passed HSC exam from B L College
                            ,Khulna in 1981. Thereafter he got admitted to Dhaka University and completed both
                            BSS (hons:) and MSS degrees in Sociology in 1984 & 1985 respectively.</p>

                        <p style="text-align:justify;font-size:13px;">
                            <span style="color: #0099cc;font-weight: bold;">Career</span><br>
                            Started as a Management Trainee (Senior Officer) in 1988 with Janata Bank Limited Mr
                            Jabber climbed to the apex position of this institution treading every steps of his career
                            successfully and to the satisfaction of all concerned. During his journey from Senior
                            Officer to Deputy Managing Director before being appointed in the current role ie;MD
                            &CEO he was entrusted with varied responsibilities as the departmental head of viz;
                            credit/foreign trade/ treasury/ administration/ law/ audit/ ICT departments at head
                            office level. He had also played due role as the head of different branches, areas and
                            divisions of the same bank located around the country. His definite touch in core fields
                            of banking especially in Retail Credit & Project Finance have a longer impact in
                            industrialization and socio economic development of the country.
                            <br>
                            A glimpse of his professional tracks in-terms of time is of the following view:
                            <?php
                            echo '<div class="tbl">';
                            echo '<table class="table table-responsive-sm table-bordered"><thead><tr style="background:#0099cc;color:white;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><th>Time</th><th>Position</th><th>Bank</th></tr></thead>';
                            echo '<tr style="background: #D9ECF3;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>24.02.1988 to 24.11.2022</td><td>Senior Officer to Deputy Managing Director</td><td>Janata Bank Limited</td></tr>';
                            echo '<tr style="background: white;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>27.11.2022 to 02.05.2023</td><td>Managing Director</td><td>Bangladesh Krishi Bank</td></tr>';
                            echo '<tr style="background: #D9ECF3;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>03.05.2023 onward</td><td>MD & CEO</td><td>Janata Bank PLC</td></tr>';
                            echo '</table>';
                            echo '</div>';
                            ?>  
                        </p>

                        <p style="text-align:justify;font-size:13px;">  
                            <span style="color: #0099cc;font-weight: bold;">Professional Training & Degrees</span><br>
                            To meet the job requirement Mr Jabber completed Banking Diploma Exams (both parts) and
                            became a Diplomaed Associate of the Institute of Bankers Bangladesh. During his career he
                            took part in different banking related Training, Seminar and Symposium held at home and
                            abroad.
                        </p>

                        <p style="text-align:justify;font-size:13px;">
                            <span style="color: #0099cc;font-weight: bold;">Award & Recognition</span><br>
                            As a due recognition of excellent performance and best achiever Mr Jabber received a good
                            number of rewards from the concerned authority of the bank from time to time. A few of the
                            awards are mentioned below:
                            <?php
                            echo '<div class="tbl">';
                            echo '<table class="table table-responsive-sm table-bordered"><thead><tr style="background:#0099cc;color:white;"><th>Job Accomplished</th><th style="width:15vw;">Award Handed To & Year</th><th>Awarded By</th></tr></thead>';
                            echo '<tr style="background: #D9ECF3;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Highest Deposit Hunting</td><td>Testimonial -2002</td><td>Regional Office, Zone E,Dhaka</td></tr>';
                            echo '<tr style="background: white;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Target Achievement in all categories as branch Manager</td><td>Testimonial-2005</td><td>Divisional Office,Dhaka</td></tr>';
                            echo '<tr style="background: #D9ECF3;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Best Manager</td><td>Testimonial-2007</td><td>Board of Directors</td></tr>';
                            echo '<tr style="background: white;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Highest Foreign Remittance Collection</td><td>Testimonial-2007</td><td>MD & CEO</td></tr>';
                            echo '<tr style="background: #D9ECF3;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>New approach to analyze loans and advance proposals and preparation of the gist for the management</td><td>Testimonial-2009</td><td>Board of Directors</td></tr>';
                            echo '</table>';
                            echo '</div>';
                            ?>  
                        </p>

                        <p style="text-align:justify;font-size:13px;">
                            <span style="color: #0099cc;font-weight: bold;">Association with other Institutions</span><br>
                            Apart from his current role as the MD & CEO of Janata Bank PLC he is also
                            associated with a good number of esteemed institutions and playing important role
                            holding key positions as mentioned below:
                            <?php
                            echo '<div class="tbl">';
                            echo '<table class="table table-responsive-sm table-bordered"><thead><tr style="background:#0099cc;color:white;"><th>Name of Institution</th><th>Position held</th></tr></thead>';
                            echo '<tr style="background: #D9ECF3;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Janata Exchange Company(JEC) Srl,Italy</td><td>Chairman</td></tr>';
                            echo '<tr style="background: white;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Janata Capital Investment Limited(JCIL)</td><td>Chairman</td></tr>';
                            echo '<tr style="background: #D9ECF3;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Investment Corporation of Bangladesh(ICB)</td><td>Director</td></tr>';
                            echo '<tr style="background: white;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Industrial and Infrastructure Development Finance Company Limited(IIDFC)</td><td>Director</td></tr>';
                            echo '<tr style="background: #D9ECF3;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Primary Dealers Bangladesh Limited(PDBL)</td><td>Director</td></tr>';
                            echo '<tr style="background: white;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Padma Bank Limited</td><td>Director</td></tr>';
                            echo '<tr style="background: #D9ECF3;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Bangladesh Foreign Exchange Dealers Association (BAFEDA)</td><td>Director</td></tr>';
                            echo '<tr style="background: white;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Bangladesh Institute of Bank Management(BIBM)</td><td>Member</td></tr>';
                            echo '<tr style="background: #D9ECF3;color:#666;font-family: Helvetica, Nikosh, SolaimanLipi, Sonar Bangla;"><td>Institute of Bankers Bangladesh (IBB)</td><td>Council Member</td></tr>';
                            echo '</table>';
                            echo '</div>';
                            ?>  
                        </p>

                        <p style="text-align:justify;font-size:13px;">
                            <span style="color: #0099cc;font-weight: bold;">Personal Life</span><br>
                            In personal life he is married to Mrs Shereen Akhter Chaman Ara and has only
                            daughter- Senjuti Chaman. His recreational interest includes cricket, football and
                            exploring new places. He is a compliant muslim.
                        </p>

                        <a  id="displayMD" href="javascript:toggleMD();" style="cursor:pointer;color:#0099cc">CLOSE <i class="fa fa-times-circle-o" aria-hidden="true"></i> </a>
                    </div>
                </span>
            </div>

            <!--MD Message-->
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