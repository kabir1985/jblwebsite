<!--<h1><?php //echo $title;?></h1>-->
<html>
<head>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<!--        <script>
        function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
        </script>-->
    
    <script type="text/javascript">

	$("#password").password('toggle');

</script>  
</head>
<body>   
<?php
echo form_open('admin/adminprd/edit');
echo "<p><label for='uname'>User Name</label>";
$data = array('name'=>'username','id'=>'uname','readonly'=>'readonly','size'=>25, 'value'=>$admin['username']);
echo form_input($data) ."</p>";

echo "<p><label for='email'>Email</label>";
$data = array('name'=>'email','id'=>'email','size'=>25, 'value'=>$admin['email']);
echo form_input($data) ."</p>";

//echo "<p><label for='pw'>Password</label><br/>";
////$data = array('name'=>'password','id'=>'pw','size'=>25, 'value'=>$admin['password']); 
////echo form_password($data) ."</p>";

//echo 'Password<br> <input type="password" name="password" value='.$admin["password"].' id="myInput">';
//echo '<input type="checkbox" onclick="myFunction()">Show Password';

echo 'Password<br> <input type="password" name="password" class="form-control" data-toggle="password" value='.$admin["password"].' id="password"></br>';

echo "<p><label for='department'>Department</label>";
$data = array('name'=>'department','id'=>'department','size'=>25, 'value'=>$admin['department']);
echo form_input($data) ."</p>";

echo "<p><label for='user_group'>User Group</label>";
$data = array('name'=>'user_group','id'=>'user_group','size'=>25, 'value'=>$admin['user_group']);
echo form_input($data) ."</p>";

echo "<p><label for='status'>Status</label>";
$options = array('active' => 'active', 'inactive' => 'inactive');
echo form_dropdown('status',$options, $admin['status']) ."</p>";

echo form_hidden('id',$admin['id']);
echo '<div class="form-actions">'.form_submit('submit','Done','class="btn btn-primary"').'</div>';
echo form_close();
?>
</body>
</html>