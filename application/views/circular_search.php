<!DOCTYPE html>
<html lang="en">
    <head>   
        <link href="<?php // echo base_url();     ?>assets/datatable/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">    
    </head>
    <body>

        <?php echo "<span style='color:#FF0000;font-size:15px;'>Searched Result for:</span> <span style='color:#0099cc;font-weight:bold;font-size:15px;'>$message</span>"; ?>
        <!--        DataTable Starts Here--> 
        <table id="dataTable" class="table table-striped table-bordered table-responsive-sm mt-1" style="width:100%">
            <thead class="table-danger">
                <tr>
                    <th class="centered">Circular Date</th>
                    <th class="centered">Circular No</th>
                    <th class="">Title</th>
                    <th class="centered">Download</th>
                </tr>
            </thead>
            <tbody> 
                <?php foreach ($circular_new as $row) { ?>
                    <tr>
                        <td><?php echo $row->circular_date; ?> </td>
                        <td><?php echo $row->circular_type . " -" . $row->circular_no; ?></td> 
                        <td><?php echo $row->circular_title; ?></td>
                        <td style="text-align:center"><a href="<?php echo base_url() . 'Circular/download_files/' . $row->circular_id; ?>" ><i class="fa fa-download"></i></a></td>          
                    </tr>
                <?php } ?>
            </tbody>                  
        </table>
<!--        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>
       
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable();
            });
        </script>-->
    </body>
</html>