<?php
if(isset($applicant_details) && !empty($applicant_details))
{
	
?>

<table width="100%" border="0" cellpadding="2" cellspacing="2" style="border:#09F; margin-top: -15px; margin-bottom: 1px">
  <tr>
      <td colspan="2" align="left" valign="top"> <img src="http://172.18.18.71/assets/images/others/jblogo.png" width="300" height="56" /></td>
    <td align="right" valign="top">
        <div>
    <div align="center" style="border: 1px solid #09C; height:80px; width:100px; font-size:10px; padding-right:15px; padding-top:40px; padding-left:15px;">
        Please, attach your photo here!
    </div>
    </td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top" style="font-weight:normal; color:#000; font-size:12px;">110 Janata Bhaban, Motijheel C/A; Dhaka- 1000</td>
  </tr>
  <tr>
    <td colspan="3" style="font-weight:bold; color:#09F;" align="center">House Building/ Flat Loan Application for Government Employees</td>
  </tr>
  <tr>
    <td colspan="3" valign="middle"><div align="center" style="font-weight:bold;color:#FFF;font-size:14px;background-color:#0099cc; line-height:25px; border-radius:5px;">Loan Information
    </div></td>
  </tr>
  <tr>
    <td style="font-weight:bold; color:#000; font-size:14px;"><span style="font-weight:bold; color:#C30; font-size:14px;">Tracking Number: <?php echo isset($applicant_details['trackNumber'])?$applicant_details['trackNumber']:''; ?></span></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Applied for: <strong><?php echo isset($applicant_details['loanTypeText'])?$applicant_details['loanTypeText']:''; ?></strong></td>
  </tr>
  <tr>
    <td style="font-weight:bold; color:#000; font-size:14px;"><?php echo isset($applicant_details['applicantName'])?$applicant_details['applicantName']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Loan Amount: <strong> BDT <?php echo isset($applicant_details['loanAmount'])?$applicant_details['loanAmount']:''; ?></strong></td>
  </tr>
  <tr>
    <td style="font-size:14px">Father's Name: <?php echo isset($applicant_details['fatherName'])?$applicant_details['fatherName']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Loan Period: <strong><?php echo isset($applicant_details['loanPeriod'])?$applicant_details['loanPeriod']:''; ?></strong> installments</td>
  </tr>
  <tr>
    <td style="font-size:14px">Mother's Name: <?php echo isset($applicant_details['motherName'])?$applicant_details['motherName']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Applied To: <strong><?php echo isset($applicant_details['applied_branch'])?$applicant_details['applied_branch']:''; ?></strong></td>
  </tr>
  <tr>
    <td style="font-size:14px">Spouse Name: <?php echo isset($applicant_details['spouseName'])?$applicant_details['spouseName']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Applied Date: <strong><?php echo isset($applicant_details['applicationSubmitDateTime'])? date('d M Y', strtotime($applicant_details['applicationSubmitDateTime'])):''; ?></strong></td>
  </tr>
<!--  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size:14px">&nbsp;</td>
  </tr>-->
  <tr>
    <td colspan="3" valign="middle"><div align="center" style="font-weight:bold;color:#FFF;font-size:14px;background-color:#0099cc; line-height:25px; border-radius:5px;">Personal Information
    </div></td>
  </tr>
  <tr>
    <td style="font-size:14px">Date of Birth: <?php echo isset($applicant_details['dob'])? date('d M Y', strtotime($applicant_details['dob'])):''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Mobile Number: <?php echo isset($applicant_details['mobileNumber'])?$applicant_details['mobileNumber']:''; ?></td>
  </tr>
  <tr>
    <td style="font-size:14px">Present Address: <?php echo isset($applicant_details['presentAddress'])?$applicant_details['presentAddress']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Land Phone (Res.): <?php echo isset($applicant_details['tntRes'])?$applicant_details['tntRes']:''; ?></td>
  </tr>
  <tr>
    <td style="font-size:14px">Permanent Address: <?php echo isset($applicant_details['permanentAddress'])?$applicant_details['permanentAddress']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Email: <?php echo isset($applicant_details['email'])?$applicant_details['email']:''; ?></td>
  </tr>
  <tr>
    <td style="font-size:14px">NID: <?php echo isset($applicant_details['nid'])?$applicant_details['nid']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">TIN: <?php echo isset($applicant_details['tin'])?$applicant_details['tin']:''; ?></td>
  </tr>
<!--  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>-->
  <tr>
    <td colspan="3" valign="middle"><div align="center" style="font-weight:bold;color:#FFF;font-size:14px;background-color:#0099cc; line-height:25px; border-radius:5px;">Job Information
    </div></td>
  </tr>
  <tr>
    <td style="font-size:14px">Office Name: <?php echo isset($applicant_details['officeName'])?$applicant_details['officeName']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Current Designation: <?php echo isset($applicant_details['designation'])?$applicant_details['designation']:''; ?></td>
  </tr>
  <tr>
    <td style="font-size:14px">Office Address: <?php echo isset($applicant_details['officeAddress'])?$applicant_details['officeAddress']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Joining Date at Current Designation: <?php echo isset($applicant_details['dtCurrDesig'])? date('d M Y', strtotime($applicant_details['dtCurrDesig'])):''; ?></td>
  </tr>
  <tr>
    <td style="font-size:14px">Office Phone: <?php echo isset($applicant_details['tntOffice'])?$applicant_details['tntOffice']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Joining Date in the Job: <?php echo isset($applicant_details['dtJob'])? date('d M Y', strtotime($applicant_details['dtJob'])):''; ?></td>
  </tr>
  <tr>
    <td style="font-size:14px">Ministry/Division/Department: <?php echo isset($applicant_details['dept'])?$applicant_details['dept']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Retirement Date: <?php echo isset($applicant_details['dtRtr'])?$applicant_details['dtRtr']:''; ?></td>
  </tr>
  <tr>
    <td style="font-size:14px">GPF Number: <?php echo isset($applicant_details['gpf'])?$applicant_details['gpf']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Designation Grade: Grade <?php echo isset($applicant_details['designGrade'])?$applicant_details['designGrade']:''; ?></td>
  </tr>
  <tr>
    <td style="font-size:14px">Official ID Number: <?php echo isset($applicant_details['officeId'])?$applicant_details['officeId']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Salary Scale: BDT <?php echo isset($applicant_details['salaryScale'])?$applicant_details['salaryScale']:''; ?></td>
  </tr>
  <tr>
    <td style="font-size:14px">Basic Pay: BDT <?php echo isset($applicant_details['basicPay'])?$applicant_details['basicPay']:''; ?></td>
    <td>&nbsp;</td>
    <td style="font-size:14px">Gross Pay: BDT <?php echo isset($applicant_details['grossPay'])?$applicant_details['grossPay']:''; ?></td>
  </tr>
  <tr>
    <td style="font-size:14px">Take Home Pay: BDT <?php echo isset($applicant_details['takePay'])?$applicant_details['takePay']:''; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>___________________</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size:12px"><strong>Applicant's Signature & Date</strong></td>
  </tr>
  </table>
<?php
}
else
{
	echo "Sorry, Information Not Found!";
}
?>
