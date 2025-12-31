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
        <p><?php echo anchor("admin/exchange_rates/upload", '<i class="fa fa-arrow-up"></i> Upload Exchange Rate File', 'class="btn btn-primary"'); ?></p>

        <?php
        if (count($exrate_all)) {
            echo "<table  id='dataTable' class='table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
		  <th>Upload Date Time (24 hours formate)</th>
		  <th>Upload By (User ID)</th>
		  <th>Download File</th>
		  <th>Edited Date Time (24 hours formate)</th>
		  <th>Edited By (User ID)</th>
		  <th>Update Couted By</th>
		  <th>Action</th>";

            echo "</tr></thead>";
            foreach ($exrate_all as $key => $list) {
                $url = substr(base_url(), 0, -8);
                echo "<tr>";
                echo "<td>" . $list['ex_id'] . "</td>";
                echo "<td>" . $list['upload_dt'] . "</td>";

                if ($_SESSION['username'] == 'batayan' && ($list['upload_by'] == 'batayan' || $list['upload_by'] == 'jbtd')) {
                    echo "<td>" . $list['upload_by'] . "</td>";
                } elseif ($_SESSION['username'] == 'jbtd' && $list['upload_by'] == 'jbtd') {
                    echo "<td>" . $list['upload_by'] . "</td>";
                } elseif ($_SESSION['username'] == 'jbtd' && $list['upload_by'] == 'batayan') {
                    echo "<td>" . 'WEB ADMIN' . "</td>";
                } else {
                    echo "<td>" . 'N/A' . "</td>";
                }
                echo "<td><a target='_blank' href='".$url."assets/file/ExchangeRate/" . $list['ex_file_path'] . "'>" . $list['ex_file_path'] . "</a></td>";
                echo "<td>" . $list['edited_dt'] . "</td>";
                echo "<td>" . $list['edited_by'] . "</td>";
                echo "<td>" . $list['update_count'] . "</td>";

                $today = date("d-m-Y");
                $timestamp_today = strtotime($today);

                $upload_date_time = $list['upload_dt'];
                $timestamp = strtotime($upload_date_time);
                $upload_date = date('Y-n-j', $timestamp);
                $timestamp_upload_dt = strtotime($upload_date);

                if (($timestamp_today == $timestamp_upload_dt) && ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jbtd')) {
                    echo '<td>' . anchor('admin/exchange_rates/edit/' . $list['ex_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                    /* anchor('admin/treasury/delete/'.$list['ex_id'],'<i class="icon-trash icon-white"></i> Delete','class="btn btn-danger"'). */'</td>';
                } elseif (($timestamp_today != $timestamp_upload_dt) && ($_SESSION['username'] == 'batayan')) {
                    echo '<td>' . anchor('admin/exchange_rates/edit/' . $list['ex_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                    /* anchor('admin/treasury/delete/'.$list['ex_id'],'<i class="icon-trash icon-white"></i> Delete','class="btn btn-danger"'). */'</td>';
                } else {
                    echo '<td><strong>' . "Previous File Can not be Updated!" . '</srtrong></td>';
                }
                echo "</tr>";
            }
        }
        echo "</table>";
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