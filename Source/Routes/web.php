<?php
$router = new \Bramus\Router\Router();

$router->setNamespace("Source\Controllers");
$router->get('/', "HomeController@index");

$router->run();
