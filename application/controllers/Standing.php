<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Standing
 *
 * @author Georgi
 */
class Standing extends Application
{
    function __construct() {
        parent::__construct();
    }
    
    
    function index() {
        $this->data['pageTitle'] = 'Standing';
        $this->data['pagebody'] = 'standing'; // show the standing view
        
        /* hardcoded array representation to help understand variable tag pairs structure
        $this->data['conferences'] = array(
            array( 'conference' => 'AFC'
                 , 'groups' => array( array( 'group' => 'East'
                                           , 'teams' => $this->league->getByConfGroup( 'AFC', 'East' ) )
                                    , array( 'group' => 'North'
                                           , 'teams' => $this->league->getByConfGroup( 'AFC', 'North' ) )
                                    , array( 'group' => 'South'
                                           , 'teams' => $this->league->getByConfGroup( 'AFC', 'South' ) )
                                    , array( 'group' => 'West'
                                           , 'teams' => $this->league->getByConfGroup( 'AFC', 'West' ) ) ) )
          , array( 'conference' => 'NFC'
                 , 'groups' => array( array( 'group' => 'East'
                                           , 'teams' => $this->league->getByConfGroup( 'NFC', 'East' ) )
                                    , array( 'group' => 'North'
                                           , 'teams' => $this->league->getByConfGroup( 'NFC', 'North' ) )
                                    , array( 'group' => 'South'
                                           , 'teams' => $this->league->getByConfGroup( 'NFC', 'South' ) )
                                    , array( 'group' => 'West'
                                           , 'teams' => $this->league->getByConfGroup( 'NFC', 'West' ) ) ) ) );
        */
        // init array for the conferences variable tag pair
        $this->data['conferences'] = array();
        
        // iterate over available conferences
        foreach( $this->league->getConferences() as $conf )
        {
            $groupData = array(); // temp variable to store the groups in the current conference
            // iterate over available Groups
            foreach( $this->league->getGroups() as $group )
            {
                // append info about current group
                $groupData[] = array( 'group' => $group
                                      // retreives data about the teams that are in the current conf and current group
                                    , 'teams' => $this->league->getByConfGroup( $conf, $group ) );
            }
            // append groups data to current conference
            $this->data['conferences'][] = array( 'conference' => $conf
                                                , 'groups' => $groupData );
        }
        
        $this->render();
    }
}
