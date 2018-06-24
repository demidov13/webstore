<?php

namespace app\models;

/**
 * Description of Category
 * @method getIds получает id вложенных категорий
 */

use iframe\App;

class Category extends AppModel
{
    public function getIds($id){
        $category = App::$app->getProperty('category');
        $ids = null;
        foreach($category as $k => $v){
            if($v['parent_id'] == $id){
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }
        }
        return $ids;
    }
}
