<fieldset>
    <legend><?php //echo $title." for ".$loan['applicantName']; ?></legend>
    <div id="link">
        <?php
        $attributes = array('id' => 'Emp_form', 'class' => 'my_entry_form');
        echo form_open_multipart(base_url() . 'products/edit_application/' . isset($loan['id']), $attributes);


        echo "<div align='center' style='font-weight:bold;color:#FFF;font-size:16px;background-color:#0099cc; line-height:30px; border-radius:5px;'>Loan Information</div>";

        echo "<p><label for='loan_id' style='font-weight:bold;font-size:14px;'>Loan ID</label>" . "</br>";
        $data = array('name' => 'loan_id',
            'id' => 'loan_id',
            'readonly' => 'readonly',
            'size' => '35',
            'value' => $loan['id']);
        echo form_input($data) . "</p>";

        echo "<p><label for='track_number' style='font-weight:bold;font-size:14px;'>Tracking Number</label>" . "</br>";
        $data = array('name' => 'track_number',
            'id' => 'track_number',
            'readonly' => 'readonly',
            'size' => '35',
            'value' => $loan['trackNumber']);
        echo form_input($data) . "</p>";

        echo "<p><label for='brcode' style='font-weight:bold;font-size:14px;'>Select Branch of Janata Bank Limited</label>" . "</br>";
        echo form_dropdown('brcode', $branches, $loan['brCode']) . "</p>";
//echo '<div class="errormessage">'.form_error('branchname').'</div></p>';


        echo "<p><label for='loan_type' style='font-weight:bold;font-size:14px;'>Select Loan Type</label>" . "</br>";
        echo form_dropdown('loan_type', $loantype, $loan['loanType']) . "</p>";
