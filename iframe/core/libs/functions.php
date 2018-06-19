<?php
/* 
 * Служебные функции
 * @func debug() - красиво выводит массив.
 * @func discount() - выводит процент скидки.
 * @func redirect() - перекидывает клиента на предыдущую или основную страницу.
 */

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function discount($oldPrice, $newPrice){
    $result = (($oldPrice - $newPrice) / $newPrice) * 100;
    echo "-".floor($result)."%";
}

function redirect($http = false){
    if($http){
        $redirect = $http;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    exit;
}

// ENT_QUOTES для преобразования одинарных кавычек
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}