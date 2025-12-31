<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login-page-iconic-font.min.css">
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
                    // echo 'Please login with your Username and Password.';
                    echo $this->session->flashdata('message');
                }
                ?>	
            </div>
            <?php
            $attributes = array('class' => 'form-horizontal');
            echo form_open('welcome/index', $attributes);
            ?>
            <div class="wrap-input100">
                <input class="input100" name="username" id="username" type="text" required="" value="">
                <span class="focus-input100" data-placeholder="Username"></span>
            </div>

            <div class="wrap-input100">
                <span class="btn-show-pass">
                    <i class="fa fa-eye zmdi-eye"></i>
                </span>
                <input class="input100" name="password" id="password" type="password" required="" value="" >
                <span class="focus-input100" data-placeholder="Password"></span>
            </div>
            <a href="<?php echo base_url(); ?>index.php/fgtPwd">Forgot your password?</a>
            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/login.js"></script>       
    </body>
</html>