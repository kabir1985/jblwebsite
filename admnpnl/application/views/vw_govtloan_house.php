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

        <p align="right"><a href="<?php echo base_url(); ?>index.php/admin/govtloan/download_success_pdf_house">DOWNLOAD LIST OF THE APPLICANTS FOR HOUSE LOAN</a></p>

        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
        }
        ?>

        <?php
        /* echo "<pre>";
          print_r($govtloan_all);
          die(); */
        if (count($govtloan_house)) {
            echo "<table  id='dataTable' class='table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>Loan ID</th>
		  <th>Applicant's Info.</th>
		  <th>Tracking Number</th>
		  <th>Loan Info.</th>
		  <th>Details Report</th>
          <th>Info. Update Date</th>
		  <th>Status</th>
		  <th>Action</th>";
            echo "</tr></thead>";
            foreach ($govtloan_house as $key => $list) { {
                    $url = base_url();
                    $loan_amount = $list['loanAmount'] / 100000;
                    echo "<tr>";
                    echo "<td>" . $list['id'] . "</td>";
                    if ($list['spouseName'] != "") {
                        echo "<td><span style='font-size:12px;color:#000000;font-weight:bold;'>" . $list['applicantName'] . "</span></br>" . "F/N- " . $list['fatherName'] . "</br>" . "M/N- " . $list['motherName'] . "</br>" . "S/N- " . $list['spouseName'] . "</br>" . "Mobile- " . $list['mobileNumber'] . "</td>";
                    } else {
                        echo "<td><span style='font-size:12px;color:#000000;font-weight:bold;'>" . $list['applicantName'] . "</span></br>" . "F/N- " . $list['fatherName'] . "</br>" . "M/N- " . $list['motherName'] . "</br>" . "S/N- " . "N/A" . "</br>" . "Mobile- " . $list['mobileNumber'] . "</td>";
                    }
                    echo "<td>" . $list['trackNumber'] . "</td>";

                    if ($list['loanType'] == 1) {
                        echo "<td>" . "Applied for: <span style='font-size:12px;color:#C96;font-weight:bold;'>" . $list['loanTypeTextBang'] . "</span></br>" . "Loan Amount- BDT " . $loan_amount . " Lac." . "</br>" . "Installments-  " . $list['loanPeriod'] . "</br>" . "Branch Name-  " . $list['applied_branch'] . "</br>" . "Applied Dt.-  " . $list['applicationSubmitDateTime'] . "</td>";
                    } else {
                        echo "<td>" . "Applied for: <span style='font-size:12px;color:#939;font-weight:bold;'>" . $list['loanTypeTextBang'] . "</span></br>" . "Loan Amount- BDT " . $loan_amount . " Lac." . "</br>" . "Installments-  " . $list['loanPeriod'] . "</br>" . "Branch Name-  " . $list['applied_branch'] . "</br>" . "Applied Dt.-  " . $list['applicationSubmitDateTime'] . "</td>";
                    }



                    echo "<td><a href='".$url."index.php/admin/govtloan/download_success_pdf?applicant_id=" . $list['id'] . "'>Download</a></td>";
                    echo "<td>" . $list['applicationEditDateTime'] . "</td>";

                    if ($list['status'] == 1) {
                        echo "<td style='font-size:12px;color:#009933;font-weight:bold;'>Active</td>";
                    } else {
                        echo "<td style='font-size:12px;color:#FF0000;font-weight:bold;'>Inactive</td>";
                    }


                    echo '<td  class="center">' . anchor('admin/govtloan/edit/' . $list['id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                    anchor('admin/govtloan/delete/' . $list['id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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