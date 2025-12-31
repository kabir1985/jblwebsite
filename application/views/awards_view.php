<!DOCTYPE html>
<html lang="en">
    <head>       
    </head>

    <body>
        <?php
        foreach ($award as $award_row) {
            echo '											                                                                                 
                  <div class="award_box">
                     <div style="background:#0099cc;">                     
                        <h4 style="font-style:italic;padding:6px 0;color:white;">' . $award_row['award_title'] . '</h4>
                     </div>            
                     <img class="img-fluid" src="' . base_url() . 'assets/images/awards/' . $award_row['award_image'] . '">
                     <p class="award_description">' . $award_row['award_description'] . '</p>
                  </div> ';
        }
        ?>	
    </body>
</html>