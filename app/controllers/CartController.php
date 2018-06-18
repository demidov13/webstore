<?php

namespace app\controllers;

/**
 * Description of CartController
 *
 */

use app\models\Cart;
use \RedBeanPHP\R as R;

class CartController extends AppController
{
    public function addAction(){
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        $mod_id = !empty($_GET['mod']) ? (int)$_GET['mod'] : null;
        $mod = null;
        if($id){
            $product = R::findOne('product', 'id = ?', [$id]);
            if(!$product){
                return false;
            }
            if($mod_id){
                $mod = R::findOne('modification', 'id = ? AND product_id = ?', [$mod_id, $id]);
            }
        }
        
        /**
         * Если запрос пришел через ajax, вызываем методы для формирования
         * модального окна корзины. А если не через ajax, перенаправляем
         * пользователя на предыдущую страницу.
         */
        $cart = new Cart();
        $cart->addToCart($product, $qty, $mod);
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        redirect();
    }
}
