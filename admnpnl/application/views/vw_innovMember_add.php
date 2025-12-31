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

    <p style="margin: -40px 0 10px -22px;"><?php echo anchor("admin/innovation", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>    
    <h1 style="font-size: 20px; margin: -32px 0 0 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <!-- Before loop -->
    <?php
    if (isset($error_mssg) && !empty($error_mssg)) {
        //echo $error_mssg;
        echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . $error_mssg . '</div></p>';
    }

    $attributes = array('id' => 'innovation_form', 'class' => 'form-inline');

    echo form_open_multipart('admin/innovation/addMember', $attributes);

    echo "<div class='form-group'><label for='priority'>Select Priority</label><br>";
    $options = array(
        ' ' => '--Select--',
        '1' => 'First Priority- 1st',
        '2' => 'Second Priority- 2nd',
        '3' => 'Third Priority- 3rd',
        '4' => 'Forth Priority- 4th',
        '5' => 'Fifth Priority- 5th',
        '6' => 'Sixth Priority- 6th',
        '7' => 'Seventh Priority- 7th',
        '8' => 'Eight Priority- 8th',
        '9' => 'Nineth Priority- 9th',
        '10' => 'Tenth Priority- 10th',
		'11' => 'Eleventh Priority- 11th',
		'12' => 'Twelveth Priority- 12th',
		'13' => 'Thirteenth Priority- 13th',
		'14' => 'Fourteenth Priority- 14th',
		'15' => 'Fifteenth Priority- 15th'
    );

    echo form_dropdown('priority', $options, (isset($_POST['priority']) ? $_POST['priority'] : ''));
    echo '</div>';
    //echo '<div style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('priority') . '</div></div>';

    echo "<div class='form-group'><label for='name'>Officer Name</label><br>";
    $data = array('name' => 'name',
        'id' => 'name',
        'size' => 55,
        'value' => (isset($_POST['name']) ? $_POST['name'] : '' )
    );
    echo form_input($data) . "</div>";
    //echo '<div style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('name') . '</div></div>';

    echo "<div class='form-group'><label for='offdesig'>Official Designation</label><br>";
    $data = array('name' => 'offdesig',
        'id' => 'offdesig',
        'size' => 55,
        'value' => (isset($_POST['offdesig']) ? $_POST['offdesig'] : '' )
    );
    echo form_input($data) . "</div>";
    //echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('offdesig') . '</div></span>';

    echo "<div class='form-group'><label for='posting'>Place of Posting</label><br>";
    $data = array('name' => 'posting',
        'id' => 'posting',
        'size' => 55,
        'value' => (isset($_POST['posting']) ? $_POST['posting'] : '' )
    );
    echo form_input($data) . "</div>";
    //echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('posting') . '</div></span>';

    echo "<div class='form-group'><label for='innodesig'>Innovation Team Designation</label><br>";
    $data = array('name' => 'innodesig',
        'id' => 'innodesig',
        'size' => 55,
        'value' => (isset($_POST['innodesig']) ? $_POST['innodesig'] : '' )
    );
    echo form_input($data) . "</div>";
    //echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('innodesig') . '</div></span>';

    echo "<div class='form-group'><label for='phone'>Phone</label><br>";
    $data = array('name' => 'phone',
        'id' => 'phone',
        'size' => 55,
        'value' => (isset($_POST['phone']) ? $_POST['phone'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='email'>Email</label><br>";
    $data = array(
        'name' => 'email',
        'id' => 'email',
        'size' => 55,
        'value' => (isset($_POST['email']) ? $_POST['email'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='status'>Status</label></br>";
    $data = array(
        'name' => 'status',
        'id' => 'status',
        'class' => 'readonly',
        'readonly' => 'readonly',
        'size' => 10,
        'value' => (isset($_POST['status']) ? $_POST['status'] : '1' )
    );
    echo form_input($data) . "</div>";

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'innovation_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>
</fieldset>