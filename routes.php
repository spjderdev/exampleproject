<?php 

$controllers = [
    'pages' => ['home', 'error'],
    'account' => ['signin', 'signup', 'register', 'login', 'logout'],
    'dashboard' => ['home', 'add'],
    'category' => ['list', 'edit']
];

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

include_once 'controllers/' . ucfirst($controller) . 'Controller.php';

$class = ucfirst($controller) . 'Controller';

if(class_exists($class)) {
    $controller = new $class;
    if(method_exists($controller, $action)) {
        if($action === 'edit' &&  $id !== null) {
            $controller -> $action($id);
        }
        else {
            $controller -> $action();
        }
    }
    else {
        $controller = 'pages';
        $action = 'error';
    }
}
else {
    $controller = 'pages';
    $action = 'error';
}