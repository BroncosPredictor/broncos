<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');

class SessionInit{
    var $CI;

    function __construct(){
        $this->CI =& get_instance();
    }

    function initializeData( $params )
    {
        foreach( $params as $key => $value )
        {
          if( !isset( $_SESSION[ $key ] ) )
          {
             $_SESSION[ $key ] = $value;
          }
        }
    }
}
