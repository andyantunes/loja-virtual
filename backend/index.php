<?php

require './API/router.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if ($_GET) {
    $url = trim($_GET['url'], '/');
    $resource = explode('/', $_GET['url']);
    $method = $_SERVER['REQUEST_METHOD'];

    router($method, $resource);
} else {
    echo (json_encode(array('status' => 'error', 'data' => 'Digite um recurso')));
}
