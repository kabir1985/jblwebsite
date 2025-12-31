<?php
if (isset($applicant_flat_list) && !empty($applicant_flat_list)) {
    ?>
    <table width="100%"  style="border-collapse:collapse;border: 0px solid #dddddd;">
        <tr>
            <td colspan="5" align="center">
                <?php //$url = substr(base_url(), 0, -8); ?>
                <!--<img src="<?php //echo $url . 'assets/images/others/jblogo.png'; ?>" width="300" height="56" />-->  
            <?php
            $path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/others/jblogo.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $img_src = 'data:image/' . $type . ';base64,' . base64_encode($data);
            echo '<img src="' . $img_src . '" width="300" height="56">';           
            ?>  
            </td>
        </tr>
        <tr>
            <td colspan="5" align="center"><span>110 Janata Bhaban, Motijheel C/A; Dhaka- 1000</td>
        </tr>
        <tr>
            <td colspan="5" align="center">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="5" align="center"><span style="font-weight:bold; color:#09F;">Flat Loan Applicants' List of Government Employees</span></td>
        </tr>
        <tr>
            <td align="center" style="font-weight:bold; color:#000; font-size:14px; border: 0.5px solid #dddddd;">Slno#</td>
            <td align="center" style="font-weight:bold; color:#000; font-size:14px; border: 0.5px solid #dddddd;">Applicant's Info.</td>
            <td align="center" style="font-weight:bold; color:#000; font-size:14px; border: 0.5px solid #dddddd;">Tracking Number</td>
            <td align="center" style="font-weight:bold; color:#000; font-size:14px; border: 0.5px solid #dddddd;">Loan Info.</td>
            <td align="center" style="font-weight:bold; color:#000; font-size:14px; border: 0.5px solid #dddddd;">Status</td>
        </tr>
        <?php
        $c = 1;
        foreach ($applicant_flat_list as $key => $list) {
            $loan_amount = $list['loanAmount'] / 100000;
            ?>          
            <tr>
                <td align="center" style="border: 0.5px solid #dddddd;"><?php echo $c; ?></td>

                <?php
                if ($list['spouseName'] != "") {
                    ?>
                    <td align="left" valign="top" style="border: 0.5px solid #dddddd;">
                        <div style="font-size:12px; font-weight:bold;"><?php echo $list['applicantName']; ?></div></br>
                        <div style="font-size:12px;"><?php echo "F/N: " . $list['fatherName']; ?></div></br>
                        <div style="font-size:12px;"><?php echo "M/N: " . $list['motherName']; ?></div></br>
                        <div style="font-size:12px;"><?php echo "S/N: " . $list['spouseName']; ?></div></br>
                        <div style="font-size:12px;"><?php echo "Mobile: " . $list['mobileNumber']; ?></div>
                    </td>
                    <?php
                } else {
                    ?>
                    <td align="left" valign="top" style="border: 0.5px solid #dddddd;">
                        <div style="font-size:12px; font-weight:bold;"><?php echo $list['applicantName']; ?></div></br>
                        <div style="font-size:12px;"><?php echo "F/N: " . $list['fatherName']; ?></div></br>
                        <div style="font-size:12px;"><?php echo "M/N: " . $list['motherName']; ?></div></br>
                        <div style="font-size:12px;"><?php echo "S/N: " . "N/A"; ?></div></br>
                        <div style="font-size:12px;"><?php echo "Mobile: " . $list['mobileNumber']; ?></div>
                    </td>
                    <?php
                }
                ?>


                <td align="center" style="font-size:12px; border: 0.5px solid #dddddd;" valign="middle"><?php echo $list['trackNumber']; ?></td>
                <td align="left" valign="top" style="border: 0.5px solid #dddddd;">
                    <div style="font-size:12px;"><?php echo "Applied for: " . "<span style='font-size:12px; font-weight:bold; color:#000;'>" . $list['loanTypeText'] . "</span>"; ?></div></br>
                    <div style="font-size:12px;"><?php echo "Loan Amount: " . $loan_amount; ?></div></br>
                    <div style="font-size:12px;"><?php echo "Installment: " . $list['loanPeriod']; ?></div></br>
                    <div style="font-size:12px;"><?php echo "Branch Name: " . $list['applied_branch']; ?></div></br>
                    <div style="font-size:12px;"><?php echo "Applied Date: " . $list['applicationSubmitDateTime']; ?></div>
                </td>
                <?php
                if ($list['status'] == '1') {
                    ?>
                    <td align="center" valign="middle" style="border: 0.5px solid #dddddd;"><span style="font-size:12px;color:#009933;font-weight:bold;">Active</span></td>
                    <?php
                } else {
                    ?>
                    <td align="center" valign="middle" style="border: 0.5px solid #dddddd;"><span style="font-size:12px;color:#FF0000;font-weight:bold;">Inactive</span></td>
                    <?php
                }
                ?>
            </tr>
            <?php
            $c++;
        }
    } else {
        echo "Sorry, Information Not Found!";
    }
    ?>
</table>