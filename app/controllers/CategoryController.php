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

        $filters = '';
        $sql_part = '';
        if(!empty($_GET['filter'])){
            $filters = trim($_GET['filter'], ',');
            $filters = explode(',', $filters);
            foreach ($filters as $filter) {
                if($filter == 'hit') {
                    $sql_part .= "AND hit = '1' ";
                }
                if($filter == 'publish') {
                    $sql_part .= "AND publish = '1' ";
                }
                if($filter == 'old_price') {
                    $sql_part .= "AND old_price != '0' ";
                }
            }
        }

        if(!empty($_GET['price1']) && !empty($_GET['price2'])) {
            $price1 = (int)$_GET['price1'];
            $price2 = (int)$_GET['price2'];
            if($price1 < $price2) {
                $sql_part .= "AND (price BETWEEN $price1 AND $price2) ";

            }
        }

        $total = R::count('product', "category_id IN ($ids) $sql_part");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        
        // Поиск продуктов
        $products = R::find('product', "category_id IN ($ids) $sql_part ORDER BY publish DESC LIMIT $start, $perpage");

        // Вывод отфильтрованных продуктов
        if($this->isAjax()){
            $this->loadView('filter', compact('products', 'total', 'pagination'));
        }

        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products', 'breadcrumbs', 'pagination', 'total', 'filters'));
    }
}
