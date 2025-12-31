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
        .controls  .help-inline{
            background-color:  #DAF7A6;
        }
    </style>
    
	 <p style="margin: -40px 0 0 -22px;"><?php echo anchor("admin/subsidiaries", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>
	
    <?php
    $attributes = array('id' => 'id_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/subsidiaries/edit', $attributes);

    echo "<div class='form-group'><label for='name'>Name</label></br>";
    $data = array(
        'name' => 'name',
        'class' => 'formTextArea',
        'id' => 'name',
        'value' => $sub['name'],
        'rows' => 1,
        'col' => 5
    );
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='address'>Address</label></br>";
    $data = array('name' => 'address',
        'id' => 'address',
        'class' => 'formTextArea',
        'value' => $sub['address'],
        'rows' => 2,
        'col' => 5
    );
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='contacts'>Contacts</label></br>";
    $data = array('name' => 'contacts',
        'id' => 'contacts',
        'class' => 'formTextArea',
        'value' => $sub['contacts'],
        'rows' => 1,
        'col' => 5
    );
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='image'> Image</label>";
    $data = array("name" => "image",
        "id" => "image",
        'class' => 'formUpload',
        "value" => $sub['image']);
    echo '<div class="controls">' . form_upload($data) . '<span class="help-inline">Current file: ' . $sub["image"] . '</span></div></div>';

    echo "<div class='form-group'><label for='status'>Status</label></br>";
    echo "<select name='status' id='status' class='formTextArea'> 
          <option value='Active'>Active</option>
          <option value='Inactive'>Inactive</option>";
    echo "</select></div></br>";

    echo form_hidden('id', $sub['id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
    echo form_close();
    ?>

</fieldset>
