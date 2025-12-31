<!DOCTYPE html>
<html lang="en">
    <head>  
        <style>
            table.dataTable th, table.dataTable td{
                font-family: kalpurush !important;
            }
        </style>
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
                    <th class="">TITLE</th>
                    <th class="centered">VIEW</th>
                    <th class="centered">DOWNLOAD</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                $row_count = 0;
                foreach ($document_details as $doc_info) {
                    $row_count++;
                    echo '
            <tr>
                <td class="text-center">' . $row_count . ' </td>
                
                <td>' . $doc_info->title . ' </td>
                
                <td class="text-center">
                    <a id="view" href="' . base_url() . 'home/pdfIframeView/' . $doc_info->id . '">                       
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                </td>
                <td class="text-center">
                    <a href="' . base_url() . 'download/download_files/' . $doc_info->id . '">
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

        <script type="text/javascript">
            $(document).ready(function () {
                $("#view").click(function () {
                    $.ajax({
                        url: "<?php echo base_url(); ?>home/pdfIframeView",
                        success: function (data) {
                            $("#displayInIframe").html(data);
                        }
                    });
                });
            });
        </script>
        <div id="displayInIframe">

        </div>

    </body>
</html>