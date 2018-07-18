<?php

namespace app\controllers;

/**
 * Description of SearchController
 * Т.к. скрипт js плагина typeahead ожидает данные в формате json, перед их отправкой
 * используется функция json_encode().
 *
 */

use \RedBeanPHP\R as R;

class SearchController extends AppController
{
    public function typeaheadAction(){
        if($this->isAjax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if($query){
                $products = R::getAll('SELECT id, title FROM product WHERE (title LIKE ? OR brand LIKE ?) AND publish = 1 LIMIT 11', ["%{$query}%", "%{$query}%"]);
                echo json_encode($products);
            }
        }
        die;
    }
    
    public function indexAction(){
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if($query){
            $products = R::find('product', "title LIKE ? OR brand LIKE ?", ["%{$query}%", "%{$query}%"]);
        }
        $this->setMeta('Поиск по: ' . h($query));
        $this->set(compact('products', 'query'));
    }

}
