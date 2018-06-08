<?php

namespace iframe;

/**
 * Description of Router
 * Статичный Маршрутизатор
 * @param $routes - таблица всех маршрутов сайта
 * @param $route - текущий маршрут сайта
 * @method matchRoute Принимает url адрес и ищет соответствие в таблице маршрутов
 * @method dispatch Вызывает метод matchRoute и в зависимости от того, что он вернет (true/false),
 * возвращает соотвутствующий контроллер или ошибку 404.
 * Метод dispatch вызывается внутри конструктора основного класса App, в качестве параметра ему передается 
 * строка пользовательского url запроса $query.
 * @method upperCamelCase Преобразует строку запроса (some-line, some_Line и т.д.) в соединенные слова с первой буквой в верхнем регистре (SomeLine).
 * @method lowerCamelCase Превращает строку запроса в someLine.
 */
class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static function getRoute(){
        return self::$route;
    }

    public static function dispatch($url){
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if(class_exists($controller)){
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($controllerObject, $action)){
                    $controllerObject->$action();
                }else{
                    throw new \Exception("Метод $controller::$action не найден", 404);
                }
            }else{
                throw new \Exception("Контроллер $controller не найден", 404);
            }
        }else{
            throw new \Exception("Страница не найдена", 404);
        }
    }

    public static function matchRoute($url){
        foreach(self::$routes as $pattern => $route){
            if(preg_match("#{$pattern}#", $url, $matches)){
                foreach($matches as $k => $v){
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                }else{
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
    
    // CamelCase
    protected static function upperCamelCase($name){
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }
    
    // camelCase
    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }
}
