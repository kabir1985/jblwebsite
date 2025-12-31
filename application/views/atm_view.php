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
            <label for="district" class="col-sm-2 col-form-label">Select District</label>
            <div class="col-sm-4">
                <select name="district" id="districtDrp" class="form-control">
                    <option value="">... Select ...</option>
                    <?php
                    foreach ($district as $row) {
                        echo"<option value='$row[district_id]'>$row[district_name]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="upazila" class="col-sm-2 col-form-label">Select Area</label>
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
                        <th class="">ATM-BRANCH</th>
                        <th class="centered">LOCATION</th>
                        <th class="centered">MAP</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    $imglink = base_url('assets/images/others/map.jpg');
                    $row_count = 0;
                    foreach ($atm as $row) {
                        $row_count++;
                        echo '
            <tr>
                <td class="text-center">' . $row_count . ' </td>               
                <td>' . $row->branch_name . ' </td>
                <td>' . $row->address . ' </td>
                <td> <a target="_blank" href=' . $row->map . '><img src= ' . $imglink . ' > </a></td>             
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

        <script type="text/javascript">
            $(document).ready(function () {
                $("#districtDrp").change(function () {
                    if ($(this).val() === "")
                    {
                        $.ajax({
                            url: "<?php echo base_url(); ?>services/atm_list",
                            success: function (data) {
                                $("#displayATM").html(data);
                            }
                        });
                    } else if ($(this).val() !== '')
                    {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>services/search_result",
                            data: {search: $('#districtDrp').val()},
                            success: function (data) {
                                $("#displayATM").html(data);
                            }
                        });
                    }
                    /*dropdown post *///  
                    $.ajax({
                        url: "<?php echo base_url(); ?>services/buildDropUpazilas",
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

        <script type="text/javascript">
            $(document).ready(function () {
                $("#upazilaDrp").change(function () {
                    if ($(this).val() === "")
                    {
                        $.ajax({
                            url: "<?php echo base_url(); ?>services/atm_list",
                            success: function (data) {
                                $("#displayATM").html(data);
                            }
                        });
                    }
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>services/search_result_upazila",
                        data: {searches: $('#upazilaDrp').val()},
                        success: function (data) {
                            $("#displayATM").html(data);
                        }
                    });
                });
            });
        </script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>
    </body>
</html>