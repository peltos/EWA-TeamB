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
        require APP . 'view/profile/profile.php';
        require APP . 'view/_templates/footer.php';
    }

    public function ChangeUserName() {
        if (isset($_POST["username"])) {
            $_SESSION['message'] = "";
            $newusername = $_POST["username"];
            $oldusername = $_SESSION['username'];
            if (strlen($newusername) < 5) {
                $_SESSION['message'] = 'username must be shorter then 30 and longer than 5 characters ';
                header('location: ' . URL . 'profile');
            } else {
                $getUserName = $this->model->checkUsername($newusername);
                if (!$getUserName == false) {
                    $_SESSION['message'] = 'username already taken';
                    header('location: ' . URL . 'profile');
                } else {

                    $sql = "UPDATE member SET username='$newusername' WHERE username = '$oldusername'";
                    $query = $this->db->prepare($sql);


                    // useful for debugging: you can see the SQL behind above construction by using:
                    // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

                    $query->execute();





                    $_SESSION['message'] = "Username has been changed!";
                    $_SESSION['username'] = $newusername;
                    header('location: ' . URL . 'profile');
                }
            }
        }
    }

}
