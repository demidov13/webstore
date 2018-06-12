<?php

namespace app\controllers;

use \RedBeanPHP\R as R;

/**
 * Description of MainController
 *
 */

use iframe\App;

class MainController extends AppController
{
    public function indexAction(){
        $posts = R::findAll('test');
//        $post = R::findOne('test', 'id = ?', [2]);

        
        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание...', 'Ключевики...');
        $name = 'John';
        $age = 30;
        $names = ['Andrey', 'Jane',];
        $this->set(compact('name', 'age', 'names', 'posts'));
    }
    
}
