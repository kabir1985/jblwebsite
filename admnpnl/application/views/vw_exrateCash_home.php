<html>
    <head>
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
        <h1 style="margin-top: -33px; font-size: 20px; text-decoration: dotted underline;"><?php echo 'Janata Bank Limited Cash'; ?></h1>
    </head>
    <body>       
        <?php
        if (count($exrate_all)) {
            echo "<table id='dataTable' class='table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
		  <th>CURRENCY</th>
                  <th>SELLING RATE</th>
		  <th>BUYING  RATE</th>	
          <th>Date</th>		  
		  <th>Action</th>";

            echo "</tr></thead>";
            foreach ($exrate_all as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['id'] . "</td>";
                echo "<td>" . $list['currency'] . "</td>";
                echo "<td>" . $list['selling'] . "</td>";
                echo "<td>" . $list['buying'] . "</td>";
                echo "<td>" . $list['date'] . "</td>";
                echo '<td  class="center">' . anchor('admin/exchange_rates/rateCashEdit/' . $list['id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . '</td>';
                echo "</tr>";
            }
        }
        echo "</table>";
        ?>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                    "bInfo": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bPaginate": false
                });
            });
        </script> 

    </body>
</html>