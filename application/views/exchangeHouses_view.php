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
        <!--        DataTable Starts Here-->
        <table id="dataTable" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
            <thead>
                <tr>
                    <th class="centered">SL</th>
                    <th class="">NAME</th>                   
                    <th class="centered">ADDRESS</th> 
                    <th class="centered">PHONE</th>
                    <th class="centered">COUNTRY</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                $row_count = 0;
                foreach ($exhouse as $row) {
                    $row_count++;
                    echo '
            <tr>
                <td class="text-center">' . $row_count . ' </td>               
                <td>' . $row->exchg_house_name . ' </td>
                <td>' . $row->exchg_house_address . ' </td>
                <td>' . $row->exchg_house_phone . ' </td>
                <td>' . $row->exchg_house_country . ' </td>             
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
    </body>
</html>