<?php
/**
 * Created by PhpStorm.
 * User: goodk
 * Date: 09.07.2018
 * Time: 19:21
 */

namespace app\controllers;

use app\models\User;


class UserController extends AppController
{
    public function signupAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if ($user_id = $user->save('user')) {
                    $_SESSION['success'] = 'Регистрация прошла успешно.';
                    $_SESSION['user']['id'] = $user_id;
                    foreach ($data as $k => $v) {
                        if ($k != 'password') $_SESSION['user'][$k] = $v;
                    }
                } else {
                    $_SESSION['error'] = 'Ошибка!';
                }
            }
            redirect();
        }
        $this->setMeta('Регистрация');
    }

    public function loginAction()
    {
        $this->setMeta('Вход');
        if (empty($_POST)) {
            return;
        }
        $user = new User();
        if ($user->login()) {
            $_SESSION['success'] = 'Вы успешно авторизованы';
        } else {
            $_SESSION['error'] = 'Логин/пароль введены неверно';
        }
        if (User::isAdmin()) {
            redirect(ADMIN);
        }
        redirect();
    }


    public
    function logoutAction()
    {
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }
}