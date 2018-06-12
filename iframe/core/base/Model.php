<?php

namespace iframe\base;

use iframe\Db;

/**
 * Description of Model
 * Базовый класс модели ядра CMS.
 * Создает объект класса Db, использующего трейт Tsingletone
 * @property array $attributes Массив свойств модели, которые соответствуют полям из БД.
 * @property array $errors Массив ошибок.
 * @property array $rules Массив для хранения правил валидации данных.
 */
class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct(){
        Db::instance();
    }

}
