<link rel="stylesheet" href="<?php echo base_url(); ?>includes/css/font-awesome.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>includes/js/bootstrap-show-password.min.js"></script>

<style>
    /* The message box is shown when the user clicks on the password field */
    #message {
        /*display: none;*/
        background: #f1f1f1;
        color: #0099cc;
        position: relative;
        /*padding: 20px;*/
        margin-top: 5px;
        column-count: 2;
    }

    #message li {
        /*padding: 5px 30px; */
        font-size: 12px;
        /*list-style: none;*/
        margin: 0 0 0 36px;
    }

    .clearAlert {
        display: none;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        /*color: rgba(40,42,53,.3);*/
        color: #5fc46b;
        list-style: none;
    }

    .valid:before {
        font-family: FontAwesome;
        position: relative;
        left: -5px;
        /* color: rgba(40,42,53,.3); */

        list-style-type: none;
        /*content: url("data:image/svg+xml,");*/
        /*content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='100' cy='50' r='40' stroke='black' stroke-width='2' fill='red'/%3E%3Cpolyline points='20,20 40,25 60,40 80,120 120,140 200,180' style='fill:none;stroke:black;stroke-width:3'/%3E%3C/svg%3E ");*/
        /*content: url('data:image/svg+xml;utf8,<svg height="100px" width="500px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="red" /></svg>'); */
        content: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1024 1024" width="1em" height="1em" fill="green" aria-hidden="false" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <path d="M869.696 229.824a37.12 37.12 0 0 1 55.018667 49.706667l-2.410667 2.645333-464.213333 466.432a101.12 101.12 0 0 1-139.349334 3.818667l-3.989333-3.797334L101.696 534.613333a37.12 37.12 0 0 1 49.962667-54.805333l2.645333 2.410667 213.056 214.016c9.898667 9.856 25.386667 10.496 35.925333 1.962666l2.176-1.962666 464.213334-466.410667z"></path></svg>');
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
        /* color: red;  */
        color: #282a35;
    }

    .invalid:before {
        font-family: FontAwesome;
        position: relative;
        left: -5px;
        /*content: "✖"; */
        font-weight: 200;
        color: #04AA6D;
    }
</style>

