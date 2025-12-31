<script type="text/javascript">
		$(document).ready(function() {
		  
		  $("#hide_show").addClass("plus");
		  $("#container_fl li:nth-child(n+3)").hide();//this code is equivalent to blocked below code
		  /*$("#container_fl .nav li:nth-child(1)",$(this)).show();
		  $("#container_fl .nav li:nth-child(2)",$(this)).show();
		  $("#container_fl .nav li:nth-child(3)",$(this)).hide();
		  $("#container_fl .nav li:nth-child(4)",$(this)).hide();
		  $("#container_fl .nav li:nth-child(5)",$(this)).hide();*/
		  
		  	
			
			$("#hide_show").click(function() {
			 if($(this).hasClass('plus')){
					 $("#hide_show").removeClass("plus");
					 $("#hide_show").addClass("minus");
					 $("#container_fl li:nth-child(n+1)").show();//this code is equivalent to blocked below code
					 /*$("#container_fl .nav li:nth-child(3)").show();
					 $("#container_fl .nav li:nth-child(4)").show();
					 $("#container_fl .nav li:nth-child(5)").show();*/
		  		
			 }
			  else{
					 $("#hide_show").removeClass("minus");
					 $("#hide_show").addClass("plus");
						
					$("#container_fl li:nth-child(n+3)").hide();//this code is equivalent to blocked below code
					/* $("#container_fl .nav li:nth-child(3)").hide();
					 $("#container_fl .nav li:nth-child(4)").hide();
					 $("#container_fl .nav li:nth-child(5)").hide();*/
		  		
			 }
			
			}); 		  
		    
});
</script>
<?php
//echo base_url(); 
foreach($page_details as $row)
{
?>
<div id="page_content">
<?php
if($row->title!="Online Branches" && $row->title!="Information required for Freedom Fighter" && $row->title!="Janata Bank List of Exchange Houses" && $row->title!="Janata Exchange Company" && $row->title!="Janata Bank List of Corresponded Banks" && $row->title!="Introduction" && $row->title!="Our Taka Remittance Arrangement" && $row->title!="Janata Exchange Company" && $row->title!="Janata Bank List of Corresponded Banks" && $row->title!="Notice On: Online Forex Trading" && $row->title!="Exchange Rate" && $row->title!="Export Performance" && $row->title!="Account Trade Arrangement" && $row->title!="Import Performance" && $row->title!="Merchant Bank A/C Opening" && $row->title!="Welcome to Right to Information Act" && $row->title!="Business Export Financing" && $row->title!="Schedule of Charges" && $row->title!="Correspondent Banks" && $row->title!="Right to Information Act" && $row->title!="Award and Recognition" && $row->title!="Performence Contract and Performance Indicator" && $row->title!="Study Materials for each JBL Employees" && $row->title!="Janata Exchange Inc. USA" && $row->title!="Contact Us")
{ 
	if(isset ($image_details )) 
	{   
		foreach($image_details as $image_info)
		{
			?>   
			<img class="image_wrapper" alt="<?php echo $row->title; ?>" src="<?php echo BASE_URL_GALLERY;?>includes/uploads/<?php echo $image_info->image_path; ?>"/>
			<?php
		}
	} 
}
?>
  <h2 style="text-align: center;"> 
		  <?php
          if($row->title!='Janata Bank Executive Comittee')
          {  
            //echo $row->title;
			echo "Innovation Plan of Janata Bank Limited";
          }
          else
          {
            echo "Janata Bank Executive Comittee";
          }
          ?>
          </h2>
          
		<?php 
        if(($row->title!="Janata Bank Executive Comittee" && $row->content) == '')
        {
			//echo'<h2 style="text-align: center;">Under Construction</h2>';
			//echo'Under Construction';
        }
        else
        {
        	echo    $row->content;
        }
        ?>
                
              <table width="200" border="0">
                  <tr>
                    <td colspan="4"><div align="center" style="font-size:16px;">ইনোভেশন সংক্রান্ত তথ্য</div></td>
                  </tr>
                  <tr>
                    <td><div align="center" style="font-size:14px;">ক্রম</div></td>
                    <td><div align="center" style="font-size:14px;">কর্ণার</div></td>
                    <td><div align="center" style="font-size:14px;">বিষয়/ক্যাটেগরি</div></td>
                    <td><div align="center" style="font-size:14px;">পূরনীয় কন্টেন্ট</div></td>
                  </tr>
                  <tr>
                    <td rowspan="5"><div align="center" style="font-size:14px; font-weight:normal;">১</div></td>
                    <td rowspan="5"><div align="center" style="font-size:14px; font-weight:normal;">ইনোভেশন কর্ণার</div></td>
                    <td><div style="font-size:14px; font-weight:normal;">ইনোভেশন টিম (ফোন নম্বর সহ)</div></td>
                    <td><a href="<?php echo base_url();?>About_us/innovation_team" style="font-size:14px; font-weight:normal; color:#390"><div align="left">ক্লিক করূন</div></a></td>
                  </tr>
				  <tr>
                    <td><div style="font-size:14px; font-weight:normal;">ইনোভেশন টিমের কর্ম পরিকল্পনা (২০২১-২০২২)</div></td>
                    
                    <?php
					if(is_array($action_plan) && count($action_plan)> 0)
					{ 
						foreach ($action_plan as $action_plan_row)
						{
						?>
							<td><a href="<?php echo base_url();?>assets/file/innovation/<?php echo $action_plan_row['pdf_link'];?>" style="font-size:14px; font-weight:normal; color:#390"><div align="left">ডাউনলোড করুন</div>
							</a></td>
						<?php
						}
					}
					else
					{
					?>
                    	<td><a href="#"><div align="left">প্রক্রিয়াধীন</div></a></td>
                    <?php 
					}
					?>
                  
                  </tr>
                  <tr>
                    <td><div style="font-size:14px; font-weight:normal;">ইনোভেশন টিমের উদ্ভাবনী উদ্যোগ(২০২১-২০২২)</div></td>
                    
                    <?php
					if(is_array($initiative) && count($initiative)> 0)
					{ 
						foreach ($initiative as $initiative_row)
						{
						?>
							<td><a href="<?php echo base_url();?>assets/file/innovation/<?php echo $initiative_row['pdf_link'];?>" style="font-size:14px; font-weight:normal; color:#390"><div align="left">ডাউনলোড করুন</div>
							</a></td>
						<?php
						}
					}
					else
					{
					?>
                    	<td><a href="#"><div align="left">প্রক্রিয়াধীন</div></a></td>
                    <?php 
					}
					?>
                    
                  </tr>
                  <tr>
                    <td><div style="font-size:14px; font-weight:normal;">ইনোভেশন পাইলটিং- এর তালিকা (গ্রহনের বছর ও দপ্তর ভিত্তিক)</div></td>
                    <?php
					if(is_array($piloting) && count($piloting)> 0)
					{ 
						foreach ($piloting as $piloting_row)
						{
						?>
								<td><a href="<?php echo base_url();?>includes/pdf/innovation/<?php echo $piloting_row['pdf_link'];?>" style="font-size:14px; font-weight:normal; color:#390"><div align="left">ডাউনলোড করুন</div>
								</a></td>
						<?php
						}
					}
					else
					{
					?>
                    	<td><a href="#"><div align="left">প্রক্রিয়াধীন</div></a></td>
                    <?php 
					}
					?>
                  </tr>
                  <tr>
                    <td><div style="font-size:14px; font-weight:normal;">ইনোভেশন রেপ্লিকেশন- এর তালিকা (গ্রহনের বছর ও দপ্তর ভিত্তিক)</div></td>
                    
                    
                    <?php
					if(is_array($replication) && count($replication)> 0)
					{ 
						foreach ($replication as $replication_row)
						{
						?>
								<td><a href="<?php echo base_url();?>includes/pdf/innovation/<?php echo $replication_row['pdf_link'];?>" style="font-size:14px; font-weight:normal; color:#390"><div align="left">ডাউনলোড করুন</div>
								</a></td>
						<?php
						}
					}
					else
					{
					?>
                    	<td><a href="#"><div align="left">প্রক্রিয়াধীন</div></a></td>
                    <?php 
					}
					?>
                  
                  
                  
                  </tr>
                  <tr>
                    <td><div style="font-size:14px; font-weight:normal;">ইনোভেশন শোকেসিং/মেলা</div></td>
                    <td><a href="#"><div align="left">প্রক্রিয়াধীন</div></a></td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="center" style="font-size:14px; font-weight:normal;">২</div></td>
                    <td valign="top"><div align="center" style="font-size:14px; font-weight:normal;">এসপিএস কর্নার</div></td>
                    <td valign="top"><div style="font-size:14px; font-weight:normal;">সেবা পদ্ধতি সহজিকরণ</div></td>
                    <td valign="top"><div align="left">১. কুইক রেমিটেন্স </br>
														 ২. জেবি এসএমএস সেন্টার </br>
                                                         ৩. জনতা ব্যাংক অ্যাপস্
                                                         </div></td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="center" style="font-size:14px; font-weight:normal;">৩</div></td>
                    <td valign="top"><div align="center" style="font-size:14px; font-weight:normal;">এসআইপি কর্ণার</div></td>
                    <td valign="top">Small Improvement Project</td>
                    <td valign="top"><div align="left">১. অনলাইন ক্রেডিট এমআইএস </br>
									২. জেবি ফোন </br>
									৩. সিবিএস ট্রানজেকশন মেসেজ।</div></td>
                  </tr>
				</table>
                <?php 
}
				?>
  
<!-- end of main column -->
</div>	

