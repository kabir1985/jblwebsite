<!DOCTYPE html>
<html lang="en">
    <head>   
        <link href="<?php echo base_url(); ?>assets\table\DataTables-1.11.2\css\jquery.dataTables.css" rel="stylesheet">
    </head>
    <body>

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
                foreach ($atm_search as $row) {
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

        <script type="text/javascript" src="<?php echo base_url(); ?>assets\table\DataTables-1.11.2\js\jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                    "bInfo": false,
                    "bLengthChange": false
                });
            });
        </script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/jquery-3.6.0.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets\table\DataTables-1.11.2\js\jquery.dataTables.js"></script>
    </body>
</html>