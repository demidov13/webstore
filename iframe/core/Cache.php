<?php

namespace iframe;

/**
 * Description of Ceche
 * Класс для работы с кэшем.
 * Использует трейт TSingletone.
 * @param $key Уникальное имя кэш-файла.
 * @param $data Данные, передаваемые в кэш-файл.
 * @param $seconds Время, на которое кешируются данные.
 * Метка времени end_time нужна для того, чтоб при получении данных из кэша 
 * можно было проверить, устарели они или нет, и в случае, если устарели - 
 * перезаписать по новой.
 */
class Cache
{
    use TSingletone;

    public function set($key, $data, $seconds = 3600){
        if($seconds){
            $content['data'] = $data;
            $content['end_time'] = time() + $seconds;
            $path = CACHE . '/' . md5($key) . '.txt';
            if(file_put_contents($path, serialize($content))){
                return true;
            }
        }
        return false;
    }

    public function get($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            $content = unserialize(file_get_contents($file));
            if(time() <= $content['end_time']){
                return $content;
            }
            unlink($file);
        }
        return false;
    }

    public function delete($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            unlink($file);
        }
    }
}
