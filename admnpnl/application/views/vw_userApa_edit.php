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
echo form_open('admin/apa_report/admin_user_edit');
echo "<p><label for='uname'>User Name</label>";
$data = array('name'=>'username','id'=>'uname','readonly'=>'readonly','size'=>40, 'value'=>$admin['username']);
echo form_input($data) ."</p>";

echo "<p><label for='email'>Email</label>";
$data = array('name'=>'email','id'=>'email','size'=>40, 'value'=>$admin['email']);
echo form_input($data) ."</p>";

echo 'Password<br> <input type="password" name="password" class="form-control" data-toggle="password" value='.$admin["password"].' id="password"></br>';

echo "<p><label for='department'>Department</label>";
$data = array('name'=>'department','id'=>'department','size'=>40, 'value'=>$admin['department']);
echo form_input($data) ."</p>";

echo form_hidden('id',$admin['id']);
echo '<div class="form-actions">'.form_submit('submit','Update','class="btn btn-primary"').'</div>';
echo form_close();
?>
</body>
</html>