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
                    <th class="centered">Name</th> 
                    <th class="centered">Designation</th> 
                    <th class="centered">File No</th> 
                    <th class="centered">Issue Date</th> 
                    <th class="centered">View</th>
                    <th class="centered">Download</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                $row_count = 0;
                foreach ($noc as $row) {
                    $row_count++;
                    echo '
            <tr>
                <td class="text-center">' . $row_count . ' </td>               
                <td>' . $row->employee_name . ' </td>
                <td>' . $row->employee_desig . ' </td>
                <td>' . $row->employee_file . ' </td>
                <td>' . $row->noc_date . ' </td>     
                <td class="text-center">
                    <a target="_blank" href="' . base_url() . 'assets/file/noc/' . $row->employee_noc_file . '">                       
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                </td>
                <td class="text-center">
                    <a href="' . base_url() . 'download/download_noc/' . $row->employee_id . '">
                        <i class="fa fa-download" aria-hidden="true"></i>
                    </a>
                </td>           
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
                    //"bLengthChange": false
                });
            });
        </script>
    </body>
</html>