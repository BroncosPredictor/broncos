<?php

/**
 * Description of Standing
 *
 * @author Casey
 */
class Roster extends Application {

    function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        
        $config['base_url'] = 'http://comp4711.local/roster/';
        $config['total_rows'] = 25;
        $config['per_page'] = 12;

        $this->pagination->initialize($config);
       
    }
    
    function index() {
        $this->data['pageTitle'] = 'Roster'; // use the roster page title
        
        // retreive session variable for layout of roster
        $layout = $this->session->userdata("rosterLayout");
           
        // set layout based on session variable
        $this->layout($layout);
        
        // retreive session variable for ordering the roster
        $order = $this->session->userdata("rosterOrder");
        
        // set order based on session variable
        $this->order($order);
        
        // build the list of players to pass to the view
        $source = $this->players->all();
        $players = array();
        foreach ($source as $record) {
            $players[] = array(
                'id' => ( $_SESSION[ 'editing' ] ? 'edit/' : '' ).$record['id'], 
                'who' => $record['who'], 
                'mug' => $record['mug'], 
                'num' => $record['num'],
                'pos' => $record['pos'],
                'age' => $record['age']);
        }
        
        // Add 'new player' card if in editing mode
        if( $_SESSION[ 'editing' ] )
        {
            $players[] = array(
                  'id' => 'new'
                , 'who' => 'Add new Player'
                , 'mug' => 'new-player.png'
                , 'num' => ''
                , 'pos' => ''
                , 'age' => ''
            );      
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
    
    // called by the selection form on the roster page
    function setSession() {
        
        // gets value for layout and stores in session variable
        $layout = $this->input->post('layout');
        $this->session->set_userdata('rosterLayout', $layout);
        
        // gets value for order and stores in session variable
        $order = $this->input->post('order');
        $this->session->set_userdata('rosterOrder', $order);
        
        redirect("/roster");
    }
    
    // display template based on session variable value
    function layout($param) {
        if ($param == "table") {
            $this->data['pagebody'] = 'rosterTable'; // show the table view
        }
        else if ($param == "gallery") {
            $this->data['pagebody'] = 'rosterGallery'; // show the gallery view
        }
        else {
            $this->data['pagebody'] = 'rosterGallery'; // show the gallery view by default
        }
    }
    
    // display roster in order based on session variable value
    function order($param) {
        if ($param == "name") {
            // show roster ordered by name
        }
        else if ($param == "num") {
            // show roster ordered by jersey
        }
        else if ($param == "pos") {
            // show roster ordered by position
        }
        else {
            // show roster ordered by name by default
        }
    }

}
