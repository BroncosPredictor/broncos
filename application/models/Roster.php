<?php

/**
 * This is a "CMS" model for the Denver Broncos roster, but with  
 * hard-coded data, so that we don't have to worry about any database setup.
 *
 * @author casey
 */

class Roster extends CI_Model {
    
    // The data comes from http://www.denverbroncos.com/team/roster.html
    var $data = array(
        array('id' => '1', 'who' => 'Anderson, C.J.', 'mug' => '', 'num'=>'22',
            'pos' => 'RB', 'age' => '24'),
        array('id' => '2', 'who' => '', 'mug' => '', 'num'=>'',
            'pos' => '', 'age' => ''),
        array('id' => '3', 'who' => '', 'mug' => '', 'num'=>'',
            'pos' => '', 'age' => ''),
        array('id' => '4', 'who' => '', 'mug' => '', 'num'=>'',
            'pos' => '', 'age' => ''),
        array('id' => '5', 'who' => '', 'mug' => '', 'num'=>'',
            'pos' => '', 'age' => ''),
        array('id' => '6', 'who' => '', 'mug' => '', 'num'=>'',
            'pos' => '', 'age' => '')
    );
    
    // Constructor
    public function __construct() {
        parent::__construct();
    }
    
}