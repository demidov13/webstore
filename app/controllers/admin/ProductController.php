<?php
/**
 * Created by PhpStorm.
 * User: goodk
 * Date: 19.07.2018
 * Time: 22:36
 */

namespace app\controllers\admin;

use iframe\libs\Pagination;
use app\models\AppModel;
use app\models\admin\Product;
use iframe\App;
use \RedBeanPHP\R as R;


class ProductController extends AppController
{
    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = R::count('product');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $products = R::getAll("SELECT product.*, category.title AS cat FROM product JOIN category ON category.id = product.category_id ORDER BY product.id LIMIT $start, $perpage");
        $this->setMeta('Список товаров');
        $this->set(compact('products', 'pagination', 'count'));
    }

    public function addImageAction(){
        if(isset($_GET['upload'])){
            $wmax = App::$app->getProperty('img_width');
            $hmax = App::$app->getProperty('img_height');
            $name = $_POST['name'];
            $product = new Product();
            $product->uploadImg($name, $wmax, $hmax);
        }
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['publish'] = $product->attributes['publish'] ? 1 : 0;
            $product->attributes['hit'] = $product->attributes['hit'] ? 1 : 0;
            $product->attributes['old_price'] = $product->attributes['old_price'] ? $product->attributes['old_price'] : 0;
            $product->getImg();
            if(!$product->validate($data)){
                $product->getErrors();
                redirect();
            }

            if($product->update('product', $id)){
                $alias = AppModel::createAlias('product', 'alias', $data['title'], $id);
                $product = R::load('product', $id);
                $product->alias = $alias;
                R::store($product);
                $_SESSION['success'] = 'Изменения сохранены';
                redirect();
            }
        }

        $id = $this->getRequestID();
        $product = R::load('product', $id);
        App::$app->setProperty('parent_id', $product->category_id);
        $this->setMeta("Редактирование товара {$product->title}");
        $this->set(compact('product'));
    }

    public function addAction(){

        if(!empty($_POST)){
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['publish'] = $product->attributes['publish'] ? 1 : 0;
            $product->attributes['hit'] = $product->attributes['hit'] ? 1 : 0;
            $product->attributes['old_price'] = $product->attributes['old_price'] ? $product->attributes['old_price'] : 0;
            $product->getImg();

            if(!$product->validate($data)){
                $product->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if($id = $product->save('product')){
                $alias = AppModel::createAlias('product', 'alias', $data['title'], $id);
                $p = R::load('product', $id);
                $p->alias = $alias;
                R::store($p);
                $_SESSION['success'] = 'Товар добавлен';
            }
            redirect();
        }

        $this->setMeta('Новый товар');
    }

    public function deleteAction(){
        $id = $this->getRequestID();
        $product = R::load('product', $id);
        R::trash($product);
        $_SESSION['success'] = 'Продукт удален';
        redirect(ADMIN . '/product');
    }
}