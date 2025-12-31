<fieldset>
    <style>
        .readonly{
            cursor: not-allowed;
            background-color: #eeeeee;
            opacity: 1;
        }
        .control-group{
            /*float: left;*/
        }
        .form-group{
            padding: 10px;
        }
    </style>

    <p style="margin-top:-34px;"><?php echo anchor("admin/promotion", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

    <h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>



    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
    $attributes = array('id' => 'promotion_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/promotion/addPromotion', $attributes);

//echo "<p><label for='name'>Name</label>";
    $data = array('name' => 'prname',
        'id' => 'prname',
        'readonly' => 'readonly',
        'type' => 'hidden',
        'value' => (isset($_POST['prname']) ? $_POST['prname'] : 'promotion' )
    );
    echo form_input($data) . "</p>";


    echo "<div class='form-group'><label for='title'>Title of the Promotion</label></br>";
    $data = array('name' => 'title',
        'id' => 'title',
        'rows' => 2,
        'col' => 10,
        'value' => (isset($_POST['title']) ? $_POST['title'] : '' )
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('title') . '</div></div>';


    echo "<div class='form-group'><label for='prfrom'>Promoted from</label></br>";
    echo "<select name='prfrom' id='prfrom'> 
    <option value=''>-select-</option>
    <option value='O'>Officer</option>
    <option value='SO'>Senior Officer</option>
    <option value='PO'>Principal Officer</option>
    <option value='SPO'>Senior Principal Officer</option>
    <option value='AGM'>Assistant General Manager</option>
    <option value='DGM'>Deputy General Manager</option>";
    echo "</select></div>";


    echo "<div class='form-group'><label for='prto'>Promoted To</label></br>";
    echo "<select name='prto' id='prto'> 
    <option value=''>-select-</option>
    <option value='SO'>Senior Officer</option>
    <option value='PO'>Principal Officer</option>
    <option value='SPO'>Senior Principal Officer</option>
    <option value='AGM'>Assistant General Manager</option>
    <option value='DGM'>Deputy General Manager</option>
    <option value='GM'>General Manager</option>";
    echo "</select></div>";

//echo "<p><label for='status'>Promotion Status</label>";
    $data = array(
        'name' => 'status',
        'id' => 'status',
        'readonly' => 'readonly',
        'type' => 'hidden',
        'value' => (isset($_POST['status']) ? $_POST['status'] : 'Active' )
    );
    echo form_input($data) . "</p>";

//echo "<p><label for='page_category'>Page Category</label>";
    $data = array(
        'name' => 'page_mainmenu',
        'id' => 'page_mainmenu',
        'readonly' => 'readonly',
        'type' => 'hidden',
        'value' => (isset($_POST['page_mainmenu']) ? $_POST['page_mainmenu'] : '22' )
    );
    echo form_input($data) . "</p>";


    echo "<div class='form-group'><label for='upload'>Upload File</label></br>";
    $data = array(
        'name' => 'path',
        'id' => 'upload');
    echo form_upload($data) . "</div>";


    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'promotion_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>
</fieldset>