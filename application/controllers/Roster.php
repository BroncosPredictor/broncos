<?php

/**
 * Description of Standing
 *
 * @author Casey
 */
class Roster extends Application {

    function __construct() {
        parent::__construct();
    }
    
    
    function index() {
        $this->data['pageTitle'] = 'Roster'; // use the roster page title
        $this->data['pagebody'] = 'roster'; // show the roster view
        // build the list of players to pass to the view
        $source = $this->players->all();
        $players = array();
        foreach ($source as $record) {
            $players[] = array('id' => $record['id'], 'who' => $record['who'], 'mug' => $record['mug'], 'num' => $record['num']);
        }
        $this->data['players'] = $players;
        
        $this->render();
    }
    
    // get a player based on id
    function gimme($id) {
        $this->data['pagebody'] = 'player';    // this is the view we want shown
        // show the player specified by gimme/$id
        $source = $this->players->get($id);
        $this->data += $source;

        // creates the specific pageTitle for the player
        $this->data['pageTitle'] = '#' . $source['num'] . ': ' . $source['who'];
        
        $this->render();
    }

}
