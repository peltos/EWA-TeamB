<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Signup extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */

    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/signup/signup.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Sign up Correct
     * This method handles what happens when you move to http://EWA-TeamB/signup/signupcorrect
     */
    public function signupcorrect()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/signup/signupcorrect.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Sign up Failed
     * This method handles what happens when you move to http://EWA-TeamB/signup/signupfail
     */
    public function signupfail()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/signup/signupfail.php';
        require APP . 'view/_templates/footer.php';
    }


    /**
     * PAGE: signup
     * This method handles what happens when you fill in the sign up form and recaptcha.
     */
    public function adduser()
    {
        // If we have POST data to create a new user entry
        if (isset($_POST["adduser"])) {


            // If password and passwordcheck are similar, check captcha. Or else return 'sign up failed' page.
            if ($_POST["password"] == $_POST["passwordcheck"]) {

            // POST user input fields to create new recaptcha entry.
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

            // If captcha isn't checked, return 'sign up failed page'.
            if(!$captcha) {
                header('location: ' . URL . 'signup/signupfail');
            }
            // recaptcha secret key:
            $secretKey = "6LcZoVAUAAAAAHZTu5bzXwNcPHflIM_YZ-XqwwwQ";
            // Get client user IP:
            $ip = $_SERVER['REMOTE_ADDR'];
            // Get response from Google recaptcha API:
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
            // Decode response in JSON:
            $responseKeys = json_decode($response,true);

            // If captcha validation failed, return 'sign up failed' page.
            if(intval($responseKeys["success"]) !== 1) {
              header('location: ' . URL . 'signup/signupfail');

            // If captcha validation is succesfull, return 'sign up correct' page.
            } else {
              // Add user to database.
              $this->model->addSong($_POST["username"], $_POST["email"], $_POST["password"]);
              header('location: ' . URL . 'signup/signupcorrect');
            }
          }else{
              header('location: ' . URL . 'signup/signupfail');

          }
        }
    }
}
