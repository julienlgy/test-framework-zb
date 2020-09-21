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
use Zonebourse\Internal\Response;

$response = Routes::Process();

if ($response instanceof Response)
    $response->prepare();
echo $response;