<?php
/**
 * Created by PhpStorm.
 * User: goodk
 * Date: 20.07.2018
 * Time: 22:25
 */

namespace app\controllers\admin;
use iframe\Cache;

class CacheController extends AppController
{

    public function indexAction(){
        $this->setMeta('Очистка кэша');
    }

    public function deleteAction(){
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();
        if($key) {
            $cache->delete('category');
            $cache->delete('webstore_menu');
        }

        $_SESSION['success'] = 'Выбранный кэш удален';
        redirect();
    }
}