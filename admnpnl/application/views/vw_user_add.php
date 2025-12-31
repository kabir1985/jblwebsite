 
<fieldset>

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


    <p style="margin: -40px 0 10px -22px;"><?php echo anchor("admin/users", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>    
    <h1 style="font-size: 20px; margin: -32px 0 0 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-show-password.min.js"></script>

    <script type="text/javascript">
        $("#password").password('toggle');
    </script>

    
    <?php
    $attributes = array('id' => 'admin_user_form', 'class' => 'form-inline');
    echo form_open('admin/users/addUser', $attributes);

    echo "<div class='form-group'><label for='uname'>Username</label></br>";
    $data = array('name' => 'username', 'id' => 'uname', 'size' => 25);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='email'>Email</label></br>";
    $data = array('name' => 'email', 'id' => 'email', 'rows' => 1, 'cols' => 40);
    echo form_textarea($data) . "</div>";

    /*echo "<div class='form-group'><label for='email'>Department</label></br>";
    $data = array('name' => 'department', 'id' => 'department', 'size' => 40);
    echo form_input($data) . "</div>"; */
    
    echo "<div class='form-group'><label for='Office Name'>Office Name</label></br>";
    echo form_dropdown('department', $officeNames) . "</div>";

    echo "<div class='form-group'><label for='Office Name'>Office Code</label></br>";
    echo form_dropdown('jbdvcode', $officeCodes) . "</div>";
    
   /* echo "<div class='form-group'><label for='user_group'>User Group</label></br>";
    $data = array('name' => 'user_group', 'id' => 'user_group', 'size' => 20);
    echo form_input($data) . "</div>";  */
    
    echo "<div class='form-group'><label for='user_group'>User Group</label></br>";
    $options = array(
        '' => '--SELECT--',
        'ADMIN' => 'ADMIN', 
        'HO DEPARTMENT' => 'HO DEPARTMENT', 
        'DIVISIONAL OFFICE' => 'DIVISIONAL OFFICE',
        'OTHER' => 'OTHER');
    echo form_dropdown('user_group', $options) . "</div>";

    //echo 'Password<br> <input type="password" name="password"  data-toggle="password" id="password"></br>';
    //echo "<p><label for='pw'>Password</label><br/>";
    //$data = array('name'=>'password','id'=>'pw','size'=>25);
   //echo form_password($data) ."</p>";
    echo "<div class='form-group'><label for='pwd'>Password</label></br>";
    $data = array(
        'name' => 'password',
        'id' => 'password',
        'type' => 'password',
        'data-toggle' => 'password',
        'onclick' => 'MyFunction',
        'size' => 20);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='status'>Status</label></br>";
    $options = array(
        '' => '--SELECT--',
        '1' => 'ACTIVE', 
        '0' => 'INACTIVE');
    echo form_dropdown('status', $options) . "</div>";

    //echo '<div class="form-actions">' . form_submit('submit', 'create admin', 'class="btn btn-primary"') . '</div>';
    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>