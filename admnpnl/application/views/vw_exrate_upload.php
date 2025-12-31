
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

    .formUpload{
        background-color: #0099cc;
        color: white;
    }
</style>

<fieldset>  
    <p style="margin: -40px 0 0 -22px;"><?php echo anchor("admin/Exchange_rates/home", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
    <!--<h1 style="font-size: 20px; margin: -22px 0 0 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>-->

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>    
    <?php
    /* if ($this->session->flashdata('message')){
      echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>'.$this->session->flashdata('message').'</div>';
      } */
    $attributes = array('id' => 'innovation_form', 'class' => 'my_entry_form');
    echo form_open_multipart('admin/Exchange_rates/upload', $attributes);

    echo "<p style='margin: 30px 0 20px 0;'><label for='upload'>ফাইল আপলোড করূণঃ</label>";
    $data = array(
        'name' => 'myfile',
        'id' => 'upload',
        'class' => 'formUpload');
    echo form_upload($data) . "</p>";

    if (isset($error_mssg) && !empty($error_mssg)) {
        echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . $error_mssg . '</div></p>';
    }


    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'value' => 'Upload',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>
</fieldset>
