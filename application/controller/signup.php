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

    public function adduser()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["adduser"])) {
            if ($_POST["password"] == $_POST["passwordcheck"]) {
                // do addSong() in model/model.php
                $this->model->addUser($_POST["username"], $_POST["email"], $_POST["password"]);
                header('location: ' . URL . 'signup/signup');
            }else{
                header('location: ' . URL . 'signup/signup');
            }
        }
    }
}
