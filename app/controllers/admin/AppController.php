<?php
/**
 * Created by PhpStorm.
 * User: goodk
 * Date: 17.07.2018
 * Time: 23:45
 */

namespace app\controllers\admin;

use app\models\AppModel;
use app\models\User;
use iframe\base\Controller;

class AppController extends Controller
{
    public $layout = 'admin';

    public function __construct($route){
        parent::__construct($route);
        if(!User::isAdmin()){
            redirect(PATH);
        }
        new AppModel();
    }

    public function getRequestID($get = true, $id = 'id'){
        if($get){
            $data = $_GET;
        }else{
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;
        if(!$id){
            throw new \Exception('Страница не найдена', 404);
        }
        return $id;
    }
}