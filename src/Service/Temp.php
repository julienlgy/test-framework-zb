<?php

namespace Zonebourse\Service;

function callUserFonc($user) {
    if (strtolower($user) == "remi")
        return "Bravo !";
    else
        return "Muééé !";
}