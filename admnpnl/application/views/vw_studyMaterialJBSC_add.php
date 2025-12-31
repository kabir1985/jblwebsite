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
    </style>

    <p style="margin: -40px 0 10px -22px;"><?php echo anchor("admin/studyMaterial_jbsc", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
    <h1 style="font-size: 20px; margin: -32px 0 0 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
    $attributes = array('id' => 'study_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/studyMaterial_jbsc/addStudyMaterial', $attributes);
    echo "<div class='form-group'><label for='name'>Name</label></br>";
    $data = array('name' => 'stname',
        'id' => 'stname',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => (isset($_POST['stname']) ? $_POST['stname'] : 'study_material' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='title'>Title</label></br>";
    $data = array('name' => 'title',
        'id' => 'title',
        'class' => 'formTextArea',
        'rows' => 3,
        'cols' => 50,
        'value' => (isset($_POST['title']) ? $_POST['title'] : '' )
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('title') . '</div></div>';

    /* echo "<div class='form-group'><label for='path'>Study Material PDF Link (example: study_material_title.pdf, study_material_title.docx, study_material_title.doc etc)</label>";
      $data = array(
      'name' => 'path',
      'id' => 'path',
      'value' => (isset($_POST['path']) ? $_POST['path'] : '' )
      );
      echo form_input($data);

      echo '<div class="errormessage">' . form_error('path') . '</div></div>'; */

    echo "<div class='form-group'><label for='status'>Status</label></br>";
    $data = array(
        'name' => 'status',
        'id' => 'status',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => (isset($_POST['status']) ? $_POST['status'] : 'Active' )
    );
    echo form_input($data) . "</div>";
//echo '<div class="errormessage">'.form_error('news_status').'</div></p>';


    /* echo "<div class='form-group'><label for='page_category'>Page Category</label></br>";
      $data = array(
      'name' => 'page_category',
      'id' => 'page_category',
      'readonly' => 'readonly',
      'class' => 'readonly',
      'value' => (isset($_POST['page_category']) ? $_POST['page_category'] : '11' )
      );
      echo form_input($data) . "</div>";

      echo "<div class='form-group'><label for='page_subcategory'>Page Subcategory</label></br>";
      $data = array(
      'name' => 'page_subcategory',
      'id' => 'page_subcategory',
      'readonly' => 'readonly',
      'class' => 'readonly',
      'value' => (isset($_POST['page_subcategory']) ? $_POST['page_subcategory'] : '89' )
      );
      echo form_input($data) . "</div>";
     */
////// upload news file

    echo "<div class='form-group'><label for='upload'>Upload File</label></br>";
    $data = array('name' => 'myfile', 'id' => 'upload', 'class' => 'formUpload');
    echo form_upload($data) . "</div>";

////// upload news file 



    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'stusy_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>
</fieldset>