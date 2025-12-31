
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

<p style="margin-top:-34px;"><?php echo anchor("admin/ec", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>


<?php
if ($this->session->flashdata('message')) {
    echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
}
?>
<?php
//echo form_open('admin/deposit/create');
$attributes = array('id' => 'ec_form', 'class' => 'form-inline');
echo form_open_multipart('admin/ec/addEC', $attributes);

echo '<div class="form-group"><label for="priority">Order</label></br>';
echo form_dropdown('priority', $order).'</div>';
//echo "<p><label for='priority'>Order</label>";
//echo "<select name='priority' id='priority'>";
//echo '<option value="">-select-</option>';
//            foreach($order as $row)
//            { 
//              //echo'<option value="'.$row->manual_category_id.'>'.$row->manual_category_id.'--'.$row->manual_category_title.'</option>';
//                echo"<option value='$row[bod_priority]'>$row[bod_priority]-$row[bod_name]</option>";                           
//            }        
//        echo "</select></br>";

echo '<div class="form-group"><label for="name">Name</label></br>';
echo form_dropdown('name', $name).'</div>';
//echo "<select name='name' id='name'>";
//echo '<option value="">-select-</option>';
//            foreach($name as $row)
//            { 
//              //echo'<option value="'.$row->manual_category_id.'>'.$row->manual_category_id.'--'.$row->manual_category_title.'</option>';
//                echo"<option value='$row[bod_name]'>$row[bod_priority]-$row[bod_name]</option>";                           
//            }        
//        echo "</select></br>";

echo '<div class="form-group"><label for="designation">Designation</label></br>';
echo "<select name='designation' id='designation'> 
<option value=''>-select-</option>
<option value='Chairman'>Chairman</option>
<option value='Director'>Director</option>
<option value='Company Secretary'>Company Secretary</option>";
echo "</select></div>";

echo '<div class="form-group"><label for="committee_status">Status with Committee</label></br>';
echo "<select name='committee_status' id='committee_status'>
<option value=''>-select-</option>
<option value='Chairman'>Chairman</option>
<option value='Member'>Member</option>
<option value='Secretary'>Secretary</option>";
echo "</select></div>";

echo '<div class="form-group"><label for="status">Status</label></br>';
echo "<select name='status' id='status'>
<option value=''>-select-</option>
<option value='Active'>Active</option>
<option value='Inactive'>Inactive</option>";
echo "</select></div>";

$attributes = array(
    'name' => 'submit',
    'type' => 'submit',
    'id' => 'submit_id',
    'value' => 'SUBMIT',
    'class' => 'btn btn-primary');
echo "<p class=''>" . form_submit($attributes) . "</p>";
echo form_close();
?>
