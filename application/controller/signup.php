<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Signup extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index() {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/signup/signup.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Sign up Correct
     * This method handles what happens when you move to http://EWA-TeamB/signup/signupcorrect
     */
    public function signupcorrect() {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/signup/signupcorrect.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Sign up Failed
     * This method handles what happens when you move to http://EWA-TeamB/signup/signupfail
     */
    public function signupfail() {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/signup/signupfail.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: signup
     * This method handles what happens when you fill in the sign up form and recaptcha.
     */
    public function adduser() {

        if (isset($_POST["adduser"])) {
            // If we have POST data to create a new user entry
            // If password and passwordcheck are similar, check captcha. Or else return 'sign up failed' page


            $username = ($_POST["username"]);
            $_SESSION['addUserUsername'] = $username;
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                $_SESSION['addUserEmail'] = $email;
            }
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            }
            if (isset($_POST['passwordcheck'])) {
                $passwordcheck = $_POST['passwordcheck'];
            }
            if (isset($_POST['g-recaptcha-response'])) {
                $captcha = $_POST['g-recaptcha-response'];
            }

            $checkCounter = 0;
            $_SESSION['message'] = '';

            if (strlen($username) > 30 && strlen($username) <= 5) {
                $_SESSION['message'] .= 'username must be shorter then 30 and longer than 5 characters <br/>';
                $checkCounter++;
            }
            $getUserName = $this->model->checkUsername($username);
            if (!$getUserName == false) {
                $_SESSION['message'] .= 'username already taken  <br/>';
                $checkCounter++;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['message'] .= 'Invalid email format <br/>';
                $checkCounter++;
            }
            if (strlen($password) < 8) {
                $_SESSION['message'] .= "Your Password Must Contain At Least 8 Characters! <br/>";
                $checkCounter++;
            }
            if (!preg_match("#[0-9]+#", $password)) {
                $_SESSION['message'] .= "Your Password Must Contain At Least 1 Number! <br/>";
                $checkCounter++;
            }
            if (!preg_match("#[A-Z]+#", $password)) {
                $_SESSION['message'] .= "Your Password Must Contain At Least 1 Capital Letter! <br/>";
                $checkCounter++;
            }
            if (!preg_match("#[a-z]+#", $password)) {
                $_SESSION['message'] .= "Your Password Must Contain At Least 1 Lowercase Letter! <br/>";
                $checkCounter++;
            }
            if (!($password == $passwordcheck)) {
                $_SESSION['message'] .= "Your Passwords are not the same! <br/>";
                $checkCounter++;
            }
            if ($checkCounter == 0) {

                // If captcha isn't checked, return 'sign up failed page'.
                if (!$captcha) {
                    //     header('location: ' . URL . 'signup/signupfail');
                }
                // recaptcha secret key:
                $secretKey = "6LcZoVAUAAAAAHZTu5bzXwNcPHflIM_YZ-XqwwwQ";
                // Get client user IP:
                $ip = $_SERVER['REMOTE_ADDR'];
                // Get response from Google recaptcha API:
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha . "&remoteip=" . $ip);
                // Decode response in JSON:
                $responseKeys = json_decode($response, true);

                // If captcha validation failed, return 'sign up failed' page.
                if (intval($responseKeys["success"]) !== 1) {
                    header('location: ' . URL . 'signup/signupfail');

                    // If captcha validation is succesfull, return 'sign up correct' page.
                } else {
                    // Add user to database.

                    $_SESSION['message'] = '';
                    $this->model->addUser($_POST["username"], $_POST["email"], $_POST["password"]);

                    // After adding the user to the database it checks the user info and logs automatically in.
                    $getInfoUser = $this->model->getUser($_POST["email"]);
                    if (isset($getInfoUser)) {
                        var_dump($getInfoUser);
                        $salt = "djskdjd1434JFFFFAF23";
                        $md5Password = md5($_POST["password"] . $salt);
                        var_dump($md5Password);
                        //Checks if the email and password are correct and if it's correct you will be sent to the signupcorrect page and you will be logged in.
                        if (($md5Password == $getInfoUser->password) && ($_POST["email"] == $getInfoUser->memberEmail)) {
                            $_SESSION["email"] = $getInfoUser->memberEmail;
                            $_SESSION["username"] = $getInfoUser->username;

                            $_SESSION["token"] = md5($getInfoUser->username . $getInfoUser->memberEmail);

                            $_SESSION['addUserUsername'] = '';
                            $_SESSION['addUserEmail'] = '';

                            header('location: ' . URL . 'signup/signupcorrect');
                        }
                    }
                }
                //If it fails you will stay(sent to the signup page) at the signup page.
            } else {
                header('location: ' . URL . 'signup');
            }
            //If adding the user will fail you will be stayin(sent to the) the signup page.
        } else {
            $_SESSION['message'] = 'Passwords do not match!';
            header('location: ' . URL . 'signup');
        }
    }

}
