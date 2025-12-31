<span style="margin-top: 0px;"><?php echo anchor("admin/Notice", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></span>
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
        
        .formUpload{
            background-color: #0099cc;
            color: white;
        }

    </style>
    
    <script type="text/javascript">
    $(function () {
        $("select[name='mainmenu_id']").change(function () {
            var value = this.value;
            if (value === "22")
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/admin/pages/otherPage_based_on_otherMenu",
                    data: {mainmenu_id: $(this).val()},
                    type: "POST",
                    success: function (msg) {
                        $("select[name='page_name']").html(msg);
                    }
                });
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/admin/pages/ajax_populate_select_based_on_another_select",
                    data: {mainmenu_id: $(this).val()},
                    type: "post",
                    success: function (msg) {
                        $("select[name='submenu_id']").html(msg);
                    }
                });
            }
        });
    });

    $(function () {
        $("select[name='childmenu_id']").change(function () {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/pages/ajax_populate_childMenuPage_based_on_subMenuPage",
                data: {submenu_id: $(this).val()},
                type: "post",
                success: function (msg) {
                    $("select[name='page_name']").html(msg);
                }
            });
        });
    });

    $(function () {
        $("select[name='submenu_id']").change(function () {
            // var one="<?php echo base_url(); ?>index.php/admin/pages/subMenuHasChildMenu"";

            // if(!empty(one))
            //{
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/pages/buildDropChildMenus",
                data: {submenuid: $(this).val()},
                type: "POST",
                success: function (msg) {
                    $("select[name='childmenu_id']").html(msg);
                }
            });
            //}
            // else
            // {alert('Hello');}
        });
    });


    $(function () {
        $("select[name='submenu_id']").change(function () {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/pages/ajax_populate_subMenuPage_based_on_subMenu",
                data: {submenuid: $(this).val()},
                type: "POST",
                success: function (msg) {
                    $("select[name='page_name']").html(msg);
                }
            });
        });
    });

</script>


    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>
    <!-- Before loop -->
    <?php
    echo validation_errors(); 
    $attributes = array('id' => 'notice_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/Notice/addNotice', $attributes);

    
    echo "<div class='form-group'><label for='mainmenu'>Page Main Menue</label></br>";
    echo form_dropdown('mainmenu_id', $categorized_page) . "</div>";

    echo "<div class='form-group'><label for='submenu'>Page Sub Menu</label></br>";
    echo form_dropdown('submenu_id') . "</div>";

    echo "<div class='form-group'><label for='childmenu'>Page Child Menu</label></br>";
    echo form_dropdown('childmenu_id') . "</div>";

    echo "<div class='form-group'><label for='fname'>Page Name</label></br>";
    echo form_dropdown('page_name') . "</div>";

    echo "<div class='form-group'><label for='title'>Title</label></br>";
    $data = array('name' => 'title', 'id' => 'title', 'rows' => 1, 'col' => 80, 'class' => 'formTextArea',);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='upload'>File</label></br>"; 
    $data = array('name' => 'path', 'id' => 'upload', 'class' => 'formUpload');
    echo form_upload($data) . "</div>";
    
    echo "<div class='form-group'><label for='expiry_date'>Expiry Date [Blank or Not]</label></br>";
    $data = array(
        'name' => 'expiry_date',
        'id' => 'expiryDate',
        'class' => 'expDate',
        'required' => 'required',
        'value' => (isset($_POST['expiry_date']) ? $_POST['expiry_date'] : '' )
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('expiry_date') . '</div></div>';
    
    echo "<div class='form-group'><label for='status'>Status</label></br>";
    $options = array('active' => 'Active', 'inactive' => 'Inactive');
    echo form_dropdown('status', $options) . "</div>";
    
    


    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'notice_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#expiryDate').datetimepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: 'yy-mm-dd',
                timeFormat: 'HH:mm:ss',
                changeYear: true,
                changeMonth: true,
                yearRange:  "1971:2071"
            });
        });
    </script>

</fieldset>