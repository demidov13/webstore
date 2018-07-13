<?php
/**
 * Created by PhpStorm.
 * User: goodk
 * Date: 13.07.2018
 * Time: 0:37
 */

namespace app\models;
use iframe\App;
use \RedBeanPHP\R as R;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Order extends AppModel
{
    public static function saveOrder($data){
        $order = R::dispense('order');
        $order->user_id = $data['user_id'];
        $order->note = $data['note'];
        $order_id = R::store($order);
        self::saveOrderProduct($order_id);
        return $order_id;
    }

    public static function saveOrderProduct($order_id){
        $sql_part = '';
        foreach($_SESSION['cart'] as $product_id => $product){
            $product_id = (int)$product_id;
            $sql_part .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', {$product['price']}),";
        }
        $sql_part = rtrim($sql_part, ',');
        R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price) VALUES $sql_part");
    }

    public static function mailOrder($order_id, $user_email){
        // Определение настроек для отправки писем. Transport
        $transport = (new Swift_SmtpTransport(App::$app->getProperty('smtp_host'), App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
            ->setUsername(App::$app->getProperty('smtp_login'))
            ->setPassword(App::$app->getProperty('smtp_password'))
        ;
        // Создание объекта Mailer, который использует Transport
        $mailer = new Swift_Mailer($transport);

        // Создание сообщения
        ob_start();
        require APP . '/views/mail/mail_order.php';
        $body = ob_get_clean();

        $message_client = (new Swift_Message("Вы сделали заказ №{$order_id} на сайте " . App::$app->getProperty('shop_name')))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo($user_email)
            ->setBody($body, 'text/html')
        ;

        $message_admin = (new Swift_Message("Новый заказ №{$order_id}"))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo(App::$app->getProperty('admin_email'))
            ->setBody($body, 'text/html')
        ;

        // Отправка сообщения
        $result = $mailer->send($message_client);
        $result = $mailer->send($message_admin);
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        $_SESSION['success'] = 'Заказ принят. В ближайшее время с Вами свяжется менеджер для подтверждения заказа';
    }
}