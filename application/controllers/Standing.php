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
        $this->layoutOptions = array( 'League', 'Conference', 'Division' );
        $this->orderOptions = array( 'City', 'Team', 'Net Points' );
    }
    
    static function cmp( $a, $b )
    {
        switch( $_SESSION['standingOrder'] )
        {
        case 'City':
            return strcmp( $a->name, $b->name );
        case 'Team':
            $a = preg_split( '/\s/', $a->name );
            $b = preg_split( '/\s/', $b->name );
            return strcmp( end( $a ), end( $b ) );
        case 'Net Points':
            return $b->netPts - $a->netPts;
        }
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
            $teamData = $this->league->all();
            usort( $teamData, 'Standing::cmp' );
            $this->data['teams'] = $teamData;
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
                        $teamData = $this->league->getByConfGroup( $conf, $group );
                        usort( $teamData, 'Standing::cmp' );
                        // append info about current group
                        $groupData[] = array( 'group' => $group
                                              // retreives data about the teams that are in the current conf and current group
                                            , 'teams' => $teamData );
                    }
                    // append groups data to current conference
                    $this->data['conferences'][] = array( 'conference' => $conf
                                                        , 'groups' => $groupData );
                }
                else if( $_SESSION['standingLayout'] == 'Conference' )
                {
                    $teamData = $this->league->getByConf( $conf );
                    usort( $teamData, 'Standing::cmp' );
                    $this->data['conferences'][] = array( 'conference' => $conf
                                                        , 'teams' => $teamData );
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
        $order = $this->input->post('order');
        $_SESSION['standingOrder'] = $order;
        
        redirect('/standing');
    }
}
