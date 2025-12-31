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

    <p style="margin: -40px 0 10px -22px;"><?php echo anchor("admin/studyMaterial_jbsc", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
    $attributes = array('id' => 'study_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/studyMaterial_jbsc/edit', $attributes);

    echo "<div class='form-group'><label for='title'>Title</label><br/>";
    $data = array('name' => 'title',
        'id' => 'title',
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5,
        'value' => $study['title']);
    echo form_textarea($data) . "</div>";

    /* echo "<div class='form-group'><label for='path'>Study Material PDF Link</label><br/>";
      $data = array(
      'name' => 'path',
      'id' => 'path',
      'size' => 25,
      'value' => $study['path']);
      echo form_input($data) . "</div>";

      echo "<div class='form-group'><label for='status'>Status</label><br/>";
      $data = array(
      'name' => 'status',
      'id' => 'status',
      'class' => 'formTextArea',
      'value' => $study['status']);
      echo form_input($data) . "</div>"; */


    echo "<div class='form-group'><label for='status'>Status</label></br>";
    echo "<select name='status' id='status' class='formTextArea'> 
          <option value='active'>$study[status]</option>
          <option>------</option>
          <option value='active'>active</option>
          <option value='inactive'>inactive</option>";
    echo "</select></div>";

////// upload news file

    echo "<div class='form-group'><label for='upload'>Upload File</label><br/>";
    $data = array(
        'name' => 'myfile',
        'id' => 'upload',
        'class' => 'formUpload',
        'value' => $study['path']);
    echo '<div class="controls">' . form_upload($data) . '<span class="help-inline">Current file: ' . $study["path"] . '</span></div></div>';
    //echo form_upload($data) . "</div>";
////// upload news file 


    echo form_hidden('id', $study['id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
    echo form_close();
    ?>

</fieldset>
