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

    .formUpload{
        background-color: #0099cc;
        color: white;
    }
</style>

<p style="margin-top:-34px;"><?php echo anchor("admin/bod", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<?php
$attributes = array('id' => 'bod_form', 'class' => 'form-inline');
echo form_open_multipart('admin/bod/edit', $attributes);

echo '<div class="form-group"><label for="bod_id">ID</label></br>';
$data = array('name' => 'bod_id',
    'id' => 'bod_id',
    'readonly' => 'readonly',
    'class' => 'readonly',
    'value' => $bod['bod_id']);
echo form_input($data) . "</div>";

echo '<div class="form-group"><label for="bod_priority">Priority</label></br>';
$data = array('name' => 'bod_priority',
    'id' => 'bod_priority',
    'value' => $bod['bod_priority']);
echo form_input($data) . "</div>";

echo '<div class="form-group"><label for="bod_name">Name</label></br>';
$data = array(
    'name' => 'bod_name',
    'id' => 'bod_name',
    'value' => $bod['bod_name']);
echo form_input($data) . "</div>";

echo '<div class="form-group"><label for="bod_office_phone_no">Office Phone</label></br>';
$data = array('name' => 'bod_office_phone_no',
    'id' => 'bod_office_phone_no',
//				'size'=>25,
    'value' => $bod['bod_office_phone_no']);
echo form_input($data) . "</div>";

echo '<div class="form-group"><label for="bod_designation">Designation</label></br>';
echo "<select name='bod_designation' id='bod_designation'> 
<option value='$bod[bod_designation]'>$bod[bod_designation]</option>
<option value='---------'>----------------</option> 
<option value='Chairman'>Chairman</option>
<option value='Director'>Director</option>
<option value='Managing Director'>MD</option>
<option value='Company Secretary'>Company Secretary</option>";
echo "</select></div>";

echo '<div class="form-group"><label for="bod_email">Email</label></br>';
$data = array(
    'name' => 'bod_email',
    'id' => 'bod_email',
    'size' => 25,
    'value' => $bod['bod_email']);
echo form_input($data) . "</div>";

echo '<div class="form-group"><label for="bod_extra_quali">Extra Quality</label></br>';
$data = array(
    'name' => 'bod_extra_quali',
    'id' => 'bod_extra_quali',
    'rows' => 2, 'cols' => '40',
    'value' => $bod['bod_extra_quali']);
echo form_textarea($data) . "</div>";

echo '<div class="form-group"><label for="bod_image"> Image</label></br>';
$data = array("name" => "bod_image",
    "id" => "bod_image",
    'class' => 'formUpload',
    "value" => $bod['bod_image']);
echo '<div class="controls">' . form_upload($data) . '<span class="help-inline">Current file: ' . $bod["bod_image"] . '</span></div></div>';

echo "<div class='form-group'><label>Status</label><br>";
echo "<select name='bod_status' id='bod_status'> 
<option value='$bod[bod_status]'>$bod[bod_status]</option>
<option value='---------'>--------</option>    
<option value='Inactive'>Inactive</option>
<option value='Active'>Active</option>";
echo "</select></div>";

//echo form_hidden('bod_id',$bod['bod_id']);
//echo form_submit('submit','SUBMIT');
//echo form_close();

echo form_hidden("bod_id", $bod["bod_id"]);
echo '<p class="clear">' . form_submit("submit", "SUBMIT", 'class="btn btn-primary"') . '</p>';
echo form_close();
?>


