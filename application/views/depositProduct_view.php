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
		<tr><td>হিসাবের মেয়াদকাল</td><td>' . $row['duration'] . '</td></tr>
		<tr><td>মাসিক কিস্তির পরিমাণ</td><td>' . $row['monthly_installment'] . '</td></tr>		
		<tr><td>সুদের হার</td><td>' . $row['interest_rate'] . '</td></tr>
		<tr><td>কিস্তি প্রদানের তারিখ</td><td>' . $row['installment_date'] . '</td></tr>
		<tr><td>হিসাব খোলার নিয়মাবলী</td><td>' . $row['opening_rule'] . '</td></tr>
		<tr><td>মেয়াদপূর্তির পূর্বে হিসাব বন্ধে করণীয়</td><td>' . $row['close_before_maturity'] . '</td></tr>
		<tr><td>সম্পর্কিত বিজ্ঞপ্তি</td><td><a  target="blank" href="https://www.jb.com.bd/Circular">' . trim($row['related_circular']) . '</a></td></tr>
            </table>';
                echo '</div>';
            } else {
                echo '<div class="tab-content" style="display: none;">';
                //echo '<h3 style="background: #0099cc;color: #fff;padding: 5px;">' . $row['product_scheme'] . '</h3>';		
                echo '<table class="table table-bordered table-striped table-responsive-sm">		
		<tr><td>হিসাবের মেয়াদকাল</td><td>' . $row['duration'] . '</td></tr>
		<tr><td>মাসিক কিস্তির পরিমাণ</td><td>' . $row['monthly_installment'] . '</td></tr>		
		<tr><td>সুদের হার</td><td>' . $row['interest_rate'] . '</td></tr>
		<tr><td>কিস্তি প্রদানের তারিখ</td><td>' . $row['installment_date'] . '</td></tr>
		<tr><td>হিসাব খোলার নিয়মাবলী</td><td>' . $row['opening_rule'] . '</td></tr>
		<tr><td>মেয়াদপূর্তির পূর্বে হিসাব বন্ধে করণীয়</td><td>' . $row['close_before_maturity'] . '</td></tr>
		<tr><td>সম্পর্কিত বিজ্ঞপ্তি</td><td><a  target="blank" href="https://www.jb.com.bd/Circular">' . trim($row['related_circular']) . '</a></td></tr>
		</table>';
                echo '</div>';
            }
        }
        echo '</div>'; // End v-nav
        ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom_js/scriptProduct.js"></script>
    </body>
</html>