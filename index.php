<?php
define('DOOR_BELL', 'ring');
define('INSTALL_FOLDER', '/phpNd/plants/');
define('URL', 'http://localhost/phpNd/plants/');

//DIR autoload????
include __DIR__ . '/bootstrap.php';
//Router
Jeff\App::route();

$page = preg_replace('/[^\d]/', '', $_SERVER['REQUEST_URI']);
