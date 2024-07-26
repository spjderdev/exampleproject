<?php 

$controllers = [
    'pages' => ['home', 'error'],
    'account' => ['signin', 'signup', 'register', 'login', 'logout'],
    'dashboard' => ['home', 'add'],
    'category' => ['list', 'edit', 'add', 'delete']
];

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}


$folders = ['admin', 'user', ''];

$class = ucfirst($controller) . 'Controller';
foreach($folders as $folder) {
    $path = $folder ? "controllers/$folder/$class.php" : "controllers/$class.php";
    if(file_exists($path)) {
        include_once $path;
        if(class_exists($class)) {
            $controller = new $class;
            if ($folder === 'admin') {
                session_start();
                if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
                    header('Location: index.php?controller=pages&action=error');
                    exit();
                }
            }
            if(method_exists($controller, $action)) {
                if(($action === 'edit' || $action === 'delete') && $id !== null) {
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
    }
}
