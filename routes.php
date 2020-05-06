<?php
require "Router.php";

use Routing\Router;

Router::get('/', function () {
    echo "Welcome home!";
});

Router::get('/hello', function () {
    echo "Hello there!";
});

Router::get('/greet/(\w+)', function ($name) {
    echo "Hello {$name}!";
});

Router::get('/greet/(\w+)/title/(\w+)', function ($name, $title) {
    echo "Hello {$title} {$name}!";
});

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
