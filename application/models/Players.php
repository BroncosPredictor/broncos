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
}