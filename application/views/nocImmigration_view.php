<!DOCTYPE html>
<html lang="en">
    <head>   
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
    </head>
    <body>
    
    <!--emergency order on 14.05.2025 for Chairman, BoD, JBPLC starts-->
 <!--<div style="border-collapse:collapse; border:1px solid; border-radius:5px; border-color:#09F; height:40px; padding-left:5px; padding-top:5px;">
    <table>
    <tr>
    <td>
    <a href="<?php //echo base_url();?>assets/file/noc/JBPLC_BoD_Chairman_2251.pdf" style="color:#F30;">NOC of Mr. M. Fazlur Rahman, Chairman, Janata Bank PLC for visiting UAE for 07 (Seven) days.</a>
    </td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php //echo base_url();?>assets/file/noc/JBPLC_BoD_Chairman_2251.pdf" style="color:#008040;">DOWNLOAD</a>
    </td>
    </tr>
    </table>
    </div>-->
        </br>
      <!--emergency order on 14.05.2025 for Chairman, BoD, JBPLC ends-->  
		
		<?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
        <?php }
        ?>
        <!--        DataTable Starts Here-->
        <table id="dataTable" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
            <thead>
                <tr>
                    <th class="centered">Date</th>                  
                    <th class="centered">Name, Designation & Posting</th> 
                    <th class="centered">File No</th> 
                    <th class="centered">Approved Days</th> 
                    <th class="centered">Country</th>
                    <th class="centered">Purpose of the visit</th>
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
                <td>' . $row->noc_date . ' </td>               
                <td><span style="color:#;">' . $row->name . ' </span></br><span style="color:#0099cc;"> '.$row->designation.' </span><br><span style="color:#f33b51;">  '. $row->posting .'</span></td>
         
                <td>' . $row->fileNo . ' </td>

                <td>' . $row->approved_days . ' </td>
                <td>' . $row->country . ' </td>
                <td>' . $row->purposeOfTheVisit . ' </td>
                
                <td class="text-center">
                    <a target="_blank" href="' . base_url() . 'assets/file/noc/' . $row->noc_file . '">                       
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                </td>
                <td class="text-center">
                    <a href="' . base_url() . 'download/immigration_noc/' . $row->id . '">
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
					"order": [[0, "desc"]]	// this line is for sorting the databale by descending order.
                });
            });
        </script>
    </body>
</html>