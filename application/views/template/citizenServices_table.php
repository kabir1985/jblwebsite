<!DOCTYPE html>
<html lang="en">
    <head>   
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
        <style>

/*            table.dataTable{
                border: 5px solid #dee2e6;
                background-color: #D9ECF3;
            }

            table.dataTable th, table.dataTable td{
                font-family: kalpurush !important;
                text-align: left !important;
                color: black;
            }

            table.dataTable tbody tr:nth-child(even) {
                background-color: #D9ECF3;
            }*/

            .marquee {
                left: 1em;
                position: relative;
                box-sizing: border-box;
                animation: marquee 10s linear 0s infinite;
                white-space:nowrap;
                /*animation: scroll-left 20s linear infinite;*/

            }
            .marquee:hover {
                animation-play-state: paused;
            }
            @keyframes marquee {
                0% {
                    transform: translate(0, 0);
                }
                100% {
                    transform: translate(-100%, 0);
                }
            }
        </style>
    </head>
    <body>

        <!--        DataTable Starts Here-->
        <table id="dataTable" class="table table-striped table-bordered table-responsive-sm">
            <thead>
                <tr>
                    <th class="centered">ক্রম</th>
                    <th class="">সেবার নাম</th>
                    <th class="centered">চার্জের প্রকৃতি</th>
                    <th class="centered">বিবরণ</th>
                    <th class="centered">হার</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                $row_count = 0;
                foreach ($charter as $row) {
                    $row_count++;
                    echo '
            <tr>
                <td class="text-center">' . $row_count . ' </td>               
                <td>' . $row->services . ' </td>               
                <td class="text-center"> ' . $row->natureOfCharge . '</td>
                <td class="text-center"> ' . $row->description . '</td>
                <td class="text-center"> ' . $row->rate . '</td>
            </tr>';
                }
                ?>
            </tbody> 
        </table>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>

        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
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