<?php

/**
 * Description of Homepage
 *
 * @author Casey
 */

class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    
    function index()
    {
        $this->data['pageTitle'] = 'Home'; // use the home page title
        $this->data['pagebody'] = 'homepage'; // show the homepage view
        
        $this->data['teams'] = $this->league->getPredictionTeams();       
        
        $this->render();
    }
    
    //used to predict the outcome of the game
    function predict($opponent)
    {        
        $outcome = "";
        $result = $this->history->predictGame($opponent);
        
        //creates string for prediction read by app.js
        echo "Prediction: Broncos have a " . $result . "% chance of victory against " . $opponent . "<br/>";
        echo "<br/>Formula: ((0.7 * DEN wins / total games played) + (0.2 * DEN wins / last 5 games played) + (0.1 * DEN wins / last 5 games against " . $opponent . ")) * 100";
    }

}