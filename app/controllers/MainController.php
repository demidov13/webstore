<?php

namespace app\controllers;

use \RedBeanPHP\R as R;

/**
 * Description of MainController
 *
 */

use iframe\App;
use iframe\Cache;

class MainController extends AppController
{
    public function indexAction(){
        $posts = R::findAll('test');
        
        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание...', 'Ключевики...');
        $name = 'John';
        $age = 30;
        $names = ['Andrey', 'Jane',];
        $this->set(compact('name', 'age', 'names', 'posts'));
        
        $cache = Cache::instance();
//        $cache->set('test', $names);
//        $cache->delete('test');
        $data = $cache->get('test');
        if(!$data){
            $cache->set('test', $names);
        }
        debug($data);
    }
    
}
