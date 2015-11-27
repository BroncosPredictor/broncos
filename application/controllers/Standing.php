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
    var $layoutOptions;
    var $orderOptions;
    
    function __construct() {
        parent::__construct();
        $this->layoutOptions = array( 'Division', 'Conference', 'League' );
        $this->orderOptions = array( 'bogus' );
    }
    
    
    function index() {
        $this->data['pageTitle'] = 'Standing'; // use the standing page title
        $this->data['pagebody'] = 'standing'; // show the standing view
        
        $this->data['standingLayoutOpts'] = array();
        foreach( $this->layoutOptions as $value )
        {
            $this->data['standingLayoutOpts'][] = array(
                'optValue' => $value
              , 'optSelected' => ( $_SESSION['standingLayout'] == $value ? 'selected' : '' )
            );
        }
        
        
        $this->data['standingOrderOpts'] = array();
        foreach( $this->orderOptions as $value )
        {
            $this->data['standingOrderOpts'][] = array(
                'optValue' => $value
              , 'optSelected' => ( $_SESSION['standingOrder'] == $value ? 'selected' : '' )
            );
        }
        
        if( $_SESSION['standingLayout'] == 'League' )
        {
            $this->data['teams'] = $this->league->all();
        }
        else
        {
            // init array for the conferences variable tag pair
            $this->data['conferences'] = array();
            
            // iterate over available conferences
            foreach( $this->league->getConferences() as $conf )
            {
                if( $_SESSION['standingLayout'] == 'Division' )
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
                else if( $_SESSION['standingLayout'] == 'Conference' )
                {
                    $this->data['conferences'][] = array( 'conference' => $conf
                                                        , 'teams' => $this->league->getByConf( $conf ) );
                }
                
            }
        }
        $this->data['standingsTable']
                = $this->parser->parse( 'standing'.$_SESSION['standingLayout']
                                      , $this->data
                                      , true );
        
        $this->render();
    }
    
    function setSession() {
        
        // gets value for layout and stores in session variable
        $layout = $this->input->post('layout');
        $_SESSION['standingLayout'] = $layout;
        
        // gets value for order and stores in session variable
        //$order = $this->input->post('order');
        //$this->session->set_userdata('rosterOrder', $order);
        
        redirect('/standing');
    }
}
