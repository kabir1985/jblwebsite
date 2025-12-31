
<html>
    <head>

    </head>

    <body>


        <div align="center">
            <?php
            //$error_mssg="";
            if (isset($error_mssg) && !empty($error_mssg)) {
                //echo $error_mssg;
                echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . $error_mssg . '</div></p>';
            }
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('brcode') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('loan_type') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('loan_amount') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('loan_period') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('applicant_name') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('father_name') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('mother_name') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('birth_date') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('sex') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('present_address') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('permanent_address') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('mobile_number') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('nid') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('tin') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('office_name') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('office_address') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('department') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('curr_desig') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('dt_join_curr_desig') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('tnt_office') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('dt_join') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('dt_rtd') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('gpf') . '</div></p>';
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('basic') . '</div></p>';
            ?>
        </div>


        <div id="link">
            <?php
            $attributes = array('id' => 'Emp_form', 'class' => 'my_entry_form');
            echo form_open_multipart(base_url() . 'products/online_application_govt_loan', $attributes);


            echo "<div align='center' style='font-weight:bold;color:#FFF;font-size:16px;background-color:#0099cc; line-height:30px; border-radius:5px;'>Loan Information</div>";


            echo "<p><label for='brcode' style='font-weight:bold;font-size:14px;'>Select Branch</label>" . "</br>";
            echo form_dropdown('brcode', $branches) . "</p>";
//echo '<div class="errormessage">'.form_error('branchname').'</div></p>';


            echo "<p><label for='loan_type' style='font-weight:bold;font-size:14px;'>Select Loan Type</label>" . "</br>";
            echo form_dropdown('loan_type', $loantype) . "</p>";
