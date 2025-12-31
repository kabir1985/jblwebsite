<style>
    .readonly{
        cursor: not-allowed;
        background-color: #eeeeee;
        opacity: 1;
    }
    .control-group{
        /*float: left;*/
    }
    .form-group{
        padding: 10px;
    }
</style>

<p style="margin-top:-34px;"><?php echo anchor("admin/awards", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>


<?php
$attributes = array('id' => 'award_form', 'class' => 'form-inline');
echo form_open_multipart('admin/awards/addAward', $attributes);

echo '<div class="form-group"><label for="award_title">Award Title</label></br>';
$data = array('name' => 'award_title',
    'id' => 'award_title_id',
    'size' => '45',
    'value' => (isset($_POST['award_title']) ? $_POST['award_title'] : '' )
);
echo form_input($data) . '<span class="help-inline">' . form_error("award_title") . '</span></div>';


echo '<div class="form-group"><label for="award_description">Award Description</label></br>';
$data = array(
    'name' => 'award_description',
    'id' => 'award_description_id',
    'rows' => 2,
    'cols' => 43,
    'value' => (isset($_POST['award_description']) ? $_POST['award_description'] : '' )
);
echo form_textarea($data) . '<span class="help-inline">' . form_error("award_description") . '</span></div>';


echo '<div class="form-group"><label for="award_receive_date">Award Received Date</label></br>';
$data = array(
    'name' => 'award_receive_date',
    'id' => 'datepicker',
    'class' => 'datepicker',
    'value' => (isset($_POST['award_receive_date']) ? $_POST['award_receive_date'] : '' ));

echo form_input($data) . '<span class="help-inline">' . form_error('award_receive_date') . '</span></div>';


echo '<div class="form-group"><label for="award_image">Award Image</label></br>';
$data = array('name' => 'award_image',
    'id' => 'upload',
    'value' => (isset($_POST['award_image']) ? $_POST['award_image'] : '' )
);
echo form_upload($data) . '<span class="help-inline">' . form_error('award_image') . '</span></div>';


echo '<div class="form-group"><label for="award_status">Status</label></br>';
echo "<select  name='award_status' id='status'>
<option value=''>-select-</option>
<option value='Active'>Active</option>
<option value='Inactive'>Inactive</option>";

echo "</select></div>";
$attributes = array(
    "name" => "submit",
    "type" => "submit",
    "id" => "award_submit",
    "class" => "btn btn-primary",
    "value" => "SUBMIT");

echo "<p class='clear'>" . form_submit($attributes) . "</p>";
echo form_close();
?>
