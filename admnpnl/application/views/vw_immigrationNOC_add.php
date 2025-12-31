<fieldset>
    <style>
        .uploaddate{
            cursor: not-allowed;
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

    <p style="margin: -40px 0 0 -22px;"><?php echo anchor("admin/immigration_noc", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
    <h1 style="font-size: 20px; margin: -22px 0 0 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>
    <?php
    $attributes = array('id' => 'noc_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/immigration_noc/addNOC', $attributes);

    echo "<div class='form-group'><label for='name'>Name</label></br>";
    $data = array('name' => 'name',
        'id' => 'name',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => (isset($_POST['name']) ? $_POST['name'] : '' )
    );
    echo form_textarea($data);
    echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('name') . '</div></span></div>';

    /*     * *****	For designation Dropdown ****** */
    echo "<div class='form-group'><label for='designation'>Designation</label></br>";
    //echo form_dropdown('employeedesig', $designation)."</p>";
    echo "<select name='designation' id='designation' class='formTextArea'>";
    echo'<option value="">--select--</option>';
    foreach ($designation as $row) {
        echo '<option value="' . $row->designation . '"> ' . $row->designation . ' </option>';
    }
    echo"</select>";
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; " >' . form_error('designation') . '</div></div>';

    /*     * *****	For File No Prefix Dropdown ****** */
    echo "<div class='form-group'><label for='fileNoPrefix'>File No. Prefix </label></br>";
    //echo form_dropdown('fileNoPrefix', $fileNoPrefix) . "</p>";
    echo "<select name='fileNoPrefix' id='fileNoPrefix' class='formTextArea'>";
    echo'<option value="">--select--</option>';
    foreach ($fileNoPrefix as $row) {
        echo '<option value="' . $row->fileNoPrefix . '"> ' . $row->fileNoPrefix . ' </option>';
    }
    echo"</select>";
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; " >' . form_error('fileNoPrefix') . '</div></div>';

    /*     * *****	END fileNoPrefix Dropdown  ****** */

    echo "<div class='form-group'><label for='fileno'>File No.</label></br>";
    $data = array('name' => 'fileNo',
        'id' => 'fileNo',
        'class' => 'formTextArea',
        'value' => (isset($_POST['fileNo']) ? $_POST['fileNo'] : '' )
        //'placeholder' => 'Type only the number'
    );
    echo form_input($data);
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('fileNo') . '</div></div>';
    if (isset($duplicateFile) && !empty($duplicateFile)) {
        echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . $duplicateFile . '</div></p>';
    }

    echo "<div class='form-group'><label for='days'>Approved Days</label></br>";
    $data = array('name' => 'days',
        'id' => 'days',
        'class' => 'formTextArea',
        'value' => (isset($_POST['days']) ? $_POST['days'] : '' )
    );
    echo form_input($data);
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('days') . '</div></div>';

    echo "<div class='form-group'><label for='country'>Country</label></br>";
    $data = array('name' => 'country',
        'id' => 'country',
        'class' => 'formTextArea',
        'value' => (isset($_POST['country']) ? $_POST['country'] : '' )
    );
    echo form_input($data);
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('country') . '</div></div>';
    
    echo "<div class='form-group'><label for='purpose'>Purpose of the visit</label></br>";
    $data = array('name' => 'purpose',
        'id' => 'purpose',
        'class' => 'formTextArea',
        'value' => (isset($_POST['purpose']) ? $_POST['purpose'] : '' )
    );
    echo form_input($data);
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('purpose') . '</div></div>';

    /*     * *****	For Place of Posting Dropdown ****** */
    echo "<div class='form-group'><label for='posting'>Place of Posting </label></br>";
    //echo form_dropdown('employeeposting', $allBranchs) . "</p>";
    echo "<select name='posting' id='posting'  class='formTextArea'>";
    echo'<option value="">--select--</option>';
    foreach ($allBranchs as $row) {
        echo '<option value="' . $row->officeName . '"> ' . $row->officeName . ' </option>';
    }
    echo"</select>";
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; " >' . form_error('employeeposting') . '</div></div>';

    /*     * *****	END For Place of Posting Dropdown  ****** */


    echo "<div class='form-group'><label for='nocdate'>NOC Issue Date</label></br>";
    $data = array(
        'name' => 'nocDt',
        'id' => 'nocDt',
        'class' => 'issuedate',
        'class' => 'formTextArea',
        'value' => (isset($_POST['nocDt']) ? $_POST['nocDt'] : '' )
    );
    echo form_input($data);
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('nocDt') . '</div></div>';

    echo "<div class='form-group'><label for='upload_time'>NOC Upload Date</label></br>";
    $data = array(
        'name' => 'uploadDt',
        'id' => 'uploadDt',
        'class' => 'uploaddate',
        'readonly' => 'readonly',
        //'type' => 'hidden',
        'value' => (isset($_POST['uploadDt']) ? $_POST['uploadDt'] : date('Y-m-d') )
    );
    echo form_input($data);
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; ">' . form_error('uploadDt') . '</div></div>';

////// upload noc file

    echo "<div class='form-group'><label for='upload'>Upload NOC File</label></br>";
    $data = array('name' => 'myfile', 'id' => 'upload', 'class' => 'formUpload');

    echo form_upload($data) . "</div>";
    if (isset($error_mssg) && !empty($error_mssg)) {

        echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . $error_mssg . '</div></p>';
    }

    echo "<div class='form-group'><label for='upload_by'>Uploaded By</label></br>";
    $data = array(
        'name' => 'upload_by',
        'id' => 'upload_by',
        'readonly' => 'readonly',
        'class' => 'uploaddate',
        'value' => (isset($_POST['upload_by']) ? $_POST['upload_by'] : $_SESSION['username'])
    );
    echo form_input($data) . "</div>";

    
    echo "<div class='form-group'><label for='status'>Status</label></br>";
    $options = array('Active' => 'Active', 'Inactive' => 'Inactive');
    echo form_dropdown('status', $options) . "</div>";
    
    /*echo "<div class='form-group'><label for='noc_status'>NOC Status</label></br>";
    $data = array(
        'name' => 'status',
        'id' => 'noc_status',
        //'type' => 'hidden',
        'readonly' => 'readonly',
        'class' => 'uploaddate',
        'value' => (isset($_POST['noc_status']) ? $_POST['noc_status'] : 'Active' )
    );
    echo form_input($data);
    echo '<div class="errormessage">' . form_error('employee_noc_file') . '</div></div>';

    */
    
    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'noc_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#nocDt').datepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: 'yy-mm-dd',
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:"
            });
        });

        //Key board Number only
        $('#employeefile').keypress(function (event) {
            if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
                event.preventDefault(); //stop character from entering input
            }
        });

    </script>

</fieldset>
