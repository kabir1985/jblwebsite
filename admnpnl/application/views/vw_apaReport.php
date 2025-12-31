<style>
    .form-group{
        padding: 10px;
    }
    .formTextArea{
        background-color: #D9ECF3;
    }
    .formUpload{
        background-color: #0099cc;
        color: white;
    }
    .readonly{
        cursor: not-allowed;
        background-color: #D9ECF3;
        opacity: 1;
    }
    .ui-datepicker-trigger{
        cursor:pointer
    }
</style>
<?php
$attributes = array('id' => 'news_report', 'class' => 'form-inline');

echo form_open_multipart('admin/apa_report/view_report', $attributes);

echo "<div class='form-group'><label for='fdate'>From Date</label></br>";
$data = array(
    'name' => 'frm_date',
    'id' => 'frmDate',
    'required' =>'required',
    'value' => (isset($_POST['frm_date']) ? $_POST['frm_date'] : '' )
);
echo form_input($data) . "</div>";
//echo '<div class="errormessage" style="color:#F00; font-weight:bold; ">'.form_error('frm_date').'</div></p>';

echo "<div class='form-group'><label for='tdate'>To Date</label></br>";
$data = array(
    'name' => 'to_date',
    'id' => 'toDate',
    'required' =>'required',
    'value' => (isset($_POST['to_date']) ? $_POST['to_date'] : '' )
);
echo form_input($data) . "</div>";
//echo '<div class="errormessage" style="color:#F00; font-weight:bold; ">'.form_error('to_date').'</div></p>';

$attributes = array(
    'name' => 'submit',
    'type' => 'submit',
    'value' => 'SUBMIT',
    'class' => 'btn btn-success');
echo "<p class='clear'>" . form_submit($attributes) . "</p>";
echo form_close();


