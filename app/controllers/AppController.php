<?php

namespace app\controllers;

use iframe\base\Controller;
use app\models\AppModel;
use iframe\App;
use iframe\Cache;
use \RedBeanPHP\R as R;

/**
 * Description of AppController
 * Базовый контроллер сайта, наследует базовый контроллер ядра.
 * Конструктор в качестве аргумента принимает текущий маршрут сайта.
 * Внутри конструктора создается объект базового класса модели.
 */
class AppController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('category', self::cacheCategory());
    }
    
    public static function cacheCategory(){
        $cache = Cache::instance();
        $category = $cache->get('category');
        if(!$category){
            $category = R::getAssoc("SELECT * FROM category");
            $cache->set('category', $category);
        }
        return $category;
    }
}
