<?php

namespace Zonebourse\Internal;

class Request {

    public function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getURI() {
        return $_SERVER['REQUEST_URI'];
    }

    public function get($parameter, $method = "GET") {
        switch($method) {
            case "GET":
                return $_GET[$parameter] ?? null;
            case "POST":
                return $_POST[$parameter] ?? null;
            default:
                return $_REQUEST[$parameter] ?? null;
            
        }
    }
}