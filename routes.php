<?php

use Router\Router;

class Routes
{
    public static function root()
    {
        echo "Hello world! from test class";
    }

    public function hello()
    {
        echo "Hello there!";
    }

    public static function greetSomeone($name)
    {
        echo "Hello {$name}";
    }

    public static function greetWithTitle($name, $title)
    {
        echo "Hello {$title} {$name}";
    }

    public static function helloWorld()
    {
        echo "Hello/world!";
    }

    public function helloInstance()
    {
        echo "Hello from Instance method";
    }
}

Router::get('/', [Routes::class, 'root']);

Router::get('/hello', [Routes::class, 'hello']);

Router::get('/greet/(\w+)', "Routes::greetSomeone");

Router::get('/greet/(\w+)/title/(\w+)', ['Routes', 'greetWithTitle']);

Router::get('/hello/world', 'Routes@helloWorld');

Router::get('/hello/instance', 'Routes@helloInstance');

Router::get('/verb', function () {
    echo $_SERVER['REQUEST_METHOD'];
});

Router::post('/verb', function () {
    echo $_SERVER['REQUEST_METHOD'];
});

Router::delete('/verb', function () {
    echo $_SERVER['REQUEST_METHOD'];
});

// For no route match
Router::cleanup();
