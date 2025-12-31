<style>
#box-service {
  background: linear-gradient(135deg, #ffffff, #e6f5ff);
  border: none;
  border-radius: 10px;
  padding: 10px 10px 10px 10px;
  box-shadow: 0 3px 10px rgba(0, 153, 204, 0.25);
  height: 180px;
   /* margin-right: .5rem;  */
  margin-bottom: .5rem;
   /* margin-left: .8rem;  */
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

/* Decorative gradient bar */
#box-service::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 5px;
  height: 100%;
  background: linear-gradient(180deg, #0099cc, #22c55e);
  border-radius: 10px 0 0 10px;
}

/* Hover Effect */
#box-service:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0, 153, 204, 0.4);
  background: linear-gradient(135deg, #e0f7ff, #ffffff);
}

/* Title */
#box-service span {
  display: block;
  font-family: "kalpurush", sans-serif !important;
  font-size: 15px;
  font-weight: 600;
  color: #006699;
  margin-bottom: 8px;
}

/* Media area */
.media {
  display: flex;
  align-items: center;
  gap: 10px;
}

.media img {
  height: 70px;
  width: 70px;
  border-radius: 50%;
  background: linear-gradient(135deg, #c2f0ff, #ffffff);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease;
}

#box-service:hover .media img {
  transform: scale(1.05);
}

/* List style */
.media-body ul {
  padding: 0;
  margin: 0;
  list-style: none;
}

.media-body li {
  font-family: "kalpurush", sans-serif !important;
  font-size: 13px;
  font-weight: normal;
  color: #000;
  margin: 2px 0;
  position: relative;
  padding-left: 15px;
}

.media-body li::before {
  content: "›";
  color: #0099cc;
  font-weight: bold;
  position: absolute;
  left: 0;
}

.media-body li a {
  color: #000;
  text-decoration: none;
  transition: color 0.3s;
}

.media-body li a:hover {
  color: #0099cc;
}

/* Responsive fix */
@media (max-width: 768px) {
  #box-service {
    height: auto;
    width: 100%;
  }
}
</style>


