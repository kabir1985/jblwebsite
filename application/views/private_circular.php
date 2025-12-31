

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="<?php echo base_url(); ?>assets/ajax/jquery-3.6.0.min.js" type="text/javascript" language="javascript"></script>
        <link href="<?php echo base_url(); ?>assets/ajax/jquery-ui/jquery-ui.min.css" type="text/css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/custom_css/mega.css" type="text/css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/custom_css/page_style.css" type="text/css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet"> 
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/others/logo.png"> 

        <style>

            #searchBox{
                background: #D9ECF3;
            }

            .form-control:focus{
                border-color: inherit;
                -webkit-box-shadow: none;
                box-shadow: none;
                background: #D9ECF3;
            }

            #selectid{
                border-top: none;
                border-left: none;
                border-right: none;
                border-radius: 0;
                background: #D9ECF3;
            }

            input[type=text]{
                border-top: none;
                border-left: none;
                border-right: none;
                border-radius: 0;
                background: #D9ECF3;
            }

            #fromDate{
                border-top: none;
                border-left: none;
                border-right: none;
                /*border-bottom: 1px solid #0099cc;*/
                background: #D9ECF3;
            }

            #toDate{
                border-top: none;
                border-left: none;
                border-right: none;
                /*border-bottom: 1px solid #0099cc;*/
                background: #D9ECF3;
            }

            .ui-datepicker-trigger{
                border:none;
                background:none;
            }

            .ui-datepicker-trigger:before{
                font-family: FontAwesome;
                content: "\f073";
                font-size: 28px;
                color: #0099cc;
            }
        </style>

    </head>

    <body>
        <!--Start--Top Menu-->
        <!--div class="container-fluid topbar">
            <div class="container">
                <div class="row">
        <?php //$this->load->view('template/topbar'); ?>
                </div>
            </div>
        </div-->
        <!--End--Top Menu-->

        <!--Start--Logo-->
        <div class="container">
            <div class="row">
                <div class="col-12 logo">
                    <a href="#"> <img src="<?php echo base_url(); ?>assets/images/others/jblogo.png" class="img-fluid" alt="logo"></a>
                </div>
            </div>
        </div>
        <!--End--Logo-->

        <!--Start--Menu Bar-loaded-from-helper-->
        <!--div class="container-fluid">
            <div class="row">
        <?php //echo menu(); ?>
            </div>
        </div-->
        <!--End--Menu Bar-->

        <!--Start-Page-Title-->
        <div class="page_header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 page_title">
                        <?php foreach ($page_details as $row) { ?>                  
                            <?php echo $row->title; ?>          
                        <?php }
                        ?>
                    </div>
                    <!--div class="col-lg-6 col-md-6 col-sm-12">
                    <?php //echo breadcrumbHomeItem(); ?>
                    </div-->
                </div>          
            </div>
        </div> 
        <!--Start-Page-Title-->

        <!--Start-content-text-file-->
        <div class="container mt-2">
            <div class="row">

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group row" id="searchBox">
                        <label for="search" class="col-sm-4">Search By <br>
                            <a class="col-sm-4" href="<?php echo base_url(); ?>Circulars"><i class="fa fa-refresh"></i></a>
                        </label>
                        <div class="col-sm-8">
                            <!--<input type="text" class="form-control" id="text">-->
                            <select id="selectid" class="form-control" name="color" onchange='CheckCirculars(this.value);'> 
                                <option selected="">--Please Select--</option>  
                                <option value="Circular No">Number Wise</option>
                                <option value="Circular Title">Title Wise</option>
                                <option value="Circular Type">Type Wise</option>
                                <option value="Circular Department">Department Wise</option>
                                <option value="Circular Date">Date Wise</option>
                            </select>

                            <!--Search by No-->
                            <form id="search-no" style='display:none;' class="mt-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search" id="search" placeholder="Write Circular No." required="">                      
                                </div>  
                                <button type="submit" class="btn btn-info" id="show" name="submit">GO</button>
                            </form>  

                            <!--Search by Title-->
                            <form id="search-title" style='display:none;' class="mt-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search" id="search" placeholder="Write Some Words" required="">                      
                                </div>  
                                <button type="submit" class="btn btn-info" id="circularTitle" name="submit">GO</button>
                            </form>

                            <!--Search by Department-->
                            <form id="search-department" style='display:none;' class="mt-2">
                                <div class="form-group">
                                    <?php
                                    echo "<select class='form-control' name='search' placeholder='search by department' id='selectid'>";
                                    echo'<option  value="">--Please Select--</option>';
                                    foreach ($hoDept as $row) {
                                        echo '<option value="' . $row->office_code . '">' . $row->office_name . '</option>';
                                    }
                                    echo"</select>";
                                    ?>                    
                                </div>  
                                <button type="submit" class="btn btn-info" name="submit" id="formDept">GO</button>
                            </form>

                            <!--Search by Type-->
                            <form id="search-type" style='display:none;' class="mt-2">
                                <div class="form-group">
                                    <select class="form-control" name="search" placeholder="select type" id="selectid"> 
                                        <option selected="">--Select--</option>  
                                        <option value="Instruction Circular">Instruction Circular</option>
                                        <option value="Information Circular">Information Circular</option>        
                                        <option value="Circular Letter">Circular Letter</option>
                                        <option value="RCD Circular">RCD Circular</option>
                                        <option value="ID Circular Letter">ID Circular Letter</option>
                                        <option value="FD Circular">FD Circular</option>
                                        <option value="FD Circular Letter">FD Circular Letter</option>
                                        <option value="Lost Notification">Lost Notification</option>
                                    </select>                      
                                </div>  
                                <button type="submit" class="btn btn-info" name="submit" id="formType">GO</button>
                            </form>  

                            <!--Search by Date-->
                            <form id="search-date" style='display:none;' class="mt-2">
                                <div class="form-group">                                                                
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <!--<span class="input-group-text"><i class="fa fa-calendar" id="ca1"></i></span>-->
                                        </div>
                                        <input id="fromDate"  name="fromdate" class="form-control" placeholder="From">
                                    </div>
                                </div>  

                                <div class="form-group">                                                                
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <!--<span class="input-group-text"><i class="fa fa-calendar" id="ca1"></i></span>-->
                                        </div>
                                        <input id="toDate"  name="todate" class="form-control" placeholder="To">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info" name="submit" id="formDate">GO</button>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 col-md-9 col-lg-9 content" id="mainTable">

                    <?php echo $pagination; ?>

                    <table class="table table-responsive-sm table-bordered table-striped mt-1">
                        <thead class="table-danger">
                            <tr>
                                <th>Circular Date</th>
                                <th >Circular No</th>
                                <th >Title</th> 
                                <th>View</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($circular_new as $row) { ?>
                                <tr>
                                    <td><?php echo $row->circular_date; ?> </td>
                                    <td><?php echo $row->circular_type . " -" . $row->circular_no; ?></td> 
                                    <td><?php echo $row->circular_title; ?></td>
                                    <td style="text-align:center"><a href="<?php echo base_url() . 'Circulars/pdfIframeView/' . $row->circular_id; ?>" ><i class="fa fa-eye"></i></a></td>                                                            
                                    <td style="text-align:center"><a href="<?php echo base_url() . 'Circulars/download_files/' . $row->circular_id; ?>" ><i class="fa fa-download"></i></a></td>          
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
        <!--End-content-text-file-->

        <!--Start Footer Section-->
        <!--footer class="footer container-fluid">
            <div class="container">
                <div class="row">
        <?php //$this->load->view('template/footer'); ?>
                </div>
            </div>
            <div class="copyright row justify-content-center">
                <p>Copyright © Janata Bank Limited. All Rights Reserved.</p>
            </div>
        </footer-->
        <!--End Footer Section-->

        <script src="<?php echo base_url(); ?>assets/ajax/jquery-ui/jquery-ui.min.js" type="text/javascript" language="javascript"></script>
        <script src="<?php echo base_url(); ?>assets/ajax/popper.min.js" type="text/javascript" language="javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript" language="javascript"></script>
        <script src="<?php echo base_url(); ?>assets/custom_js/menu.js" type="text/javascript" language="javascript"></script>

        <script type="text/javascript">
                                function CheckCirculars(val) {

                                    var element = document.getElementById('search-no');
                                    if (val === 'Circular No')
                                        element.style.display = 'block';
                                    else
                                        element.style.display = 'none';

                                    var elements = document.getElementById('search-title');
                                    if (val === 'Circular Title')
                                        elements.style.display = 'block';
                                    else
                                        elements.style.display = 'none';

                                    var elements = document.getElementById('search-department');
                                    if (val === 'Circular Department')
                                        elements.style.display = 'block';
                                    else
                                        elements.style.display = 'none';

                                    var elements = document.getElementById('search-type');
                                    if (val === 'Circular Type')
                                        elements.style.display = 'block';
                                    else
                                        elements.style.display = 'none';

                                    var elements = document.getElementById('search-date');
                                    if (val === 'Circular Date')
                                        elements.style.display = 'block';
                                    else
                                        elements.style.display = 'none';
                                }
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#fromDate').datepicker({
                    showOn: "both",
                    buttonText: '',
                    dateFormat: 'yy-mm-dd',
                    changeYear: true,
                    changeMonth: true,
                    yearRange: "1971:2071"
                });

                $('#toDate').datepicker({
                    showOn: "both",
                    buttonText: '',
                    dateFormat: 'yy-mm-dd',
                    changeYear: true,
                    changeMonth: true,
                    yearRange: "1971:2071"
                });

            });
        </script>

        <script type="text/javascript">
            $(function () {
                $("#show").click(function (e) {  // passing down the event 
                    var maruf = $.trim($("#search").val());
                    if (maruf.length > 0) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>Circulars/searchBy_no",
                            type: 'POST',
                            cache: false,
                            data: $("#search-no").serialize(),
                            success: function (data) {
                                $('#search').val('');
                                $("#mainTable").html(data);
                                //alert("success");
                            },
                            error: function () {
                                alert("Fail");
                            }
                        });
                    }
                    e.preventDefault(); // could also use: return false;
                });
            });
        </script>

        <script type="text/javascript">
            $(function () {
                $("#circularTitle").click(function (e) {  // passing down the event             
                    $.ajax({
                        url: "<?php echo base_url(); ?>Circulars/searchBy_title",
                        type: 'POST',
                        cache: false,
                        data: $("#search-title").serialize(),
                        success: function (data) {
                            $('#search').val('');
                            $("#mainTable").html(data);
                            //alert("success");
                        },
                        error: function () {
                            alert("Input Properly");
                        }
                    });

                    e.preventDefault(); // could also use: return false;
                });
            });
        </script>

        <script type="text/javascript">
            $(function () {
                $("#formDept").click(function (e) {  // passing down the event             
                    $.ajax({
                        url: "<?php echo base_url(); ?>Circulars/searchBy_dept",
                        type: 'POST',
                        cache: false,
                        data: $("#search-department").serialize(),
                        success: function (data) {
                            $('#search').val('');
                            $("#mainTable").html(data);
                            //alert("success");
                        },
                        error: function () {
                            alert("Input Properly");
                        }
                    });

                    e.preventDefault(); // could also use: return false;
                });
            });
        </script>

        <script type="text/javascript">
            $(function () {
                $("#formType").click(function (e) {  // passing down the event             
                    $.ajax({
                        url: "<?php echo base_url(); ?>Circulars/searchBy_type",
                        type: 'POST',
                        cache: false,
                        data: $("#search-type").serialize(),
                        success: function (data) {
                            $('#search').val('');
                            $("#mainTable").html(data);
                            //alert("success");
                        },
                        error: function () {
                            alert("Input Properly");
                        }
                    });

                    e.preventDefault(); // could also use: return false;
                });
            });
        </script>

        <script type="text/javascript">
            $(function () {
                $("#formDate").click(function (e) {  // passing down the event             
                    $.ajax({
                        url: "<?php echo base_url(); ?>Circulars/searchBy_date",
                        type: 'POST',
                        cache: false,
                        data: $("#search-date").serialize(),
                        success: function (data) {
                            $('#fromdate').val('');
                            $('#todate').val('');
                            $("#mainTable").html(data);
                            //alert("success");
                        },
                        error: function () {
                            alert("Input Properly");
                        }
                    });

                    e.preventDefault(); // could also use: return false;
                });
            });
        </script>

    </body>
</html>


