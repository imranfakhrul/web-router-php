<?php
namespace Routing;

class Router {
    private static $nomatch = true;

    public static function get($pattern, $callback) {
        $pattern = "~^{$pattern}/?$~";
        $url = self::getUrl();
        
        $params = self::getMatches($pattern);

        if($params && is_callable($callback)) {
            self::$nomatch = false;
            
            $functionArguments = array_slice($params, 1);
            $callback(...$functionArguments);
        }
    }


    private static function getUrl() {
        return $_SERVER['REQUEST_URI'];
    }

    private static function getMatches($pattern) {
        $url = self::getUrl();

         return preg_match($pattern, $url, $matches) ? $matches : false;
        
    }
}