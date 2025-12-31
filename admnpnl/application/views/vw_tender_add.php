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
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <!-- Before loop -->
    <?php
    $attributes = array('id' => 'tender_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/tender/addTender', $attributes);

    /*     * Tender Title Start */
    echo "<div class='form-group'><label for='tender_title'>Tender Title</label></br>";
    $data = array(
        'name' => 'tender_title',
        'id' => 'tender_title',
        'rows' => 2,
        'col' => 4,
        'class' => 'form-control',
        'required' => 'required',
        'value' => (isset($_POST['tender_title']) ? $_POST['tender_title'] : '')
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('tender_title') . '</div></div>';

    /*     * Tender Type Start */

    /* echo "<div class='form-group'><label for='tender_type'>Type</label></br>";
      echo "<select name='tender_type' id='tender_type' class='expDate' 'required'='required'>
      <option value=''>--Select--</option>
      <option value='Tender'>Tender</option>
      <option value='LTM'>LTM</option>
      <option value='OTM'>OTM</option>
      <option value='RFQ'>RFQ</option>
      <option value='Addenda'>Addenda</option>
      <option value='Other'>Other</option>";
      echo "</select></div>"; */
    echo "<div class='form-group'><label for='tender_type'>Type</label></br>";
    $attributes = array(
        'class' => 'expDate',
        'required' => 'required'
    );
    echo form_dropdown('tender_type', $tender_type, '', $attributes) . "</p>";
    echo '<div class="errormessage txt-danger" >' . form_error('tender_type') . '</div></div>';

    /*     * Tender Type Reference */
    echo "<div class='form-group'><label for='tender_reference'>Tender Reference</label></br>";
    $data = array(
        'name' => 'tender_reference',
        'id' => 'tender_reference',
        'rows' => 1,
        'col' => 4,
        'class' => 'form-control',
        'required' => 'required',
        'value' => (isset($_POST['tender_reference']) ? $_POST['tender_reference'] : '')
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('tender_reference') . '</div></div>';

    /*     * * Tender Offerded by start  ** */
    echo "<div class='form-group'><label for='tender_offered_by'>Tender Offered By</label></br>";
    echo form_dropdown('tender_offered_by', $allBranchs) . "</p>";
    echo '<div class="errormessage txt-danger" >' . form_error('tender_offered_by') . '</div></div>';
    /*     * * Tender Offerded by End  ** */

    /* Starting date */
    echo "<div class='form-group'><label for='tender_starting_date'>Tender Starting Date</label></br>";
    $data = array(
        'name' => 'tender_starting_date',
        //'class' => 'datepicker',
        'id' => 'startDate',
        'required' => 'required',
        'value' => (isset($_POST['tender_starting_date']) ? $_POST['tender_starting_date'] : '')
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('tender_starting_date') . '</div></div>';

    /* Closing date */

    echo "<div class='form-group'><label for='tender_closing_date'>Tender Closing Date</label></br>";
    $data = array(
        'name' => 'tender_closing_date',
        //'class' => 'datetimepicker',
        'id' => 'endDate',
        'required' => 'required',
        'value' => (isset($_POST['tender_closing_date']) ? $_POST['tender_closing_date'] : '')
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('tender_closing_date') . '</div></div>';

    /* End Closing date */

    echo "<div class='form-group'><label for='tender_status'>Tender Status</label></br>";
    $data = array(
        'name' => 'tender_status',
        'id' => 'tender_status',
        'value' => (isset($_POST['tender_status']) ? $_POST['tender_status'] : 'Active'),
        'class' => 'readonly',
        'readonly' => 'readonly'
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('tender_status') . '</div></div>';

    /*     * *** Uploaded By start *** */
    $data = array(
        'name' => 'tender_uploaded_by',
        'id' => 'tender_uploaded_by',
        'type' => 'hidden',
        'class' => 'readonly',
        'readonly' => 'readonly',
        'value' => $_SESSION['username']
    );
    echo form_input($data);
    /*     * *** Uploaded By End  **** */

    /*     * ** upload tender file Start *** */
    /* echo "<p><label for='upload'>Upload File</label>";
      $data = array('name' => 'tender_pdf_link', 'id' => 'upload');
      echo form_upload($data) . "</p>"; */

    echo "<div class='form-group'><label for='upload'>Upload File</label></br>";
    $data = array(
        'name' => 'tender_pdf_link',
        'id' => 'tender_pdf_link',
        'class' => 'formUpload'
    );
    echo form_upload($data) . "</p>";
    echo '<div class="errormessage">' . form_error('tender_pdf_link') . '</div></div>';

    /*     * ** upload tender file End *** */

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'tender_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success'
    );
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
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
                yearRange: "1971:2050"
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
                yearRange: "1971:2050"
            });
        });
    </script>

</fieldset>