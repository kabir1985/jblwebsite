<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login-page.css"> 
    </head>
    <body>
        <div class="well span3 center login-box"> 
            <img class="img-responsive" alt="Janata-Bank-Logo" 
                 src="<?php echo base_url(); ?>assets/images/logo-admin.jpg"/>
            <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/graphical_line.png">
            <div class="alert alert-info">
                <?php
                if ($this->session->flashdata('error')) {
                    echo $this->session->flashdata('error');
                } else {
					echo $this->session->flashdata('email_send');
                    //echo 'Enter Your OTP !';
                    //echo 'For OTP Plz Contact to MISD !';
                }
                ?>	
            </div>
            
            <?php
            $attributes = array('class' => 'form-horizontal');
            echo form_open('fgtPwd/otpVerification', $attributes);
            ?>
                <!--input class="input-large span10" name="id" id="id" type="hidden" value="<?php //echo $adminID;    ?>" /-->

            <!--div class="input-prepend" title="mail" data-rel="tooltip" style="margin-left: -23px;">
                <span class="add-on"><i class="icon-lock"></i></span>
                <input autofocus class="input-large span10" name="otp" placeholder="Enter your OTP" id="otp" type="text" required="" value="" />
            </div>
            <div class="clearfix"></div>

            <p class="center span5">
                <button type="submit" class="btn btn-primary">ENTER</button>
            </p-->
            <div class="wrap-input100">
                <input autofocus  class="input100" name="otp" id="otp" type="text" required="" value="">
                <span class="focus-input100" data-placeholder="Enter your OTP"></span>
            </div>
            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button type="submit" class="login100-form-btn">
                        SUBMIT
                    </button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/login.js"></script>   
    </body>
</html>
