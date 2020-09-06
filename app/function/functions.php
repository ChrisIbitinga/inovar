<?php


// FUNÇÂO PARA DEBUGAR
function dd($param =  [])
{
    echo  '<pre>';
    print_r($param);
    echo  '</pre>';
    die();
}

// FUNÇÂO PARA PEGAR VALORES DOS INPUTS E TRATAR
function get(string $param, $filter = FILTER_SANITIZE_STRING)
{
    return filter_input(INPUT_GET, $param, $filter);
}
// FUNÇÂO PARA POSTAR VALORES DOS INPUTS
function post(string $param, $filter = FILTER_SANITIZE_STRING)
{
    return filter_input(INPUT_POST, $param, $filter);
}

// PEGAR A HORA ATUAL
function getCurrentDate(string $type = 'Y-m-d H:i:s')
{
    return date($type);
}

// REDIRECIONAMENTO
function redirect(string $url)
{
    header('Location: ' . $url);
}

function arrayTree($array, int $maxColumns = 4)
{
    $tempArr  = [];
    $newArr   = [];
    $index    = 0;
    $lastItem = end($array);

    foreach ($array as $item) {
        $tempArr[] = $item;

        $index++;

        if ($index == $maxColumns || $item == $lastItem) {
            $newArr[] =  $tempArr;
            $tempArr = null;
            $index = 0;
        }
    }

    return $newArr;
}

function passwordHash(string $pass)
{
    return password_hash($pass, PASSWORD_DEFAULT);
}

function responseJson($param)
{
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($param);
}
