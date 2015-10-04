<?php

/**
 * Description of Homepage
 *
 * @author Casey
 */

class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    
    function index() {
        $this->data['pageTitle'] = 'Home'; // use the home page title
        $this->data['pagebody'] = 'homepage'; // show the homepage view
        
        $this->render();
    }

}