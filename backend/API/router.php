<?php

// require './functions/functions.php';
require './API/resources.php';

function router($method, $resource)
{
    $allowedMethods = ['POST', 'GET', 'PUT', 'DELETE'];
    $allowedResources = ['users'];

    if (isMethodValid($method, $allowedMethods)) {

        if (isResourceValid($resource[0], $allowedResources)) {
            // echo (json_encode(array('status' => 'error', 'data' => call_user_func_array($method, $resource))));

            call_user_func_array($method, $resource);
        } else {

            echo (json_encode(array('status' => 'error', 'data' => 'Resource Not Found')));
            header('HTTP/1.1 404 Resource Not Found');
        }
    } else {

        echo (json_encode(array('status' => 'error', 'data' => 'Method Not Allowed')));
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: POST, GET', 'PUT', 'DELETE');
    }
}
