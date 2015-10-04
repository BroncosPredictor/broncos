<?php

/**
 * This is a "CMS" model for the Denver Broncos roster, but with  
 * hard-coded data, so that we don't have to worry about any database setup.
 *
 * @author Casey
 */

class Players extends CI_Model {
    
    // The data comes from http://www.denverbroncos.com/team/roster.html
    var $data = array(
        array('id' => '1', 'who' => 'Anderson, C.J.', 'mug' => 'anderson.png', 'num'=> '22', 'pos' => 'RB', 'age' => '24'),
        array('id' => '2', 'who' => 'Anunike, Kenny', 'mug' => 'anunike.png', 'num'=> '91', 'pos' => 'DE', 'age' => '25'),
        array('id' => '3', 'who' => 'Barrett, Shaquil', 'mug' => 'barrett.png', 'num'=> '91', 'pos' => 'OLB', 'age' => '22'),
        array('id' => '4', 'who' => 'Bolden, Omar', 'mug' => 'bolden.png', 'num'=> '31', 'pos' => 'S', 'age' => '26'),
        array('id' => '5', 'who' => 'Brewer, Aaron', 'mug' => 'brewer.png', 'num'=> '46', 'pos' => 'LS', 'age' => '25'),
        array('id' => '6', 'who' => 'Bruton Jr., David', 'mug' => 'brutonjr.png', 'num'=> '30', 'pos' => 'S', 'age' => '28'),
        array('id' => '7', 'who' => 'Caldwell, Andre', 'mug' => 'caldwell.png', 'num'=> '30', 'pos' => 'WR', 'age' => '30'),
        array('id' => '8', 'who' => 'Casey, James', 'mug' => 'casey.png', 'num'=> '80', 'pos' => 'TE/FB', 'age' => '31'),
        array('id' => '9', 'who' => 'Colquitt, Britton', 'mug' => 'colquitt.png', 'num'=> '4', 'pos' => 'P', 'age' => '30'),
        array('id' => '10', 'who' => 'Daniels, Owen', 'mug' => 'daniels.png', 'num'=> '81', 'pos' => 'TE', 'age' => '32'),
        array('id' => '11', 'who' => 'Davis, Todd', 'mug' => 'davis.png', 'num'=> '51', 'pos' => 'ILB', 'age' => '23'),
        array('id' => '12', 'who' => 'Doss, Lorenzo', 'mug' => 'doss.png', 'num'=> '37', 'pos' => 'CB', 'age' => '21'),
        array('id' => '13', 'who' => 'Ferentz, James', 'mug' => 'ferentz.png', 'num'=> '53', 'pos' => 'C', 'age' => '26'),
        array('id' => '14', 'who' => 'Fowler, Bennie', 'mug' => 'fowler.png', 'num'=> '16', 'pos' => 'WR', 'age' => '24'),
        array('id' => '15', 'who' => 'Garcia, Max', 'mug' => 'garcia.png', 'num'=> '73', 'pos' => 'C/G', 'age' => '23'),
        array('id' => '16', 'who' => 'Green, Virgil', 'mug' => 'green.png', 'num'=> '85', 'pos' => 'TE', 'age' => '26'),
        array('id' => '17', 'who' => 'Harris Jr., Chris', 'mug' => 'harrisjr.png', 'num'=> '25', 'pos' => 'CB', 'age' => '26'),
        array('id' => '18', 'who' => 'Harris, Ryan', 'mug' => 'harris.png', 'num'=> '68', 'pos' => 'T', 'age' => '30'),
        array('id' => '19', 'who' => 'Henry, Mitchell', 'mug' => 'henry.png', 'num'=> '84', 'pos' => 'TE', 'age' => '22'),
        array('id' => '20', 'who' => 'Hillman, Ronnie', 'mug' => 'hillman.png', 'num'=> '23', 'pos' => 'RB', 'age' => '24'),
    );
    
    // Constructor
    public function __construct() {
        parent::__construct();
    }
    
    // retrieve the entire roster
    public function all() {
        return $this->data;
    }
    
    // retrieve a specific player
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['id'] == $which)
                return $record;
        return null;
    }

}