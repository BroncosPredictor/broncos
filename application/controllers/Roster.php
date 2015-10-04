<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Roster extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['pageTitle'] = 'Roster';
        $this->data['pagebody'] = 'roster';    // this is the view we want shown
        // build the list of authors, to pass on to our view
        $source = $this->players->all();
        $players = array();
        foreach ($source as $record) {
            $players[] = array('id' => $record['id'], 'who' => $record['who'], 'mug' => $record['mug'], 'num' => $record['num']);
        }
        $this->data['players'] = $players;
        
        
        $this->render();
    }
    
    function gimme($id) {
        $this->data['pagebody'] = 'player';    // this is the view we want shown
        // show the author specified by gimme/$id
        $source = $this->players->get($id);
        $this->data += $source;

        $this->data['pageTitle'] = '#' . $source['num'] . ': ' . $source['who'];
        
        $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */