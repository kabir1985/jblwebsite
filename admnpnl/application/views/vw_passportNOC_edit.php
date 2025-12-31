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
            background-color: #D9ECF3;
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
        .controls  .help-inline{
            background-color:  #DAF7A6;
        }

    </style>

    <p style="margin: -40px 0 0 -22px;"><?php echo anchor("admin/passport_noc", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
    $splitedFileNo = explode("-", $noc['employee_file']);
    $splitedFileNo_numberpart = array_pop($splitedFileNo);
    $splitedFileNo_prefixPart = implode("-", $splitedFileNo);

    $attributes = array('id' => 'noc_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/passport_noc/edit', $attributes);

    echo "<div class='form-group'><label for='name'>Employee Name</label></br>";
    $data = array('name' => 'employeename',
        'id' => 'employeename',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => $noc['employee_name']);
    echo form_textarea($data) . "</div>";

    /*     * Designation Dropdown */
    echo "<div class='form-group'><label for='employeedesig'>Employee's Designation </label></br>";
    echo "<select name='employeedesig' id='employeedesig' class='formTextArea'>";
    echo '<option value="' . $noc['employee_desig'] . '"> ' . $noc['employee_desig'] . ' </option>';
    echo'<option value="">--select--</option>';
    foreach ($designation as $row) {
        echo '<option value="' . $row->designation . '"> ' . $row->designation . ' </option>';
    }
    echo"</select>";
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; " >' . form_error('employeedesig') . '</div></div>';

    /** END Designation Dropdown */
    /*     * *****	For File No Prefix Dropdown ****** */
    echo "<div class='form-group'><label for='fileNoPrefix'>File No. Prefix </label></br>";
    //echo form_dropdown('fileNoPrefix', $fileNoPrefix, $splitedFileNo_prefixPart) . "</p>";
    echo "<select name='fileNoPrefix' id='fileNoPrefix' class='formTextArea'>";
    echo '<option value="' . $splitedFileNo_prefixPart . '"> ' . $splitedFileNo_prefixPart . ' </option>';
    echo'<option value="">--select--</option>';
    foreach ($fileNoPrefix as $row) {
        echo '<option value="' . $row->fileNoPrefix . '"> ' . $row->fileNoPrefix . ' </option>';
    }
    echo"</select>";
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; " >' . form_error('fileNoPrefix') . '</div></div>';

    /*     * *****	END fileNoPrefix Dropdown  ****** */


    echo "<div class='form-group'><label for='title'>Employee Peronal File No.</label></br>";
    $data = array('name' => 'employeefile',
        'id' => 'employeefile',
        'class' => 'formTextArea',
        'value' => $splitedFileNo_numberpart);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='title'>Employee's Father Name</label></br>";
    $data = array('name' => 'employeefathername',
        'id' => 'employeefathername',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => $noc['employee_father_name']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='title'>Employee's Current Passport No.</label></br>";
    $data = array('name' => 'employeecurrpass',
        'id' => 'employeecurrpass',
        'class' => 'formTextArea',
        'value' => $noc['employee_curr_pass']);
    echo form_input($data) . "</div>";

    /*     * *****	For Place of Posting Dropdown ****** */
    echo "<div class='form-group'><label for='employeeposting'>Employee's Place of Posting </label></br>";
    echo "<select name='employeeposting' id='employeeposting'  class='formTextArea'>";
    echo '<option value="' . $noc['employee_posting_place'] . '"> ' . $noc['employee_posting_place'] . ' </option>';
    echo'<option value="">--select--</option>';
    foreach ($allBranchs as $row) {
        echo '<option value="' . $row->officeName . '"> ' . $row->officeName . ' </option>';
    }
    echo"</select>";
    echo '<div class="errormessage" style="color:#F00; font-weight:bold; " >' . form_error('employeeposting') . '</div></div>';

    /*     * *****	END For Place of Posting Dropdown  ****** */

    echo "<div class='form-group'><label for='noc_date'>NOC Date</label></br>";
    $data = array(
        'name' => 'nocdate',
        'id' => 'issuedate',
        'class' => 'issuedate',
        //'class' => 'formTextArea',
        'value' => $noc['noc_date']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='ulpaddate'>Upload Date</label></br>";
    $data = array(
        'name' => 'uploaddate',
        'id' => 'uploaddate',
        'class' => 'uploaddate',
        'readonly' => 'readonly',
        'value' => $noc['upload_date']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='upload'>NOC File</label><br/>";
    $data = array(
        'name' => 'myfile',
        'id' => 'upload',
        'class' => 'formUpload',
        'value' => $noc['employee_noc_file']);
    //echo '<pre>';
   // print_r($data); die();
    //echo "<span>Current File: " . $noc["employee_noc_file"] . "</span>";
    //echo form_upload($data) . "</div>";
    echo '<div class="controls">' . form_upload($data) . '<span class="help-inline">Current file: ' . $noc["employee_noc_file"] . '</span></div></div>';

    echo "<div class='form-group'><label for='uploadedby'>Uploaded By</label></br>";
    $data = array(
        'name' => 'upload_by',
        'id' => 'uploadby',
        'class' => 'uploaddate',
        'readonly' => 'readonly',
        'value' => $noc['upload_by']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='status'>NOC Status</label><br/>";
    $data = array(
        'name' => 'status',
        'id' => 'status',
        'class' => 'formTextArea',
        'size' => 25,
        'value' => $noc['status']);
    echo form_input($data) . "</div>";

    echo form_hidden('employee_id', $noc['employee_id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
    echo form_close();
    ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#issuedate').datepicker({
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