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

<p style="margin-top:-34px;"><?php echo anchor("admin/mds", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<?php
$attributes = array('id' => 'md_form', 'class' => 'form-inline');
echo form_open_multipart('admin/mds/edit', $attributes);

echo "<div class='form-group'><label for='priority'>Priority</label></br>";
$data = array('name' => 'priority',
    'id' => 'priority',
    'size' => 10,
    'value' => $md['priority']);
echo form_input($data) . "</div>";

echo "<div class='form-group'><label for='name'>Name</label></br>";
$data = array(
    'name' => 'name',
    'id' => 'name',
    'value' => $md['name']);
echo form_input($data) . "</div>";

echo "<div class='form-group'><label for='designation'>Designation</label></br>";
$data = array(
    'name' => 'designation',
    'id' => 'designation',
    'size' => 25,
    'value' => $md['designation']);


echo form_input($data) . "</div>";


echo "<div class='form-group'><label for='duration'>Duration</label></br>";
$data = array(
    'name' => 'duration',
    'id' => 'duration',
    'size' => 25,
    'value' => $md['duration']);
echo form_input($data) . "</div>";

echo "<div class='form-group'><label for='image'> Image</label></br>";
$data = array("name" => "image",
    "id" => "image",
    "value" => $md['image']);

echo '<div class="controls">' . form_upload($data) . '<span class="help-inline">Current file: ' . $md["image"] . '</span></div></div>';

echo "<div class='form-group'><label for='status'>Status</label></br>";
echo "<select name='status' id='status'> 
<option value='Active'>Active</option>
<option value='Inactive'>Inactive</option>";
echo "</select></div>";


echo form_hidden('id', $md['id']);
echo form_submit('submit', 'SUBMIT', 'class="btn btn-primary"');
echo form_close();
?>


