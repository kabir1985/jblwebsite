<!DOCTYPE html>
<html lang="en">
    <head>   
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
    </head>
    <body>
        <?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
        <?php }
        ?>

        <div class="form-group row">
            <label for="district" class="col-sm-2 col-form-label">Select Division</label>
            <div class="col-sm-4">
                <select name="division" id="divisionDrp" class="form-control">
                    <option value="">... Select ...</option>
                    <?php
                    foreach ($division as $row) {
                        //echo"<option value='$row[division_id]'>$row[division_name]</option>";
                        echo"<option value='$row[administrative_division_code]'>$row[administrative_division_name]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="district" class="col-sm-2 col-form-label">Select District</label>
            <div class="col-sm-4">
                <select name="district" id="districtDrp" class="form-control">
                    <option value="">..Select Division First..</option>
                    <?php
                    /* foreach ($district as $row) {
                      echo"<option value='$row[district_id]'>$row[district_name]</option>";
                      } */
                    ?>



                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="upazila" class="col-sm-2 col-form-label">Select Upazilla</label>
            <div class="col-sm-4">
                <select name="upazila" id="upazilaDrp" class="form-control">
                    <option value="">.. Select District First ..</option>                                      
                </select>
            </div>
        </div>


        <div id="displayATM">

            <!--        DataTable Starts Here-->
            <table id="dataTable" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                <thead>
                    <tr>
                        <th class="centered">SL</th>
                        <th class="">Branches</th>
                        <th class="centered">Address</th>
                        <th class="centered"> Branch Manager<br>& Contact</th>
                        <th class="centered">Swift Code</th>
                        <th class="centered"> Routing No</th>                       
                        <th class="centered">Citizen Charter</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    $row_count = 0;
                    foreach ($branches as $row) {
                        $row_count++;
                        echo '
            <tr>
                <td class="text-center">' . $row_count . ' </td>               
                <td>' . $row->branch_name . ' </td>
                <td>' . $row->branch_address . ' </td>
                <td>' . $row->branch_manager_name . '</br>'.$row->branch_manager_contact.'</td> 
                <td>' . $row->swift_code . '</td> 
                <td>' . $row->routing_number . '</td>               
                <td> <a target="_blank" href="' . base_url() . 'assets/file/documents/citizen_charter_2024-07-02_04-13-44pm.pdf"> SHOW </a></td>   
            </tr>';
                    }
                    ?>
                </tbody>     
            </table>
        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                    "bInfo": false,
                    "bLengthChange": false
                });
            });
        </script>



        <!--Division dropdown change-->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#divisionDrp").change(function () {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Home/buildDropDistricts",
                        data: {id: $(this).val()},
                        cache: false,
                        type: "POST",
                        success: function (data) {
                            $("#districtDrp").html(data);
                        }
                    });
                });

                $("#districtDrp").change(function () {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Home/buildDropUpazilas",
                        data: {id: $(this).val()},
                        cache: false,
                        type: "POST",
                        success: function (data) {
                            $("#upazilaDrp").html(data);
                        }
                    });
                });


            });
        </script>


        <script>
            //District Dropdown change
            $(document).ready(function () {
                $("#divisionDrp").change(function () {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Home/displayBranchesByDivision",
                        data: {id: $(this).val()},
                        cache: false,
                        type: "POST",
                        success: function (data) {
                            $("#displayATM").html(data);
                        }
                    });
                });


                $("#districtDrp").change(function () {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Home/displayBranchesByDistrict",
                        data: {id: $(this).val()},
                        cache: false,
                        type: "POST",
                        success: function (data) {
                            $("#displayATM").html(data);
                        }
                    });
                });

                $("#upazilaDrp").change(function () {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Home/displayBranchesByUpazila",
                        data: {id: $(this).val()},
                        cache: false,
                        type: "POST",
                        success: function (data) {
                            $("#displayATM").html(data);
                        }
                    });
                });



            });
        </script>

        <script>
            // Dropdown change
            $(document).ready(function () {
                $("#divisionDrp").change(function () {
                     if ($(this).val() === "")
                     {  
                    $.ajax({
                        url: "<?php echo base_url(); ?>Home/displayBranchesWhileClear",
                        success: function (data) {
                            $("#displayATM").html(data);
                        }
                    });
                    
                    }
                });
                
                
                $("#districtDrp").change(function () {
                     if ($(this).val() === "")
                     {  
                    $.ajax({
                        url: "<?php echo base_url(); ?>Home/displayBranchesWhileClear",
                        success: function (data) {
                            $("#displayATM").html(data);
                        }
                    });
                    
                    }
                });
                
                
                 $("#upazilaDrp").change(function () {
                     if ($(this).val() === "")
                     {  
                    $.ajax({
                        url: "<?php echo base_url(); ?>Home/displayBranchesWhileClear",
                        success: function (data) {
                            $("#displayATM").html(data);
                        }
                    });
                    
                    }
                });
                
            });
        </script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>
    </body>
</html>