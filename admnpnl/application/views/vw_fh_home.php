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
        <p>
            <?php echo anchor("admin/financial_highlights", '<i class="fa fa-plus"></i> Add New Item', 'class="btn btn-primary;"'); ?>
            <?php echo anchor("admin/financial_highlights/add_new_year", '<i class="fa fa-plus"></i> Add New Year', 'class="btn btn-primary;"'); ?>
        </p>

        <?php if (count($fh)) { ?>
            <table id="dataTable" class="table table-bordered table-striped table-responsive-sm" >
                <thead valign='top'>
                    <?php
                    foreach ($fh[0] as $key => $list) {
                        $heading = substr($key, 0, 4);
                        echo "<th>$heading</th>";
                    }
                    ?>
                <th>Actions</th>
            </thead>
            <tbody>	
                <?php
                foreach ($fh as $key => $list) {
                    echo "<tr>";
                    foreach ($list as $key1 => $value1) {
                        echo "<td>" . $value1 . "</td>";
                    }
                    echo "<td align='center'>";
                    echo anchor('admin/financial_highlights/edit/' . $list['id'], 'edit');
                    echo " || ";
                    echo anchor('admin/financial_highlights/delete/' . $list['id'], 'delete');
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php }
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