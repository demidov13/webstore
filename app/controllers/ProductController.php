<?php

namespace app\controllers;

/**
 * Description of ProductController
 *
 */

use app\models\Product;
use app\models\Breadcrumbs;
use \RedBeanPHP\R as R;

class ProductController extends AppController
{
    public function viewAction(){
        $alias = $this->route['alias'];
        $product = R::findOne('product', "alias = ? AND publish = '1'", [$alias]);
        if(!$product){
            throw new \Exception('Страница не найдена', 404);
        }

        // хлебные крошки
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);
        
        // связанные товары
        $related = R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ? LIMIT 3", [$product->id]);

        // запись в куки запрошенного товара
        $p_model = new Product();
        $p_model->setRecentlyViewed($product->id);
        
        // просмотренные товары
         $r_viewed = $p_model->getRecentlyViewed();
        $recentlyViewed = null;
        if($r_viewed){
            $recentlyViewed = R::find('product', 'id IN (' . R::genSlots($r_viewed) . ') LIMIT 3', $r_viewed);
        }

        // галерея
        $gallery = R::findAll('gallery', 'product_id = ?', [$product->id]);
        // модификации

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'related', 'gallery', 'recentlyViewed', 'breadcrumbs'));
    }
}
