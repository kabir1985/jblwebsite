<style>
.social_square_icons {
  text-align: center;
  /* padding: 20px 10px; */
}

.social_square_icons ul {
  list-style: none;
  padding: 0;
  margin: 15px 0;
  display: flex;
  /* flex-wrap: wrap; */
  justify-content: center;
  gap: 4px;
}

.social_square_icons ul li {
  display: inline-block;
}

.social_square_icons ul li a {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 45px;
  height: 45px;
  border-radius: 50%;
  color: #fff;
  font-size: 22px;
  transition: all 0.35s ease;
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

/* Brand Colors */
.f_facebook { background: linear-gradient(135deg, #1877f2, #3b5998); }
.t_twitter { background: linear-gradient(135deg, #1da1f2, #0d8af0); }
.linkedin { background: linear-gradient(135deg, #0077b5, #005f91); }
.g_google { background: linear-gradient(135deg, #dd4b39, #c23321); }
.youtube { background: linear-gradient(135deg, #ff0000, #bb0000); }

.social_square_icons ul li a:hover {
  transform: translateY(-6px) scale(1.05);
  box-shadow: 0 8px 18px rgba(0, 0, 0, 0.25);
  filter: brightness(1.1);
}

/* Icon and section layout */
.social_square_icons img {
  display: block;
  margin: 25px auto 0 auto;
  width: 110px;
  height: auto;
  transition: transform 0.3s ease;
}
.social_square_icons img:hover {
  transform: scale(1.08);
}

hr {
  background-color: #fff;
  height: 2px;
  opacity: 0.5;
  border: none;
  width: 80px;
  margin-left: 0;
}

h2.text-left {
  font-size: 22px;
  font-weight: 600;
  color: #ffffff;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

p {
  color: #e4e4e4;
  font-size: 15px;
  line-height: 1.6;
}

p a {
  color: #ffffff;
  text-decoration: none;
  transition: color 0.3s ease;
}

p a:hover {
  color: #ffd700;
}

/* Make icons & text pop on darker bg */
.col-lg-3 {
  color: #fff;
}

</style>


<div class="col-lg-3 col-md-6 col-sm-12" >
    <h2 class="text-left">Head Office</h2>
    <hr>
    <p>
      
        110, Motijheel Commercial Area
        <br>
        Dhaka-1000, Bangladesh
        <br>
        <i class="fa fa-phone-square" aria-hidden="true"></i>
        Phone<br>
        +88 02-223380029<br>
        +88 02-223380042<br>
        +88 02-223385042<br>
        +88 02-223386142<br>
        +88 02-223350193<br>
        Fax: 02 223384644
    </p>
</div>
<div class="col-lg-3 col-md-6 col-sm-12">
    <h2 class="text-left">Important Links</h2>
    <hr>
    <p>
        <i class="fa fa-angle-right"></i><a target="_blank" href="https://www.bb.org.bd/en/index.php"> Bangladesh Bank</a><br>
        <i class="fa fa-angle-right"></i><a target="_blank" href="https://mof.gov.bd/"> Ministry Of Finance</a><br>
        <i class="fa fa-angle-right"></i><a target="_blank" href="https://www.cse.com.bd/"> CSE</a><br>
        <i class="fa fa-angle-right"></i><a target="_blank" href="https://www.dsebd.org/"> DSE</a><br>
        <i class="fa fa-angle-right"></i><a target="_blank" href="https://www.bibm.org.bd/"> BIBM</a><br>
        <i class="fa fa-angle-right"></i><a target="_blank" href="<?php echo base_url(); ?>home/important_links"> MORE LINKS...</a>
    </p>

</div>

<div class="col-lg-3 col-md-6 col-sm-12">
    <h2 class="text-left">Janata Links</h2>
    <hr>
    <p>
        <i class="fa fa-angle-right"></i><a target="_blank" href="<?php echo base_url(); ?>financial_reports/apa"> Annual Performance Agreement(APA)</a><br>
        <i class="fa fa-angle-right"></i><a target="_blank" href="<?php echo base_url(); ?>about_us/citizen_charter"> Citizen's Charter</a><br>
        <i class="fa fa-angle-right"></i><a target="_blank" href="<?php echo base_url(); ?>about_us/risk_based_capital"> Disclosures (Basel-III)</a><br>
        <i class="fa fa-angle-right"></i><a target="_blank" href="<?php echo base_url(); ?>home/nis"> National Integrity Strategy-NIS</a><br>
        <i class="fa fa-angle-right"></i><a target="_blank" href="<?php echo base_url(); ?>international_trade/forex_trading"> Online Forex Trading</a><br>      
        <i class="fa fa-angle-right"></i><a target="_blank" href="<?php echo base_url(); ?>home/rate"> Rate of Interest</a><br>
        <i class="fa fa-angle-right"></i><a target="_blank" href="<?php echo base_url(); ?>home/rightToInfoAct"> Right to Information Act</a><br>
        <i class="fa fa-angle-right"></i><a target="_blank" href="<?php echo base_url(); ?>services/scheduleOfCharges"> Schedule of Charges</a>

    </p>
</div>



<div class="col-lg-3 col-md-6 col-sm-12 social_square_icons">
  <h2 class="text-left">Social Network</h2>
  <hr>
  <ul>
    <li><a target="_blank" href="https://www.facebook.com/JanataBankPLCBangladesh/" class="f_facebook"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#" class="t_twitter"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
    <li><a href="#" class="g_google"><i class="fa fa-google-plus"></i></a></li>
    <li><a target="_blank" href="https://www.youtube.com/c/JanataBankLimitedOfficial" class="youtube"><i class="fa fa-youtube"></i></a></li>
  </ul>
  <img src="<?php echo base_url(); ?>assets/images/others/pci-dss-logo.png" alt="PCI DSS Logo">
</div>