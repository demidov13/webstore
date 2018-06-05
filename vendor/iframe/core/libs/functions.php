<?php
/* 
 * Служебные функции
 * @func debug() - красиво выводит массив.
 */

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}