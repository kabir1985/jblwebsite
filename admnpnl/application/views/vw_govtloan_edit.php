<fieldset>
<legend><?php echo $title." for ".$loan['applicantName'];?></legend>


<?php
$attributes = array('id' => 'loan_form','class'=>'my_entry_form');
echo form_open_multipart('admin/govtloan/edit',$attributes);


echo "<p><label for='loan_id'>Loan ID</label>";
$data = array(	'name'=>'loan_id',
				'id'=>'loan_id',
				'readonly'=>'readonly',
				'size'=>'35',
				'value' => $loan['id']);
echo form_input($data)."</p>";

echo "<p><label for='brcode'>Select Branch of Janata Bank Limited</label>";
echo form_dropdown('brcode', $branches, $loan['brCode'])."</p>";

echo "<p><label for='track_number'>Tracking Number</label>";
$data = array(	'name'=>'track_number',
				'id'=>'track_number',
				'readonly'=>'readonly',
                'size'=>'35',
				'value' => $loan['trackNumber']);
echo form_input($data)."</p>";


echo "<p><label for='loan_type'>Select Loan Type</label>";
echo form_dropdown('loan_type', $loantype, $loan['loanType'])."</p>";


echo "<p><label for='loan_amount'>Loan Amount</label>";
$data = array(	'name'=>'loan_amount',
				'id'=>'loan_amount',
				'size'=>'35',
				'value' => $loan['loanAmount']);
echo form_input($data)."</p>";


echo "<p><label for='loan_period'>Loan Period</label>";
$data = array(	'name'=>'loan_period',
				'id'=>'loan_period',
				'size'=>'35',
				'value' => $loan['loanPeriod']);
echo form_input($data)."</p>";


echo "<p><label for='applicant_name'>Applicant Name</label>";
$data = array(	'name'=>'applicant_name',
				'id'=>'applicant_name',	
				'size'=>'35',			
				'value' => $loan['applicantName']);
echo form_input($data)."</p>";


echo "<p><label for='father_name'>Father's Name</label>";
$data = array(	'name'=>'father_name',
				'id'=>'father_name',
				'size'=>'35',				
				'value' => $loan['fatherName']);
echo form_input($data)."</p>";

echo "<p><label for='mother_name'>Mother's Name</label>";
$data = array(	'name'=>'mother_name',
				'id'=>'mother_name',
				'size'=>'35',				
				'value' => $loan['motherName']);
echo form_input($data)."</p>";

echo "<p><label for='spouse_name'>Spouse Name</label>";
$data = array(	'name'=>'spouse_name',
				'id'=>'spouse_name',
				'size'=>'35',				
				'value' => $loan['spouseName']);
echo form_input($data)."</p>";


echo "<p><label for='date_birth'>Date of Birth</label>";
$data = array('name'=>'date_birth',
				'id'=>'datepicker',
				'class'=>'datepicker',		
				'value' => $loan['dob']);
echo form_input($data)."</p>";

echo "<p><label for='gender'>Select Gender</label>";
$options = array('1' => 'Male', 
               '2' => 'Female');
echo form_dropdown('gender', $options, $loan['gender'])."</p>";


echo "<p><label for='pre_add'>Present Address</label>";
$data = array(	'name'=>'pre_add',
				'id'=>'pre_add',
				'size'=>'35',				
				'value' => $loan['presentAddress']);
echo form_input($data)."</p>";

echo "<p><label for='per_add'>Permanent Address</label>";
$data = array(	'name'=>'per_add',
				'id'=>'per_add',
				'size'=>'35',				
				'value' => $loan['permanentAddress']);
echo form_input($data)."</p>";

echo "<p><label for='mobile_number'>Mobile Number</label>";
$data = array(	'name'=>'mobile_number',
				'id'=>'mobile_number',
				'size'=>'35',				
				'value' => $loan['mobileNumber']);
echo form_input($data)."</p>";

echo "<p><label for='tnt_res'>Land Phone Number (Resident)</label>";
$data = array(	'name'=>'tnt_res',
				'id'=>'tnt_res',
				'size'=>'35',				
				'value' => $loan['tntRes']);
echo form_input($data)."</p>";

echo "<p><label for='email'>Email</label>";
$data = array(	'name'=>'email',
				'id'=>'email',
				'size'=>'35',				
				'value' => $loan['email']);
echo form_input($data)."</p>";

echo "<p><label for='nid'>NID</label>";
$data = array(	'name'=>'nid',
				'id'=>'nid',
				'size'=>'35',				
				'value' => $loan['nid']);
echo form_input($data)."</p>";

echo "<p><label for='tin'>TIN</label>";
$data = array(	'name'=>'tin',
				'id'=>'tin',
				'size'=>'35',				
				'value' => $loan['tin']);
echo form_input($data)."</p>";

echo "<p><label for='office_name'>Office Name</label>";
$data = array(	'name'=>'office_name',
				'id'=>'office_name',
				'size'=>'35',				
				'value' => $loan['officeName']);
echo form_input($data)."</p>";

echo "<p><label for='office_add'>Office Address</label>";
$data = array(	'name'=>'office_add',
				'id'=>'office_add',
				'size'=>'35',				
				'value' => $loan['officeAddress']);
