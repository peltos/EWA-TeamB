<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller {

    private $numberOfFavouriteStreamers = 3;

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index() {
        $slider = $this->model->timeline();
        $favorites = $this->model->getFavorites($_SESSION['email']);
        $favoritePage = $this->model->getFavoritePageMixer($favorites);

        $mostFavorited = $this->model->getMostFavouriteStreamers();
        $favoritePageRecommended = $this->model->getFavoritePageMixer($mostFavorited);
        
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';

        $this->model->streamerUpdateMixer('mixer', $favoritePage);
    }

    public function logout() {
        session_start();
        $_SESSION['username'] = '';
        $_SESSION['email'] = '';
        header('location: ' . URL);
    }

}
