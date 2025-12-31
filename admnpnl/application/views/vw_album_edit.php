<span style="margin-top: 0px;"><?php echo anchor("admin/photo_gallery", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></span>
<fieldset>
    <legend><h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1></legend>

    <style>
        .readonly{
            cursor: not-allowed;
            background-color: #D9ECF3;
            opacity: 1;
        }
        .form-control:valid{
            background-color: #D9ECF3!important;
        }
        .expDate{
            height: 25px!important;
        }
        .expDate:valid{
            background-color: #D9ECF3!important;
        }
        .control-group{
            /*float: left;*/
        }
        .form-group{
            padding: 10px;
        }
        #expiryDate{
            /*background-color:  #D9ECF3!important;*/         
        }  

        .ui-datepicker-trigger{
            cursor: pointer;
        }

    </style>

    <?php
    $attributes = array('id' => 'bod_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/photo_gallery/edit', $attributes);


    echo "<div class='form-group'><label for='albumName'>Album Name</label></br>";
    $data = array('name' => 'albumName',
        'id' => 'albumName',
        'rows' => 2,
        'col' => 4,
        'value' => $album['albumName']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='albumDescription'>Description</label></br>";
    $data = array('name' => 'albumDescription',
        'rows' => 2,
        'col' => 4,
        'value' => $album['albumDescription']);
    echo form_textarea($data) . "</div>";


    echo "<div class='form-group'><label for='default_image'> Cover Photo</label></br>";
    $data = array("name" => "default_image",
        "id" => "default_image",
        "value" => $album['default_image']);
    echo '<div class="controls">' . form_upload($data) . '<span class="help-inline">Current file: ' . $album["default_image"] . '</span></div></div>';

    echo "<div class='form-group'><label for='albumStatus'>Status</label></br>";
    echo "<select name='albumStatus' id='albumStatus'> 
    <option value='Active'>Active</option>
    <option value='Inactive'>Inactive</option>";
    echo "</select></div>";
    
    echo form_hidden('albumID', $album['albumID']);
    //echo form_submit('submit', 'SUBMIT');
     echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
    echo form_close();
    ?>

</fieldset>
