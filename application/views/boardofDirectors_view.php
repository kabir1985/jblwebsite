<!DOCTYPE html>
<html lang="en">
    <head> 
        <style>
            .box{
                background: #0099cc;
                color: #fff;
                margin-top: 5px;
                /*width: 25%;*/
                height: 105px;
            }
        </style>

    </head>

    <body>
        <?php
        /*  $map = directory_map('./assets/images/bod/');
          $keyword = "directors_related_info_";
          $arrsl = array();
          foreach ($map as $row) {
          if (strpos($row, $keyword) !== FALSE) {
          $splitString = explode('_', $row);
          $cutPdf = (explode('.pdf', $splitString[3]));
          $date = implode($cutPdf);
          $arrconv = explode(' ', $date);
          array_push($arrsl, $arrconv[0]);
          }
          }
          $dt = (max($arrsl)); */

        $files = glob('/var/www/html/assets/images/bod/*.*');
        $files = array_combine($files, array_map('filectime', $files));
        arsort($files);
        //echo key($files); 
        $string = key($files);
        $cut = '/var/www/html/assets/images/bod/';
        $file = str_replace($cut, "", $string);
        ?>
        <!--<a href="<?php echo base_url(); ?>assets/images/bod/directors_related_info_<?php //echo $dt; ?>.pdf" target="_blank">Download Director Related Information</a>-->
       
       <!--this is from live server-->
       <a href="<?php echo base_url(); ?>assets/images/bod/<?php echo $file; ?>" target="_blank">Download Director Related Information</a>

        <?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
        <?php }
        ?>
        <div class="text-center">
            <?php foreach ($bod as $row) { ?>
                <?php
                if ($row['bod_designation'] == "Chairman") {
                    echo '<div class="col-md-4" style="margin: 0 auto;text-align: center;float: none;"><a target="_blank "href="' . base_url() . 'assets/images/bod/chairman_sir_profile.pdf"><img class="img-fluid" style="width:158px; height:197px;background: #eef6f9;" src="' . base_url() . 'assets/images/bod/' . $row['bod_image'] . '"></a>
                    <div class="box">
                    <p style="font-size: 15px; font-weight: bold;">' . $row['bod_name'] . ' </p>
                    <p style="margin-top: -15px; font-size: 12px; font-weight: bold;">' . $row['bod_designation'] . ' </p>
                     <p style="margin-top: -15px; font-size: 13px; font-style:italic;">' . $row['bod_extra_quali'] . ' </p></div></div>';
                } else if ($row['bod_designation'] == "Managing Director") {
                    echo '<div class="col-md-4" style="float:left;"><a target="_blank "href="' . base_url() . 'assets/images/bod/MD_sir_profile.pdf"><img class="img-fluid" style="width:158px; height:197px;background: #eef6f9;" src="' . base_url() . 'assets/images/bod/' . $row['bod_image'] . '"></a>
                    <div class="box">
                    <p style="font-size: 15px; font-weight: bold;">' . $row['bod_name'] . ' </p>
                    <p style="margin-top: -15px; font-size: 12px; font-weight: bold;">' . $row['bod_designation'] . ' </p>
                    <p style="margin-top: -15px; font-size: 13px; font-style:italic;">' . $row['bod_extra_quali'] . ' </p>
                    <!--p style="margin-top: -15px; font-size: 15px;"> <a style="color: white; font-style: bold;" href=" ' . base_url() . 'about_us/ceoandmd">PROFILE </a><p---></div></div>';
                } else {
                    echo '<div class="col-md-4" style="float:left;"><img class="img-fluid" style="width:158px; height:197px;background: #eef6f9;" src="' . base_url() . 'assets/images/bod/' . $row['bod_image'] . '">
                    <div class="box">
                    <p style="font-size: 15px; font-weight: bold;">' . $row['bod_name'] . ' </p>
                    <p style="margin-top: -15px; font-size: 12px; font-weight: bold;">' . $row['bod_designation'] . ' </p>
                    <p style="margin-top: -15px; font-size: 13px; font-style:italic;">' . $row['bod_extra_quali'] . ' </p></div></div>';
                }
            }
            ?>

        </div>

    </body>
</html>