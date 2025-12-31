<html>
    <head>
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
    </head>
    <body>
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="glyphicon glyphicon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
        }
        ?>
        <p><?php echo anchor("admin/exchange_houses/addExchangeHouses", '<i class="fa fa-plus"></i> Add Branch', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($tda)) {

            echo "<table  id='dataTable' class='table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
                    <th>Name</th>
                    <th>Address</th>   
                    <th>Phone</th>                 
                    <th>Country</th> 
                    <th>Status</th>
                    <th>Action</th>";
            echo "</tr></thead>";
            foreach ($tda as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['id'] . "</td>";
                echo "<td>" . $list['exchg_house_name'] . "</td>";
                echo "<td>" . $list['exchg_house_address'] . "</td>";
                echo "<td>" . $list['exchg_house_phone'] . "</td>";
                echo "<td>" . $list['exchg_house_country'] . "</td>";
                echo "<td>" . $list['exchg_house_status'] . "</td>";
                echo '<td>' . anchor('admin/exchange_houses/edit/' . $list['id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/exchange_houses/delete/' . $list['id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({

                });
            });
        </script> 
    </body>
</html>