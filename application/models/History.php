<?php

define('LOCAL', false);   // control whether we access our model locally, or over XML-RPC
define('RPCSERVER', ('nfl.jlparry.com/rpc'));	// endpoint fo the XML-RPC server
define('RPCPORT', 80); // port the XML-RPC service is listening on

class History extends MY_Model2 {
    
    // Constructor
    public function __construct() {
        parent::__construct( null, 'date', 'home' );
    }
    
    public function rpcUpdate()
    {
        // use XML-RPC to get the list
	$this->load->library('xmlrpc');
	$this->xmlrpc->server( RPCSERVER, RPCPORT );
	$this->xmlrpc->method('since');
	$request = array( $this->lastUpdateDate() );
	$this->xmlrpc->request($request);
	if (!$this->xmlrpc->send_request())
	{
            return $this->xmlrpc->display_error();
        }
	$list = $this->xmlrpc->display_response();
        
        foreach( $list as $game )
            $this->add( History::translateXML( $game ) );
    }
    
    public function add( $record )
    {
        if( !$this->exists( $record['date'], $record['home']) )
            parent::add( $record );
    }
    
    private static function translateXML( $simpleXML )
    {
        $record = array();
        $record['date']    = (string) $simpleXML['date'];
        $record['home']    = (string) $simpleXML['home'];
        $record['homePts'] = (int) substr( $simpleXML['score'], 0, strpos( $simpleXML['score'], ':' ) );
        $record['away']    = (string) $simpleXML['away'];
        $record['awayPts'] = (int) substr( $simpleXML['score'], strpos( $simpleXML['score'], ':' ) + 1 );
        return $record;
    }
    
    private function lastUpdateDate()
    {
        $mostRecent = '20150830';
        foreach( $this->all() as $record )
        {
            if( $mostRecent < $record->date )
                $mostRecent = $record->date;
        }
        return $mostRecent;
    }
}