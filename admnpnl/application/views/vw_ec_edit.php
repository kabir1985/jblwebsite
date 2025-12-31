
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

<?php
if ($this->session->flashdata('message')){
	echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="glyphicon glyphicon-remove"></i></button>'.$this->session->flashdata('message').'</div>';
}
?>
<?php
//echo form_open('admin/deposit/create');
$attributes = array('id' => 'ec_form','class'=>'form-inline');
echo form_open_multipart('admin/ec/edit/'.$ec['id'],$attributes);

echo '<div class="form-group"><label for="priority">Order</label></br>';
echo form_dropdown('priority', $order, $ec["priority"]).'</div>';
//echo "<select name='priority' id='priority'><br>";
//echo '<option value="selected">-select-</option>';
//            foreach($order as $row)
//            { 
//              //echo'<option value="'.$row->manual_category_id.'>'.$row->manual_category_id.'--'.$row->manual_category_title.'</option>';
//                echo"<option value='$row[bod_priority]'>$row[bod_priority]-$row[bod_name]</option>";                           
//            }        
//        echo "</select>";
////        $data = array(	"name"=>"priority",
////				"id"=>"priority",
////				"value"=> $ec['priority']);	
////echo  '<span class="help-inline">Current file: '. $ec["priority"] .'</span>';
//
//        
echo '<div class="form-group"><label for="name">Name</label></br>';
echo form_dropdown('name', $name, $ec["name"]).'</div>';
//echo "<select name='name' id='name'>";
//echo '<option value="">-select-</option>';
//            foreach($name as $row)
//            { 
//              //echo'<option value="'.$row->manual_category_id.'>'.$row->manual_category_id.'--'.$row->manual_category_title.'</option>';
//                echo"<option value='$row[bod_name]'>$row[bod_priority]-$row[bod_name]</option>";                           
//            }        
//        echo "</select>";
////        $data = array(	"name"=>"name",
//				"id"=>"name",
//				"value"=> $ec['name']);	
//echo  '<span class="help-inline">Current file: '. $ec["name"] .'</span>';


echo '<div class="form-group"><label for="designation">Designation</label></br>';
echo form_dropdown('designation', $designation, $ec["designation"]).'</div>';
//echo "<select name='designation' id='designation'> 
//<option value=''>-select-</option>
//<option value='Chairman'>Chairman</option>
//<option value='Director'>Director</option>
//<option value='Company Secretary'>Company Secretary</option>";
//echo "</select>";
//$data = array(	"name"=>"designation",
//				"id"=>"designation",
//				"value"=> $ec['designation']);	
//echo  '<span class="help-inline">Current file: '. $ec["designation"] .'</span>';

        
echo '<div class="form-group"><label for="committee_status">Status with Committee</label></br>';
echo form_dropdown('committee_status', $committee_status, $ec["committee_status"]).'</div>';
//echo "<select name='committee_status' id='committee_status'>
//<option value=''>-select-</option>
//<option value='Chairman'>Chairman</option>
//<option value='Member'>Member</option>
//<option value='Secretary'>Secretary</option>";
//echo "</select><br>";

echo '<div class="form-group"><label for="status">Status</label></br>';
echo form_dropdown('status', $status, $ec["status"]).'</div>';
echo '<br>';
//echo "<select name='status' id='status'>
//<option value=''>-select-</option>
//<option value='Active'>Active</option>
//<option value='Inactive'>Inactive</option>";
//echo "</select><br>";
//$data = array(	"name"=>"committee_status",
//				"id"=>"committee_status",
//				"value"=> $ec['committee_status']);	
//echo  '<span class="help-inline">Current file: '. $ec["committee_status"] .'</span><br>';

echo form_hidden('id',$ec['id']);
echo form_submit('submit','SUBMIT','class="btn btn-primary"');
echo form_close();

?>
