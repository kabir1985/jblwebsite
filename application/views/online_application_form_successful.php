
  <div id="link">
<!--     <div align="center" style="color:#606; padding-bottom:10px; font-size:16px; font-weight:bold;">
                    <a href="<?php echo base_url('products/edit_application'); ?>">Edit Application</a> 
                </div>-->
    <?php 
	if(isset($applicant_details_info) && !empty($applicant_details_info))
	{
	?>
    	    <!--applicant details information-->
                <table width="100%" border="1" cellpadding="5" cellspacing="5">
                <tr>
                <td height="40" colspan="2"><div align="center" style="font-size:18px; font-weight:bold; color:#090; padding-top:15px;">Application Submitted Successfully</div> 
                
                </br>
                <div align="center" style="color:#606; padding-bottom:10px; font-size:16px; font-weight:bold;">
                Welcome 
				<?php if($applicant_details_info['gender']=='1') 
				{ 
					echo "Mr. ".$applicant_details_info['applicantName'];
				}
				else
				{ 
					echo "Ms. ".$applicant_details_info['applicantName'];
				}
				?>
                </div></td>
                </tr>
                <tr>
                <td colspan="2">
                
                <div align="justify" style="background:#FFF; font-size:22px; font-weight:normal; color:#000;">                   
                    <strong>পরবর্তী করনীয়ঃ</strong> 			
                </br>
				
				জনাব, <?php echo isset($applicant_details_info['loanTypeTextBang'])?$applicant_details_info['loanTypeTextBang']:'';?> এর জন্য আপনার ঋণ আবেদন (<span style="font-size:16px; color:#F00; font-weight:bold;">Tracking Number: <?php echo isset($applicant_details_info['trackNumber'])?$applicant_details_info['trackNumber']:''; ?></span>) <span style="font-size:16px; font-weight:bold; color:#3A52F3;"><?php echo isset($applicant_details_info['applied_branch'])?$applicant_details_info['applied_branch']:''; ?></span> শাখা কর্তৃক প্রাথমিক ভাবে গৃহীত হয়েছে। পরবর্তী পদক্ষেপ সম্পন্নকরণের জন্য প্রদত্ত ট্র্যাকিং পেজ সহ আপনার জন্য নির্ধারিত নিন্মের ফর্মসমূহ ডাউনলোড করুন এবং যথাযথ ভাবে পূরণ করতঃ নির্দেশনা মোতাবেক প্রয়োজনীয় কাগজপত্রসহ উক্ত শাখায় জমা দিয়ে 
                আপনার ঋণ আবেদন সম্পন্ন করুন।
                </br>
                </br>
                </div>
                
                </td>
                </tr>
                <tr>
         
         
         <td width="40" colspan="2"><div align="center" style="font-size:20px; font-weight:bold; color:#FF6317; padding-top:10px; padding-bottom:10px;">আপনার নির্ধারিত ফর্মসমূহ</div>
         </td>
                </tr>
                
                <tr>
                <td width="50"><div align="center" style="background:#FFF; font-size:20px; font-weight:bold; color:#F69;">ট্র্যাকিং পেজ</div></td>
                <td width="50">
                <div align="center" style="background:#FFF;">
                <a href="<?php echo base_url();?>products/download_success_pdf?applicant_id=<?php echo $applicant_details_info['id']; ?>" style="font-size:16px; color:#C63;">ডাউনলোড/ প্রিন্ট ট্র্যাকিং পেজ</a>
                </div>
                </td>
                </tr>
                
                <!--specific forms display-->
                
                <?php
				
				//echo "<pre>";
				//print_r($specific_forms);
				//die(); 
	if(isset($specific_forms) && !empty($specific_forms))
	{
		foreach($specific_forms as $sfrow)
		{
	?>
                <tr>
                <td width="50"><div align="center" style="background:#FFF; font-size:20px; font-weight:bold; color:#F69;"><?php echo $sfrow['title']; ?></div></td>
                <td width="50">
                <div align="center" style="background:#FFF;">
                    <a target="_blank" href="<?php echo base_url();?>assets/file/documents/<?php echo $sfrow['path']; ?>" style="font-size:16px; color:#C63;">ডাউনলোড</a>
                </div>
                </td>
                </tr>
    <?php
		}
	}
	?>
                <!--specific forms display -->
                </table>
        	<!--applicant details information ends-->
    <?php 
	}
	?>
	
    </div>
<?php      
