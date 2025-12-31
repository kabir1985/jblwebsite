<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
        <style>

            table.dataTable{
                /*border: 5px solid #dee2e6;*/
                 /*background-color: #0099cc;*/
            }

            table.dataTable th, table.dataTable td{
                font-family: kalpurush !important;
                text-align: left !important;
                /*color: white;*/
            }

           table.dataTable tbody tr:nth-child(even) {
                /*background-color: #0099cc;*/
            }
        </style>
    </head>
    <body>

        <!--        DataTable Starts Here-->
        <!--<table id="dataTable1" class="table table-striped table-bordered table-responsive-sm">-->
            <!--thead>
                <tr>
                    <th class="centered">ক্র: নং</th>
                    <th class="">ফিক্সড ডিপোজিট</th>
                    <th class="centered">হার</th>          
                </tr>
            </thead>
            <tbody> 
                <?php
             /*   $row_count = 0;
                foreach ($products as $row) {
                    $row_count++;
                    echo '
            <tr>
                <td class="text-center">' . $row_count . ' </td>               
                <td>' . $row->product_scheme . ' </td>               
                <td class="text-center"> ' . $row->interest_rate . '</td>               
            </tr>';
                } */
                ?>
            </tbody-->                  
        <!--</table>-->
        
        
      
            <?php
            $marqueeText = '';
            foreach ($products as $row) {
                $marqueeText = $marqueeText . $row->product_scheme .'(ফিক্সড ডিপোজিট)'.'  '. $row->interest_rate .'(সুদের হার)'.' | ';
            }
            ?>
            <marquee scrollamount="4" align="left" behavior="scroll" direction="left" class="text" onmouseover="this.stop()"    onmouseout="this.start()" style="font-family: kalpurush !important; font-style: italic;color: #f33b51 !important;">
                <?php echo $marqueeText; ?>
            </marquee>
            <?php ?>
       
        <!--end test area-->
        
        

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>

        <script>
            $(document).ready(function () {
                $('#dataTable1').DataTable({
                    "bInfo": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bPaginate": false,
                    "ordering": false
                });
            });
        </script>

    </body>
</html>