<div class="well span5 center login-box">
    <div class="alert alert-info">
        <?php
        echo 'Your Password Changing Time is Expired ! / Forgot Your Password !</br>Please Reset Your Password !';
        //echo $resetMsg;
        //echo $this->session->flashdata('message');
        ?>
    </div>

    <!--form class="form-horizontal" action="" method="post"> conversion ok  -->
    <?php
    $attributes = array('class' => 'form-horizontal', 'name' => 'myform', 'onsubmit' => 'return validateform()');
    echo form_open('welcome/passwordReset', $attributes);
    ?>
    <fieldset>

        <input class="input-large span10" name="id" id="password" type="hidden" value="<?php echo $adminID; ?>" />

        <input class="input-large span10" name="oldPwd" id="oldPwd" type="hidden" placeholder="Old Password" required="" value="<?php echo $adminPwd; ?>" />

        <div class="input-prepend" title="newPwd" data-rel="tooltip" style="padding-bottom: 25px;">
            <span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="newPwd" id="newPwd" type="password" placeholder="New Password" data-toggle="password"  required="" value="" />
        </div>
        <div class="matchingAlert" id="OldPasswordMatch"></div>
        <div class="clearfix"></div>


        <div class="input-prepend" title="confirmPwd" data-rel="tooltip">
            <span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="confirmPwd" id="confirmPwd" type="password" placeholder="Confirm Password" data-toggle="password"  required="" value="" />
        </div>
        <div class="matchingAlert" id="CheckPasswordMatch"></div>
        <div class="clearfix"></div>

        <div class="input-prepend">
            <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
        </div><br>

        <div class="clearfix"></div>
        <!--a href="https://www.jb.com.bd/admnpnl/index.php/admin/forgotpassword">Forgot your password?</a--->
        <p class="center span5">
            <button type="submit" id="submitBtn" class="btn btn-primary">LOGIN</button>
        </p>

        <ul id="message">
            <li id="letter" class="invalid">A lowercase character</li>
            <li id="capital" class="invalid">A capital letter</li>
            <li id="number" class="invalid">A number</li>
            <li id="length" class="invalid">Minimum 8 characters</li>
            <li id="special" class="invalid">A special characters(avoid-%,&)</li>
        </ul>


        <script>
            var myInput = document.getElementById("newPwd");
            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");
            var special = document.getElementById("special");

            // When the user clicks on the password field, show the message box
            myInput.onfocus = function () {
                document.getElementById("message").style.display = "block";
            }

            // When the user clicks outside of the password field, hide the message box
            myInput.onblur = function () {
                document.getElementById("message").style.display = "none";
            }

            // When the user starts to type something inside the password field
            myInput.onkeyup = function () {
                // Validate lowercase letters
                var lowerCaseLetters = /[a-z]/g;
                if (myInput.value.match(lowerCaseLetters)) {
                    letter.classList.remove("invalid");
                    letter.classList.add("valid");
                } else {
                    letter.classList.remove("valid");
                    letter.classList.add("invalid");
                }

                // Validate capital letters
                var upperCaseLetters = /[A-Z]/g;
                if (myInput.value.match(upperCaseLetters)) {
                    capital.classList.remove("invalid");
                    capital.classList.add("valid");
                } else {
                    capital.classList.remove("valid");
                    capital.classList.add("invalid");
                }

                // Validate numbers
                var numbers = /[0-9]/g;
                if (myInput.value.match(numbers)) {
                    number.classList.remove("invalid");
                    number.classList.add("valid");
                } else {
                    number.classList.remove("valid");
                    number.classList.add("invalid");
                }

                // Validate length
                if (myInput.value.length >= 8) {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                } else {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                }

                // Validate special char
                var specialchar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g;
                if (myInput.value.match(specialchar)) {
                    special.classList.remove("invalid");
                    special.classList.add("valid");
                } else {
                    special.classList.remove("valid");
                    special.classList.add("invalid");
                }
            }
        </script>


        <script>
            function checkPasswordMatch() {
                //var currentPwd = $("#oldPwd").val();
                var newPassword = $("#newPwd").val();
                if (newPassword === '')
                    $("#CheckPasswordMatch").html("");

                //var confirmPassword = $("#confirmPwd").val();
                /*if (newPassword === currentPwd) {
                 $("#OldPasswordMatch").html("Given Password and Old Password can't be same!").css("color", "red");
                 } else {
                 $("#OldPasswordMatch").html("");
                 }*/
            }

            $(document).ready(function () {
                $("#newPwd").keyup(checkPasswordMatch);
            });
        </script>

        <script>
            function checkPassword() {
                var newPassword = $("#newPwd").val();
                var confirmPassword = $("#confirmPwd").val();
                if (newPassword !== confirmPassword) {
                    $("#CheckPasswordMatch").html("Password does not match!").css("color", "red");
                }
                if (confirmPassword === '') {
                    $("#CheckPasswordMatch").html("");
                }
                if (newPassword === confirmPassword && newPassword !== '') {
                    $("#CheckPasswordMatch").html("Password match.").css("color", "green");
                }
            }

            $(document).ready(function () {
                $("#confirmPwd").keyup(checkPassword);
            });
        </script>


        <script>
            function validateform() {
                var newPassword = document.myform.newPwd.value;
                var oldPassword = document.myform.oldPwd.value;

                if (newPassword === oldPassword) {
                    $("#OldPasswordMatch").html("New password and Old password can't be same!").css("color", "red");
                    //newPassword.focus();
                    return false;
                }


                if (newPassword.length < 8) {
                    //alert("Password must be at least 8 characters long.");
                    $("#CheckPasswordMatch").html("Password must be at least 8 characters long!").css("color", "red");
                    //newPassword.focus();
                    return false;
                }

                if (newPassword.length >= 16) {
                    //alert("Password must be at least 8 characters long.");
                    $("#CheckPasswordMatch").html("Password length should be max'm 15 characters!").css("color", "red");
                    //newPassword.focus();
                    return false;
                }

                var lowerCaseLetters = /[a-z]/g;
                if (!newPassword.match(lowerCaseLetters)) {
                    $("#CheckPasswordMatch").html("Password must be a lowercase letter!").css("color", "red");
                    //newPassword.focus();
                    return false;
                }

                var upperCaseLetters = /[A-Z]/g;
                if (!newPassword.match(upperCaseLetters)) {
                    $("#CheckPasswordMatch").html("Password must be a uppercase letter!").css("color", "red");
                    //newPassword.focus();
                    return false;
                }

                var numbers = /[0-9]/g;
                if (!newPassword.match(numbers)) {
                    $("#CheckPasswordMatch").html("Password must be a number!").css("color", "red");
                    //newPassword.focus();
                    return false;
                }

                var specialchar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g;
                if (!newPassword.match(specialchar)) {
                    $("#CheckPasswordMatch").html("Password must be a special character!").css("color", "red");
                    //newPassword.focus();
                    return false;
                }

                return true;
            }
        </script>

        <script>
            $("#password").password('toggle');
        </script>

    </fieldset>
    <?php echo form_close(); ?>
</div>