//echo '<div class="errormessage">'.form_error('loan_type').'</div></p>'; 


            echo "<p><label for='loan_amount' style='font-weight:bold;font-size:14px;'>Apply for Loan Amount</label>" . "</br>";
            $data = array('name' => 'loan_amount',
                'id' => 'loan_amount',
                'value' => (isset($_POST['loan_amount']) ? $_POST['loan_amount'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";
//echo '<p><div class="errormessage">'.form_error('loan_amount').'</div></p>';


            echo "<p><label for='loan_period' style='font-weight:bold;font-size:14px;'>Loan Period (Total Number of Months: Max. 240 Months or 20 Years)</label>" . "</br>";
            $data = array('name' => 'loan_period',
                'id' => 'loan_period',
                'value' => (isset($_POST['loan_period']) ? $_POST['loan_period'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";
//echo '<div class="errormessage">'.form_error('loan_period').'</div></p>';



            echo "<div align='center' style='font-weight:bold;;color:#FFF;font-size:16px;background-color:#0099cc; line-height:30px; border-radius:5px;'>Personal Information</div>";



            echo "<p><label for='applicant_name' style='font-weight:bold;font-size:14px;'>Applicant's Name</label>" . "</br>";
            $data = array('name' => 'applicant_name',
                'id' => 'applicant_name',
                'value' => (isset($_POST['applicant_name']) ? $_POST['applicant_name'] : '' ),
                'style' => 'width:250px',
                'size' => 200
            );
            echo form_input($data) . "</p>";
//echo '<div class="errormessage">'.form_error('applicant_name').'</div></p>';


            echo "<p><label for='father_name' style='font-weight:bold;font-size:14px;'>Father's Name</label>" . "</br>";
            $data = array('name' => 'father_name',
                'id' => 'father_name',
                'value' => (isset($_POST['father_name']) ? $_POST['father_name'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='mother_name' style='font-weight:bold;font-size:14px;'>Mother's Name</label>" . "</br>";
            $data = array('name' => 'mother_name',
                'id' => 'mother_name',
                'value' => (isset($_POST['mother_name']) ? $_POST['mother_name'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='spouse_name' style='font-weight:bold;font-size:14px;'>Spouse Name</label>" . "</br>";
            $data = array('name' => 'spouse_name',
                'id' => 'spouse_name',
                'value' => (isset($_POST['spouse_name']) ? $_POST['spouse_name'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='birth_date' style='font-weight:bold;font-size:14px;'>Date of Birth</label>";
            echo "</br>";
            $data = array(
                'name' => 'birth_date',
                'type' => 'date',
                'value' => (isset($_POST['birth_date']) ? $_POST['birth_date'] : '' ),
                'style' => 'width:250px',
            );
            echo form_input($data) . "</p>";


            echo "<p><label for='sex' style='font-weight:bold;font-size:14px;'>Gender</label>" . "</br>";
            echo "<select name='sex' id='type'>
                 <option value=''>--Select Gender--</option>
                 <option value='1'>Male</option>
                 <option value='2'>Female</option>";
            echo "</select>";
//echo '<div class="errormessage">'.form_error('sex').'</div></p>';

            echo "<p><label for='present_address' style='font-weight:bold;font-size:14px;'>Present Address</label>" . "</br>";
            $data = array('name' => 'present_address',
                'id' => 'present_address',
                'value' => (isset($_POST['present_address']) ? $_POST['present_address'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='permanent_address' style='font-weight:bold;font-size:14px;'>Permanent Address</label>" . "</br>";
            $data = array('name' => 'permanent_address',
                'id' => 'permanent_address',
                'value' => (isset($_POST['permanent_address']) ? $_POST['permanent_address'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='mobile_number' style='font-weight:bold;font-size:14px;'>Mobile Number</label>" . "</br>";
            $data = array('name' => 'mobile_number',
                'id' => 'mobile_number',
                'value' => (isset($_POST['mobile_number']) ? $_POST['mobile_number'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='land_phone' style='font-weight:bold;font-size:14px;'>Land Phone Number of the Resident (If Any)</label>" . "</br>";
            $data = array('name' => 'land_phone',
                'id' => 'land_phone',
                'value' => (isset($_POST['land_phone']) ? $_POST['land_phone'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='email' style='font-weight:bold;font-size:14px;'>Email (If Any)</label>" . "</br>";
            $data = array('name' => 'email',
                'id' => 'email',
                'value' => (isset($_POST['email']) ? $_POST['email'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='nid' style='font-weight:bold;font-size:14px;'>NID</label>" . "</br>";
            $data = array('name' => 'nid',
                'id' => 'nid',
                'value' => (isset($_POST['nid']) ? $_POST['nid'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='tin' style='font-weight:bold;font-size:14px;'>TIN</label>" . "</br>";
            $data = array('name' => 'tin',
                'id' => 'tin',
                'value' => (isset($_POST['tin']) ? $_POST['tin'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";



            echo "<div align='center' style='font-weight:bold;;color:#FFF;font-size:16px;background-color:#0099cc; line-height:30px; border-radius:5px;'>Job Information</div>";


            echo "<p><label for='office_name' style='font-weight:bold;font-size:14px;'>Office Name</label>" . "</br>";
            $data = array('name' => 'office_name',
                'id' => 'office_name',
                'value' => (isset($_POST['office_name']) ? $_POST['office_name'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='office_address' style='font-weight:bold;font-size:14px;'>Office Address</label>" . "</br>";
            $data = array('name' => 'office_address',
                'id' => 'office_address',
                'value' => (isset($_POST['office_address']) ? $_POST['office_address'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='department' style='font-weight:bold;font-size:14px;'>Ministry/Division/Department/Directorate</label>" . "</br>";
            $data = array('name' => 'department',
                'id' => 'department',
                'value' => (isset($_POST['department']) ? $_POST['department'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='curr_desig' style='font-weight:bold;font-size:14px;'>Applicant's Current Designation</label>" . "</br>";
            $data = array('name' => 'curr_desig',
                'id' => 'curr_desig',
                'value' => (isset($_POST['curr_desig']) ? $_POST['curr_desig'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='dt_join_curr_desig' style='font-weight:bold;font-size:14px;'>Joining Date at Current Designation (dd/mm/yyyy)</label>" . "</br>";
            $data = array('name' => 'dt_join_curr_desig',
                'type' => 'date',
                'id' => 'dt_join_curr_desig',
                'value' => (isset($_POST['dt_join_curr_desig']) ? $_POST['dt_join_curr_desig'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='tnt_office' style='font-weight:bold;font-size:14px;'>Land Phone Number of Office</label>" . "</br>";
            $data = array('name' => 'tnt_office',
                'id' => 'tnt_office',
                'value' => (isset($_POST['tnt_office']) ? $_POST['tnt_office'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='dt_join' style='font-weight:bold;font-size:14px;'>Joining Date in the Job (dd/mm/yyyy)</label>" . "</br>";
            $data = array('name' => 'dt_join',
                'type' => 'date',
                'id' => 'dt_join',
                'value' => (isset($_POST['dt_join']) ? $_POST['dt_join'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='dt_rtd' style='font-weight:bold;font-size:14px;'>Retirement Date (dd/mm/yyyy)</label>" . "</br>";
            $data = array('name' => 'dt_rtd',
                'type' => 'date',
                'id' => 'dt_rtd',
                'value' => (isset($_POST['dt_rtd']) ? $_POST['dt_rtd'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='gpf' style='font-weight:bold;font-size:14px;'>Applicant's GPF Number</label>" . "</br>";
            $data = array('name' => 'gpf',
                'id' => 'gpf',
                'value' => (isset($_POST['gpf']) ? $_POST['gpf'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='office_id' style='font-weight:bold;font-size:14px;'>Applicant's Official Identification Number/ Official ID Number</label>" . "</br>";
            $data = array('name' => 'office_id',
                'id' => 'office_id',
                'value' => (isset($_POST['office_id']) ? $_POST['office_id'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            /* echo "<p><label for='desig_grade' style='font-weight:bold;font-size:14px;'>Designation Grade</label>"."</br>";
              $data = array(	'name'=>'desig_grade',
              'id'=>'desig_grade',
              'value'=>(isset($_POST['desig_grade']) ? $_POST['desig_grade'] : '' ),
              'size'=>100
              );
              echo form_input($data) ."</p>"; */

            echo "<p><label for='desig_grade' style='font-weight:bold;font-size:14px;'>Designation Grade</label>" . "</br>";
            echo "<select name='desig_grade' id='type'>
                 <option value=''>--Select Grade--</option>
                 <option value='1'>Grade- 1</option>
                 <option value='2'>Grade- 2</option>
                 <option value='3'>Grade- 3</option>
                 <option value='4'>Grade- 4</option>
                 <option value='5'>Grade- 5</option>
                 <option value='6'>Grade- 6</option>
                 <option value='7'>Grade- 7</option>
                 <option value='8'>Grade- 8</option>
                 <option value='9'>Grade- 9</option>
                 <option value='10'>Grade- 10</option>
                 <option value='11'>Grade- 11</option>";
            echo "</select>";

            /* echo "<p><label for='scale' style='font-weight:bold;font-size:14px;'>Salary Scale</label>"."</br>";
              $data = array(	'name'=>'scale',
              'id'=>'scale',
              'value'=>(isset($_POST['scale']) ? $_POST['scale'] : '' ),
              'size'=>100
              );
              echo form_input($data) ."</p>"; */

            echo "<p><label for='scale' style='font-weight:bold;font-size:14px;'>Salary Scale</label>" . "</br>";
            echo "<select name='scale' id='type'>
                 <option value=''>--Select Salary Scale--</option>
                 <option value='78000 (Fixed)'>BDT 78000 (Fixed)</option>
                 <option value='66000- 76490'>BDT 66000- 76490</option>
                 <option value='56500- 74400'>BDT 56500- 74400</option>
                 <option value='50000- 71200'>BDT 50000- 71200</option>
                 <option value='43000- 69850'>BDT 43000- 69850</option>
                 <option value='35500- 67010'>BDT 35500- 67010</option>
                 <option value='29000- 63410'>BDT 29000- 63410</option>
                 <option value='23000- 55470'>BDT 23000- 55470</option>
                 <option value='22000- 53060'>BDT 22000- 53060</option>
                 <option value='16000- 38640'>BDT 16000- 38640</option>
                 <option value='12500- 30230'>BDT 12500- 30230</option>";
            echo "</select>";

            echo "<p><label for='basic' style='font-weight:bold;font-size:14px;'>Basic Pay</label>" . "</br>";
            $data = array('name' => 'basic',
                'id' => 'basic',
                'value' => (isset($_POST['basic']) ? $_POST['basic'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='gross' style='font-weight:bold;font-size:14px;'>Gross Pay</label>" . "</br>";
            $data = array('name' => 'gross',
                'id' => 'gross',
                'value' => (isset($_POST['gross']) ? $_POST['gross'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='take_home' style='font-weight:bold;font-size:14px;'>Take Home Pay</label>" . "</br>";
            $data = array('name' => 'take_home',
                'id' => 'take_home',
                'value' => (isset($_POST['take_home']) ? $_POST['take_home'] : '' ),
                'style' => 'width:250px',
                'size' => 100
            );
            echo form_input($data) . "</p>";

            echo "<p><label for='password' style='font-weight:bold;font-size:14px;'>Password for Future Edit</label></br>";
            $data = array(
                'name' => 'password',
                'id' => 'pwd',
                'value' => (isset($_POST['password']) ? $_POST['password'] : '' ),               
                'data-toggle' => 'password'
            );
            echo form_password($data);



            $data = array(
                'name' => 'loan_status',
                'id' => 'loan_status',
                'type' => 'hidden',
                'readonly' => 'readonly',
                'value' => (isset($_POST['loan_status']) ? $_POST['loan_status'] : '1' )
            );
            echo form_input($data) . "</p>";


            $attributes = array(
                'name' => 'submit',
                'type' => 'submit',
                'id' => 'emp_submit',
                'value' => 'Submit Application',
                'style' => 'background-color:#069;width:150px;font-size:14px;color:#FFF;font-weight:bold;radius:10px;',
                'class' => 'submit_button');
            echo "<p class='clear'>" . form_submit($attributes) . "</p>";
            echo form_close();
            ?>

        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-show-password.min.js"></script> 

    </body>
</html>
