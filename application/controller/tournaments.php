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
        $timeline = $this->model->timelineNoFilter();
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
        $timeline = $this->model->timelineRunning();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/tournaments/events.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: past events
     * This method handles what happens when you move to http://yourproject/tournaments/past
     */
    public function past()
    {
        $timeline = $this->model->timelinePast();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/tournaments/events.php';
        require APP . 'view/_templates/footer.php';
    }

}
