<?php

/**
 * Class Matches
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Matches extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/matches/index
     */
    public function index()
    {
        $timeline = $this->model->timeline();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/events.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: running matches
     * This method handles what happens when you move to http://yourproject/matches/running
     */
    public function running()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/eventsrunning.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: past matches
     * This method handles what happens when you move to http://yourproject/matches/past
     */
    public function past()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/eventsscore.php';
        require APP . 'view/_templates/footer.php';
    }


    /**
     * PAGE: league of legends matches
     * This method handles what happens when you move to http://yourproject/matches/lol
     */
    public function lol()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/eventslol.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Dota 2 matches
     * This method handles what happens when you move to http://yourproject/matches/dota2
     */
    public function dota2()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/eventsdota2.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Overwatch matches
     * This method handles what happens when you move to http://yourproject/matches/ow
     */
    public function ow()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/eventsow.php';
        require APP . 'view/_templates/footer.php';
    }
}
