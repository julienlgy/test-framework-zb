<?php

namespace Zonebourse;

use Zonebourse\Controller;

class Routes {

    static function Routes() {
        return [
            "/" => [Controller\HomeController::class, 'Home'],
            "/article/{idArticle:integer}" => [Controller\ArticleController::class, 'Article']
        ];
    }
    
    static function Get($url) {
        $routes = self::Routes();
        foreach($routes as $route => $infos) {
            if (fnmatch(preg_replace('/\{([^\}]*)\}/', "*", $route), $url, FNM_PATHNAME)) {
                return $infos;
            }
        }
        return null;
    }

    static function Process($url) {
        if (strpos($url,"?"))
            $url = substr($url, 0, (strpos($url,"?")));
        $c = self::Get($url) ?? null;
        if ($c) {
            $o = new $c[0]();
            try {
                return $o->{"route".$c[1]}();
            } catch (\Exception $e) {
                // log exception
                return "500";
            }
        }
        return "404";
    }
}