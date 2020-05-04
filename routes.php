<?php
require "Router.php";

use Routing\Router;

Router::get('/', function() {
    echo "Welcome home!";
});

Router::get('/hello', function() {
    echo "Hello there!";
});

// For no route match
Router::cleanup();