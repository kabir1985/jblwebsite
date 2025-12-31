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
                    <th>ক্রমিক নং</th>                  
                    <th>নাম ও পদবী</th> 
                    <th>কর্মস্থল</th>
                    <th>ইনোভেশন কমিটিতে পদমর্যাদা</th>
                    <th>ফোন নম্বর</th>
                    <th>ই-মেইল</th>

                </tr>
            </thead>
            <tbody> 
                <?php
                $row_count = 0;
                foreach ($team as $row) {
                    $row_count++;
                    echo '
            <tr>
                <td class="text-center">' . $row_count . ' </td>               
                <td>' . $row->name . '<br>' . $row->official_designation . ' </td>
                    <td>' . $row->posting . ' </td>
                        <td>' . $row->innovation_desig . ' </td>
                            <td>' . $row->phone . ' </td>
                                <td>' . $row->email . ' </td>                     
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
                    "bLengthChange": false,
                    "bPaginate": false,
                    "bFilter": false
                });
            });
        </script>
    </body>
</html>