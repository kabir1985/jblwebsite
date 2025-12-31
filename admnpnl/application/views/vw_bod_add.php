
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

<h1 style="font-size: 20px;
    margin: 0;
    text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>


<?php
if ($this->session->flashdata('message')) {
    echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
}
?>

<?php
$attributes = array('id' => 'bod_form', 'class' => 'form-inline');
echo form_open_multipart('admin/bod/addDirector', $attributes);

echo '<div class="form-group"><label for="bod_id">ID</label></br>';
$data = array('name' => 'bod_id',
    'id' => 'bod_id',
    'readonly' => 'readonly',
    'class' => 'readonly',
    'value' => (isset($_POST['bod_id']) ? $_POST['bod_id'] : '' )
);
echo form_input($data) . "</p>";
echo '<div class="errormessage">' . form_error('bod_id') . '</div></div>';

echo '<div class="form-group"><label for="bod_priority">Priority</label></br>';
$data = array('name' => 'bod_priority',
    'id' => 'bod_priority',
    'value' => (isset($_POST['bod_priority']) ? $_POST['bod_priority'] : '' )
);
echo form_input($data) . "</p>";
echo '<div class="errormessage">' . form_error('bod_priority') . '</div></div>';

echo '<div class="form-group"><label for="bod_name">Name</label></br>';
$data = array('name' => 'bod_name',
    'id' => 'bod_name',
    'size' => 35,
    'value' => (isset($_POST['bod_name']) ? $_POST['bod_name'] : '' )
);
echo form_input($data) . "</p>";
echo '<div class="errormessage">' . form_error('bod_name') . '</div></div>';

echo '<div class="form-group"><label for="bod_office_phone_no">Office Phone</label></br>';
$data = array(
    'name' => 'bod_office_phone_no',
    'id' => 'bod_office_phone_no',
    'value' => (isset($_POST['bod_office_phone_no']) ? $_POST['bod_office_phone_no'] : '' )
);
echo form_input($data) . "</p>";
echo '<div class="errormessage">' . form_error('bod_office_phone_no') . '</div></div>';

echo '<div class="form-group"><label for="bod_designation">Designation</label></br>';
echo "<select name='bod_designation' id='bod_designation'> 
    <option value=''>-select-</option>
    <option value='Chairman'>Chairman</option>
    <option value='Director'>Director</option>
    <option value='Managing Director'>MD</option>
    <option value='Company Secretary'>Company Secretary</option>";
echo "</select></div>";

echo '<div class="form-group"><label for="bod_email">Email</label></br>';
$data = array(
    'name' => 'bod_email',
    'id' => 'bod_email',
    'value' => (isset($_POST['bod_email']) ? $_POST['bod_email'] : '' )
);
echo form_input($data) . "</p>";
echo '<div class="errormessage">' . form_error('bod_email') . '</div></div>';

echo '<div class="form-group"><label for="bod_extra_quali">Extra Quality</label></br>';
$data = array(
    'name' => 'bod_extra_quali',
    'id' => 'bod_extra_quali',
    'rows' => 2, 'cols' => '40',
    'value' => (isset($_POST['bod_extra_quali']) ? $_POST['bod_extra_quali'] : '' )
);
echo form_textarea($data) . "</p>";
echo '<div class="errormessage">' . form_error('bod_extra_quali') . '</div></div>';

echo '<div class="form-group"><label for="bod_image">Image</label></br>';
$data = array(
    'name' => 'bod_image',
    'id' => 'bod_image',
    'class' => 'formUpload',
    'value' => (isset($_POST['bod_image']) ? $_POST['bod_image'] : '' )
);
echo form_upload($data) . "</p>";
echo '<div class="errormessage">' . form_error('bod_image') . '</div></div>';

echo '<div class="form-group"><label for="bod_status">Status</label></br>';
echo "<select name='bod_status' id='bod_status'> 
<option value='Active'>Active</option>
<option value='Inactive'>Inactive</option>";
echo "</select></div>";

$attributes = array(
    'name' => 'submit',
    'type' => 'submit',
    'id' => 'bod_submit_d',
    'value' => 'SUBMIT',
    'class' => 'btn btn-success');
echo "<p class='clear'>" . form_submit($attributes) . "</p>";
echo form_close();
?>

