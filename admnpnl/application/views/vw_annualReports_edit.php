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

    <?php
    $attributes = array('id' => 'edit_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/annual_reports/edit', $attributes);

    echo "<div class='form-group'><label for='annual_report_title'>Report Title</label></br>";
    $data = array('name' => 'annual_report_title',
        'id' => 'annual_report_title',
        'value' => $report['annual_report_title']);
    echo form_input($data) . "</div>";


    echo "<div class='form-group'><label for='annual_report_year'>Report Date</label></br>";
    $data = array(
        'name' => 'annual_report_year',
        //'class'=>'datepicker',	
        'id' => 'date',
        'value' => $report['annual_report_year']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='annual_report_published_date'>Publish Date</label></br>";
    $data = array(
        'name' => 'annual_report_published_date',
        //'class' => 'datepicker',
        'id' => 'pubDate',
        'value' => $report['annual_report_published_date']);
    echo form_input($data) . "</div>";


    echo "<div class='form-group'><label for='annual_report_pdf_link'>Tender PDF Link</label></br>";
    $data = array(
        'name' => 'annual_report_pdf_link',
        'id' => 'annual_report_pdf_link',
        'value' => $report['annual_report_pdf_link']);
    echo form_input($data) . "</p>";
    echo '<div class="controls">' . form_upload($data) . '<span class="help-inline">Current file: ' . $report["annual_report_pdf_link"] . '</span></div></div>';

    echo "<div class='form-group'><label for='annual_report_status'>Status</label></br>";
    echo "<select name='annual_report_status' id='annual_report_status'> 
<option value='Active'>Active</option>
<option value='Inactive'>Inactive</option>";
    echo "</select></div>";

    echo form_hidden('annual_report_id', $report['annual_report_id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMITE', 'class="btn btn-success"') . "</p>";
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
