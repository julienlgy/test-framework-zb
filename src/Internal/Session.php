<?php

namespace Zonebourse\Internal;

class Session {
    private $session;

    function __construct() {
        session_start();
        $this->session = $_SESSION;
    }
}