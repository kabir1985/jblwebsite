<!DOCTYPE html>
<html lang="en">
    <head>   
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
    </head>
    <body>  

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
                <td> <a target="_blank" href="' . base_url() . 'Home/branch_details/' . $row->branch_code . '"> SHOW </a></td>   
            </tr>';
                }
                ?>
            </tbody>     
        </table>


        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                    "bInfo": false,
                    "bLengthChange": false
                });
            });
        </script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>
    </body>
</html>