<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Green PIN Service</title>
<!--css for ul li listing design-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!--end-->
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  .container {
    max-width: 1150px;
    margin: 0 auto;
    border-radius: 8px;
  }
  h1 {
    text-align: center;
    color: #3a763a;
    margin-bottom: 1rem;
    font-weight: 700;
  }
  h2 {
    color: #0099cc;
    margin-top: 1.8rem;
    margin-bottom: 0.6rem;
    font-weight: 600;
    padding-bottom: 4px;
  }
  p {
    line-height: 1.6;
    margin-bottom: 1rem;
	color:#676767;
  }
  /*iactive previous ul and li listing bullet points*/
  /*ul {
    margin-left: 1.2rem;
    margin-bottom: 1.5rem;
  }
  ul li {
    margin-bottom: 0.6rem;
	color:#676767;
  }*/
  /*end*/
  
  
  /*new icon listing*/
  ul.icon-list {
      list-style: none;       /* Remove bullets */
      padding: 0;
      margin: 0;
    }

    ul.icon-list li {
      display: flex;          /* Flexbox to align icon and text */
      align-items: center;    /* Vertically center */
      margin: 10px 0;
      font-family: Arial, sans-serif;
      font-size: 16px;
      color: #676767;
    }

    ul.icon-list li i {
      color: green;
      margin-right: 10px;     /* Space between icon and text */
      font-size: 18px;
    }
  /*previous button css*/
  
  /*.button-link {
    display: inline-block;
    background-color: #4caf50;
    color: white;
    padding: 12px 24px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 25px;
    text-decoration: none;
    margin: 15px 0;
    transition: background-color 0.3s ease;
  }
  .button-link:hover {
    background-color: #3b8e3b;
  }*/
  
  /*end*/
  
  
  /*new button css*/
  .button {
  background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  border-radius: 15px;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #04AA6D;
}

.button1:hover {
  background-color: #04AA6D;
  color: white;
}
/*end*/

  .note {
    background-color: #dff0d8;
    border-left: 5px solid #4caf50;
    padding: 12px 20px;
    font-style: italic;
    color: #356635;
    max-width: 700px;
    margin-top: 1.5rem;
    border-radius: 4px;
  }
</style>
</head>
<body>
  <div class="container">
    <div style="border: 1px solid #4caf50; border-radius:1px;"><img class="img-fluid" id="banner" src="<?php echo base_url(); ?>assets/images/banner/green_pin_banner.png"></div>

    <h2 style="border-bottom: 2px solid #4caf50;">CARD ACTIVATION / PIN GENERATION</h2>
    <p>Please, go to the following link for Card Activation / PIN generation.</p>
    <form action="<?php echo base_url('Services/greenPin_execute'); ?>" method="post"><button class="button button1">..:: Click Here For Card Activation / PIN Generation ::..</button></form>

    <h2 style="border-bottom: 2px solid #4caf50;">Steps to Follow</h2>
    <ul class="icon-list">
      <li><i class="fas fa-leaf"></i>Click on the above button Card Activation / PIN Generation.</li>
      <li><i class="fas fa-leaf"></i>Fill the required information accurately. Please ensure that the mobile number you are providing here is registered with your Janata Bank PLC. Card/Account.</li>
      <li><i class="fas fa-leaf"></i>Once your card is activated successfully, you will receive a confirmation SMS/Mail.</li>
      <li><i class="fas fa-leaf"></i>Click on the Generate PIN option to generate your PIN.</li>
      <li><i class="fas fa-leaf"></i>Read the instructions carefully and enter your desired 4-digit PIN. Do not use the initial digit "0 (Zero)”.</li>
      <li><i class="fas fa-leaf"></i>Confirm the PIN again.</li>
      <li><i class="fas fa-leaf"></i>Your PIN will be generated successfully and you will get another confirmation SMS/Mail.</li>
      <!--<li><i class="fas fa-headset"></i>for test</li>-->
    </ul>

    <h2 style="border-bottom: 2px solid #4caf50;">Benefits</h2>
    <ul class="icon-list">
      <li><i class="fas fa-check-circle"></i>Instant Card Activation.</li>
      <li><i class="fas fa-check-circle"></i>PIN generation facility for any newly issued card.</li>
      <li><i class="fas fa-check-circle"></i>Service charge is free for the first time and for re-issue charge is applied.</li>
    </ul>

    <div class="note">
      <strong>Note:</strong> Never share your OTP and PIN/Password with anyone.
    </div>
  </div>
</body>
</html>