<?php

namespace app\models;

/**
 * Description of Breadcrumbs
 *
 */

use iframe\App;

class Breadcrumbs
{
    public static function getBreadcrumbs($category_id, $name = ''){
        $category = App::$app->getProperty('category');
        $breadcrumbs_array = self::getParts($category, $category_id);
        $breadcrumbs = "<li><a href='" . PATH . "'>Главная</a></li>";
        if($breadcrumbs_array){
            foreach($breadcrumbs_array as $alias => $title){
                $breadcrumbs .= "<li><a href='" . PATH . "/category/{$alias}'>{$title}</a></li>";
            }
        }
        if($name){
            $breadcrumbs .= "<li>$name</li>";
        }
        return $breadcrumbs;
    }

    public static function getParts($category, $id){
        if(!$id) return false;
        $breadcrumbs = [];
        foreach($category as $k => $v){
            if(isset($category[$id])){
                $breadcrumbs[$category[$id]['alias']] = $category[$id]['title'];
                $id = $category[$id]['parent_id'];
            }else break;
        }
        return array_reverse($breadcrumbs, true);
    }

}
