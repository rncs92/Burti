<?php

use Burti\Core\Redirect;
use Burti\Core\Renderer;
use Burti\Core\Router;
use Burti\Core\Session;
use Burti\Core\TwigView;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once '../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

$loader = new FilesystemLoader('../app/Views');
$twig = new Environment($loader);

$routes = require_once '../routes.php';
$response = Router::route($routes);

if($response instanceof TwigView) {
    $renderer = new Renderer();

    echo $renderer->render($response);
    Session::unsetErrors();
}

if($response instanceof Redirect) {
    header('Location: '.$response->getPath());
}