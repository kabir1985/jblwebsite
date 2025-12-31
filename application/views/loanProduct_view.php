<!DOCTYPE html>
<html lang="en">
    <head> 
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/custom_css/styleProduct.css">
    </head>

    <body>

        <?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
        <?php }
        ?>

        <?php
        echo '<div id="v-nav">'; // v-nav
        echo '<ul>';
        $tabnumber = 1;
        foreach ($product as $row) {//foreach
            if ($tabnumber++ == 1) {
                echo '<li tab="tab' . $tabnumber . '" class="first current"><i class="fa fa-angle-right"></i> ' . $row['product_scheme'] . '</li>';
            } else {
                echo '<li tab="tab' . $tabnumber . '"><i class="fa fa-angle-right"></i> ' . $row['product_scheme'] . '</li>';
            }
            //++$tabnumber;
        }//end //foeeach

        echo '</ul>';
        $count = 1;
        foreach ($product as $row) {
            if ($count++ == 1) {
                echo '<div class="tab-content" style="display: block;">';

                //echo '<h3 style="background: #0099cc;color: #fff;padding: 5px;">' . $row['product_scheme'] . '</h3>';
                echo '<table class="table table-bordered table-striped table-responsive-sm">	
		<tr><td>ঋণ প্রাপ্তির যোগ্যতা (Eligibility)</td><td>' . $row['loan_eligibility'] . '</td></tr>
		<tr><td>ঋণসীমা (Limit)</td><td>' . $row['loan_limit'] . '</td></tr>		
		<tr><td>সুদের হার (Rate)</td><td>' . $row['loan_interest_rate'] . '</td></tr>
		<tr><td>কিস্তির ধরণ (Installment Type)</td><td>' . $row['loan_installment_type'] . '</td></tr>
		<tr><td>লোনের মেয়াদ (Period of loan)</td><td>' . $row['loan_period'] . '</td></tr>
		<tr><td>জামানাত (Security)</td><td>' . $row['loan_security'] . '</td></tr>
		<tr><td>অনুমোদিত শাখাসমূহ (Designated Branches)</td><td>' . $row['loan_branches'] . '</td></tr>
            </table>';
                echo '</div>';
            } else {
                echo '<div class="tab-content" style="display: none;">';
                //echo '<h3 style="background: #0099cc;color: #fff;padding: 5px;">' . $row['product_scheme'] . '</h3>';		
                echo '<table class="table table-bordered table-striped table-responsive-sm">		
		<tr><td>ঋণ প্রাপ্তির যোগ্যতা (Eligibility)</td><td>' . $row['loan_eligibility'] . '</td></tr>
		<tr><td>ঋণসীমা (Limit)</td><td>' . $row['loan_limit'] . '</td></tr>		
		<tr><td>সুদের হার (Rate)</td><td>' . $row['loan_interest_rate'] . '</td></tr>
		<tr><td>কিস্তির ধরণ (Installment Type)</td><td>' . $row['loan_installment_type'] . '</td></tr>
		<tr><td>লোনের মেয়াদ (Period of loan)</td><td>' . $row['loan_period'] . '</td></tr>
		<tr><td>জামানাত (Security)</td><td>' . $row['loan_security'] . '</td></tr>
		<tr><td>অনুমোদিত শাখাসমূহ (Designated Branches)</td><td>' . $row['loan_branches'] . '</td></tr>
		</table>';
                echo '</div>';
            }
        }
        echo '</div>'; // End v-nav
        ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom_js/scriptProduct.js"></script>
    </body>
</html>