<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Favorite extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */

    public function index()
    {
        if (!$_SESSION['token'] == '') {

            $favorites = $this->model->getFavorites($_SESSION['email']);
            $favoritePageMixer = $this->model->getFavoritePageMixer($favorites);
            $favoritePageTwitch = $this->model->getFavoritePageTwitch($favorites);

            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/favorite/favorite.php';
            require APP . 'view/_templates/footer.php';

            $this->model->streamerUpdateMixer('mixer', $favoritePageMixer);
            $this->model->streamerUpdateTwitch('twitch', $favoritePageTwitch);
        }else{
            header('location: ' . URL);
        }

    }
}
