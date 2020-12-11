<?php
/* TODO */
/* Fazer tratativa de erros no insert do db */
/* Montar função para o update */

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

require 'dbConnection.php';

function isMethodValid($method, $allowedMethods)
{
    return in_array($method, $allowedMethods);
}

function isResourceValid($resource, $allowedResources)
{
    return in_array($resource, $allowedResources);
}

function encryptPassword($dataArray)
{
    $encryptedPassword = password_hash($dataArray['password'], PASSWORD_DEFAULT, ['cost' => 12]);
    $dataArray['password'] = $encryptedPassword;
    return $dataArray;
}

function insert($resource, $data)
{

    $dataArray = array_key_exists('password', $data) ? encryptPassword($data) : $data;

    $columns = implode(', ', array_keys($dataArray));
    $amountValues = trim(str_repeat('?, ', count($dataArray)), ', ');

    $sql = "INSERT INTO {$resource} ({$columns}) VALUES ({$amountValues})";
    $result = conn()->prepare($sql);
    $result->execute(array_values($dataArray));

    // return array_values($data);
    return $result->errorInfo();
}

function select($resource, $id, $password)
{
    if (isLogin($id)) {
        $sql = "SELECT * FROM {$resource} WHERE email = :id AND active = 1";
    } else {
        $sql = $id ? "SELECT * FROM {$resource} WHERE id = :id AND active = 1" : "SELECT * FROM {$resource} WHERE active = 1";
    }

    $result = conn()->prepare($sql);
    $result->bindValue(':id', $id);
    $result->execute();
    $user = $result->fetchAll(PDO::FETCH_OBJ);

    if (isLogin($id)) {
        if (!isValidPassword($password, $user[0]->password)) {
            return [
                'status' => 'error',
                'message' => 'Username or password incorrect',
            ];
        }
    }

    return [
        'status' => 'success',
        'data' => $user,
    ];
}

function update($resource, $data, $id)
{
    $updateString = '';

    $dataArray = $data;
    $dataArray['id'] = $id;

    $columnsArray = array_keys($data);

    for ($i = 0; $i < count($columnsArray); $i++) {
        if ($i == 0) {
            $updateString .= "{$columnsArray[$i]} = :{$columnsArray[$i]}";
        } else {
            $updateString .= ", {$columnsArray[$i]} = :{$columnsArray[$i]}";
        }
    }

    $sql = "UPDATE {$resource} SET {$updateString} WHERE id = :id";
    $result = conn()->prepare($sql);

    foreach ($dataArray as $key => $value) {
        $result->bindValue(':' . $key, $value);
    }

    $result->execute();

    return $result->errorInfo();
}

function exclude($resource, $id = null)
{
    $sql = "UPDATE {$resource} SET active = 0 WHERE id = :id";
    $result = conn()->prepare($sql);
    $result->bindValue(':id', $id);
    $result->execute();

    return $result->errorInfo();
}

function isLogin($data)
{
    return strstr($data, '@');
}

function isValidPassword($password, $hash)
{
    return password_verify($password, $hash);
}

function mountLoginObject($obj, $insertedPassword)
{
    return (object) [
        'id' => $obj->id,
        'full_name' => $obj->full_name,
        'email' => $obj->email,
        'cpf' => $obj->cpf,
        'phone' => $obj->phone,
        'avatar' => $obj->avatar,
        'image' => $obj->id,
        'created_at' => $obj->created_at,
        'updated_at' => $obj->updated_at,
        'active' => $obj->active,
        'validLogin' => isValidPassword($insertedPassword, $obj->password),
    ];
}
