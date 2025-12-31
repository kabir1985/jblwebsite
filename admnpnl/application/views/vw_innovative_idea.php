<html>
    <head>
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
        <style>
            .color{
                color: #0099cc;
                font-family: Kalpurush, SolaimanLipi!important;
                font-weight: bold;
                font-size: large;
            }
            .box-content{
                font-family: Kalpurush, SolaimanLipi!important;
                font-size: large;
            }
            .id{
                color: red;
            }
        </style>
    </head>
    <body>
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="glyphicon glyphicon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
        }
        ?>
         
        <?php
        if (isset($details)) {

            //echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            //echo "<thead><tr>";
//            echo "<th>Sl</th>
//                  <th>Title</th>
//		  <th>Description</th>
//                  <th>Objective</th>
//		  <th>Procedure</th> ";
            //echo "</tr></thead>";
            foreach ($details as $key => $list) {
                
                 echo "<span class='id'>ID :"."</span> ". $list['id'] . "<br>" ."<span class='color'>"."ধারণার শিরোনাম :"."</span> ". $list['title']. "<br>"."<span class='color'>". "ধারণার পরিচিতি: "."</span> ". $list['description']. "<br>" ."<span class='color'>"."উদ্দেশ‌্য :"."</span> ". $list['objective'] . "<br>" ."<span class='color'>"."কর্ম পদ্ধতি : "."</span> ". $list['proced'] .  "</br>" ."<span class='color'>". " উপকারিতা / সুফল:"."</span> ".$list['usefullness']. "</br>" ."<span class='color'>".  " বাস্তবায়ন ও পরিচালন ব‌্যয়:"."</span> ".$list['maintainCost']. "</br>" ."<span class='color'>". "বাস্তবায়ন সময়কাল (বাস্তবায়নের সম্ভাব‌্য তারিখ উল্লেখ করতে হবে):"."</span> ".$list['duration']. "</br>" ."<span class='color'>". " সুবিধাভোগীর ব‌্যয় (যদি থাকে):"."</span> ".$list['benificiaryCost']. "<br>" ."<span class='color'>"."সম্প্রসারনের সুযোগ (যদি থাকে) : "."</span> ". $list['expandFacility'] . "</br>" ."<span class='color'>". " সম্ভাব‌্য ঝুঁকি:"."</span> ".$list['probableRisk']. "</br>" ."<span class='color'>". " বিবিধ:"."</span> ".$list['miscellenous']. "</br>"."<span class='color'>"." প্রস্তাবনা প্রেরণের তারিখ:"."</span> ".$list['dt']. "</br>";
                 echo "------------------------------------------------------------------- "."<br>";
                
                  //echo '<td  class="center">' . anchor('admin/atm/edit/' . $list['id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                //anchor('admin/atm/delete/' . $list['id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
                
              
                 // echo "<tr>";
                //echo "<td>". $list['id'] . "<br>". $list['title']. "<br>". $list['description']. "<br>". $list['objective'] . "<br>". $list['proced'] .  "</td>";
                //echo "<td>" . $list['title'] . "</td>";
                //echo "<td>" . $list['description'] . "</td>";
                //echo "<td>" . $list['objective'] . "</td>";
                //echo "<td>" . $list['proced'] . "</td>";

                   //echo "</tr>";
            }
            //echo "</table>";
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