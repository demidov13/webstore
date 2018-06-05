<?php

namespace iframe;

/**
 * Description of App
 * @param $app - В этом свойстве хранится объект класса Registry,
 * который, в свою очередь, является Singletone контейнером для хранения
 * различных свойств и получения их значений
 * @method getParams() - получает настройки сайта из файла config/params.php,
 * и записывает их в контейнер реестра.
 */

class App
{
    public static $app;
    
    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        self::$app = Registry::instance();
        $this->getParams();
    }
    
    protected function getParams(){
        $params = require_once CONF . '/params.php';
        if(!empty($params)){
            foreach($params as $k => $v){
                self::$app->setProperty($k, $v);
            }
        }
    }
}