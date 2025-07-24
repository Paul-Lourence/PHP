<?php 
$routes = [

    "/" => "controllers/index.php",
    "/About" => "controllers/about.php",
    "/Contact" => "controllers/contact.php",
];

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

function routeToController($uri, $routes) {
    
    if (array_key_exists($uri, $routes)) {

        require $routes[$uri];

    } else {

        abort();

    }

}

function abort($code = 404) {
    http_response_code($code);

    require "view/partials/{$code}.php";

    die();

}

routeToController($uri, $routes);