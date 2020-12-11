<?php

error_reporting(-1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_COOKIE['user_email'])) {
    $_SESSION['user_email'] = $_COOKIE['user_email'];
    // var_dump($_SESSION['user_email']);
}

$url = $_GET['url'] ?? 'loja';

$route = explode('/', $url);

if (file_exists("./pages/{$route[0]}/index.php")) {
    include_once("./pages/{$route[0]}/index.php");
} else {
    include_once("./pages/loja/index.php");
}
