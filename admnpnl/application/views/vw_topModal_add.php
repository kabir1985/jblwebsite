<span style="margin-top: 0px;"><?php echo anchor("admin/TopModal", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></span>
<fieldset>
    <legend><h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1></legend>

    <style>
        .readonly{
            cursor: not-allowed;
            background-color: #D9ECF3;
            opacity: 1;
        }
        .form-control{
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
            background-color:  #D9ECF3;
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
    $attributes = array('id' => 'form', 'class' => 'form-inline');
    echo form_open_multipart('admin/TopModal/addModal', $attributes);

    /*  Title Start */
    echo "<div class='form-group'><label for='title'> Modal Title</label></br>";
    $data = array(
        'name' => 'title',
        'id' => 'title',
        'rows' => 1,
        'cols' => 40,
        'class' => 'form-control',
        'value' => (isset($_POST['title']) ? $_POST['title'] : '')
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('title') . '</div></div>';


    echo "<div class='form-group'><label for='des'>Chairman Message</label></br>";
    $data = array(
        'name' => 'chairman_msg',
        'id' => 'chairman_msg',
        'rows' => 2,
        'cols' => 50,
        'class' => 'form-control',
        'value' => (isset($_POST['chairman_msg']) ? $_POST['chairman_msg'] : '')
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('chairman_msg') . '</div></div>';
    
    
    echo "<div class='form-group'><label for='des'>CEO & MD Message</label></br>";
    $data = array(
        'name' => 'md_msg',
        'id' => 'md_msg',
        'rows' => 2,
        'cols' => 50,
        'class' => 'form-control',
        'value' => (isset($_POST['md_msg']) ? $_POST['md_msg'] : '')
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('md_msg') . '</div></div>';
    
    
    echo "<div class='form-group'><label for='des'>Description</label></br>";
    $data = array(
        'name' => 'description',
        'id' => 'description',
        'rows' => 2,
        'cols' => 50,
        'class' => 'form-control',
        'value' => (isset($_POST['description']) ? $_POST['description'] : '')
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('description') . '</div></div>';
    
    
    /* Starting date */
    echo "<div class='form-group'><label for='entryDate'>Valid From</label></br>";
    $data = array(
        'name' => 'valid_from',
        //'class' => 'datepicker',
        'id' => 'startDate',
        'value' => (isset($_POST['valid_from']) ? $_POST['valid_from'] : '')
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('valid_from') . '</div></div>';

    /* Closing date */

    echo "<div class='form-group'><label for='expiryDate'>Valid Untill</label></br>";
    $data = array(
        'name' => 'valid_until',
        //'class' => 'datetimepicker',
        'id' => 'endDate',
        'value' => (isset($_POST['valid_until']) ? $_POST['valid_until'] : '')
    );
    echo form_input($data);
    echo '<div class="errormessage">' . form_error('valid_until') . '</div></div>';

    /* End Closing date */
    
    echo "<div class='form-group'><label for='type'>Modal Type</label></br>";
    $options = array(
        '' => '--select--',
        'message' => 'Message',
        'other' => 'other');
    echo form_dropdown('type', $options) . "</div>";
    
    
    echo "<div class='form-group'><label for='upload'>Image</label></br>";
    $data = array(
        'name' => 'link',
        'id' => 'link',
        'class' => 'formUpload'
    );
    echo form_upload($data) . "</p>";
    echo '<div class="errormessage">' . form_error('link') . '</div></div>';

    /*     * ** upload  file End *** */

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
                //timeFormat: 'hh:mm', //for 12 hour format
                timeFormat: 'HH:mm:ss', //for 24 hour format
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:"
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#startDate').datetimepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: 'yy-mm-dd',
                //timeFormat: 'hh:mm', //for 12 hour format
                timeFormat: 'HH:mm:ss', //for 24 hour format
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:"
            });
        });
    </script>

</fieldset>