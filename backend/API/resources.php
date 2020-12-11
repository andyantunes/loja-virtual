<?php

require './functions/functions.php';

function get($resource, $id = null, $password = null)
{
    $result = select($resource, $id, $password);
    if ($result) {
        echo (json_encode($result));

        //     echo (json_encode(array('status' => 'success', 'data' => $result)));
    } else {

        echo (json_encode(array('status' => 'error', 'data' => 'Nenhum registro encontrado!')));
        header('HTTP/1.1 204 No Content');
    }
}

function post($resource)
{
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data) {
        $result = insert($resource, $data);

        if ($result) {

            echo (json_encode(array('status' => 'success', 'data' => $result)));
        } else {

            echo (json_encode(array('status' => 'error', 'data' => 'Erro ao cadastrar')));
            header('HTTP/1.1 400 Bad Request');
        }
    } else {

        echo (json_encode(array('status' => 'error', 'data' => $data)));
        header('HTTP/1.1 422 Bad Request');
    }
}

function put($resource, $id)
{
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data) {
        $result = update($resource, $data, $id);

        if ($result) {

            echo (json_encode(array('status' => 'success', 'data' => $result)));
        } else {

            echo (json_encode(array('status' => 'error', 'data' => 'Erro ao atualizar')));
            header('HTTP/1.1 400 Bad Request');
        }
    } else {

        echo (json_encode(array('status' => 'error', 'data' => 'Dados insuficientes')));
        header('HTTP/1.1 422 Bad Request');
    }
}

function delete($resource, $id)
{
    $result = exclude($resource, $id);

    if ($result) {

        echo (json_encode(array('status' => 'success', 'data' => $result)));
    } else {

        echo (json_encode(array('status' => 'error', 'data' => 'Nenhum registro encontrado!')));
        header('HTTP/1.1 404 Resource Not Found');
    }
}
