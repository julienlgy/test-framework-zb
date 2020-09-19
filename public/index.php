<?php

/**
 * ZONEBOURSE MAIN INDEX.PHP
 * 
 * DO NOT MODIFY WITHOUT PERMISSION
 * 
 * COP 2020 . V 1.0
 */

 // Setting this here
 
 require './../bin/ZBLoader.php';

 use Zonebourse\Routes;

$response = Routes::Process($_SERVER['REQUEST_URI']);

echo $response;