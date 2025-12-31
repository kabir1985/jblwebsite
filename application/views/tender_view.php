<!DOCTYPE html>
<html lang="en">
    <head>   
        <link href="<?php echo base_url(); ?>assets\table\DataTables-1.11.2\css\jquery.dataTables.css" rel="stylesheet">
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
                    <th class="centered">Tender Name</th>
                    <th class="">Offered By</th>
                    <th class="">Last Date</th>
                    <th class="centered">VIEW</th>
                    <th class="centered">DOWNLOAD</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                $row_count = 0;
                foreach ($tender as $doc_info) {
                    $row_count++;
                    $tender_closing_date = strtotime($doc_info->tender_closing_date);
                    $tender_closing_dateForView = date("d-m-Y g:i A", $tender_closing_date);
                    echo '<tr class=""><td>' . $row_count . '</td><td>' . $doc_info->tender_title . '</td><td>' . $doc_info->tender_offered_by . '</td><td>' . $tender_closing_dateForView . '</td><td class="text-center"><a target="_blank" href="' . base_url() . 'assets/file/tender/' . $doc_info->tender_pdf_link . '"><i class="fa fa-eye" aria-hidden="true"></i></a></td><td class="text-center"><a target="_blank" href="' . base_url() . 'download/download_tender/' . $doc_info->tender_id . '"><i class="fa fa-download" aria-hidden="true"></i></a></td></tr>';
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
    </body>
</html>