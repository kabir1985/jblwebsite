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
        <p><?php echo anchor('admin/awards/addAward', '<i class="fa fa-plus"></i> Add New Award', 'class="btn btn-primary"'); ?></p>

        <?php
        if (count($awards)) {
            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
		  <th>Award Title</th>		  	 
		  <th>Description</th> 
		  <th>Date</th>	  
		  <th>Cover</th>	  
		  <th>Status</th>
		  <th>Action</th>";
            echo "</tr></thead>";
            //foreach ($categories as $key => $list)
            foreach ($awards as $key => $list) { {
                    echo "<tr>";
                    echo "<td>" . $list['award_id'] . "</td>";
                    echo "<td>" . $list['award_title'] . "</td>";
                    echo "<td>" . $list['award_description'] . "</td>";
                    echo "<td>" . $list['award_receive_date'] . "</td>";
                    echo "<td>" . $list['award_image'] . "</td>";

                    /* echo "<td>".$list['award_keyword']."</td>";
                      echo "<td>".$list['award_handout_person']."</td>";
                      echo "<td>".$list['award_receive_person']."</td>";
                      echo "<td>".$list['award_venue']."</td>";
                      echo "<td>".$list['award_date']."</td>";
                      echo "<td>".$list['award_type']."</td>";
                      echo "<td>".$list['award_certificate']."</td>";
                      echo "<td>".$list['award_sponsored_by']."</td>";
                      echo "<td>".$list['insert_user_name']."</td>";
                      echo "<td>".$list['date_of_insert']."</td>";
                      echo "<td><img src='".base_url()."includes/uploads/award/thumbs/".$list['award_image_thumb']."'></td>\n";

                      echo "<td>".$list['varified_by']."</td>";
                      echo "<td>".$list['varification_date']."</td>"; */
                    echo "<td>" . $list['award_status'] . "</td>";

                    echo '<td  class="center">' . anchor('admin/awards/edit/' . $list['award_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                    anchor('admin/awards/delete/' . $list['award_id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';

                    /* echo "<td>".anchor('admin/awards/edit/'.$list['award_id'],'Edit')." | "
                      .anchor('admin/awards/delete/'.$list['award_id'],'Delete')."</td>"; */

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