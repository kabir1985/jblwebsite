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


    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>


    <?php
    $attributes = array('id' => 'promotion_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/promotion/edit', $attributes);

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
        'col' => 2,
        'value' => $promotion['title']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='prfrom'>Promotion From</label></br>";
    $options = array(
        '' => '-select-',
        'O' => 'Officer',
        'SO' => 'Senior Officer',
        'PO' => 'Principal Officer',
        'SPO' => 'Senior Principal Officer',
        'AGM' => 'Assistant General Manager',
        'DGM' => 'Deputy General Manager');
    echo form_dropdown('prfrom', $options).'</div>';

    echo "<div class='form-group'><label for='prto'>Promoted To</label></br>";
    $options = array(
        '' => '-select-',
        'SO' => 'Senior Officer',
        'PO' => 'Principal Officer',
        'SPO' => 'Senior Principal Officer',
        'AGM' => 'Assistant General Manager',
        'DGM' => 'Deputy General Manager',
        'GM' => 'General Manager');
    echo form_dropdown('prto', $options).'</div>';


////// upload news file

    echo "<div class='form-group'><label for='upload'>Upload File</label></br>";
    $data = array('name' => 'path', 'id' => 'upload');
   // echo form_upload($data) . "</div>";
    echo form_upload($data)."Current file: ". $promotion['path']."</div>";
//echo '<div class="errormessage">'.form_error('myfile').'</div></p>';
////// upload news file 

    echo "<div class='form-group'><label for='status'>Promotion Status</label></br>";
    $options = array('active' => 'Active',
        'inactive' => 'Inactive');
    echo form_dropdown('status', $options, $promotion['status']).'</div>';


    echo form_hidden('id', $promotion['id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"'). "</p>";
    echo form_close();
    ?>

</fieldset>
