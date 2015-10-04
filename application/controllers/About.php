<?php

/**
 * Description of About
 *
 * @author Casey
 */
class About extends Application {

    function __construct() {
        parent::__construct();
    }


    function index() {
        $this->data['pageTitle'] = 'About';
        $this->data['pagebody'] = 'about';    // this is the view we want shown
        
        $this->render();
    }

}