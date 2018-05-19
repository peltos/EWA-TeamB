<?php

/**
 * Class Profile
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Profile extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/profile/index (which is the default page btw)
     */
    public function index() {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/profile/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function updateProfile() {
        if ($_POST["username"] == "" && $_POST["oldpassword"] == "" && $_POST["Newpassword"] == "" && $_POST["Confirmnewpassword"] == "") {
            $_SESSION['message'] = "";
            header('location: ' . URL . 'profile');
        } else {
            if ($_POST["username"] == "") {

                if ($_POST["oldpassword"] == "" && ($_POST["Newpassword"] != "" || $_POST["Confirmnewpassword"] != "")) {
                    $_SESSION['message'] = 'You must fill in your old password to change your password';
                    header('location: ' . URL . 'profile');
                } else {


                    $getInfoUser = $this->model->getUser($_SESSION["email"]);
                    if ($_POST["Newpassword"] != $_POST["Confirmnewpassword"]) {
                        $_SESSION['message'] = 'Your passwords do not match!';
                        header('location: ' . URL . 'profile');
                    } else {

                        $password = $_POST["Newpassword"];
                        $password2 = $_POST["oldpassword"];
                        if (strlen($password) < 8) {
                            $_SESSION['message'] = "Your Password Must Contain At Least 8 Characters!";
                            header('location: ' . URL . 'profile');
                        } else {
                            if (!preg_match("#[0-9]+#", $password)) {
                                $_SESSION['message'] = "Your Password Must Contain At Least 1 Number!";
                                header('location: ' . URL . 'profile');
                            } else {
                                if (!preg_match("#[A-Z]+#", $password)) {
                                    $_SESSION['message'] = "Your Password Must Contain At Least 1 Capital Letter!";
                                    header('location: ' . URL . 'profile');
                                } else {
                                    if (!preg_match("#[a-z]+#", $password)) {
                                        $_SESSION['message'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
                                        header('location: ' . URL . 'profile');
                                    } else {


                                        $_SESSION['message'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
                                        header('location: ' . URL . 'profile');

                                        if (isset($getInfoUser)) {
                                            $salt = "djskdjd1434JFFFFAF23";
                                            $password4 = $password2 . $salt;
                                            $md5Password = md5($password4);

                                            if (($md5Password == $getInfoUser->password) && ($_SESSION["email"] == $getInfoUser->memberEmail)) {
                                                $_SESSION["email"] = $getInfoUser->memberEmail;
                                                $_SESSION["username"] = $getInfoUser->username;

                                                $salt = "djskdjd1434JFFFFAF23";
                                                $password3 = $password . $salt;
                                                $md5Password2 = md5($password3);
                                                $_SESSION['message'] = '';
                                                $_SESSION['signinEmail'] = '';


                                                $this->model->addNewPassword($md5Password2, $_SESSION["email"]);
                                                $_SESSION['message'] = "Your password has been changed!";
                                                header('location: ' . URL . 'profile');
                                            } else {
                                                $_SESSION['message'] = 'Your Username or Password is incorrect!';
                                                $_SESSION['signinEmail'] = $_POST["email"];
                                                header('location: ' . URL . 'profile');
                                            }
                                        } else {
                                            $_SESSION['message'] = 'Your Username or Password is incorrect!';
                                            header('location: ' . URL . 'profile');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                if ($_POST["username"] != "" && ($_POST["oldpassword"] != "" || $_POST["Newpassword"] != "" || $_POST["Confirmnewpassword"] != "")) {
                    $oldusername = $_SESSION['username'];
                    $_SESSION['message'] = "";
                    $newusername = $_POST["username"];
                    if (strlen($newusername) < 5) {
                        $_SESSION['message'] = 'Username must be shorter then 30 and longer than 5 characters!';
                        header('location: ' . URL . 'profile');
                    } else {
                        $getUserName = $this->model->checkUsername($newusername);
                        if (!$getUserName == false) {
                            $_SESSION['message'] = 'Username already taken!';
                            header('location: ' . URL . 'profile');
                        } else {
                            $getInfoUser = $this->model->getUser($_SESSION["email"]);
                            if ($_POST["Newpassword"] != $_POST["Confirmnewpassword"]) {
                                $_SESSION['message'] = 'Your passwords do not match!';
                                header('location: ' . URL . 'profile');
                            } else {


                                $password = $_POST["Newpassword"];
                                $password2 = $_POST["oldpassword"];
                                if (strlen($password) < 8) {
                                    $_SESSION['message'] = "Your Password Must Contain At Least 8 Characters!";
                                    header('location: ' . URL . 'profile');
                                } else {
                                    if (!preg_match("#[0-9]+#", $password)) {
                                        $_SESSION['message'] = "Your Password Must Contain At Least 1 Number!";
                                        header('location: ' . URL . 'profile');
                                    } else {
                                        if (!preg_match("#[A-Z]+#", $password)) {
                                            $_SESSION['message'] = "Your Password Must Contain At Least 1 Capital Letter!";
                                            header('location: ' . URL . 'profile');
                                        } else {
                                            if (!preg_match("#[a-z]+#", $password)) {
                                                $_SESSION['message'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
                                                header('location: ' . URL . 'profile');
                                            } else {


                                                $_SESSION['message'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
                                                header('location: ' . URL . 'profile');

                                                if (isset($getInfoUser)) {

                                                    $salt = "djskdjd1434JFFFFAF23";
                                                    $password4 = $password2 . $salt;
                                                    $md5Password = md5($password4);

                                                    if (($md5Password == $getInfoUser->password) && ($_SESSION["email"] == $getInfoUser->memberEmail)) {
                                                        $_SESSION["email"] = $getInfoUser->memberEmail;
                                                        $_SESSION["username"] = $getInfoUser->username;

                                                        $salt = "djskdjd1434JFFFFAF23";
                                                        $password3 = $password . $salt;
                                                        $md5Password2 = md5($password3);
                                                        $_SESSION['message'] = '';
                                                        $_SESSION['signinEmail'] = '';
                                                        $sql = "UPDATE member SET username='$newusername' WHERE username = '$oldusername'";
                                                        $query = $this->db->prepare($sql);

                                                        $this->model->addNewPassword($md5Password2, $_SESSION["email"]);
                                                        $_SESSION['message'] = "Your password and username has been changed!";
                                                        header('location: ' . URL . 'profile');
                                                    } else {
                                                        $_SESSION['message'] = 'Your Username or Password is incorrect!';
                                                        $_SESSION['signinEmail'] = $_POST["email"];
                                                        header('location: ' . URL . 'profile');
                                                    }
                                                } else {
                                                    $_SESSION['message'] = 'Your Username or Password is incorrect!';
                                                    header('location: ' . URL . 'profile');
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else {
                    if (isset($_POST["username"]) && ($_POST["oldpassword"] == "" || $_POST["Newpassword"] == "" || $_POST["Confirmnewpassword"] == "")) {
                        $_SESSION['message'] = "";
                        $newusername = $_POST["username"];



                        $oldusername = $_SESSION['username'];
                        if (strlen($newusername) < 5) {
                            $_SESSION['message'] = 'Username must be shorter then 30 and longer than 5 characters!';
                            header('location: ' . URL . 'profile');
                        } else {
                            $getUserName = $this->model->checkUsername($newusername);
                            if (!$getUserName == false) {
                                $_SESSION['message'] = 'Username already taken';
                                header('location: ' . URL . 'profile');
                            } else {

                                $sql = "UPDATE member SET username='$newusername' WHERE username = '$oldusername'";
                                $query = $this->db->prepare($sql);


                                // useful for debugging: you can see the SQL behind above construction by using:
                                // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

                                $query->execute();
                            }



                            $_SESSION['message'] = "Username has been changed!";
                            $_SESSION['username'] = $newusername;
                            header('location: ' . URL . 'profile');
                        }
                    } else {
                        header('location: ' . URL . 'profile');
                    }
                }
            }
        }header('location: ' . URL . 'profile');
    }

}
