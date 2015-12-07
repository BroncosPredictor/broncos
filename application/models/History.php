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
        
        return true;
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
        $almostMostRecent = $mostRecent;
        foreach( $this->all() as $record )
        {
            if( $mostRecent < $record->date )
            {
                $almostMostRecent = $mostRecent;
                $mostRecent = $record->date;
            }
        }   
        return $almostMostRecent;
    }
    
    //calculate the probability the Broncos will win the game
    public function predictGame($opponent)
    {
        $team = 'DEN';
        
        $average = $this->overallAverage($team);
        $lastFive = $this->lastAverage($team, 5);
        $lastFiveAgainst = $this->lastAverageAgainst($team, $opponent, 5);
        
        $probability = ((0.7 * $average) + (0.2 * $lastFive) + (.1 * $lastFiveAgainst)) * 100;
        
        return round($probability);
    }
    
    //calculate the average wins for a team from query result set passed
    private function getAverage($query, $team)
    {
        $count = 0;
        $winCount = 0;
        $average = 0;
        
        foreach($query as $row)
        {
            //if team is home
            if($team == $row->home)
            {
                $teamPoints = intval($row->homePts);
                $oppPoints = intval($row->awayPts);
                if($teamPoints > $oppPoints)
                    $winCount++;
            } 
            //if team is away
            else if($team == $row->away)
            {
                $teamPoints = intval($row->awayPts);
                $oppPoints = intval($row->homePts);
                if($teamPoints > $oppPoints)
                    $winCount++;
            }
            $count++;
        }
        
        //return zero to avoid divide by zero exception
        if($winCount == 0)
        {
            return 0;
        }
        
        //calculate average
        $average = $winCount / $count;
        return $average;
    }
    
    private function overallAverage($team)
    {
        $this->db->select(array('home', 'homePts', 'away', 'awayPts', 'date'))
                ->order_by('date', 'DESC')
                ->or_where('home', $team)
                ->or_where('away', $team);
        
        $query = $this->db->get($this->_tableName)->result();
        $average = $this->getAverage($query, $team);
        
        return $average;
    }
    
    private function lastAverage($team, $gameCount)
    {
        $this->db->select(array('home', 'homePts', 'away', 'awayPts', 'date'))
                ->order_by('date', 'DESC')
                ->or_where('home', $team)
                ->or_where('away', $team)
                ->limit($gameCount);
        
        $query = $this->db->get($this->_tableName)->result();
        $average = $this->getAverage($query, $team);
        
        return $average;
    }
    
    private function lastAverageAgainst($team, $opponent, $gameCount)
    {
        $where = "(home='$team' AND away='$opponent') OR (home='$opponent' AND away='$team')";
        
        $this->db->select(array('home', 'homePts', 'away', 'awayPts', 'date'))
                ->order_by('date', 'DESC')
                ->where($where)
                ->limit($gameCount);
        
        $query = $this->db->get($this->_tableName)->result();
        $average = $this->getAverage($query, $team);
        
        return $average;
    }
    
}