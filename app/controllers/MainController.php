<?php

namespace app\controllers;

use \RedBeanPHP\R as R;

/**
 * Description of MainController
 * Основной контроллер сайта
 * 
 */

use iframe\App;
use iframe\Cache;

class MainController extends AppController
{
    public function indexAction(){
        $universes = R::find('universe', 'LIMIT 3');
        $hits = R::find('product', "hit = '1' AND publish = '1' LIMIT 8");
        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание...', 'Ключевики...');
        $this->set(compact('universes', 'hits'));
    }
}