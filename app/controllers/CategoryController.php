<?php

namespace app\controllers;

/**
 * Description of CategoryController
 * @var $page номер текущей страницы (для пагинации).
 * @var $perpage количество товаров, выводимых на одну страницу, 
 * второй параметр SQL условия LIMIT (для пагинации).
 * @var $start первый параметр SQL условия LIMIT (с какого товара начинается пагинация)
 * @var $total общее количество товаров для пагинации.
 */

use app\models\Category;
use app\models\Breadcrumbs;
use iframe\App;
use iframe\libs\Pagination;
use \RedBeanPHP\R as R;

class CategoryController extends AppController
{
    public function viewAction(){
        $alias = $this->route['alias'];
        $category = R::findOne('category', 'alias = ?', [$alias]);
        if(!$category){
            throw new \Exception('Страница не найдена', 404);
        }
        
        // Вывод хлебных крошек
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);
        
        // Получение id категории и ее дочерних категорий
        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);
        $ids = !$ids ? $category->id : $ids . $category->id;
        
        // Пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = R::count('product', "category_id IN ($ids)");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        
        // Вывод продуктов
        $products = R::find('product', "category_id IN ($ids) LIMIT $start, $perpage");
        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products', 'breadcrumbs', 'pagination', 'total'));
    }
}
