<html lang="en">
    <head>
         <!--<script src="" referrerpolicy="origin"></script>-->      
        <!--<script src="<?php echo base_url(); ?>assets/tinymce/script.js"></script>-->
        
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

    </head>
    <body>
        <p style="margin: -33px 0 0 -11px;"><?php echo anchor("admin/Pages", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
        }
        ?>

        <form class="form-inline" method="post" enctype="multipart/form-data" action="<?php echo base_url('index.php/admin/Pages/edit'); ?>">

            <input type="hidden" class="form-control" name="id" value="<?php echo $page['id']; ?>" />

            <div class="form-group" id="">
                <label for="pageTier">Page Tier</label></br>
                <select name="pageTier" id="pageTier">
                    <option value="0">--select--</option>
                    <option value="1">Tier-1 [Page for Main Menu]</option>
                    <option value="2">Tier-2 [Page for Sub Menu]</option>
                    <option value="3">Tier-3 [Page for Child Menu]</option>
                    <option value="4">Other</option>
                </select>
            </div>

            <div class="form-group" id="mainMenuDiv">
                <label for="mainMenu">Main Menu</label></br>
                <select id="mainMenuDrp" name="mainmenu_id">
                    <option value="<?php echo $page['mainmenu_id']; ?>"><?php echo $page['mainmenu_name']; ?></option>
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
            </div>   

            <div class="form-group" id="subMenuDiv">
                <label for="subMneu">Sub Menu</label></br>
                <select id="subMenuDrp" name="submenu_id"> 
                    <option value="<?php echo $page['submenu_id']; ?>"><?php echo $page['submenu_name']; ?></option>
                    <option value="">--select menu 1st--</option>                  
                </select>
            </div>

           
                <div class="form-group" id="childMenuDiv"">
                    <label for="childMenu">Child Menu</label></br>
                    <select id="childMenuDrp" name="childmenu_id"> 
                        <option value="<?php echo $page['childmenu_id']; ?>"><?php echo $page['childmenu_name']; ?></option>
                        <option value="">--select sub menu 1st--</option>                  
                    </select>
                </div> 
            
            
            <div class="form-group" id="otherDiv" style="display:none;">
                <label for="otherDiv">Other Menu</label></br>
                <select id="otherMenuDrp" name="othermenu_id"> 
                    <option value="<?php echo $page['mainmenu_id']; ?>"><?php echo $page['mainmenu_name']; ?></option>
                    <option value="">--select--</option> 
                    <?php
                    if (!empty($otherMenu)) {
                        foreach ($otherMenu as $row) {
                            echo '<option value="' . $row->mainmenu_id . '">' . $row->name . '</option> ';
                        }
                    } else {
                        echo '<option value="">Not Available</option>';
                    }
                    ?> 
                </select>
            </div>

            <div class="form-group">
                <label for="pageName">Page Name [Method Name of Controller]</label></br>
                <textarea name="name" id="title" rows="1" cols="40"><?php echo $page['name']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="pageTitle">Page Title</label></br>
                <textarea name="title" id="title" rows="1" cols="50"><?php echo $page['title']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="pageContent">Content [Allowed HTML Scripting]</label></br>
                <textarea name="content" id="" rows="5" cols="50"><?php echo $page['content']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label></br>
                <select id="status" name="status">
                    <option value="<?php echo $page['status']; ?>"><?php echo $page['status']; ?></option>
                    <option value="">--select--</option>  
                    <option value="active">active</option> 
                    <option value="inactive">inactive</option> 
                </select>
            </div>

            </br>
            <div class="form-group ">
                <p  class='clear'>  <button type="submit" id="<?php echo $page['id']; ?>" name="submit" class="btn btn-success">SUBMIT</button></p>
            </div>
        </form>
        <!--scripting-->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mainMenuDrp").change(function () {
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/admin/pages/buildDropSubMenus",
                        data: {id: $(this).val()},
                        type: "POST",
                        success: function (data) {
                            $("#subMenuDrp").html(data);
                        }
                    });
                });

                $("#subMenuDrp").change(function () {
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/admin/pages/buildDropChildMenus",
                        data: {submenuid: $(this).val()},
                        type: "POST",
                        success: function (data) {
                            $("#childMenuDrp").html(data);
                        }
                    });
                });
            });

            $("#pageTier").change(function () {
                var value = this.value;
                if (value === "0") {
                    document.getElementById('mainMenuDiv').style.display = "none";
                    document.getElementById('subMenuDiv').style.display = "none";
                    document.getElementById('childMenuDiv').style.display = "none";
                    document.getElementById('otherDiv').style.display = "none";
                } else if (value === "1") {
                    document.getElementById('mainMenuDiv').style.display = "inline-block";
                    document.getElementById('subMenuDiv').style.display = "none";
                    document.getElementById('childMenuDiv').style.display = "none";
                    document.getElementById('otherDiv').style.display = "none";
                } else if (value === "2") {
                    document.getElementById('mainMenuDiv').style.display = "inline-block";
                    document.getElementById('subMenuDiv').style.display = "inline-block";
                    document.getElementById('childMenuDiv').style.display = "none";
                    document.getElementById('otherDiv').style.display = "none";
                } else if (value === "3") {
                    document.getElementById('mainMenuDiv').style.display = "inline-block";
                    document.getElementById('subMenuDiv').style.display = "inline-block";
                    document.getElementById('childMenuDiv').style.display = "inline-block";
                    document.getElementById('otherDiv').style.display = "none";
                } else if (value === "4") {
                    document.getElementById('otherDiv').style.display = "inline-block";
                    document.getElementById('mainMenuDiv').style.display = "none";
                    document.getElementById('subMenuDiv').style.display = "none";
                    document.getElementById('childMenuDiv').style.display = "none";
                }
            });

        </script> 
        <!--end of Scripting-->          
    </body>
</html>