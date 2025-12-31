<html>
    <head>
        
    </head>
    <body>



        <!--Exchange Rate Table Starts here-->



        <?php
        $CI = & get_instance();
        $CI->load->model('Home_model');
        $rate = $CI->Home_model->jblRateCash();
        /*  if (isset($rate)) {
          echo '<div class="curreny">';
          echo '<table class="table table-sm table-bordered"><thead><tr><th>Currency</th><th>Selling Rate</th><th>Buying Rate</th></tr></thead><tr class="alert-danger"><td colspan="3"> JANATA BANK PLC. CASH</td></tr>';
          foreach ($rate as $row) {
          echo '<tr class="alert-success"><td>' . $row['currency'] . '</td><td>' . $row['selling'] . '</td><td>' . $row['buying'] . '</td></tr>';
          }
          echo '</table>';
          echo '</div>';
          } */
        ?>       

        <!--start test area-->
       
            <?php
            $CI = & get_instance();
            $CI->load->model('Home_model');
            $rate = $CI->Home_model->jblRateCash();
            $marqueeText = '';
            foreach ($rate as $row) {
                $marqueeText = $marqueeText . $row['currency'].'  ' . $row['selling'].'(Selling Rate)'.'  '.$row['buying']. '(Buying Rate)'.' | ';
            }
            ?>
            <marquee scrolldelay="130" scrollamount="4" align="left" behavior="scroll" direction="left" class="text" onmouseover="this.stop()"    onmouseout="this.start()" style="color: #FF1493; font-family: kalpurush !important;">
                <?php echo $marqueeText; ?>
            
            </marquee>
            <?php ?>
       
        <!--end test area-->



        <!--Exchange Rate Table Ends here-->
    </body>
</html>