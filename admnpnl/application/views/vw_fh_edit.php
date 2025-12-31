<span style="margin-top: 0px;"><?php echo anchor("admin/financial_highlights", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></span>
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
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>
    <?php
    $attributes = array('id' => 'fh_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/financial_highlights/edit', $attributes);

    if (count($fh)) {
        ?>
        <?php
        foreach ($fh as $key => $list) {
            $custom = substr($key, 0, 4);
            echo "<div class='form-group'><label for=$key>$custom</label></br>";
            $data = array(
                'name' => $key,
                'id' => $key,
                'value' => $list
            );
            echo form_input($data) . "</div>";
        }
    }
    echo form_hidden('id', $fh['id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
    echo form_close();
    ?>
</fieldset>