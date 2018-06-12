<?php

namespace app\controllers;

use iframe\base\Controller;
use app\models\AppModel;

/**
 * Description of AppController
 * Базовый контроллер сайта, наследует базовый контроллер ядра.
 * Конструктор в качестве аргумента принимает текущий маршрут сайта.
 * Внутри конструктора создается объект базового класса модели.
 */
class AppController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        new AppModel();
    }
}
