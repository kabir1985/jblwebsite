<!DOCTYPE html>
<html lang="en">
    <head>   
       <link href="<?php echo base_url(); ?>assets/datatable/css/addons/datatables.min.css" rel="stylesheet">     
    </head>

    <body>

        <?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
  <?php }
        ?>

            <!--        DataTable Starts Here-->
            <?php echo '<table id="dtBasicExample" class="table table-striped table-bordered" style="width:100%">';
                echo '<thead>';
                    echo '<tr>';
                        echo '<th style="font-size:15px;font-family:Helvetica;">SL</th>';
                        echo '<th style="font-size:15px;font-family:Helvetica;">Title</th>';
                        echo '<th style="font-size:15px;font-family:Helvetica;">View</th>';
                        echo '<th style="font-size:15px;font-family:Helvetica;">Download</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>'; ?>
                    <?php
                   
                        $row_count = 0;
                        foreach ($document_details as $doc_info) {
                            $row_count++;
                            echo '
            <tr class="">
                <td style="font-size:14px;font-family:Helvetica;Nikosh;">' . $row_count . '
                </td>
                <td style="font-size:14px;font-family:"Helvetica",sans-serif;Nikosh;">' . $doc_info->title . '
                </td>
                <td style="text-align:center;font-size:14px;font-family:HelveticaN;Nikosh;">
                    <a target="_blank" href="' . base_url() . 'includes/pdf/' . $doc_info->path . '">
                        view
                    </a>
                </td>
                <td style="text-align:center;font-size:14px;font-family:Helvetica;Nikosh;">
                    <a href="' . base_url() . 'about_us/download_file_inner/' . $doc_info->id . '">
                        download
                    </a>
                </td>
            </tr>';
                        }
                    

                    echo '</tbody>';
                    echo '<tfoot>';
                    echo '<tr>';
                    echo '<th style="font-size:15px;font-family:Helvetica;">SL</th>';
                    echo '<th style="font-size:15px;font-family:Helvetica;">Title</th>';
                    echo '<th style="font-size:15px;font-family:Helvetica;">View</th>';
                    echo '<th style="font-size:15px;font-family:Helvetica;">Download</th>';
                    echo '</tr>';
                    echo '</tfoot>';
                    echo '</table>';
                
                ?>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/datatable/js/addons/datatables.min.js"></script>
            <script>
                $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
            </script>
              </body>
                </html>