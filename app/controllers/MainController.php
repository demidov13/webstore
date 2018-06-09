<?php

namespace app\controllers;

/**
 * Description of MainController
 *
 */

use iframe\App;

class MainController extends AppController
{
    public function indexAction(){
//        echo __METHOD__;
        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание...', 'Ключевики...');
        
        $name = 'John';
        $age = 30;
        $names = ['Andrey', 'Jane',];
        $this->set(compact('name', 'age', 'names'));
    }
    
}
