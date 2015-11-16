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
        
        $this->pagination();
    }
    
    function pagination($num = 1) {
        
        $this->load->library('pagination');
        
        $config = array();
        $config['base_url'] = base_url() . 'roster/page';
        $config['total_rows'] = $this->players->size();
        $config['per_page'] = 12;
        $config['use_page_numbers']  = TRUE;
        $config['page_query_string'] = FALSE;

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        
        $this->data['pageTitle'] = 'Roster'; // use the roster page title
        
        // create pagination
        
        $this->data['pagination'] = $this->pagination->create_links();
        
        // retreive session variable for layout of roster
        $layout = $this->session->userdata("rosterLayout");
           
        // set layout based on session variable
        $this->layout($layout);
        
        // retreive session variable for ordering the roster
        $order = $this->session->userdata("rosterOrder");
        
        // set order based on session variable
        $this->order($order);
       
        // build the list of players to pass to the view, with pagination
        $this->data['players'] = $this->players->get_data($num);
        
        $this->render();
        
    }
    
    // get a player based on id
    function gimme($id) {
        $this->data['pagebody'] = 'player';    // this is the view we want shown
        
        // show the player specified by gimme/$id
        $this->data = array_merge($this->data, (array) $this->players->get($id));

        // creates the specific pageTitle for the player
        $this->data['pageTitle'] = '#' . $this->data['num'] . ': ' . $this->data['name'];
        
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
    function order($order) {
        if ($order == "name") {
            // show roster ordered by name
            $this->db->order_by($order, "asc");
        }
        else if ($order == "num") {
            // show roster ordered by jersey
            $this->db->order_by($order, "asc");
        }
        else if ($order == "pos") {
            // show roster ordered by position
            $this->db->order_by($order, "asc");
        }
        else {
            // show roster ordered by name by default
            $this->db->order_by("name", "asc");
        }
    }

}