<div class="row container-fluid">

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span  class="mt-3 ml-2">স্মার্ট বাংলাদেশ দিবস ২০২৩ - ডিজিটাল সেবাসমূহ</span>
            <div  class="media">
                <img width="70" height="70" src="<?php echo base_url(); ?>assets/images/others/smartbd.png" alt="nis">
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>assets/file/smartBD/serviceBox_eJanata.pdf"> eJanata</a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>assets/file/smartBD/serviceBox_qrPayment.pdf"> QR Payment</a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>assets/file/smartBD/serviceBox_FR.pdf"> Foreign Remittance</a></li>  
                        <li><a target="_blank" href="<?php echo base_url(); ?>assets/file/smartBD/serviceBox_pinCash.pdf"> PIN Cash</a></li> 
                        <li><a target="_blank" href="<?php echo base_url(); ?>assets/file/smartBD/SmardBD_DigiService_PMIS.pdf"> Others</a></li> 							
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span  class="mt-3 ml-2">জাতীয় শুদ্ধাচার কৌশল</span>
            <div  class="media">
                <img width="70" height="70" src="<?php echo base_url(); ?>assets/images/others/nis.png" alt="nis">
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/nis"> জাতীয় শুদ্ধাচার কৌশল</a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/nis"> ফোকাল কর্মকর্তা</a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/nis">  কর্ম-পরিকল্পনা</a></li>                
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">বার্ষিক কর্মসম্পাদন চুক্তি</span>
            <div class="media">
                <img src="<?php echo base_url(); ?>assets/images/others/apa.png" alt="nis">
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>financial_reports/apa"> বার্ষিক মূল্যায়ন </a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>financial_reports/apa"> ত্রৈমাসিক অর্জন </a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>financial_reports/apa_focalPoint"> ফোকাল পয়েন্ট কর্মকর্তা </a></li> 
						<li><a target="_blank" href="<?php echo base_url(); ?>financial_reports/division_agreement"> চুক্তিসমূহ-বিভাগীয় কার্যালয় </a></li>
						<li><a target="_blank" href="<?php echo base_url(); ?>financial_reports/area_agreement"> চুক্তিসমূহ-আঞ্চলিক কার্যালয় </a></li>
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">উদ্ভাবনী কার্যক্রম</span>
            <div class="media">
                <img width="70" height="70" src="<?php echo base_url(); ?>assets/images/others/innovation.png" alt="nis">
                <div class="media-body">
                    <ul>
					    <li><a target="_blank" href="<?php echo base_url(); ?>home/innovative_idea"> উদ্ভাবনী ধারণা প্রেরণ </a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/innovTeam"> ইনোভেশন টিম </a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/innovation"> বার্ষিক উদ্ভাবন কর্মপরিকল্পনা </a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/innovation"> উদ্ভাবনী প্রকল্পসমূহ </a></li>
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">তথ্য অধিকার </span>
            <div class="media">
                <img width="70" height="70" src="<?php echo base_url(); ?>assets/images/others/infocom.png" alt="nis">
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/rightToInfoAct"> তথ্য প্রদান ইউনিট </a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/rti-focal-point"> দায়িত্বপ্রাপ্ত কর্মকর্তা </a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/rti-appeal-form"> আবেদন ও আপিল ফরম </a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/rti-action-plan"> বার্ষিক কর্মপরিকল্পনা </a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/rti_law"> আইন/বিধিমালা/নির্দেশিকা   </a></li>
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">সেবা প্রদান প্রতিশ্রুতি (সিটিজেন্‌স চার্টার) </span>
            <div class="media">
                <img width="70" height="70" src="<?php echo base_url(); ?>assets/images/others/service.png" alt="nis">
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>about_us/citizen-charter"> সেবা প্রদান প্রতিশ্রুতি </a></li>
						<!--<li><a href="<?php //echo base_url(); ?>home/citizen_charter_branches">Citizen's Charter Branch Wise</a></li>-->
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/citizen-charter-notice"> নীতিমালা/নির্দেশিকা/সভার সিদ্ধান্ত/কার্যবিবরণী/প্রশিক্ষণ </a></li>	
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/citizen-charter-focalPoint"> ফোকাল পয়েন্ট কর্মকর্তা পরিবীক্ষণ কমিটি</a></li>	
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">গ্রাহক সেবা ও অভিযোগ ব্যবস্থাপনা সেল</span>
            <div class="media">
                <img width="70" height="70" src="<?php echo base_url(); ?>assets/images/others/complain.png" alt="nis">
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/grs_actionplan"> বার্ষিক কর্মপরিকল্পনা(অভিযোগ প্রতিকার ব্যবস্থাপনা)  </a></li>
                        <li></i><a target="_blank" href="<?php echo base_url(); ?>contact_us/complaint_cell"> কমিটি </a></li>
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">ফরম</span>
            <div class="media">
                <img width="70" height="70" src="<?php echo base_url(); ?>assets/images/others/form.png" alt="nis">
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/forms"> ফরম </a></li>	
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/forms"> ফাইল</a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/forms"> আবেদন </a></li>							 
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">NOC</span>
            <div class="media">
                <img width="70" height="70" src="<?php echo base_url(); ?>assets/images/others/noc.png" alt="nis">
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/noc"> Passport NOC</a></li>	
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/noc_immigration"> NOC for Foreign Leave</a></li>						
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">একচেঞ্জ রেট</span>
            <div class="media">                
                <i class="fa fa-exchange" style="font-size: 70px;color: #0099cc;"></i>
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>international_trade/exchange_rate"> একচেঞ্জ রেট</a></li>				
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">মুনাফা/সুদের হার </span>
            <div class="media">                
                <img width="70" height="70" src="<?php echo base_url(); ?>assets/images/others/exchnagerate.png" alt="nis">
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/rate"> মুনাফা / সুদের হার</a></li>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/declared_rate">  ঋণ/বিনিয়োগের ঘোষিত সুদ হার</a></li>						
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <!--div  class="col-lg-4 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-5 ml-2">ডিসক্লজার</span>
            <div class="media">                
                <i class="fa fa-line-chart" style="font-size: 70px;color: #0099cc;"></i>
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>about_us/risk_based_capital"> ডিসক্লজারস</a></li>				
                    </ul>
                </div>
            </div> 
        </div>
    </div--->

    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">শিডিউল অব চার্জেস </span>
            <div class="media">                
                <img width="70" height="70" src="<?php echo base_url(); ?>assets/images/others/charge.png" alt="nis">
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>services/scheduleOfCharges"> শিডিউল অব চার্জেস</a></li>				
                    </ul>
                </div>
            </div> 
        </div>
    </div>
	


   <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">Financial Literacy</span>
            <div class="media">                
                <i class="fa fa-university" style="font-size: 70px;color: #0099cc;"></i>
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/financial_literacy"> Financial Literacy</a></li>				
                    </ul>
                </div>
            </div> 
        </div>
    </div>
    
    
    <!--new bond related forms updated on 09.07.2025-->
    
    <div  class="col-lg-3 col-md-6 col-sm-12">
        <div id="box-service">
            <span class="mt-3 ml-2">BOND RELATED FORMS</span>
            <div class="media">
                <img width="70" height="70" src="<?php echo base_url(); ?>assets/images/others/form.png" alt="nis">
                <div class="media-body">
                    <ul>
                        <li><a target="_blank" href="<?php echo base_url(); ?>home/bond_forms">View Forms</a></li>					 
                    </ul>
                </div>
            </div> 
        </div>
    </div>
    <!--ends-->


</div>


