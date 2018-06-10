<?php

namespace iframe\base;

/**
 * Description of Model
 * Абстрактный класс модели
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

    }

}
