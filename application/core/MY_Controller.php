<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author casey
 * 
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content
    protected $choices = array(// our menu navbar
          'Home' => '/'
        , 'Roster' => '/roster'
        , 'Standing' => '/standing'
        , 'About' => '/about'
        , 'Settings' => '/settings'
        ,
    );

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */

    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['title'] = 'Denver Broncos';    // our default title
        $this->errors = array();
        $this->data['pageTitle'] = '';   // our default page
    }

    /**
     * Render this page
     */
    function render() {
        $this->data['menubar'] = build_menu_bar($this->choices);
	$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
	$this->data['data'] = &$this->data;
	$this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */