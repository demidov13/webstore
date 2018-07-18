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
}