<?php 

namespace Core;

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "core/functions.php";

spl_autoload_register(function ($class) {

    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");

});

require base_path("bootstrap.php");

$router = new \Core\Router();
$routes = require  ("C:/laragon/www/PHP/day-two/routes.php");

$uri = parse_url($_SERVER["REQUEST_URI"])["path"]; 
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {

    $session::flash('errors', $exception->errors);
    $session::flash("old", $exception->old);


    return redirect($router->previousUrl());

}

session::unflash();   