//echo '<div class="errormessage">'.form_error('loan_type').'</div></p>'; 


        echo "<p><label for='loan_amount' style='font-weight:bold;font-size:14px;'>Apply for Loan Amount</label>" . "</br>";
        $data = array('name' => 'loan_amount',
            'id' => 'loan_amount',
            'value' => $loan['loanAmount'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";
//echo '<p><div class="errormessage">'.form_error('loan_amount').'</div></p>';


        echo "<p><label for='loan_period' style='font-weight:bold;font-size:14px;'>Loan Period (Total Number of Months: Max. 240 Months or 20 Years)</label>" . "</br>";
        $data = array('name' => 'loan_period',
            'id' => 'loan_period',
            'value' => $loan['loanPeriod'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";
//echo '<div class="errormessage">'.form_error('loan_period').'</div></p>';



        echo "<div align='center' style='font-weight:bold;;color:#FFF;font-size:16px;background-color:#0099cc; line-height:30px; border-radius:5px;'>Personal Information</div>";



        echo "<p><label for='applicant_name' style='font-weight:bold;font-size:14px;'>Applicant's Name</label>" . "</br>";
        $data = array('name' => 'applicant_name',
            'id' => 'applicant_name',
            'value' => $loan['applicantName'],
            'style' => 'width:250px',
            'size' => 200
        );
        echo form_input($data) . "</p>";
//echo '<div class="errormessage">'.form_error('applicant_name').'</div></p>';


        echo "<p><label for='father_name' style='font-weight:bold;font-size:14px;'>Father's Name</label>" . "</br>";
        $data = array('name' => 'father_name',
            'id' => 'father_name',
            'value' => $loan['fatherName'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='mother_name' style='font-weight:bold;font-size:14px;'>Mother's Name</label>" . "</br>";
        $data = array('name' => 'mother_name',
            'id' => 'mother_name',
            'value' => $loan['motherName'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='spouse_name' style='font-weight:bold;font-size:14px;'>Spouse Name</label>" . "</br>";
        $data = array('name' => 'spouse_name',
            'id' => 'spouse_name',
            'value' => $loan['spouseName'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='birth_date' style='font-weight:bold;font-size:14px;'>Date of Birth</label>";
        echo "</br>";
        $data = array(
            'name' => 'date_birth',
            'type' => 'date',
            'value' => $loan['dob'],
            'style' => 'width:250px',
        );
        echo form_input($data) . "</p>";


        echo "<p><label for='sex' style='font-weight:bold;font-size:14px;'>Gender</label>" . "</br>";
        $options = array('1' => 'Male',
            '2' => 'Female');
        echo form_dropdown('gender', $options, $loan['gender']) . "</p>";

        echo "<p><label for='present_address' style='font-weight:bold;font-size:14px;'>Present Address</label>" . "</br>";
        $data = array('name' => 'present_address',
            'id' => 'present_address',
            'value' => $loan['presentAddress'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='permanent_address' style='font-weight:bold;font-size:14px;'>Permanent Address</label>" . "</br>";
        $data = array('name' => 'permanent_address',
            'id' => 'permanent_address',
            'value' => $loan['permanentAddress'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='mobile_number' style='font-weight:bold;font-size:14px;'>Mobile Number</label>" . "</br>";
        $data = array('name' => 'mobile_number',
            'id' => 'mobile_number',
            'value' => $loan['mobileNumber'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='land_phone' style='font-weight:bold;font-size:14px;'>Land Phone Number of the Resident (If Any)</label>" . "</br>";
        $data = array('name' => 'tnt_res',
            'id' => 'land_phone',
            'value' => $loan['tntRes'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='email' style='font-weight:bold;font-size:14px;'>Email (If Any)</label>" . "</br>";
        $data = array('name' => 'email',
            'id' => 'email',
            'value' => $loan['email'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='nid' style='font-weight:bold;font-size:14px;'>NID</label>" . "</br>";
        $data = array('name' => 'nid',
            'id' => 'nid',
            'value' => $loan['nid'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='tin' style='font-weight:bold;font-size:14px;'>TIN</label>" . "</br>";
        $data = array('name' => 'tin',
            'id' => 'tin',
            'value' => $loan['tin'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";



        echo "<div align='center' style='font-weight:bold;;color:#FFF;font-size:16px;background-color:#0099cc; line-height:30px; border-radius:5px;'>Job Information</div>";


        echo "<p><label for='office_name' style='font-weight:bold;font-size:14px;'>Office Name</label>" . "</br>";
        $data = array('name' => 'office_name',
            'id' => 'office_name',
            'value' => $loan['officeName'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='office_address' style='font-weight:bold;font-size:14px;'>Office Address</label>" . "</br>";
        $data = array('name' => 'office_add',
            'id' => 'office_address',
            'value' => $loan['officeAddress'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='department' style='font-weight:bold;font-size:14px;'>Ministry/Division/Department/Directorate</label>" . "</br>";
        $data = array('name' => 'dept',
            'id' => 'department',
            'value' => $loan['dept'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='curr_desig' style='font-weight:bold;font-size:14px;'>Applicant's Current Designation</label>" . "</br>";
        $data = array('name' => 'desig',
            'id' => 'curr_desig',
            'value' => $loan['designation'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='dt_join_curr_desig' style='font-weight:bold;font-size:14px;'>Joining Date at Current Designation (dd/mm/yyyy)</label>" . "</br>";
        $data = array('name' => 'date_curr_desig',
            'type' => 'date',
            'id' => 'dt_join_curr_desig',
            'value' => $loan['dtCurrDesig'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='tnt_office' style='font-weight:bold;font-size:14px;'>Land Phone Number of Office</label>" . "</br>";
        $data = array('name' => 'office_tnt',
            'id' => 'tnt_office',
            'value' => $loan['tntOffice'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='dt_join' style='font-weight:bold;font-size:14px;'>Joining Date in the Job (dd/mm/yyyy)</label>" . "</br>";
        $data = array('name' => 'date_join',
            'type' => 'date',
            'id' => 'dt_join',
            'value' => $loan['dtJob'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='dt_rtd' style='font-weight:bold;font-size:14px;'>Retirement Date (dd/mm/yyyy)</label>" . "</br>";
        $data = array('name' => 'date_rtr',
            'type' => 'date',
            'id' => 'dt_rtd',
            'value' => $loan['dtRtr'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='gpf' style='font-weight:bold;font-size:14px;'>Applicant's GPF Number</label>" . "</br>";
        $data = array('name' => 'gpf',
            'id' => 'gpf',
            'value' => $loan['gpf'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='office_id' style='font-weight:bold;font-size:14px;'>Applicant's Official Identification Number/ Official ID Number</label>" . "</br>";
        $data = array('name' => 'office_id',
            'id' => 'office_id',
            'value' => $loan['officeId'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='desig_grade' style='font-weight:bold;font-size:14px;'>Designation Grade</label>" . "</br>";
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
        echo form_dropdown('desig_grade', $options, $loan['designGrade']) . "</p>";

        echo "<p><label for='scale' style='font-weight:bold;font-size:14px;'>Salary Scale</label>" . "</br>";
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
        echo form_dropdown('salary_scale', $options, $loan['salaryScale']) . "</p>";

        echo "<p><label for='basic' style='font-weight:bold;font-size:14px;'>Basic Pay</label>" . "</br>";
        $data = array('name' => 'basic_pay',
            'id' => 'basic',
            'value' => $loan['basicPay'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='gross' style='font-weight:bold;font-size:14px;'>Gross Pay</label>" . "</br>";
        $data = array('name' => 'gross_pay',
            'id' => 'gross',
            'value' => $loan['grossPay'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

        echo "<p><label for='take_home' style='font-weight:bold;font-size:14px;'>Take Home Pay</label>" . "</br>";
        $data = array('name' => 'take_pay',
            'id' => 'take_home',
            'value' => $loan['takePay'],
            'style' => 'width:250px',
            'size' => 100
        );
        echo form_input($data) . "</p>";

//echo "<p><label for='status' style='font-weight:bold;font-size:14px;'>Select Status</label>"."</br></br></br>";
//$options = array('1' => 'Active', 
//               '0' => 'Inactive');
//echo form_dropdown('status', $options, $loan['status'])."</p>";

        $attributes = array(
            'name' => 'submit',
            'type' => 'submit',
            'id' => 'emp_submit',
            'value' => 'Submit',
            'style' => 'background-color:#069;width:150px;font-size:14px;color:#FFF;font-weight:bold;radius:10px;',
            'class' => 'submit_button');
        echo form_hidden('id', $loan['id']);
        echo "<p class='clear'>" . form_submit($attributes) . "</p>";
        echo form_close();
        ?>

    </div>

</fieldset>


