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

    <?php
    $attributes = array('id' => 'news_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/news/edit', $attributes);

    echo "<div class='form-group'><label for='news_title'>News Title</label></br>";
    $data = array('name' => 'news_title',
        'id' => 'news_title',
        'rows' => '1',
        'col' => '4',
        'class' => 'formTextArea',
        'value' => $news['news_title']);
    echo form_textarea($data) . "</div>";


    echo "<div class='form-group'><label for='news_date'>News Date</label></br>";
    $data = array(
        'name' => 'news_date',
        'id' => 'newsDate',
        'size' => 25,
        'class' => 'formTextArea',
        'value' => $news['news_date']
    );
    echo form_input($data) . "</div>";


    echo "<div class='form-group'><label for='upload'>Upload File</label></br>";
    $data = array('name' => 'myfile',
        'id' => 'upload',
        'class' => 'formUpload');
    echo form_upload($data) . "<br/>Current file: " . $news['news_links'] . "</div>";

    echo "<div class='form-group'><label for='status'>Status</label></br>";
    echo "<select name='news_status' id='status'>
    <option value='$news[news_status]'>$news[news_status]</option>
    <option value='---------'>----------------</option>
    <option value='Active'>Active</option>
    <option value='Inactive'>Inactive</option>";
    echo "</select></div>";


    echo form_hidden('news_id', $news['news_id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
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
