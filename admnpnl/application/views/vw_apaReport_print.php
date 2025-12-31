<html>
    <head>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                text-align: center;
                /*padding: 0px;*/
            }

            /*tr:nth-child(even) {
              background-color: #CCC;
            }*/


            .text-size{
                font-size:12px;
            }
        </style>
    </head>
    <body>

        <div>
            <!--<img src="https://www.jb.com.bd/assets/images/others/jblogo.png" width="300" height="50"/>-->
            <?php
            $path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/others/jblogo.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $img_src = 'data:image/' . $type . ';base64,' . base64_encode($data);
            echo '<img src="' . $img_src . '" width="300" height="50">';           
            ?>      
        </div>

        <div align="center" style="font-size:12px; font-weight:bold;">Website Update Report [01.10.2024 to 31.12.2024]</div>

        <?php
        if (isset($make_report) && !empty($make_report)) {
            ?>
            <!--Notice-->
            <p align="center" style="color:#09F; font-size:12px;">Notice Module</p>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Number of Notice Uploaded</th>
                </tr>
                <?php
                $sum_tot_notice = 0;
                for ($i = 0; $i < count($make_report['notice']); $i++) {
                    ?>
                    <tr>
                        <td style="font-size:12px;"><?php echo $make_report['notice'][$i]['Year']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['notice'][$i]['Month_Name']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['notice'][$i]['Number_of_Notice_Uploaded']; ?></td>
                    </tr>
                    <?php
                    $sum_tot_notice = $sum_tot_notice + $make_report['notice'][$i]['Number_of_Notice_Uploaded'];
                }
                ?>
                <tr>
                    <td>&nbsp;</td>
                    <th>Total</th>
                    <th style="font-size:12px;"><?php echo $sum_tot_notice; ?></th>
                </tr>	
            </table>


            <!--Tender-->
            <p align="center" style="color:#09F; font-size:12px;">Tender Module</p>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Tender</th>
                    <th>RFQ</th>
                    <th>LTM</th>
                    <th>OTM</th>
                    <th>Total</th>
                </tr>
                <?php
                $sum_tot_tender = 0;
                $sum_tender = 0;
                $sum_rfq = 0;
                $sum_ltm = 0;
                $sum_otm = 0;
                for ($i = 0; $i < count($make_report['tender']); $i++) {
                    ?>
                    <tr>
                        <td style="font-size:12px;"><?php echo $make_report['tender'][$i]['Year']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['tender'][$i]['Month_Name']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['tender'][$i]['Tender']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['tender'][$i]['RFQ']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['tender'][$i]['LTM']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['tender'][$i]['OTM']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['tender'][$i]['Total']; ?></td>
                    </tr>
                    <?php
                    // for total count
                    $sum_tot_tender = $sum_tot_tender + $make_report['tender'][$i]['Total'];
                    $sum_tender = $sum_tender + $make_report['tender'][$i]['Tender'];
                    $sum_rfq = $sum_rfq + $make_report['tender'][$i]['RFQ'];
                    $sum_ltm = $sum_ltm + $make_report['tender'][$i]['LTM'];
                    $sum_otm = $sum_otm + $make_report['tender'][$i]['OTM'];
                }
                ?>
                <tr>
                    <td>&nbsp;</td>
                    <th>Total</th>
                    <th style="font-size:12px;"><?php echo $sum_tender; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_rfq; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_ltm; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_otm; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_tot_tender; ?></th>
                </tr>	
            </table>


            <!--Passport NOC Module-->
            <p align="center" style="color:#09F; font-size:12px;">Passport NOC Module</p>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>HO</th>
                    <th>L/O</th>
                    <th>D-N</th>
                    <th>D-S</th>
                    <th>Ran.</th>
                    <th>Raj.</th>
                    <th>Khl.</th>
                    <th>Far.</th>
                    <th>Mym.</th>
                    <th>Syl.</th>
                    <th>Cum.</th>
                    <th>Noa.</th>
                    <th>Ctg.</th>
                    <th>Total</th>
                </tr>
                <?php
                $sum_tot_ho = 0;
                $sum_lo = 0;
                $sum_dn = 0;
                $sum_ds = 0;
                $sum_rang = 0;
                $sum_raj = 0;
                $sum_khul = 0;
                $sum_farid = 0;
                $sum_mymen = 0;
                $sum_syl = 0;
                $sum_com = 0;
                $sum_noa = 0;
                $sum_ctg = 0;
                $sum_tot_noc = 0;
                for ($i = 0; $i < count($make_report['passport_noc']); $i++) {
                    ?>
                    <tr>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Year']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Month_Name']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Head_Office']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Local_Office']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Dhaka_North']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Dhaka_South']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Rangpur']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Rajshahi']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Khulna']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Faridpur']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Mymenshing']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Sylhet']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Comilla']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Noakhali']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Chattragram']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['passport_noc'][$i]['Total']; ?></td>
                    </tr>
                    <?php
                    // for total count
                    $sum_tot_noc = $sum_tot_noc + $make_report['passport_noc'][$i]['Total'];
                    $sum_tot_ho = $sum_tot_ho + $make_report['passport_noc'][$i]['Head_Office'];
                    $sum_lo = $sum_lo + $make_report['passport_noc'][$i]['Local_Office'];
                    $sum_dn = $sum_dn + $make_report['passport_noc'][$i]['Dhaka_North'];
                    $sum_ds = $sum_ds + $make_report['passport_noc'][$i]['Dhaka_South'];
                    $sum_rang = $sum_rang + $make_report['passport_noc'][$i]['Rangpur'];
                    $sum_raj = $sum_raj + $make_report['passport_noc'][$i]['Rajshahi'];
                    $sum_khul = $sum_khul + $make_report['passport_noc'][$i]['Khulna'];
                    $sum_farid = $sum_farid + $make_report['passport_noc'][$i]['Faridpur'];
                    $sum_mymen = $sum_mymen + $make_report['passport_noc'][$i]['Mymenshing'];
                    $sum_syl = $sum_syl + $make_report['passport_noc'][$i]['Sylhet'];
                    $sum_com = $sum_com + $make_report['passport_noc'][$i]['Comilla'];
                    $sum_noa = $sum_noa + $make_report['passport_noc'][$i]['Noakhali'];
                    $sum_ctg = $sum_ctg + $make_report['passport_noc'][$i]['Chattragram'];
                }
                ?>
                <tr>
                    <td>&nbsp;</td>
                    <th>Total</th>
                    <th style="font-size:12px;"><?php echo $sum_tot_ho; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_lo; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_dn; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_ds; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_rang; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_raj; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_khul; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_farid; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_mymen; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_syl; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_com; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_noa; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_ctg; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_tot_noc; ?></th>
                </tr>	
            </table>


            <!--Circular Module-->
            <p align="center" style="color:#09F; font-size:12px;">Circular Module</p>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Ins. Cir.</th>
                    <th>Info. Cir.</th>
                    <th>Cir. Ltr.</th>
                    <th>RCD Cir.</th>
                    <th>ID Cir. Ltr.</th>
                    <th>ID Cir.</th>
                    <th>FD Cir.</th>
                    <th>FD Cir. Ltr.</th>
                    <th>Lost Not.</th>
                    <th>Oth.</th>
                    <th>Total</th>
                </tr>
                <?php
                $sum_ins_cir = 0;
                $sum_info_cir = 0;
                $sum_cir_ltr = 0;
                $sum_rcd = 0;
                $sum_id_cir_ltr = 0;
                $sum_id_cir = 0;
                $sum_fd_cir = 0;
                $sum_fd_cir_ltr = 0;
                $sum_lost = 0;
                $sum_oth = 0;
                $sum_tot_cir = 0;
                for ($i = 0; $i < count($make_report['circular']); $i++) {
                    ?>
                    <tr>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['Year']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['Month_Name']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['Instruction_Circular']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['Information_Circular']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['Circular_Letter']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['RCD_Circular']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['ID_Circular_Letter']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['ID_Circular']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['FD_Circular']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['FD_Circular_Letter']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['Lost_Notification']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['Others']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['circular'][$i]['Total']; ?></td>
                    </tr>
                    <?php
                    // for total count
                    $sum_tot_cir = $sum_tot_cir + $make_report['circular'][$i]['Total'];
                    $sum_ins_cir = $sum_ins_cir + $make_report['circular'][$i]['Instruction_Circular'];
                    $sum_info_cir = $sum_info_cir + $make_report['circular'][$i]['Information_Circular'];
                    $sum_cir_ltr = $sum_cir_ltr + $make_report['circular'][$i]['Circular_Letter'];
                    $sum_rcd = $sum_rcd + $make_report['circular'][$i]['RCD_Circular'];
                    $sum_id_cir_ltr = $sum_id_cir_ltr + $make_report['circular'][$i]['ID_Circular_Letter'];
                    $sum_id_cir = $sum_id_cir + $make_report['circular'][$i]['ID_Circular'];
                    $sum_fd_cir = $sum_fd_cir + $make_report['circular'][$i]['FD_Circular'];
                    $sum_fd_cir_ltr = $sum_fd_cir_ltr + $make_report['circular'][$i]['FD_Circular_Letter'];
                    $sum_lost = $sum_lost + $make_report['circular'][$i]['Lost_Notification'];
                    $sum_oth = $sum_oth + $make_report['circular'][$i]['Others'];
                }
                ?>
                <tr>
                    <td>&nbsp;</td>
                    <th>Total</th>
                    <th style="font-size:12px;"><?php echo $sum_ins_cir; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_info_cir; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_cir_ltr; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_rcd; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_id_cir_ltr; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_id_cir; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_fd_cir; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_fd_cir_ltr; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_lost; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_oth; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_tot_cir; ?></th>
                </tr>	
            </table>

            <!--GEHBL Module-->
            <p align="center" style="color:#09F; font-size:12px;">Govt. Employee House Building Loan Module</p>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>House Loan</th>
                    <th>Flat Loan</th>
                    <th>Total</th>
                </tr>
                <?php
                $sum_house = 0;
                $sum_flat = 0;
                $sum_tot = 0;
                for ($i = 0; $i < count($make_report['gehbl']); $i++) {
                    ?>
                    <tr>
                        <td style="font-size:12px;"><?php echo $make_report['gehbl'][$i]['Year']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['gehbl'][$i]['Month_Name']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['gehbl'][$i]['House_Loan']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['gehbl'][$i]['Flat_Loan']; ?></td>
                        <td style="font-size:12px;"><?php echo $make_report['gehbl'][$i]['Total_Loan']; ?></td>
                    </tr>
                    <?php
                    // for total count
                    $sum_house = $sum_house + $make_report['gehbl'][$i]['House_Loan'];
                    $sum_flat = $sum_flat + $make_report['gehbl'][$i]['Flat_Loan'];
                    $sum_tot = $sum_tot + $make_report['gehbl'][$i]['Total_Loan'];
                }
                ?>
                <tr>
                    <td>&nbsp;</td>
                    <th>Total</th>
                    <th style="font-size:12px;"><?php echo $sum_house; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_flat; ?></th>
                    <th style="font-size:12px;"><?php echo $sum_tot; ?></th>
                </tr>	
            </table>
            <br>
            <p align="right" style="font-size:9px;">[ N:B: This is computer generated report. ]</p>
            <pre>
            <b style="border-top: 1px solid #000; font:'Times New Roman', Times, serif; font-size:12px; font-weight:bold;">Signature</b>                                                               <b style="border-top: 1px solid #000;  font:'Times New Roman', Times, serif; font-size:12px; font-weight:bold;">Signature</b>
            </pre>

            <?php
        } else {
            echo "Sorry, Information Not Found!";
        }
        ?>
    </body>
</html>