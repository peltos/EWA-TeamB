<?php

/**
 * Class Tournaments
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Tournaments extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/tournaments/index
     */
    public function index()
    {
        $timeline = $this->model->timeline();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/tournaments/events.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: running events
     * This method handles what happens when you move to http://yourproject/tournaments/running
     */
    public function running()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/tournaments/eventsrunning.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: past events
     * This method handles what happens when you move to http://yourproject/tournaments/past
     */
    public function past()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/tournaments/eventsscore.php';
        require APP . 'view/_templates/footer.php';
    }


    /**
     * PAGE: league of legends events
     * This method handles what happens when you move to http://yourproject/tournaments/lol
     */
    public function lol()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/tournaments/eventslol.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Dota 2 events
     * This method handles what happens when you move to http://yourproject/tournaments/dota2
     */
    public function dota2()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/tournaments/eventsdota2.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Overwatch events
     * This method handles what happens when you move to http://yourproject/tournaments/ow
     */
    public function ow()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/tournaments/eventsow.php';
        require APP . 'view/_templates/footer.php';
    }

    public function matchesnl()
    {
        $timeline = $this->model->timelinenl();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/tournaments/eventsNL.php';
        require APP . 'view/_templates/footer.php';
    }




}
