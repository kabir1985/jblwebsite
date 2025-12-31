<span style="margin-top: 0px;"><?php echo anchor("admin/annual_reports", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></span>
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

    </style>

    <!--Form Validation Error Dispaly-->
    <?php echo validation_errors('<div class="message">', '</div>'); ?>
    <!--Form Validation-->

    <!-- Before loop -->
    <?php
//echo form_open('admin/deposit/create');
    $attributes = array('id' => 'report_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/annual_reports/addAnnualReports', $attributes);
    echo "<div class='form-group'><label for='title'>Report Title</label></br>";

    $data = array('name' => 'annual_report_title',
        'id' => 'annual_report_title',
        'value' => (isset($_POST['annual_report_title']) ? $_POST['annual_report_title'] : '' ),
        'size' => 30
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('annual_report_title') . '</div></div>';


    echo "<div class='form-group'><label for='annual_report_year'>Report Date</label></br>";
    $data = array(
        'name' => 'annual_report_year',
        //'class' => 'datepicker',
        //'placeholder' => 'yyyy-12-31',
        'id' => 'date',
        'value' => (isset($_POST['annual_report_year']) ? $_POST['annual_report_year'] : '' )
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('annual_report_year') . '</div></div>';

    echo "<div class='form-group'><label for='annual_report_published_date'>Publish Date</label></br>";
    $data = array(
        'name' => 'annual_report_published_date',
        //'class' => 'datepicker',
        //'placeholder' => 'yyyy-mm-dd',
        'id' => 'pubDate',
        'value' => (isset($_POST['annual_report_published_date']) ? $_POST['annual_report_published_date'] : '' )
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('annual_report_published_date') . '</div></div>';

    echo "<div class='form-group'><label for='annual_report_pdf_link'>Report File</label></br>";
    $data = array(
        'name' => 'annual_report_pdf_link',
        'id' => 'annual_report_pdf_link',
        'value' => (isset($_POST['annual_report_pdf_link']) ? $_POST['annual_report_pdf_link'] : '' )
    );
    echo form_upload($data) . "</p>";
    echo '<div class="errormessage">' . form_error('annual_report_pdf_link') . '</div></div>';

    echo "<div class='form-group'><label for='annual_report_status'>Status</label></br>";
    echo "<select name='annual_report_status' id='annual_report_status'> 
    <option value='Active'>Active</option>
    <option value='Inactive'>Inactive</option>";
    echo "</select></div>";

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'submit_d',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#date').datepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: "yy-mm-dd",
                //timeFormat:  "hh:mm",
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:"
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#pubDate').datepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: "yy-mm-dd",
                //timeFormat:  "hh:mm",
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:"
            });
        });
    </script>

</fieldset>
