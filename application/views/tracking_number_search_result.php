
    <div id="link">
    
    <?php
	// search form
	
	echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">'.form_error('mobile_number').'</div></p>';
	echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">'.form_error('nid').'</div></p>';
	
	$attributes = array('id' => 'Emp_form','class'=>'my_entry_form');
	echo form_open_multipart( base_url().'products/tracking_number_search',$attributes);
	
	echo "<p><label for='mobile_number' style='font-weight:bold;font-size:14px;'>Enter Your Mobile Number</label>"."</br>";
	$data = array(	'name'=>'mobile_number',
				'id'=>'mobile_number',				
				'value'=>(isset($_POST['mobile_number']) ? $_POST['mobile_number'] : '' ),
				'style'=>'width:250px',
				'size'=>100
				);
	echo form_input($data) ."</p>";


	echo "<p><label for='nid' style='font-weight:bold;font-size:14px;'>Enter Your NID Number</label>"."</br>";
	$data = array(	'name'=>'nid',
				'id'=>'nid',				
				'value'=>(isset($_POST['nid']) ? $_POST['nid'] : '' ),
				'style'=>'width:250px',
				'size'=>100
				);
	echo form_input($data) ."</p>";
	
	$attributes = array(
					'name'=>'submit',
					'type'=>'submit',
					'id' => 'emp_submit', 
					'value'=>'Search Tracking Number',
					'style'=>'background-color:#069;width:200px;font-size:14px;color:#FFF;font-weight:bold;radius:10px;',
					'class'=>'submit_button');
echo "<p class='clear'>".form_submit($attributes)."</p>";
echo form_close();
	
	
	
	// search result
	if(isset($search_result) && !empty($search_result))
	{
		
		//echo "<pre>";
		//print_r($search_result);
		//die();
		
	?>
    	    <!--search result information-->
                <table width="100%" border="1" cellpadding="5" cellspacing="5">
                <tr>
                <td height="40" colspan="2"> 
                </br>
                <div align="center" style="color:#606; padding-bottom:10px; font-size:16px; font-weight:bold;">
                Search Result Found For:    
				<?php if($search_result['gender']=='1') 
				{ 
					echo "Mr. ".$search_result['applicantName'];
				}
				else
				{ 
					echo "Ms. ".$search_result['applicantName'];
				}
				?>
                </div></td>
                </tr>
                <tr>
                <td colspan="2">
                
                <div align="justify" style="background:#FFF; font-size:22px; font-weight:normal; color:#000;">
                <strong>আপনার জন্য করনীয়ঃ</strong> 
				</br>
                </br>
               জনাব, <?php echo isset($search_result['loanTypeTextBang'])?$search_result['loanTypeTextBang']:'';?> এর জন্য আপনি জনতা ব্যাংক লিমিটেড এর <span style="font-size:16px; font-weight:bold; color:#3A52F3;"><?php echo isset($search_result['applied_branch'])?$search_result['applied_branch']:''; ?></span> শাখায় অনলাইনে ঋণ আবেদন করেছিলেন। উক্ত ঋণ আবেদন এর প্রেক্ষিতে আপনার ট্র্যাকিং নম্বর হলো <span style="font-size:16px; color:#F00; font-weight:bold;">Tracking Number: <?php echo isset($search_result['trackNumber'])?$search_result['trackNumber']:''; ?></span>
               
               </br>
               </br>
               পরবর্তী পদক্ষেপ সম্পন্নকরণের জন্য নিন্মে প্রদত্ত ট্র্যাকিং পেজ সহ আপনার জন্য নির্ধারিত নিন্মের ফর্মসমূহ ডাউনলোড করুন এবং যথাযথ ভাবে পূরণ করতঃ নির্দেশনা মোতাবেক প্রয়োজনীয় কাগজপত্রসহ উক্ত শাখায় জমা দিয়ে 
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
                <a href="<?php echo base_url();?>products/download_success_pdf?applicant_id=<?php echo $search_result['id']; ?>" style="font-size:16px; color:#C63;">ডাউনলোড/ প্রিন্ট ট্র্যাকিং পেজ</a>
                </div>
                </td>
                </tr>
                
                <!--specific forms display-->
                
                <?php
				
				//echo "<pre>";
				//print_r($specific_forms);
				//die(); 
	if(isset($search_result['related_docs']) && !empty($search_result['related_docs']))
	{
		foreach($search_result['related_docs'] as $row)
		{
	?>
                <tr>
                <td width="50"><div align="center" style="background:#FFF; font-size:20px; font-weight:bold; color:#F69;"><?php echo $row['title']; ?></div></td>
                <td width="50">
                <div align="center" style="background:#FFF;">
                <a target='_blank' href="<?php echo base_url();?>assets/file/documents/<?php echo $row['path']; ?>" style="font-size:16px; color:#C63;">ডাউনলোড</a>
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
	else
	{
		if(isset($search_result) && empty($search_result))
		{
	?>
            <table width="100%" border="0">
            <tr>
            <td><div align="center" style="font-size:16px; color:#F00; font-weight:bold;">No Result Found!</div></td>
            </tr>
            </table>
        <?php
        }
	}
	?>
	
    </div>


