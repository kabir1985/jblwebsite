<span style="margin-top: 0px;"><?php echo anchor("admin/tender", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></span>
<fieldset>
    <legend><h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1></legend>

    <style>
        .readonly{
            cursor: not-allowed;
            background-color: #D9ECF3;
            opacity: 1;
        }
        .form-control:valid{
            background-color: #D9ECF3!important;
        }
        .expDate{
            height: 25px!important;
        }
        .expDate:valid{
            background-color: #D9ECF3!important;
        }
        .control-group{
            /*float: left;*/
        }
        .form-group{
            padding: 10px;
        }
        #expiryDate{
            /*background-color:  #D9ECF3!important;*/         
        }  

        .ui-datepicker-trigger{
            cursor: pointer;
        }
        
        .formUpload{
            background-color: #0099cc;
            color: white;
        }

    </style>

    <?php
    $attributes = array('id' => 'tender_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/tender/edit', $attributes);

    echo "<div class='form-group'><label for='tender_title'>Tender Title</label><br/>";
    $data = array('name' => 'tender_title',
        'id' => 'tender_title',
        'rows' => 2,
        'col' => 4,
        'value' => $tender['tender_title']);
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage txt-danger" >' . form_error('tender_title') . '</div></div>';

    /*     * Tender Type Start */

    echo "<div class='form-group'><label for='tender_type'>Type :</label></br>";
    echo form_dropdown('tender_type', $tender_type, $tender['tender_type']) . "</p>";
// echo '<div class="errormessage" style="color:#F00; font-weight:bold; " >'.form_error('tender_type').'</div></p>';
    echo '<div class="errormessage txt-danger" >' . form_error('tender_type') . '</div></div>';

    /*     * Tender Type End */

    echo "<div class='form-group'><label for='tender_reference'>Tender Reference</label><br/>";
    $data = array(
        'name' => 'tender_reference',
        'id' => 'tender_reference',
        'rows' => 1,
        'col' => 4,
        'value' => $tender['tender_reference']
    );
    echo form_textarea($data) . "</div>";

    /*     * * Tender Offerded by start  ** */
    echo "<div class='form-group'><label for='tender_offered_by'>Tender Offered By</label></br>";
    echo form_dropdown('tender_offered_by', $allBranchs, $tender['tender_offered_by']) . "</p>";
// echo '<div class="errormessage" style="color:#F00; font-weight:bold; " >'.form_error('tender_offered_by').'</div></p>';
    echo '<div class="errormessage txt-danger" >' . form_error('tender_offered_by') . '</div></div>';
    /*     * * Tender Offerded by End  ** */

    echo "<div class='form-group'><label for='tender_starting_date'>Tender Starting Date</label><br/>";
    $data = array(
        'name' => 'tender_starting_date',
        'id' => 'startDate',
        'class' => 'datetimepicker',
        'value' => $tender['tender_starting_date']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='tender_closing_date'>Tender Closing Date</label><br/>";
    $data = array(
        'name' => 'tender_closing_date',
        'id' => 'endDate',
        'class' => 'datetimepicker',
        'value' => $tender['tender_closing_date']);
    echo form_input($data) . "</div>";


    echo "<div class='form-group'><label for='tender_status'>Tender Status</label><br/>";
    $data = array(
        'name' => 'tender_status',
        'id' => 'tender_status',
        'size' => 25,
        'value' => $tender['tender_status']);
    echo form_input($data) . "</div>";
    /*     * *** Uploaded By start *** */
    $data = array(
        'name' => 'tender_uploaded_by',
        'id' => 'tender_uploaded_by',
        'type' => 'hidden',
        'readonly' => 'readonly',
        'value' => $_SESSION['username']
    );
    echo form_input($data);
    /*     * *** Uploaded By End  **** */


    echo "<div class='form-group'><label for='tender_pdf_link'>Tender PDF Link</label></br>";
    $data = array(
        'name' => 'tender_pdf_link',
        'id' => 'tender_pdf_link',
        'class' => 'formUpload',
        'size' => 25,
        'value' => $tender['tender_pdf_link']);
    echo '<div class="controls">' . form_upload($data) . '<span class="help-inline">Current file: ' . $tender["tender_pdf_link"] . '</span></div></div>';

    
    echo form_hidden('tender_id', $tender['tender_id']);
    echo  "<p class='clear'>".form_submit('submit', 'Update', 'class="btn btn-success"')."</p>";
    echo form_close();
    ?>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#endDate').datetimepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: "yy-mm-dd",
                timeFormat: "HH:mm",
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:"
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#startDate').datepicker({
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
    </script>

</fieldset>
