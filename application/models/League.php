<?php
/**
 * Description of Standing
 *
 * @author Georgi
 */
class League extends MY_Model
{
    /*
    var $data = array(
        array( 'id' => '1',  'code' => 'MIA', 'name' => 'Miami Dolphins',       'conf' => 'AFC', 'group' => 'East',  'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-23', 'touchdowns' => '6',  'streak' => '2L' ),
        array( 'id' => '2',  'code' => 'BUF', 'name' => 'Buffalo Bills',        'conf' => 'AFC', 'group' => 'East',  'wins' => '2', 'loses' => '1', 'ties' => '0', 'netPts' => '32',  'touchdowns' => '13', 'streak' => '1W' ),
        array( 'id' => '3',  'code' => 'NYJ', 'name' => 'New York Jets',        'conf' => 'AFC', 'group' => 'East',  'wins' => '2', 'loses' => '1', 'ties' => '0', 'netPts' => '27',  'touchdowns' => '8',  'streak' => '1L' ),
        array( 'id' => '4',  'code' => 'NE' , 'name' => 'New England Patriots', 'conf' => 'AFC', 'group' => 'East',  'wins' => '3', 'loses' => '0', 'ties' => '0', 'netPts' => '49',  'touchdowns' => '14', 'streak' => '3W' ),
        array( 'id' => '5',  'code' => 'BAL', 'name' => 'Baltimore Ravens',     'conf' => 'AFC', 'group' => 'North', 'wins' => '0', 'loses' => '3', 'ties' => '0', 'netPts' => '-14', 'touchdowns' => '7',  'streak' => '3L' ),
        array( 'id' => '6',  'code' => 'CLE', 'name' => 'Cleveland Browns',     'conf' => 'AFC', 'group' => 'North', 'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-14', 'touchdowns' => '7',  'streak' => '1L' ),
        array( 'id' => '7',  'code' => 'PIT', 'name' => 'Pittsburgh Steelers',  'conf' => 'AFC', 'group' => 'North', 'wins' => '2', 'loses' => '1', 'ties' => '0', 'netPts' => '24',  'touchdowns' => '9',  'streak' => '2W' ),
        array( 'id' => '8',  'code' => 'CIN', 'name' => 'Cincinnati Bengals',   'conf' => 'AFC', 'group' => 'North', 'wins' => '3', 'loses' => '0', 'ties' => '0', 'netPts' => '29',  'touchdowns' => '11', 'streak' => '3W' ),
        array( 'id' => '9',  'code' => 'IND', 'name' => 'Indianapolis Colts',   'conf' => 'AFC', 'group' => 'South', 'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-24', 'touchdowns' => '8',  'streak' => '1W' ),
        array( 'id' => '10', 'code' => 'TEN', 'name' => 'Tennessee Titans',     'conf' => 'AFC', 'group' => 'South', 'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '12',  'touchdowns' => '12', 'streak' => '2L' ),
        array( 'id' => '11', 'code' => 'HOU', 'name' => 'Houston Texans',       'conf' => 'AFC', 'group' => 'South', 'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-4',  'touchdowns' => '6',  'streak' => '1W' ),
        array( 'id' => '12', 'code' => 'JAC', 'name' => 'Jacksonville Jaguars', 'conf' => 'AFC', 'group' => 'South', 'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-42', 'touchdowns' => '5',  'streak' => '1L' ),
        array( 'id' => '13', 'code' => 'KC' , 'name' => 'Kansas City Chiefs',   'conf' => 'AFC', 'group' => 'West',  'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-10', 'touchdowns' => '10', 'streak' => '2L' ),
        array( 'id' => '14', 'code' => 'SD' , 'name' => 'San Diego Chargers',   'conf' => 'AFC', 'group' => 'West',  'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-17', 'touchdowns' => '8',  'streak' => '2L' ),
        array( 'id' => '15', 'code' => 'OAK', 'name' => 'Oakland Raiders',      'conf' => 'AFC', 'group' => 'West',  'wins' => '2', 'loses' => '1', 'ties' => '0', 'netPts' => '-9',  'touchdowns' => '9',  'streak' => '2W' ),
        array( 'id' => '16', 'code' => 'DEN', 'name' => 'Denver Broncos',       'conf' => 'AFC', 'group' => 'West',  'wins' => '3', 'loses' => '0', 'ties' => '0', 'netPts' => '25',  'touchdowns' => '8',  'streak' => '3W' ),
        array( 'id' => '17', 'code' => 'NYG', 'name' => 'New York Giants',      'conf' => 'NFC', 'group' => 'East',  'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '6',   'touchdowns' => '7',  'streak' => '1W' ),
        array( 'id' => '18', 'code' => 'WAS', 'name' => 'Washington Redskins',  'conf' => 'NFC', 'group' => 'East',  'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-4',  'touchdowns' => '6',  'streak' => '1L' ),
        array( 'id' => '19', 'code' => 'PHI', 'name' => 'Philadelphia Eagles',  'conf' => 'NFC', 'group' => 'East',  'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-5',  'touchdowns' => '7',  'streak' => '1W' ),
        array( 'id' => '20', 'code' => 'DAL', 'name' => 'Dallas Cowboys',       'conf' => 'NFC', 'group' => 'East',  'wins' => '2', 'loses' => '1', 'ties' => '0', 'netPts' => '0',   'touchdowns' => '9',  'streak' => '1L' ),
        array( 'id' => '21', 'code' => 'DET', 'name' => 'Detroit Lions',        'conf' => 'NFC', 'group' => 'North', 'wins' => '0', 'loses' => '3', 'ties' => '0', 'netPts' => '-27', 'touchdowns' => '8',  'streak' => '3L' ),
        array( 'id' => '22', 'code' => 'CHI', 'name' => 'Chicago Bears',        'conf' => 'NFC', 'group' => 'North', 'wins' => '0', 'loses' => '3', 'ties' => '0', 'netPts' => '-59', 'touchdowns' => '4',  'streak' => '3L' ),
        array( 'id' => '23', 'code' => 'MIN', 'name' => 'Minnesota Vikings',    'conf' => 'NFC', 'group' => 'North', 'wins' => '2', 'loses' => '1', 'ties' => '0', 'netPts' => '10',  'touchdowns' => '7',  'streak' => '2W' ),
        array( 'id' => '24', 'code' => 'GB' , 'name' => 'Green Bay Packers',    'conf' => 'NFC', 'group' => 'North', 'wins' => '3', 'loses' => '0', 'ties' => '0', 'netPts' => '28',  'touchdowns' => '11', 'streak' => '3W' ),
        array( 'id' => '25', 'code' => 'NO' , 'name' => 'New Orleans Saints',   'conf' => 'NFC', 'group' => 'South', 'wins' => '0', 'loses' => '3', 'ties' => '0', 'netPts' => '-24', 'touchdowns' => '7',  'streak' => '3L' ),
        array( 'id' => '26', 'code' => 'TB' , 'name' => 'Tampa Bay Buccaneers', 'conf' => 'NFC', 'group' => 'South', 'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-31', 'touchdowns' => '5',  'streak' => '1L' ),
        array( 'id' => '27', 'code' => 'CAR', 'name' => 'Carolina Panthers',    'conf' => 'NFC', 'group' => 'South', 'wins' => '3', 'loses' => '0', 'ties' => '0', 'netPts' => '23',  'touchdowns' => '8',  'streak' => '3W' ),
        array( 'id' => '28', 'code' => 'ATL', 'name' => 'Atlanta Falcons',      'conf' => 'NFC', 'group' => 'South', 'wins' => '3', 'loses' => '0', 'ties' => '0', 'netPts' => '17',  'touchdowns' => '10', 'streak' => '3W' ),
        array( 'id' => '29', 'code' => 'STL', 'name' => 'St. Louis Rams',       'conf' => 'NFC', 'group' => 'West',  'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-17', 'touchdowns' => '5',  'streak' => '2L' ),
        array( 'id' => '30', 'code' => 'SF' , 'name' => 'San Francisco 49ers',  'conf' => 'NFC', 'group' => 'West',  'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '-48', 'touchdowns' => '5',  'streak' => '2L' ),
        array( 'id' => '31', 'code' => 'SEA', 'name' => 'Seattle Seahawks',     'conf' => 'NFC', 'group' => 'West',  'wins' => '1', 'loses' => '2', 'ties' => '0', 'netPts' => '13',  'touchdowns' => '7',  'streak' => '1W' ),
        array( 'id' => '32', 'code' => 'ARI', 'name' => 'Arizona Cardinals',    'conf' => 'NFC', 'group' => 'West',  'wins' => '3', 'loses' => '0', 'ties' => '0', 'netPts' => '77',  'touchdowns' => '17', 'streak' => '3W' )
    );
     */
    
