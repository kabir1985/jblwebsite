
<script type="text/javascript">  
                      $(document).ready(function() {  
                         $("#districtDrp").change(function(){  
                         /*dropdown post *///  
                         $.ajax({  
                            url:"<?php echo base_url();?>index.php/admin/atm/buildDropUpazilas",  
                            data: {id: $(this).val()},  
                            type: "POST",  
                            success:function(data){  
                            $("#upazilaDrp").html(data);  
                         }  
                      });  
                   }); 
 				   
                });  
</script>  
<script type="text/javascript">
//$("#subject").change(function(){
$(function() {
$("select[name='branch']").click(function() {
      //alert("Im in");
	    $.ajax({
        url: "<?php echo base_url();?>index.php/admin/atm/branch_select_address",
        data: { branch: $(this).val()},
        type: "post",
        success: function(msg){
        //$("#teacher").html();
		$("select[name='address']").html(msg);
		}
	});
});
});

</script>

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

<p style="margin-top:-34px;"><?php echo anchor("admin/atm", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<?php
if ($this->session->flashdata('message')){
	echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>'.$this->session->flashdata('message').'</div>';
}
?>
<?php
$attributes = array('id' => 'atm_form','class'=>'form-inline');
echo form_open_multipart('admin/atm/edit/'.$atm['id'],$attributes);

echo "<div class='form-group'><label for='branch_name'>Branch Name</label></br>";
//echo form_dropdown('branch',$select_branch, $atm["branch_name"]);
$data = array(			
            'name'=>'branch_name',
            'id'=>'branch_name',
            'value' => $atm['branch_name'],
             'size'  => '52',
     );
echo form_input($data)."</div>";

echo "<div class='form-group'><label for='address'>Address</label></br>";
//echo form_dropdown('address',$select_address, $atm["address"]);
$data = array(			
            'name'=>'address',
            'id'=>'address',
            'value' => $atm['address'],
            'rows'  => '2',
            'cols'  => '50',
        );
echo form_textarea($data)."</div>";

echo "<div class='form-group'><label for='district'>District</label></br>";
echo form_dropdown('district', $district, $atm["district"],'class="my_class" id="districtDrp"').'</div>';

echo "<div class='form-group'><label for='upazila'>Area-Upazila/Thana</label></br>"; 
echo form_dropdown('upazila', $upazila, $atm["upazila"],'class="my_class" id="upazilaDrp"').'</div>';

echo "<div class='form-group'><label for='map'>Google Map URL</label></br>";
$data = array(			
            'name'=>'map',
            'id'=>'map',
            'value' => $atm['map'],
            'rows'  => '5',
            'cols'  => '50',
        );
echo form_textarea($data)."</div>";
 
echo "<div class='form-group'><label for='status'>Status</label></br>";
echo form_dropdown('status', $status, $atm["status"]).'</div>';

echo form_hidden('id',$atm['id']);
echo "<p class='clear'>".form_submit('submit','SUBMIT','class="btn btn-primary"').'</p>';
echo form_close();

