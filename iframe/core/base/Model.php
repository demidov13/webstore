<?php

namespace iframe\base;

use iframe\Db;
use Valitron\Validator;
use \RedBeanPHP\R as R;

/**
 * Description of Model
 * Базовый класс модели ядра CMS.
 * Создает объект класса Db, использующего трейт Tsingletone
 * @property array $attributes Массив свойств модели, которые соответствуют полям из БД.
 * @property array $errors Массив ошибок.
 * @property array $rules Массив для хранения правил валидации данных.
 */
abstract class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct(){
        Db::instance();
    }

    public function load($data){
        foreach($this->attributes as $name => $value){
            if(isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    public function save($table){
        $tbl = R::dispense($table);
        foreach($this->attributes as $name => $value){
            $tbl->$name = $value;
        }
        return R::store($tbl);
    }

    public function validate($data){
        Validator::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);
        if($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    public function getErrors(){
        $errors = '<ul>';
        foreach($this->errors as $error){
            foreach($error as $item){
                $errors .= "<li>$item</li>";
            }
        }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }

}
