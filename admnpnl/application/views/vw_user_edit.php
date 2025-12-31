
<p style="margin: -33px 0 10px -11px;"><?php echo anchor("admin/users", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>    
<fieldset>
    <legend><h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1></legend>

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
        .back{
            margin: -64px 0 0 -11px;
        }
        .input-group-append{
            /*margin: -22px 0 0 158px;*/
            float: right;
        }
    </style>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-show-password.min.js"></script>

    <script type="text/javascript">
        $("#password").password('toggle');
    </script>

    <?php
    $attributes = array('id' => 'admin_user_form', 'class' => 'form-inline');
    echo form_open('admin/users/edit', $attributes);

    echo "<div class='form-group'><label for='uname'>Username</label></br>";
    $data = array('name' => 'username', 'id' => 'uname', 'size' => 20, 'class' => 'readonly', 'readonly'=>'true', 'value' => $admin['username']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='email'>Email</label></br>";
    $data = array('name' => 'email', 'id' => 'email', 'rows' => 1, 'cols' => 40, 'value' => $admin['email']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='Office Name'>Office Name</label></br>";
    echo form_dropdown('department', $officeNames, $admin['department']) . "</div>";

    echo "<div class='form-group'><label for='Office Name'>Office Code</label></br>";
    echo form_dropdown('jbdvcode', $officeCodes, $admin['jbdvcode']) . "</div>";

    //echo 'Password<br> <input type="password" name="password" class="form-control" data-toggle="password"  value=' . $admin["password"] . '></br>';
    echo "<div class='form-group'><label for='pwd'>Password</label></br>";
    $data = array(
        'name' => 'password',
        'id' => 'password',
        'type' => 'password',
        'data-toggle' => 'password',
        'rows' => 2,
        'cols' => 50,
        'value' => $admin['password']);
    echo form_textarea($data) . "</div>";

    /* echo "<div class='form-group'><label for='department'>Department</label></br>";
      $data = array('name' => 'department', 'id' => 'department', 'rows' => 1, 'cols' => 50, 'value' => $admin['department']);
      echo form_textarea($data) . "</div>"; */

    /* echo "<div class='form-group'><label for='user_group'>User Group</label></br>";
      $data = array('name' => 'user_group', 'id' => 'user_group', 'size' => 20, 'value' => $admin['user_group']);
      echo form_input($data) . "</div>"; */
    echo "<div class='form-group'><label for='user_group'>User Group</label></br>";
    $options = array(
        '' => '--SELECT--',
        'ADMIN' => 'ADMIN',
        'HO DEPARTMENT' => 'HO DEPARTMENT',
        'DIVISIONAL OFFICE' => 'DIVISIONAL OFFICE',
        'OTHER' => 'OTHER');
    echo form_dropdown('user_group', $options, $admin['user_group']) . "</div>";

    echo "<div class='form-group'><label for='status'>Status</label></br>";
    $options = array('1' => 'active', '0' => 'inactive');
    echo form_dropdown('status', $options, $admin['status']) . "</div>";

    echo "<div class='form-group'><label for='attempts'>Attempt(s)</label></br>";
    $data = array('name' => 'attempts', 'id' => 'attempts', 'size' => 20, 'value' => $admin['login_attempts']);
    echo form_input($data) . "</div>";

    echo form_hidden('id', $admin['id']);
    echo '<p class="clear">' . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . '</p>';
    echo form_close();
    ?>
</fieldset>