    var $cache;
    
    public function __construct()
    {
        parent::__construct();
        $this->cache = NULL;
    }
    
    static function cmp( $a, $b )
    {
        return intval( $b->date ) - intval( $a->date );
    }
    
    public function recalculate()
    {
        $this->load->model('history');
        $games = $this->history->all();
        usort( $games, 'League::cmp' );
        
        $teams = parent::all();
        
        foreach( $teams as $team )
        {
            $for = 0;
            $against = 0;
            $wins = 0;
            $losses = 0;
            $ties = 0;
            $streak = 0;
            $streakType = 'None';
            
            foreach( $games as $game )
            {
                if( $game->home == $team->code )
                {
                    $for += $game->homePts;
                    $against += $game->awayPts;
                    $gameOutcome = $game->homePts - $game->awayPts;
                }
                
                if( $game->away == $team->code )
                {
                    $for += $game->awayPts;
                    $against += $game->homePts;
                    $gameOutcome = $game->awayPts - $game->homePts;
                }
                
                if( $game->home == $team->code || $game->away == $team->code  )
                {
                    if( $gameOutcome > 0 )
                        $gameOutcome = 'Win';
                    else if( $gameOutcome < 0 )
                        $gameOutcome = 'Loss';
                    else
                        $gameOutcome = 'Tie';
                    
                    if( $streakType == 'None' )
                        $streakType = $gameOutcome;
                    
                    switch( $gameOutcome )
                    {
                        case 'Win':
                            ++$wins;
                            break;
                        case 'Loss':
                            ++$losses;
                            break;
                        case 'Tie':
                            ++$ties;
                    }
                    
                    if( $streakType == $gameOutcome )
                        ++$streak;
                    else
                        $streakType = substr( $streakType, 0, 1 );
                }
            }
            $streakType = substr( $streakType, 0, 1 );
            
            $team->netPts = $for - $against;
            $team->wins   = $wins;
            $team->loses  = $losses;
            $team->ties   = $ties;
            $team->streak = $streakType . $streak;
            
            $this->update( $team );
        }
    }
    
