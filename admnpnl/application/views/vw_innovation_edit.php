<html lang="en">
    <head>
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
            .controls  .help-inline{
                background-color:  #DAF7A6;
            }
        </style>

    </head>
    <body>

        <p style="margin: -33px 0 0 -11px;"><?php echo anchor("admin/innovation", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
        }
        ?>

        <?php
        if (isset($error_mssg) && !empty($error_mssg)) {
            //echo $error_mssg;
            echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . $error_mssg . '</div></p>';
        }

        $attributes = array('id' => 'innovation_form', 'class' => 'form-inline');
        echo form_open_multipart('admin/innovation/edit/', $attributes);

        echo "<div class='form-group'><label for='priority'>Select Priority</label><br>";
        $options = array(
            '' => '--Select--',
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

        echo form_dropdown('priority', $options, (isset($_POST['priority']) ? $_POST['priority'] : $innovation['priority']));
        echo '</div>';
        //echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('priority') . '</div></span>';

        echo "<div class='form-group'><label for='name'>Officer Name</label><br>";
        $data = array('name' => 'name',
            'id' => 'name',
            'size' => 70,
            'value' => isset($_POST['name']) ? $_POST['name'] : $innovation['name']);
        echo form_input($data) . "</div>";
        //echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('name') . '</div></span>';

        echo "<div class='form-group'><label for='title'>Official Designation</label><br>";
        $data = array('name' => 'offdesig',
            'id' => 'offdesig',
            'size' => 50,
            'value' => isset($_POST['offdesig']) ? $_POST['offdesig'] : $innovation['official_designation']);
        echo form_input($data) . "</div>";
        //echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('offdesig') . '</div></span>';

        echo "<div class='form-group'><label for='title'>Place of Posting</label><br>";
        $data = array('name' => 'posting',
            'id' => 'posting',
            'size' => 70,
            'value' => isset($_POST['posting']) ? $_POST['posting'] : $innovation['posting']);
        echo form_input($data) . "</div>";
        //echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('posting') . '</div></span>';

        echo "<div class='form-group'><label for='title'>Innovation Team Designation</label><br>";
        $data = array('name' => 'innodesig',
            'id' => 'innodesig',
            'size' => 70,
            'value' => isset($_POST['innodesig']) ? $_POST['innodesig'] : $innovation['innovation_desig']);
        echo form_input($data) . "</div>";
        //echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('innodesig') . '</div></span>';

        echo "<div class='form-group'><label for='title'>Phone</label><br>";
        $data = array('name' => 'phone',
            'id' => 'phone',
            'size' => 40,
            'value' => $innovation['phone']);
        echo form_input($data) . "</div>";

        echo "<div class='form-group'><label for='title'>Email</label><br>";
        $data = array('name' => 'email',
            'id' => 'email',
            'size' => 70,
            'value' => $innovation['email']);
        echo form_input($data) . "</div>";

        echo "<div class='form-group'><label for='status'>Innovation Status</label><br/>";
        echo "<select name='status' id='status'>
            <option value='$innovation[status]'>$innovation[status]</option>
            <option value='---------'>----------</option>
            <option value='1'>Active</option>
            <option value='0'>Inactive</option>";
             echo "</select></div>";
        /* $data = array(
          'name' => 'status',
          'id' => 'status',
          'type' => 'text',
          'size' => 20,
          'value' => isset($_POST['status']) ? $_POST['status'] : $innovation['status']);
          echo form_input($data) . "</div>"; */
        //echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('status') . '</div></span>';
        //echo form_hidden('innovation_id', $innovation['id']);
        //echo form_submit('submit', 'Update Innovation Member');
        //echo form_close();
        $attributes_button = array(
            'name' => 'submit',
            'type' => 'submit',
            'id' => 'submit_id',
            'value' => 'SUBMIT',
            'class' => 'btn btn-success');
        echo form_hidden('innovation_id', $innovation['id']);
        echo "<p class='clear'>" . form_submit($attributes_button) . "</p>";
        echo form_close();
        ?>
    </body>
</html>