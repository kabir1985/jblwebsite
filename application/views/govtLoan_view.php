<!DOCTYPE html>
<html lang="en">
    <head> 
        <style>
            input {
                outline: none;
                border: none;
            }
            .input100 {
                font-family: Poppins-Regular;
                font-size: 15px;
                color: #555555;
                line-height: 1.2;
                display: block;
                width: 100%;
                background: transparent;
                padding: 5px;
                /*border:none;*/
                border-bottom: 1px solid #0099cc;

            </style>
            <link href="<?php echo base_url(); ?>assets\table\DataTables-1.11.2\css\jquery.dataTables.css" rel="stylesheet">
        </head>
        <body>
     
            <a href="<?php echo base_url(); ?>products/online_application_govt_loan">অনলাইন আবেদন ফর্ম</a> | <a href="<?php echo base_url(); ?>products/tracking_number_search">ট্রাকিং নম্বর ভূলে গেছেন ?</a> | 
            <button style="background: none;color: #0099cc;border: none;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">আপনার আবেদন সম্পাদনা (এডিট) করুন</button>
            <p style="font-size:15px; color:#0099cc; font-weight:bold;">Help Line - 9558703</p>
            <form action="<?php echo base_url('Products/edit_application'); ?>" method="POST">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">               
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"> </i>&nbsp;Edit Application</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                  <!--<i class="fa fa-user"></i>-->
                                <input class="input100" type="text" name="trk" placeholder="Tracking No" required="">
                                <!--<div class="">-->
                                    <!--<i class="fa fa-key"></i>-->
                                <input class="input100" type="password" name="password" placeholder="Password" required="">
                                <!--</div>-->                        
                                <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                            </div>
                            <div class="modal-footer">                           
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>

            <?php foreach ($page_details as $row) { ?>                         
                <?php echo $row->content; ?>
            <?php }
            ?>
            <!--        DataTable Starts Here-->
            <table id="dataTable" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th class="centered">SL</th>
                            <th class="">TITLE</th>
                            <th class="centered">VIEW</th>
                            <th class="centered">DOWNLOAD</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        $row_count = 0;
                        foreach ($document_details as $doc_info) {
                            $row_count++;
                            echo '
            <tr>
                <td class="text-center">' . $row_count . ' </td>
                
                <td>' . $doc_info->title . ' </td>
                
                <td class="text-center">
                    <a target="_blank" href="' . base_url() . 'assets/file/documents/' . $doc_info->path . '">                       
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                </td>
                <td class="text-center">
                    <a href="' . base_url() . 'Download/download_files/' . $doc_info->id . '">
                        <i class="fa fa-download" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>';
                        }
                        ?>
                    </tbody>                  
                </table>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets\table\DataTables-1.11.2\js\jquery.dataTables.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#dataTable').DataTable({
                            "bInfo": false,
                            "bLengthChange": false
                        });
                    });
                </script>
            </body>
        </html>
