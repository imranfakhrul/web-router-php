<?php

namespace Router;

class Router
{
    private static $nomatch = true;

    public static function get($pattern, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] != 'GET') {
            return;
        }

        self::process($pattern, $callback);
    }

    public static function post($pattern, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return;
        }

        self::process($pattern, $callback);
    }

    public static function delete($pattern, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] != 'DELETE') {
            return;
        }

        self::process($pattern, $callback);
    }

    private static function process($pattern, $callback)
    {
        $pattern = "~^{$pattern}/?$~";

        $params = self::getMatches($pattern);

        if ($params) {
            self::$nomatch = false;
            $functionArguments = array_slice($params, 1);

            if (is_callable($callback)) {
                $callback(...$functionArguments);
            } else {
                $parts = explode('@', $callback);

                $callback = [$parts[0], "{$parts[1]}"];
                $callback();
            }
        }
    }

    public static function cleanup()
    {
        if (self::$nomatch) {
            echo "No route matched!";
        }
    }

    private static function getUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }

    private static function getMatches($pattern)
    {
        $url = self::getUrl();

        return preg_match($pattern, $url, $matches) ? $matches : false;
    }
}
