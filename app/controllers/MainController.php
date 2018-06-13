<?php

namespace app\controllers;

use \RedBeanPHP\R as R;

/**
 * Description of MainController
 * Основной контроллер сайта
 */

use iframe\App;
use iframe\Cache;

class MainController extends AppController
{
    public function indexAction(){
        
        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание...', 'Ключевики...');
 
    }
}