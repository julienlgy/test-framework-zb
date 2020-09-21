<?php

namespace Zonebourse;

use Zonebourse\Controller;

class Routes {

    static function Routes() {
        return [
            "/" => [Controller\HomeController::class, 'Home'],
            "/article/{idArticle:integer}" => [Controller\ArticleController::class, 'Article'],
            "/about" => [Controller\HomeController::class, 'About']
        ];
    }
    
    static function Get($url) {
        $routes = self::Routes();
        foreach($routes as $route => $infos) {
            if (fnmatch(preg_replace('/\{([^\}]*)\}/', "*", $route), $url, FNM_PATHNAME)) {
                if (self::checkArgs($route, $url))
                    return $infos;
            }
        }
        return null;
    }

    static function Process() {
        $url = $_SERVER['REQUEST_URI'];
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

    static private function checkArgs($url, $rurl) {
        $checker=explode('/', $url);
        $real=explode('/',  $rurl);
        
        for ($i=0; $i<count($checker); $i++) {
            if ($checker[$i][0] == '{' && $checker[$i][strlen($checker[$i]) -1] == '}') {
                $args = explode(':', substr($checker[$i], 1, strlen($checker[$i]) -2 ));
                switch($args[1]) {
                    case "integer":
                        $real[$i] = intval($real[$i]);
                        break;
                    default:
                        $real[$i] = filter_var($real[$i]);
                }
                $_GET[$args[0]] = $real[$i];
            }            
        }
        return true;
    }
}