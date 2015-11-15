<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Settings extends Application {

    function __construct() {
        parent::__construct();
    }


    function index() {
        $this->data['pageTitle'] = 'Settings';
        $this->data['pagebody'] = 'settings';
        
        if( $this->session->userdata( 'editing' ) == 'true' )
        {
            $this->data['editStatus'] = 'Enabled';
            $this->data['editToggle'] = 'Disable';
        }
        else
        {
            $this->data['editStatus'] = 'Disabled';
            $this->data['editToggle'] = 'Enable';
        }
        
        $this->render();
    }
    
    function editToggle( $newStatus )
    {
        $this->session->set_userdata( 'editing', $newStatus == 'Enable' ? 'true' : 'false' );
        
        redirect('/settings');
    }

}
