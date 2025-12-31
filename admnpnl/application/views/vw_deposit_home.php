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
        <p><?php echo anchor("admin/deposit/addDepositProduct", '<i class="fa fa-plus"></i> Add Deposit Product', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($deposits)) {
            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
                  <th>Main Menu</th>
                  <th>Sub Menu</th>
                  <th>Child Menu</th>
		  <th>Group</th>
		  <th>Type</th>
		  <th>Product Name</th>
		  <th>Duration</th>
                  <th>Status</th>
		  <th>Actions</th>";
            echo "</tr></thead>";
            foreach ($deposits as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['product_id'] . "</td>";
                echo "<td  class='center'>" . $list['productForMainMenu'] . " </td>";
                echo "<td  class='center'>" . $list['productForSubMenu'] . " </td>";
                echo "<td  class='center'>" . $list['productForChildMenu'] . " </td>";
                echo "<td  class='center'>" . $list['product_group'] . " </td>";
                echo "<td  class='center'>" . $list['product_type'] . " </td>";
                echo "<td  class='center'>" . $list['product_scheme'] . " </td>";
                echo "<td  class='center'>" . $list['duration'] . " </td>";
                echo "<td  class='center'>" . $list['product_status'] . "</td>";

                echo '<td  class="center">' . anchor('admin/deposit/edit/' . $list["product_id"], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/deposit/delete/' . $list["product_id"], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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