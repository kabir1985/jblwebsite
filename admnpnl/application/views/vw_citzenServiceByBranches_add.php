<fieldset>
    <style>
        .uploaddate{
            /*cursor: not-allowed;*/
            background-color: #D9ECF3;
            opacity: 1;
        }
        .control-group{
            /*float: left;*/
        }
        .issuedate{
            cursor: pointer;
        }

        .ui-datepicker-trigger{
            cursor: pointer;
        }

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

    </style>

    <p style="margin: -40px 0 0 -22px;"><?php echo anchor("admin/Citizen_charter/index_branches", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
    <h1 style="font-size: 20px; margin: -22px 0 0 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>
    <?php
    echo validation_errors();
    $attributes = array('id' => 'charter_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/Citizen_charter/addCitizenServicesByBranches', $attributes);
    
    echo "<div class='form-group'><label for='relatedDepartment '>শাখার নাম</label></br>";
    echo "<select name='branch_code' id='relatedDepartment' class='formTextArea'>";
    echo'<option value="">--SELECT--</option>';
    foreach ($branches as $row) {
        echo '<option value="' . $row->brcode . '"> ' . $row->branchname . ' </option>';
    }
    echo"</select>";
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; " >' . form_error('branch_code') . '</div></div>';

   

    echo "<div class='form-group'><label for='service'>সেবার নাম</label></br>";
    $data = array('name' => 'name_of_services',
        'id' => 'services',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => (isset($_POST['name_of_services']) ? $_POST['name_of_services'] : '' )
    );
    echo form_textarea($data);
    echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('name_of_services') . '</div></span></div>';

    echo "<div class='form-group'><label for='charge'>সেবা প্রদান পদ্ধতি</label></br>";
    $data = array(
        'name' => 'metohd_of_providing_services',
        'id' => 'metohd_of_providing_services',
		 'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => (isset($_POST['metohd_of_providing_services']) ? $_POST['metohd_of_providing_services'] : '' )
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('metohd_of_providing_services') . '</div></div>';

    echo "<div class='form-group'><label for='description'>প্রয়োজনীয় কাগজপত্র  এবং প্রাপ্তিস্থান</label></br>";
    $data = array('name' => 'necessary_doc_and_receipt',
        'id' => 'necessary_doc_and_receipt',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => (isset($_POST['necessary_doc_and_receipt']) ? $_POST['necessary_doc_and_receipt'] : '' )
    );
    echo form_textarea($data);
    echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('necessary_doc_and_receipt') . '</div></span></div>';

    echo "<div class='form-group'><label for='rate'>সেবার মূল‌্য এবং পরিশোধ পদ্ধতি</label></br>";
    $data = array(
        'name' => 'service_price_and_payment',
        'id' => 'service_price_and_payment',
		'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => (isset($_POST['service_price_and_payment']) ? $_POST['service_price_and_payment'] : '' )
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('service_price_and_payment') . '</div></div>';

   /*   
   echo "<div class='form-group'><label for='relatedDepartment '>Related Department </label></br>";
    echo "<select name='relatedDepartment' id='relatedDepartment' class='formTextArea'>";
    echo'<option value="">--SELECT--</option>';
    foreach ($hoDept as $row) {
        echo '<option value="' . $row->office_code . '"> ' . $row->office_name . ' </option>';
    }
    echo"</select>";
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; " >' . form_error('relatedDepartment') . '</div></div>';

    echo "<div class='form-group'><label for='displayInBoard'>Display On Board</label></br>";
    $options = array(
        '' => 'SELECT',
        '1' => 'Yes',
        '0' => 'No'
    );
    echo form_dropdown('displayInBoard', $options) . "</div>";
	*/


    echo "<div class='form-group'><label for='rate'>সেবা প্রদানের সময়সীমা</label></br>";
    $data = array(
        'name' => 'period_of_service',
        'id' => 'period_of_service',
		'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => (isset($_POST['period_of_service']) ? $_POST['period_of_service'] : '' )
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('period_of_service') . '</div></div>';
	
	echo "<div class='form-group'><label for='rate'>বিভাগীয় প্রধানের নাম,পদবী,মোবাইল,ফোন নম্বর ও ই-মেইল</label></br>";
    $data = array(
        'name' => 'officer_in_charge',
        'id' => 'officer_in_charge',
		'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => (isset($_POST['officer_in_charge']) ? $_POST['officer_in_charge'] : '' )
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('officer_in_charge') . '</div></div>';

    echo "<div class='form-group'><label for='entryDate'>তারিখ</label></br>";
    $data = array(
        'name' => 'entryDate',
        'id' => 'entryDate',
        'class' => 'entryDate',
        'required' => 'required',
         'class'=>'formTextArea',
        'value' => (isset($_POST['entryDate']) ? $_POST['entryDate'] : '' )
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('entryDate') . '</div></div>';
    
	/*
	 echo "<div class='form-group'><label for='marquee'>Marquee</label></br>";
    $options = array(
        '' => 'SELECT',
        '1' => 'Yes',
        '0' => 'No'
    );
    echo form_dropdown('marquee', $options) . "</div>";
	*/
    
    echo "<div class='form-group'><label for='status'>অবস্থা</label></br>";
    $data = array(
        'name' => 'status',
        'id' => 'status',
        'readonly' => 'readonly',
        'class'=>'formTextArea',
        'value' => (isset($_POST['status']) ? $_POST['status'] : '1' )
    );
    //echo '<input type="checkbox" id="status" name="status" class="selectCheck" value="1" onchange="checkboxClick(this)"> Active<br>';
    //echo '<input type="checkbox" id="status" name="status" class="selectCheck" value="0" onchange="checkboxClick(this)"> Inactive';
    echo form_input($data);
    echo '<div class="errormessage">' . form_error('status') . '</div></div>';

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'noc_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>


    <!--script>
        function checkboxClick(obj) {
            var cbs = document.getElementsByClassName("selectCheck");
            for (var i = 0; i < cbs.length; i++) {
                cbs[i].checked = false;
            }
            obj.checked = true;
        }
    </script-->
    
     <script type="text/javascript">
        $(document).ready(function () {
            $('#entryDate').datepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: 'yy-mm-dd',
                changeYear: true,
                changeMonth: true,
                yearRange:  "1971:2071"
            });
        });
    </script>


</fieldset>
