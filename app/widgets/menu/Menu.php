<?php

namespace app\widgets\menu;

/**
 * Description of Menu
 * Класс для управления менюшкой
 * @property $data для хранения данных.
 * @property $tree массив, в котором будет строиться древо данных.
 * @property $menuHtml готовый html код меню.
 * @property $tpl здесь хранится шаблон для менюшки (из папки Public).
 * @property $container контейнер для хранения меню (ul, select и т.д.).
 * @property $class для хранения html атрибута class.
 * @property $table таблица в БД, из которой выбираются данные для менюшки.
 * @property $cache время кеширования данных.
 * @property $cacheKey ключ, под которым сохраняются данные в кэше.
 * @property $attrs массив дополнительных атрибутов для менюшки.
 * @property $prepend какая-то дополнительная строка, переданная в html код.
 * 
 * @method getOptions принимает в качестве параметра доп. опции менюшки и
 * заполняет ими свойства, предназначенные для хранения этих опций.
 * @method run записывает код менюшки в кэш и достает его оттуда.
 * @method output отвечает за вывод html кода менюшки. Оборачивает код менюшки в нужные теги.
 * @method getTree строит из массива дерево родительских и дочерних элементов.
 * @method getMenuHtml в качестве параметров принимает дерево категорий и разделитель,
 * формирует html код для вывода. Разделитель нужен для построения дерева категорий
 * с помощью формы select.
 * @method catToTemplate выводит сформированный кусок html кода меню для фиксации в шаблоне.
 */

use iframe\Cache;
use iframe\App;
use RedUNIT\Base\Threeway;
use \RedBeanPHP\R as R;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'webstore_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = []){
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options){
        foreach($options as $k => $v){
            if(property_exists($this, $k)){
                $this->$k = $v;
            }
        }
    }

    protected function run(){
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if(!$this->menuHtml){
            $this->data = App::$app->getProperty('category');
            if(!$this->data){
                $this->data = $category = R::getAssoc("SELECT * FROM {$this->table}");
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if($this->cache){
                $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
            }
        }
        $this->output();
    }

    protected function output(){
        $attrs = '';
        if(!empty($this->attrs)){
            foreach($this->attrs as $k => $v){
                $attrs .= " $k='$v' ";
            }
        }
        echo "<{$this->container} class='{$this->class}' $attrs>";
            echo $this->prepend;
            echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    protected function getTree(){
        $tree = [];
        $data = $this->data;
        foreach ($data as $id=>&$node) {
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = ''){
        $str = '';
        foreach($tree as $id => $category){
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}
