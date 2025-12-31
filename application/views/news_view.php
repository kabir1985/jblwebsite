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
                    <th class="centered">Title</th> 
                    <th class="centered">Date</th> 
                    <th class="centered">View</th>
                    <th class="centered">Download</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                $row_count = 0;
                foreach ($news as $row) {
                    $row_count++;
                    echo '
            <tr>
                <td class="text-center">' . $row_count . ' </td>               
                <td>' . $row->news_title . ' </td>
                <td>' . $row->news_date . ' </td>  
                <td class="text-center">
                    <a target="_blank" href="' . base_url() . 'assets/file/news/' . $row->news_links . '">                       
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                </td>
                <td class="text-center">
                    <a href="' . base_url() . 'download/download_news/' . $row->news_id . '">
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
                    "bLengthChange": false
                });
            });
        </script>
    </body>
</html>