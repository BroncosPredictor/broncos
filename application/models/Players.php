<?php

/**
 * This is a "CMS" model for the Denver Broncos roster, but with  
 * hard-coded data, so that we don't have to worry about any database setup.
 *
 * @author Casey
 */

class Players extends MY_Model {
    
    // Constructor
    public function __construct() {
        parent::__construct('players', 'id');
    }
    
    // separates array of players into arrays of 12
    public function getPage($id) {
        $result = $this->all();
        $result = array_chunk($result, 12);
        return $result[$id];
    }
    
    // gets the data for each page number, checks that the count of each page is above 0
    public function get_pagination($page){   
        $query = $this->getPage($page - 1);
        
        if (count($query) > 0) {
            return $query;
        }
        
        return false;
    }
}