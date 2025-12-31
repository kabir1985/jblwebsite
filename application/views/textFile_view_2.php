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
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $row_count; ?> </td>

                        <td><?php echo $doc_info->title; ?>  </td>

                        <td class="text-center">
                            <input type="hidden" name="docview" id="docview" value="<?php echo base_url(); ?>assets/files/documents/<?php echo$doc_info->path ?>">
                            <input type='button' value="view" onclick = "openPdf(document.getElementById('docview').value)"/></a>




                        </td>
                        <td class="text-center">
                            <a href=<?php echo base_url(); ?>download/download_files/<?php echo $doc_info->id; ?>">
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php }
                ?>

            </tbody>  

        </table>

        <iframe id="myFrame" style="border:1px solid #0099cc" title="PDF" frameborder="1" scrolling="auto" height="700" width="100%"></iframe>     


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
            function openPdf(docview)
            {
                var omyFrame = document.getElementById("myFrame");
                omyFrame.style.display = "block";
                omyFrame.src = docview;
            }
        </script>
    </body>
</html>