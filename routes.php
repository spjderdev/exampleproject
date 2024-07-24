<?php 

$controllers = [
    'pages' => ['home', 'error'],
    'account' => ['signin', 'signup']
];

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

include_once 'controllers/' . ucfirst($controller) . 'Controller.php';

$class = ucfirst($controller) . 'Controller';
$controller = new $class;
$controller -> $action();