    public function all()
    {
        if( $this->cache != NULL )
            return $this->cache;
        
        if( $_SESSION['standingDataSource'] == 'Remote Server' )
        {
            $xmlStr = file_get_contents( 'http://nfl.jlparry.com/standings' );
            $this->cache = League::translateXML( $xmlStr );
        }
        else
        {
            $this->cache = parent::all();
        }
        
        return $this->cache;
    }
    
    public function clearCache()
    {
        $this->cache = NULL;
    }
    
    private static function translateXML( $xmlStr )
    {
        
        $standings = simplexml_load_string( $xmlStr );
        $data = array();
        $curID = 1;
        foreach( $standings->team as $team )
        {
            $dataElement = new stdClass();
            $dataElement->id     = $curID++;
            $dataElement->code   = $team['code'];
            $dataElement->name   = $team->fullname;
            $dataElement->conf   = $team['conference'];
            $divStr = mb_substr($team['division'], 2, 1);
            foreach( League::getGroups() as $group )
            {
                if(strncasecmp( $divStr, $group, 1 ) == 0 )
                   $dataElement->div = $group;
            }
            $dataElement->wins   = $team->totals->wins;
            $dataElement->loses  = $team->totals->losses;
            $dataElement->ties   = $team->totals->ties != null ? $team->totals->ties : '0';
            $dataElement->netPts = $team->totals->net;
            $dataElement->streak = '-';
            $data[] = $dataElement;
       }
       return $data;
    }
    
    public function getByConf( $conf )
    {
        $records = array();
        foreach( $this->all() as $record )
            if( $record->conf == $conf )
                $records[] = $record;
        return $records;
    }
    
    public function getByConfGroup( $conf, $group )
    {
        $records = array();
        foreach( $this->all() as $record )
            if( $record->conf == $conf && $record->div == $group )
                $records[] = $record;
        return $records;
    }
    
    public static function getConferences()
    {
        return array( 'AFC', 'NFC' );
    }
    
    public static function getGroups()
    {
        return array( 'East', 'North', 'South', 'West' );
    }
    
    public function getPredictionTeams()
    {
        $this->db->select('code')->order_by('code', 'ASC');
        $query = $this->db->get($this->_tableName)->result();
                
        foreach( $query as $record )
            if( $record->code != "DEN" )
                $records[] = $record;
        return $records;
    }
}
