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
        .fileExist{
            background-color:  #DAF7A6;
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
                            //$("select[name='submenu_id']").hide();
                            //$("select[name='childmenu_id']").hide();
                            $('#sub').hide();
                            $('#child').hide();
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

    <p style="margin: -40px 0 0 -22px;"><?php echo anchor("admin/files", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
    <p style="float: right; margin-top: -40px;"><?php echo anchor("admin/files/edit/$file[id]", '<i style="font-size:13px;color:red" class="fa fa-refresh"></i> Refresh', 'class="btn btn-primary"'); ?></p>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
    $attributes = array('id' => 'file_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/files/edit', $attributes);
    ?>

<!--    <div class="form-group" id="mainMenuDiv">
        <label for="mainMenu">Page Main Menu</label></br>
        <select id="mainmenu_id" name="mainmenu_id">
            <option value="<?php echo $file['page_mainmenu']; ?>"><?php echo $file['page_mainmenu']; ?></option>
            <option value="">--select--</option>
            <?php
            if (!empty($mainMenu)) {
                foreach ($mainMenu as $row) {
                    echo '<option value="' . $row->mainmenu_id . '">' . $row->name . '</option> ';
                }
            } else {
                echo '<option value="">Not Available</option>';
            }
            ?>  
        </select>
    </div>   -->

    <?php
    echo "<div class='form-group'><label for='page_mainmenu'>Page Main Menu</label></br>";
     echo form_dropdown('mainmenu_id', $mainMenu, $file["page_mainmenu"]) . '</div>';
 


    echo "<div class='form-group' id='sub'><label for='page_submenu'>Page Sub Menu</label></br>";
    echo form_dropdown('submenu_id', $subMenu, $file['page_submenu']) . '</div>';
    /* $data = array('name' => 'page_submenu',
      'id' => 'page_submenu',
      'value' => $file['page_submenu']);
      echo form_input($data) . "</div>"; */

    echo "<div class='form-group' id='child'><label for='page_childmenu'>Page Child Menu</label></br>";
    echo form_dropdown('childmenu_id', $childMenu, $file['page_childmenu']) . '</div>';
    /* $data = array('name' => 'page_childmenu',
      'id' => 'page_childmenu',
      'value' => $file['page_childmenu']);
      echo form_input($data) . "</div>"; */

    echo "<div class='form-group'><label for='name'>Name</label></br>";
    echo form_dropdown('page_name', $pageName, $file['name']) . '</div>';
    /* $data = array('name' => 'page_name',
      'id' => 'name',
      'value' => $file['name']);
      echo form_dropdown($data) . "</div>"; */

    echo "<div class='form-group'><label for='title'>Title</label></br>";
    $data = array('name' => 'title',
        'id' => 'title',
        'rows' => 1,
        'col' => 80,
        'class' => 'formTextArea',
        'value' => $file['title']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='path'>File</label><br/>";
    $data = array('name' => 'path',
        'class' => 'formUpload',
        'id' => 'upload');
    echo form_upload($data) . "<br/><p class='fileExist'>Current file: " . $file['path'] . "</p></div>";

    echo "<div class='form-group'><label for='image'>Image</label><br/>";
    $data = array('name' => 'image',
        'class' => 'formUpload',
        'id' => 'upload');
    echo form_upload($data) . "<br/><p class='fileExist'>Current file: " . $file['image'] . "</p></div>";

    echo "<div class='form-group'><label for='status'>Status</label><br/>";
    $options = array('active' => 'Active',
        'inactive' => 'Inactive');
    echo form_dropdown('status', $options, $file['status']) . "</div>";

    echo form_hidden('id', $file['id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
    echo form_close();
    ?>
</fieldset>