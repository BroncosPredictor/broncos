<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PlayerCRUD extends Application {

    var $options;
    
    function __construct() {
        parent::__construct();
        $this->options = array(
              'C'
            , 'G'
            , 'T'
            , 'QB'
            , 'RB'
            , 'WR'
            , 'TE'
            , 'DT'
            , 'DE'
            , 'MLB'
            , 'OLB'
            , 'CB'
            , 'S'
            , 'K'
            , 'H'
            , 'LS'
            , 'P'
            , 'KOS'
            , 'PR'
            , 'KR'
            , 'ILB'
            , 'NT'
            , 'FB');
        
            $this->data['displayErr'] = 'none';
    }

    function index() {
        $this->data['pagebody'] = 'editPlayer';
        
        // decide which position option to select
        if( !isset( $_SESSION['playerEditData'] ) )
        {
            $pos = '';
            $auxPos = '';
        }
        else
        {
            $explodedPos = explode( '/', strtoupper( $_SESSION['playerEditData']['pos'] ) );
            $pos = trim( $explodedPos[0] );
            $auxPos = isset( $explodedPos[1] ) ? trim( $explodedPos[1] ) : 'none';
        }
        
        $posOpt = array();
        $auxPosOpt = array( array(
                'optValue' => 'none'
              , 'optSelected' => ( $auxPos == 'none' ? 'selected' : '' ) ) );
        
        // selected previously saved position option
        foreach( $this->options as $value )
        {
            $posOpt[] = array(
                'optValue' => $value
              , 'optSelected' => ( $pos == $value ? 'selected' : '' )
            );
            $auxPosOpt[] = array(
                'optValue' => $value
              , 'optSelected' => ( $auxPos == $value ? 'selected' : '' )
            );
        }
        
        // put dropdown option in data
        $this->data['posOpts'] = $posOpt;
        $this->data['auxPosOpts'] = $auxPosOpt;
        
        $this->render();
    }
    
    function newPlayer()
    {
        $this->data['pageTitle'] = 'New Player';
        $this->data['isNew'] = 'true';
        $this->data['deleteDisable'] = 'disabled';
        
        if( !isset( $_SESSION['playerEditData'] ) )
        {
            $this->data += array(
                'id' => '',
                'who' => '',
                'mug' => 'new-player.png',
                'num' => '',
                'pos' => '',
                'age' => '');
        }
        else
        {
            $this->data = $_SESSION['playerEditData'] + $this->data;
        }
        
        $this->index();
    }
    
    function editPlayer( $id )
    {
        $id = intval( $id );
        
        $this->data['pageTitle'] = 'Edit player';
        $this->data['isNew'] = 'false';
        $this->data['deleteDisable'] = '';
        
        if( !isset( $_SESSION['playerEditData'] ) )
        {
            $_SESSION['playerEditData'] = (array) $this->players->get( $id );
        }
        
        $this->data = $_SESSION['playerEditData'] + $this->data;
        $this->data['who'] = $_SESSION['playerEditData']['name'];
        
        $this->index();
    }
    
    function validate()
    {
        if( $this->input->post('name') == NULL
         || $this->input->post('name') == '' )
        {
            
            $this->data['displayErr'] = 'inline';
            $this->data['errMsg'] = 'Name cannot be empty!';
            return false;
        }
        
        if( $this->input->post('num') == NULL
         || $this->input->post('num') == '' )
        {
            $this->data['displayErr'] = 'inline';
            $this->data['errMsg'] = 'Player number cannot be empty!';
            return false;
        }
        
        $isUniqueNum = true;
        foreach( $this->players->all() as $record )
        {
            $record = get_object_vars($record);
            if( $record['num'] == $this->input->post('num') )
            {
                if( $record['id'] != $this->input->post('id') )
                {
                    $isUniqueNum = false;
                }
                break;
            }
        }
        
        if( !$isUniqueNum )
        {
            $this->data['displayErr'] = 'inline';
            $this->data['errMsg'] = 'Player number must be unique!';
            return false;
        }
        
        if( $this->input->post('pos') == NULL
         || $this->input->post('pos') == '' )
        {
            $this->data['displayErr'] = 'inline';
            $this->data['errMsg'] = 'Position cannot be empty!';
            return false;
        }
        
        if( $this->input->post('age') == NULL
         || $this->input->post('age') == '' )
        {
            $this->data['displayErr'] = 'inline';
            $this->data['errMsg'] = 'Player\'s age cannot be empty!';
            return false;
        }
        
        return true;
    }
    
    function submit()
    {        
        if( $this->input->post('submit') == 'save' )
        {
            $_SESSION['playerEditData'] = array
            (
                'id' => $this->input->post('id')
              , 'who' => $this->input->post('name')
              , 'name' => $this->input->post('name')
              , 'num' => $this->input->post('num')
              , 'pos' => $this->input->post('pos')
              , 'age' => $this->input->post('age')
            );
            
            $config['upload_path'] = './data/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            
            $this->load->library('upload', $config);
            if( $this->upload->do_upload() )
            {
                $_SESSION['playerEditData']['mug'] = $this->upload->data()['file_name'];
            }
            else
            {
                $this->data['displayErr'] = 'inline';
                $this->data['errMsg'] = $this->upload->display_errors();
                
                if( $this->input->post('isNew') == 'true' )
                {
                    $this->newPlayer();
                }
                else
                {
                    $this->editPlayer( $this->input->post('id') );
                }
                return;
            }
        
            if( $this->input->post('auxPos') != 'none' )
            {
                $_SESSION['playerEditData']['pos'] .= '/'.$this->input->post('auxPos');
            }
            
            if( !$this->validate() )
            {
                if( $this->input->post('isNew') == 'true' )
                {
                    $this->newPlayer();
                }
                else
                {
                    $this->editPlayer( $this->input->post('id') );
                }
            }
            else
            {
                $_SESSION['playerEditData']['name'] = $_SESSION['playerEditData']['who'];
                unset( $_SESSION['playerEditData']['who'] );
                
                if( $_SESSION['playerEditData']['mug'] == 'new-player.png' )
                    $_SESSION['playerEditData']['mug'] = '';
                
                if( $this->input->post('isNew') == 'true' )
                    $this->players->add( $_SESSION['playerEditData'] );
                else
                    $this->players->update( $_SESSION['playerEditData'] );
                
                unset( $_SESSION['playerEditData'] );
                redirect('/roster');
            }
        }
        else if( $this->input->post('submit') == 'delete' )
        {
            $this->players->delete( $_SESSION['playerEditData']->id );
            unset( $_SESSION['playerEditData'] );
            redirect('/roster');
        }
        else if( $this->input->post('submit') == 'cancel' )
        {
            unset( $_SESSION['playerEditData'] );
            redirect('/roster');
        }
        else
        {
            $this->index();
        }
    }
}
