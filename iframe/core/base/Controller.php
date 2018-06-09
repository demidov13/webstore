<?php

namespace iframe\base;

/**
 * Description of Controller
 * Базовый контроллер ядра CMS.
 * @property $data свойство для хранения данных из БД и передачи их во вьюху.
 * @property $meta свойство для хранения метаданных.
 * @method set Записывает какие-то данные в массив $data
 * @method getView Создает объект класса View и вызывает его метод render.
 * @method setMeta Заполняет метаданными массив $meta.
 */
abstract class Controller
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

    public function __construct($route){
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function getView(){
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    public function set($data){
        $this->data = $data;
    }

    public function setMeta($title = '', $desc = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }
}
