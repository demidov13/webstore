<?php
/**
 * Created by PhpStorm.
 * User: goodk
 * Date: 17.07.2018
 * Time: 23:45
 */

namespace app\controllers\admin;
use \RedBeanPHP\R as R;

class MainController extends AppController
{
    public function indexAction(){
        $countNewOrders = R::count('order', "status = '0'");
        $countUsers = R::count('user');
        $countProducts = R::count('product');
        $countCategories = R::count('category');
        $this->setMeta('Панель управления');
        $this->set(compact('countNewOrders', 'countCategories', 'countProducts', 'countUsers'));
    }
}