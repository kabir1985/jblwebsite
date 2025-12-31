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
        <p><?php echo anchor("admin/advance/addAdvanceProduct", '<i class="fa fa-plus"></i> Add Loan Product', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($advances)) {
            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>"; 
            echo "<thead><tr>";
            echo "<th>Id</th>
                  <th>Main Menu</th>
                  <th>Sub Menu</th>
                  <th>Child Menu</th>
		  <th>Product Group</th>
		  <th>Product Type</th>
		  <th>Product Scheme</th>
		  <th>Rate</th>		 	  		  
		  <th>Actions</th>";
            echo "</tr></thead>";
            foreach ($advances as $key => $list) { {
                    echo "<tr>";
                    echo "<td>" . $list['product_id'] . "</td>";
                    echo "<td>" . $list['productForMainMenu'] . "</td>";
                    echo "<td>" . $list['productForSubMenu'] . "</td>";
                    echo "<td>" . $list['productForChildMenu'] . "</td>";
                    echo "<td>" . $list['product_group'] . "</td>";
                    echo "<td>" . $list['product_type'] . "</td>";
                    echo "<td>" . $list['product_scheme'] . "</td>";
                    echo "<td>" . $list['loan_interest_rate'] . "</td>";
                    echo '<td  class="center">' . anchor('admin/advance/edit/' . $list["product_id"], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                    anchor('admin/advance/edit/' . $list["product_id"], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
                    echo "</tr>";
                }
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