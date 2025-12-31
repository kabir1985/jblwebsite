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
        <p><?php
          /*  $CI = & get_instance();
            $CI->load->model('Model_charter');
            $brcode = $CI->Model_charter->getAllBranchCode();
            foreach ($brcode as $row) {
                $id = $row->branch_code;

                if ($_SESSION['username'] == $row->branch_code) {
                    echo anchor("admin/Citizen_charter/addCitizenServicesByBranches/$id", '<i class="fa fa-plus"></i> Add Services', 'class="btn btn-primary"');
                     ?></p>
            <?php } 
        } */ ?>
        <?php
        if (count($charter)) {

            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>SL</th>
		  <th>সেবার নাম</th>
		  <th>সেবা প্রদান পদ্ধতি</th>
                  <th>প্রয়োজনীয় কাগজপত্র  এবং প্রাপ্তিস্থান</th>
                  <th>সেবার মূল‌্য এবং পরিশোধ পদ্ধতি</th>
                  <th>সেবা প্রদানের সময়সীমা</th>			 
                  <th>বিভাগীয় প্রধানের নাম,পদবী,মোবাইল,ফোন নম্বর ও ই-মেইল</th>
		  <th>Status</th>
		  <th>Add Your Branch</th>";
            echo "</tr></thead>";
            //foreach ($categories as $key => $list)
            foreach ($charter as $key => $list) {

                echo "<tr>";
                echo "<td>" . $list['service_id'] . "</td>";
                echo "<td>" . $list['name_of_services'] . "</td>";
                echo "<td>" . $list['metohd_of_providing_services'] . "</td>";
                echo "<td>" . $list['necessary_doc_and_receipt'] . "</td>";
                echo "<td>" . $list['service_price_and_payment'] . "</td>";
                echo "<td>" . $list['period_of_service'] . "</td>";
                echo "<td>" . $list['officer_in_charge'] . "</td>";
                echo "<td>" . $list['status'] . "</td>";
                echo '<td  class="center">' . anchor('admin/Citizen_charter/editByBranches/' . $list['service_id'], '<i class="icon-edit icon-white"></i> Add', 'class="btn btn-info"') . '</td>';
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