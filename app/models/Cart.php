<?php

namespace app\models;

/**
 * Description of Cart
 *
 */

use iframe\App;

class Cart extends AppModel
{
    public function addToCart($product, $qty = 1, $mod = null){
        
        if($mod){
            $ID = "{$product->id}-{$mod->id}";
            $title = "{$product->title} ({$mod->title})";
            $price = $product->price * $mod->price_factor;
        }else{
            $ID = $product->id;
            $title = $product->title;
            $price = $product->price;
        }
        if(isset($_SESSION['cart'][$ID])){
            $_SESSION['cart'][$ID]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$ID] = [
                'qty' => $qty,
                'title' => $title,
                'alias' => $product->alias,
                'price' => $price,
                'img' => $product->img,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $price : $qty * $price;
    }
}

/* Структура массива корзины
 * [8] - $ID товара без модификатора
 * [21-2] - $ID товара с модификатором
(
    [8] => Array
        (
            [qty] => QTY
            [name] => NAME
            [price] => PRICE
            [alias] => ALIAS
            [img] => IMG
        )
    [21-2] => Array
        (
            [qty] => QTY
            [name] => NAME
            [price] => PRICE
            [alias] => ALIAS
            [img] => IMG
        )
)
    [qty] => QTY,   // Общее количество товаров
    [sum] => SUM    // Общая сумма заказа
*/