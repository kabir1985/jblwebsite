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
    </style>

    <p style="margin: -40px 0 10px -22px;"><?php echo anchor("admin/subsidiaries", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
    <h1 style="font-size: 20px; margin: -32px 0 0 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>
    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
    $attributes = array('id' => 'company_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/subsidiaries/addSubsidiary', $attributes);

    echo "<div class='form-group'><label for='name'>Name</label></br>";
    $data = array('name' => 'name',
        'id' => 'name',
        'class' => 'formTextArea',
        'value' => (isset($_POST['name']) ? $_POST['name'] : '' ),
        'rows' => 1,
        'col' => 5
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('name') . '</div></div>';

    echo "<div class='form-group'><label for='address'>Address</label></br>";
    $data = array('name' => 'address',
        'id' => 'address',
        'class' => 'formTextArea',
        'value' => (isset($_POST['address']) ? $_POST['address'] : '' ),
        'rows' => 3,
        'col' => 5
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('address') . '</div></div>';

    echo "<div class='form-group'><label for='contacts'>Contacts</label></br>";
    $data = array(
        'name' => 'contacts',
        'id' => 'contacts',
        'class' => 'formTextArea',
        'value' => (isset($_POST['contacts']) ? $_POST['contacts'] : '' ),
        'rows' => 3,
        'col' => 5
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('contacts') . '</div></div>';

    echo "<div class='form-group'><label for='image'>Image</label></br>";
    $data = array(
        'name' => 'image',
        'id' => 'image',
        'class' => 'formUpload',
        'value' => (isset($_POST['image']) ? $_POST['image'] : '' )
    );
    echo form_upload($data);
    echo '<div class="errormessage">' . form_error('image') . '</div></div>';

    echo "<div class='form-group'><label for='status'>Status</label></br>";
    echo "<select name='status' id='status' class='formTextArea',>
          <option value=''>--select--</option>
          <option value='Active'>Active</option>
          <option value='Inactive'>Inactive</option>";
    echo "</select></div>";

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'submit_d',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>
</fieldset>
