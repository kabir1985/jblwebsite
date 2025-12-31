<fieldset>
    <style>
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
        .readonly{
            cursor: not-allowed;
            background-color: #D9ECF3;
            opacity: 1;
        }
        .ui-datepicker-trigger{
            cursor:pointer
        }
    </style>

    <p style="margin-top:-34px;"><?php echo anchor("admin/news", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

    <h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>


    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <!-- Before loop -->
    <?php
//echo form_open('admin/deposit/create');
    $attributes = array('id' => 'news_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/news/addNews', $attributes);
    echo "<div class='form-group'><label for='news_title'>News Title</label></br>";
    $data = array('name' => 'news_title',
        'id' => 'news_title',
        'rows' => '1',
        'col' => '4',
        'class' => 'formTextArea',
        'value' => (isset($_POST['news_title']) ? $_POST['news_title'] : '' )
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('news_title') . '</div></div>';

    echo "<div class='form-group'><label for='news_date'>News Date</label></br>";
    $data = array(
        'name' => 'news_date',
        'id' => 'newsDate',
        'class' => 'formTextArea',
        'value' => (isset($_POST['news_date']) ? $_POST['news_date'] : '' )
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('news_date') . '</div></div>';

    echo "<div class='form-group'><label for='news_status'>News Status</label></br>";
    $data = array(
        'name' => 'news_status',
        'id' => 'news_status',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => (isset($_POST['news_status']) ? $_POST['news_status'] : 'Not Approved' )
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('news_status') . '</div></div>';

    echo "<div class='form-group'><label for='upload'>Upload File</label></br>";
    $data = array('name' => 'myfile', 'id' => 'upload', 'class' => 'formUpload');
    echo form_upload($data) . "</div>";

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'news_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#newsDate').datepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: "yy-mm-dd",
                //timeFormat: "hh:mm",
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:"
            });
        });
    </script>

</fieldset>