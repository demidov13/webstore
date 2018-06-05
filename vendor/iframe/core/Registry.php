<?php

namespace iframe;

/**
 * Description of Registry
 * Используем шаблон проектирования Registry-Singletone.
 * В нем мы можем хранить свойства и получать к ним доступ.
 * Может иметь только один экземпляр класса (создан в свойстве $app класса App).
 * @param $properties - контейнер для хранения различных свойств.
 */
class Registry
{
    use TSingletone;

    protected static $properties = [];

    public function setProperty($name, $value){
        self::$properties[$name] = $value;
    }

    public function getProperty($name){
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }

    public function getProperties(){
        return self::$properties;
    }
}