if (isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT') {
    if (is_array($apa_report_show) && count($apa_report_show) > 0) {
        //echo "<p align='right'><a href='".base_url()."index.php/admin/govtloan/download_success_pdf_month/".$_POST['year']."'>DOWNLOAD REPORT</a></p>";
        //echo "<pre>";
        //print_r($govtloan_month_report);

        echo "<p align='right'><a href='" . base_url() . "index.php/admin/apa_report/apa_report_pdf?frm_dt=" . $_POST['frm_date'] . "&to_dt=" . $_POST['to_date'] . "'>DOWNLOAD REPORT</a></p>";

        // News Report
        /*
        echo "<div align='center'><b style='color:#00CCFF'>NEWS MODULE</b></div>";
        echo "</br>";
        echo "<table width='95%' border='1' cellspacing='5' cellpadding='5'>";
        echo "<thead><tr>";
        echo "<th align='center'>Year</th>
			  <th>Month</th>
			  <th>Number of News Uploaded</th>";
        echo "</tr></thead>";

        $sum_tot_news = 0;

        for ($i = 0; $i < count($apa_report_show['news']); $i++) {

            echo "<tr>";
            echo "<td align='center'>" . $apa_report_show['news'][$i]['Year'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['news'][$i]['Month_Name'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['news'][$i]['Number_of_News_Uploaded'] . "</td>";

            // for total count
            $sum_tot_news = $sum_tot_news + $apa_report_show['news'][$i]['Number_of_News_Uploaded'];

            echo "</tr>";
        }
        echo "<tr>";
        echo "<th></th>";
        echo "<th align='center'><div style='color:#C60'>Total</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_tot_news . "</div></th>";
        echo "</tr>";
        echo "</table>";
        */

        // Notice Report

        echo "</br>";
        echo "<div align='center'><b style='color:#00CCFF'>NOTICE MODULE</b></div>";
        echo "</br>";
        echo "<table width='95%' border='1' cellspacing='5' cellpadding='5'>";
        echo "<thead><tr>";
        echo "<th align='center'>Year</th>
			  <th>Month</th>
			  <th>Number of Notice Uploaded</th>";
        echo "</tr></thead>";

        $sum_tot_notice = 0;

        for ($i = 0; $i < count((array) $apa_report_show['notice']); $i++) {

            echo "<tr>";
            echo "<td align='center'>" . $apa_report_show['notice'][$i]['Year'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['notice'][$i]['Month_Name'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['notice'][$i]['Number_of_Notice_Uploaded'] . "</td>";

            // for total count
            $sum_tot_notice = $sum_tot_notice + $apa_report_show['notice'][$i]['Number_of_Notice_Uploaded'];

            echo "</tr>";
        }
        echo "<tr>";
        echo "<th></th>";
        echo "<th align='center'><div style='color:#C60'>Total</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_tot_notice . "</div></th>";
        echo "</tr>";
        echo "</table>";

        // Tender Report

        echo "</br>";
        echo "<div align='center'><b style='color:#00CCFF'>TENDER MODULE</b></div>";
        echo "</br>";
        echo "<table width='95%' border='1' cellspacing='5' cellpadding='5'>";
        echo "<thead><tr>";
        echo "<th align='center'>Year</th>
			  <th>Month</th>
			  <th>Tender</th>
			  <th>RFQ</th>
			  <th>LTM</th>
			  <th>OTM</th>
			  <th>Total</th>";
        echo "</tr></thead>";

        $sum_tot_tender = 0;
        $sum_tender = 0;
        $sum_rfq = 0;
        $sum_ltm = 0;
        $sum_otm = 0;

        for ($i = 0; $i < count($apa_report_show['tender']); $i++) {

            echo "<tr>";
            echo "<td align='center'>" . $apa_report_show['tender'][$i]['Year'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['tender'][$i]['Month_Name'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['tender'][$i]['Tender'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['tender'][$i]['RFQ'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['tender'][$i]['LTM'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['tender'][$i]['OTM'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['tender'][$i]['Total'] . "</td>";

            // for total count
            $sum_tot_tender = $sum_tot_tender + $apa_report_show['tender'][$i]['Total'];
            $sum_tender = $sum_tender + $apa_report_show['tender'][$i]['Tender'];
            $sum_rfq = $sum_rfq + $apa_report_show['tender'][$i]['RFQ'];
            $sum_ltm = $sum_ltm + $apa_report_show['tender'][$i]['LTM'];
            $sum_otm = $sum_otm + $apa_report_show['tender'][$i]['OTM'];

            echo "</tr>";
        }
        echo "<tr>";
        echo "<th></th>";
        echo "<th align='center'><div style='color:#C60'>Total</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_tender . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_rfq . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_ltm . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_otm . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_tot_tender . "</div></th>";
        echo "</tr>";
        echo "</table>";

        // JBL Employee Passport NOC

        echo "</br>";
        echo "<div align='center'><b style='color:#00CCFF'>PASSPORT NOC MODULE</b></div>";
        echo "</br>";
        echo "<table width='95%' border='1' cellspacing='5' cellpadding='5'>";
        echo "<thead><tr>";
        echo "<th align='center'>Year</th>
			  <th>Month</th>
			  <th>Head Office</th>
			  <th>Local Office</th>
			  <th>Dhaka North</th>
			  <th>Dhaka South</th>
			  <th>Rangpur</th>
			  <th>Rajshahi</th>
			  <th>Khulna</th>
			  <th>Faridpur</th>
			  <th>Mymemshing</th>
			  <th>Sylhet</th>
			  <th>Cumilla</th>
			  <th>Noakhali</th>
			  <th>Chattragram</th>
			  <th>Total</th>";
        echo "</tr></thead>";

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

        for ($i = 0; $i < count($apa_report_show['passport_noc']); $i++) {

            echo "<tr>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Year'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Month_Name'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Head_Office'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Local_Office'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Dhaka_North'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Dhaka_South'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Rangpur'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Rajshahi'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Khulna'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Faridpur'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Mymenshing'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Sylhet'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Comilla'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Noakhali'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Chattragram'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['passport_noc'][$i]['Total'] . "</td>";

            // for total count
            $sum_tot_noc = $sum_tot_noc + $apa_report_show['passport_noc'][$i]['Total'];
            $sum_tot_ho = $sum_tot_ho + $apa_report_show['passport_noc'][$i]['Head_Office'];
            $sum_lo = $sum_lo + $apa_report_show['passport_noc'][$i]['Local_Office'];
            $sum_dn = $sum_dn + $apa_report_show['passport_noc'][$i]['Dhaka_North'];
            $sum_ds = $sum_ds + $apa_report_show['passport_noc'][$i]['Dhaka_South'];
            $sum_rang = $sum_rang + $apa_report_show['passport_noc'][$i]['Rangpur'];
            $sum_raj = $sum_raj + $apa_report_show['passport_noc'][$i]['Rajshahi'];
            $sum_khul = $sum_khul + $apa_report_show['passport_noc'][$i]['Khulna'];
            $sum_farid = $sum_farid + $apa_report_show['passport_noc'][$i]['Faridpur'];
            $sum_mymen = $sum_mymen + $apa_report_show['passport_noc'][$i]['Mymenshing'];
            $sum_syl = $sum_syl + $apa_report_show['passport_noc'][$i]['Sylhet'];
            $sum_com = $sum_com + $apa_report_show['passport_noc'][$i]['Comilla'];
            $sum_noa = $sum_noa + $apa_report_show['passport_noc'][$i]['Noakhali'];
            $sum_ctg = $sum_ctg + $apa_report_show['passport_noc'][$i]['Chattragram'];

            echo "</tr>";
        }
        echo "<tr>";
        echo "<th></th>";
        echo "<th align='center'><div style='color:#C60'>Total</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_tot_ho . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_lo . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_dn . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_ds . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_rang . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_raj . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_khul . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_farid . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_mymen . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_syl . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_com . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_noa . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_ctg . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_tot_noc . "</div></th>";
        echo "</tr>";
        echo "</table>";

        // Circular

        echo "</br>";
        echo "<div align='center'><b style='color:#00CCFF'>CIRCULAR MODULE</b></div>";
        echo "</br>";
        echo "<table width='95%' border='1' cellspacing='5' cellpadding='5'>";
        echo "<thead><tr>";
        echo "<th align='center'>Year</th>
			  <th>Month</th>
			  <th>Ins. Circular</th>
			  <th>Info. Circular</th>
			  <th>Circular Letter</th>
			  <th>RCD Circular</th>
			  <th>ID Circular Letter</th>
			  <th>ID Circular</th>
			  <th>FD Circular</th>
			  <th>FD Circular Letter</th>
			  <th>Lost Notification</th>
			  <th>Others</th>
			  <th>Total</th>";

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

        for ($i = 0; $i < count($apa_report_show['circular']); $i++) {

            echo "<tr>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['Year'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['Month_Name'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['Instruction_Circular'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['Information_Circular'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['Circular_Letter'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['RCD_Circular'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['ID_Circular_Letter'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['ID_Circular'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['FD_Circular'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['FD_Circular_Letter'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['Lost_Notification'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['Others'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['circular'][$i]['Total'] . "</td>";

            // for total count
            $sum_tot_cir = $sum_tot_cir + $apa_report_show['circular'][$i]['Total'];
            $sum_ins_cir = $sum_ins_cir + $apa_report_show['circular'][$i]['Instruction_Circular'];
            $sum_info_cir = $sum_info_cir + $apa_report_show['circular'][$i]['Information_Circular'];
            $sum_cir_ltr = $sum_cir_ltr + $apa_report_show['circular'][$i]['Circular_Letter'];
            $sum_rcd = $sum_rcd + $apa_report_show['circular'][$i]['RCD_Circular'];
            $sum_id_cir_ltr = $sum_id_cir_ltr + $apa_report_show['circular'][$i]['ID_Circular_Letter'];
            $sum_id_cir = $sum_id_cir + $apa_report_show['circular'][$i]['ID_Circular'];
            $sum_fd_cir = $sum_fd_cir + $apa_report_show['circular'][$i]['FD_Circular'];
            $sum_fd_cir_ltr = $sum_fd_cir_ltr + $apa_report_show['circular'][$i]['FD_Circular_Letter'];
            $sum_lost = $sum_lost + $apa_report_show['circular'][$i]['Lost_Notification'];
            $sum_oth = $sum_oth + $apa_report_show['circular'][$i]['Others'];

            echo "</tr>";
        }
        echo "<tr>";
        echo "<th></th>";
        echo "<th align='center'><div style='color:#C60'>Total</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_ins_cir . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_info_cir . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_cir_ltr . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_rcd . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_id_cir_ltr . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_id_cir . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_fd_cir . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_fd_cir_ltr . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_lost . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_oth . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_tot_cir . "</div></th>";
        echo "</tr>";
        echo "</table>";

        // GEHBL

        echo "</br>";
        echo "<div align='center'><b style='color:#00CCFF'>GOVT. EMPLOYEE HOUSE BUILDING LOAN MODULE</b></div>";
        echo "</br>";
        echo "<table width='95%' border='1' cellspacing='5' cellpadding='5'>";
        echo "<thead><tr>";
        echo "<th align='center'>Year</th>
		<th align='center'>Month Name</th>
		<th>House Loan</th>
		<th>Flat Loan</th>
		<th>Total Loan</th>
		</tr></thead>";

        $sum_house = 0;
        $sum_flat = 0;
        $sum_tot = 0;

        for ($i = 0; $i < count($apa_report_show['gehbl']); $i++) {
            echo "<tr>";
            echo "<td align='center'>" . $apa_report_show['gehbl'][$i]['Year'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['gehbl'][$i]['Month_Name'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['gehbl'][$i]['House_Loan'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['gehbl'][$i]['Flat_Loan'] . "</td>";
            echo "<td align='center'>" . $apa_report_show['gehbl'][$i]['Total_Loan'] . "</td>";

            // for total count
            $sum_house = $sum_house + $apa_report_show['gehbl'][$i]['House_Loan'];
            $sum_flat = $sum_flat + $apa_report_show['gehbl'][$i]['Flat_Loan'];
            $sum_tot = $sum_tot + $apa_report_show['gehbl'][$i]['Total_Loan'];

            echo "</tr>";
        }
        echo "<tr>";
        echo "<th></th>";
        echo "<th><div style='color:#C60'>Total</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_house . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_flat . "</div></th>";
        echo "<th align='center'><div style='color:#C60'>" . $sum_tot . "</div></th>";
        echo "</tr>";
        echo "</table>";
    } else {
        echo "<table  width='95%' border='1'>";
        echo "<thead><tr>";
        echo "<th>Year</th>
			  <th>Month</th>
			  <th>Number of Items Uploaded</th>";
        echo "</tr></thead>";
        echo "<td>&nbsp;</td>";
        echo "<td>&nbsp;</td>";
        echo "<td style='font-size:12px;color:#FF0000;font-weight:bold;'><div align='center'>No Data Found for!</div></td>";
        echo "<td>&nbsp;</td>";
        echo "</tr>";
        echo "</table>";
    }
} else {
    echo "<div align='center'>Please, Select Date To Show Data!</div>";
}
?>

<script type="text/javascript">
        $(document).ready(function () {
            $('#frmDate').datepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: "yy-mm-dd",
                //timeFormat: "hh:mm",
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:"
            });
            
            $('#toDate').datepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: "yy-mm-dd",
                //timeFormat: "hh:mm",
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:"
            });
        });
    </script>