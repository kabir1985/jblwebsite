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

    <p style="margin: -40px 0 0 -22px;"><?php echo anchor("admin/Citizen_charter", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
    <h1 style="font-size: 20px; margin: -22px 0 0 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>
    <?php
    echo validation_errors();
    $attributes = array('id' => 'charter_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/Citizen_charter/addCitizenServices', $attributes);

    echo "<div class='form-group'><label for='service'>Name of Service</label></br>";
    $data = array('name' => 'services',
        'id' => 'services',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => (isset($_POST['services']) ? $_POST['services'] : '' )
    );
    echo form_textarea($data);
    echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('services') . '</div></span></div>';

    echo "<div class='form-group'><label for='charge'>Nature of Charge</label></br>";
    $data = array(
        'name' => 'natureOfCharge',
        'id' => 'natureOfCharge',
		 'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => (isset($_POST['natureOfCharge']) ? $_POST['natureOfCharge'] : '' )
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('natureOfCharge') . '</div></div>';

    echo "<div class='form-group'><label for='description'>Description</label></br>";
    $data = array('name' => 'description',
        'id' => 'description',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => (isset($_POST['description']) ? $_POST['description'] : '' )
    );
    echo form_textarea($data);
    echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('description') . '</div></span></div>';

    echo "<div class='form-group'><label for='rate'>Rate</label></br>";
    $data = array(
        'name' => 'rate',
        'id' => 'rate',
		'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => (isset($_POST['rate']) ? $_POST['rate'] : '' )
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('rate') . '</div></div>';

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

    echo "<div class='form-group'><label for='entryDate'>Entry Date</label></br>";
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
    
	
	 echo "<div class='form-group'><label for='marquee'>Marquee</label></br>";
    $options = array(
        '' => 'SELECT',
        '1' => 'Yes',
        '0' => 'No'
    );
    echo form_dropdown('marquee', $options) . "</div>";
	
    
    echo "<div class='form-group'><label for='status'>Status</label></br>";
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
