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
    echo validation_errors();
    $attributes = array('id' => 'notice_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/Notice/edit', $attributes);

    echo "<div class='form-group'><label for='mainmenu'>Page Main Menue</label></br>";
    echo form_dropdown('mainmenu_id', $categorized_page, $notice['page_mainmenu']) . "</div>";

    echo "<div class='form-group'><label for='submenu'>Page Sub Menu</label></br>";
    echo form_dropdown('submenu_id', $notice['page_submenu']) . "</div>";

    echo "<div class='form-group'><label for='childmenu'>Page Child Menu</label></br>";
    echo form_dropdown('childmenu_id', $notice['page_childmenu']) . "</div>";

    echo "<div class='form-group'><label for='name'>Name</label></br>";
    $data = array('name' => 'page_name',
        'id' => 'page_name',
        'class' => 'readonly',
        'readonly' => 'readonly',
        'value' => $notice['name']
    );
    echo form_input($data) . "</div>";

    echo "<div><label for='title'>Notice Title</label></br>";
    $data = array('name' => 'title',
        'id' => 'title',
        'rows' => 2,
        'cols' => 73,
        'class' => 'form-control',
        'required' => 'required',
        'value' => $notice['title']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='path'>File</label></br>";
    $data = array(
        'name' => 'path',
        'id' => 'path',
        'class' => 'formUpload'
            //'value' => $notice['path']
    );
//echo form_input($data)."</p>";
    echo '<div class="controls">' . form_upload($data) . '<span class="help-inline">Current file: ' . $notice["path"] . '</span></div></div>';

    echo "<div class='form-group'><label for='expiry_date'>Expire Date</label></br>";
    $data = array(
        'name' => 'expiry_date',
        'id' => 'expiryDate',
        'class' => 'expDate',
        'required' => 'required',
        'value' => $notice['expiry_date']);
    echo form_input($data) . "</div>";

    /* echo "<div class='form-group'><label for='status'>Status</label></br>";
      $options = array('active' => 'active', 'inactive' => 'inactive');
      echo form_dropdown('status', $options, $notice['status']) . "</div>";
     */

    echo "<div class='form-group'><label>Status</label><br>";
    echo "<select name='status' id='status' class='expDate' 'required'='required'> 
    <option value='$notice[status]'>$notice[status]</option>
    <option value='---------'>--------</option>    
    <option value='inactive'>inactive</option>
    <option value='active'>active</option>";
    echo "</select></div>";

    echo form_hidden('id', $notice['id']);
    echo '<div class="form-actions">' . form_submit("submit", "SUBMIT", 'class="btn btn-primary"') . '</div>';
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
                yearRange: "1971:"
            });
        });
    </script>

</fieldset>
