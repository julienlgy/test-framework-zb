<?php

/**
 * Internal Framework class
 * ZB 2020
 * 
 * Loading all php file components from src/*
 */

$rootDir = dirname(__FILE__).'/../src';

load($rootDir);

/**
 * Loading src/* files
 */
function load($dir) {
    foreach (scandir($dir) as $files) {
        $path = $dir . '/' . $files;
        if (is_file($path)) {
            require_once $path;
        } else {
            if ($files != "." && $files != "..") {
                load($path);
            }
        }
    }
}

/**
 * Loading vendor/Twig-2.x/* files
 */
spl_autoload_register(function ($classname) {
    $dirs = array (
        './../vendor/Twig-2.x/'
    );

    foreach ($dirs as $dir) {
        $filename = $dir . str_replace('\\', '/', $classname) .'.php';
        if (file_exists($filename)) {
            require_once $filename;
            break;
        }
    }

});