echo form_input($data)."</p>";

echo "<p><label for='dept'>Department</label>";
$data = array(	'name'=>'dept',
				'id'=>'dept',
				'size'=>'35',				
				'value' => $loan['dept']);
echo form_input($data)."</p>";

echo "<p><label for='desig'>Designation</label>";
$data = array(	'name'=>'desig',
				'id'=>'desig',
				'size'=>'35',				
				'value' => $loan['designation']);
echo form_input($data)."</p>";

echo "<p><label for='date_curr_desig'>Date of Join in current Designation</label>";
$data = array('name'=>'date_curr_desig',
				'id'=>'datepicker',
				'class'=>'datepicker',		
				'value' => $loan['dtCurrDesig']);
echo form_input($data)."</p>";

echo "<p><label for='office_tnt'>Office Name</label>";
$data = array(	'name'=>'office_tnt',
				'id'=>'office_tnt',
				'size'=>'35',				
				'value' => $loan['tntOffice']);
echo form_input($data)."</p>";


echo "<p><label for='date_join'>Date of Join in this job</label>";
$data = array('name'=>'date_join',
				'id'=>'datepicker',
				'class'=>'datepicker',		
				'value' => $loan['dtJob']);
echo form_input($data)."</p>";

echo "<p><label for='date_rtr'>Date of Retirement</label>";
$data = array('name'=>'date_rtr',
				'id'=>'datepicker',
				'class'=>'datepicker',		
				'value' => $loan['dtRtr']);
echo form_input($data)."</p>";

echo "<p><label for='gpf'>GPF</label>";
$data = array(	'name'=>'gpf',
				'id'=>'gpf',
				'size'=>'35',				
				'value' => $loan['gpf']);
echo form_input($data)."</p>";

echo "<p><label for='office_id'>Office ID</label>";
$data = array(	'name'=>'office_id',
				'id'=>'office_id',
				'size'=>'35',				
				'value' => $loan['officeId']);
echo form_input($data)."</p>";

echo "<p><label for='desig_grade'>Designation Grade</label>";
$options = array('1' => 'Grade- 1', 
               '2' => 'Grade- 2',
               '3' => 'Grade- 3',
               '4' => 'Grade- 4',
               '5' => 'Grade- 5',
               '6' => 'Grade- 6',
               '7' => 'Grade- 7',
			   '8' => 'Grade- 8',
			   '9' => 'Grade- 9',
			   '10' => 'Grade- 10',
               '11' => 'Grade- 11');
echo form_dropdown('desig_grade', $options, $loan['designGrade'])."</p>";

echo "<p><label for='salary_scale'>Salary Scale</label>";
$options = array('78000 (Fixed)' => 'BDT 78000 (Fixed)', 
               '66000- 76490' => 'BDT 66000- 76490',
               '56500- 74400' => 'BDT 56500- 74400',
               '50000- 71200' => 'BDT 50000- 71200',
               '43000- 69850' => 'BDT 43000- 69850',
               '35500- 67010' => 'BDT 35500- 67010',
               '29000- 63410' => 'BDT 29000- 63410',
			   '23000- 55470' => 'BDT 23000- 55470',
			   '22000- 53060' => 'BDT 22000- 53060',
			   '16000- 38640' => 'BDT 16000- 38640',
               '12500- 30230' => 'BDT 12500- 30230');
echo form_dropdown('salary_scale', $options, $loan['salaryScale'])."</p>";

echo "<p><label for='basic_pay'>Basic Pay</label>";
$data = array(	'name'=>'basic_pay',
				'id'=>'basic_pay',
				'size'=>'35',				
				'value' => $loan['basicPay']);
echo form_input($data)."</p>";

echo "<p><label for='gross_pay'>Gross Salary</label>";
$data = array(	'name'=>'gross_pay',
				'id'=>'gross_pay',
				'size'=>'35',				
				'value' => $loan['grossPay']);
echo form_input($data)."</p>";

echo "<p><label for='take_pay'>Take Home Pay</label>";
$data = array(	'name'=>'take_pay',
				'id'=>'take_pay',
				'size'=>'35',				
				'value' => $loan['takePay']);
echo form_input($data)."</p>";

/*echo "<p><label for='app_sub_dt_time'>Application Submission Date & Time</label>";
$data = array('name'=>'app_sub_dt_time',
				'id'=>'datepicker',
				'class'=>'datepicker',		
				'value' => $loan['applicationSubmitDateTime']);
echo form_input($data)."</p>";

echo "<p><label for='app_edt_dt_time'>Aplication Edited Date & Time</label>";
$data = array('name'=>'app_edt_dt_time',
				'id'=>'datepicker',
				'class'=>'datepicker',		
				'value' => $loan['applicationEditDateTime']);
echo form_input($data)."</p>";*/


echo "<p><label for='status'>Select Status</label>";
$options = array('1' => 'Active', 
               '0' => 'Inactive');
echo form_dropdown('status', $options, $loan['status'])."</p>";

echo form_hidden('loan_id',$loan['id']);
echo form_submit('submit','Update Loan');
echo form_close();
?>

</fieldset>
