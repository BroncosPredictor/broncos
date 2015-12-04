<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['post_controller_constructor'][] = array(
                                'class'    => 'SessionInit',
                                'function' => 'initializeData',
                                'filename' => 'SessionInit.php',
                                'filepath' => 'hooks',
                                'params'   => array( 'editing' => false
                                                   , 'standingLayout' => 'Division'
                                                   , 'standingOrder' => 'Net Points'
                                                   , 'standingDataSource' => 'Database' )
                                );

$hook['post_controller'][] = array(
                                'class'    => 'League',
                                'function' => 'clearCache',
                                'filename' => 'League.php',
                                'filepath' => 'models',
                                'params'   => array() );
