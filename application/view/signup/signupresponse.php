<div class="container signup-controller">

<form action="<?php echo URL; ?>signup/signupresponse" method="POST">
    <div class="signup-response">
        <?php

                $username;$email;$password;$passwordcheck;$captcha;
                if(isset($_POST['username'])) {
                  $username = $_POST['username'];
                } if(isset($_POST['email'])) {
                  $email = $_POST['email'];
                } if(isset($_POST['password'])) {
                  $password = $_POST['password'];
                } if(isset($_POST['passwordcheck'])) {
                  $passwordcheck = $_POST['passwordcheck'];
                } if(isset($_POST['g-recaptcha-response'])) {
                  $captcha = $_POST['g-recaptcha-response'];
                }

                if(!$captcha) {
                  echo '<h2>Please check the the captcha form.</h2>';
                  exit;
                }

                $secretKey = "6LcZoVAUAAAAAHZTu5bzXwNcPHflIM_YZ-XqwwwQ";
                $ip = $_SERVER['REMOTE_ADDR'];
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
                $responseKeys = json_decode($response,true);
                if(intval($responseKeys["success"]) !== 1) {
                  echo '<span class="block-icon"><i class="far fa-times"></i></span>
                           <h2 class="response-title">Sign Up Failed,</h2>
                           <p class="response-text"> This account failed to register due to spam detection, please try again.</p>';
                } else {
                  echo '<span class="passed-icon"><i class="far fa-check-circle"></i></span>
                           <h2 class="response-title">Congratulations!</h2>
                           <p class="response-text"> Your account has been succesfully registered and is ready for use.</p>';
                }
        ?>
    </div>

</form>

</div>
