<?php
/* 
 * Правила маршрутизации
 * @param 'controller' - контроллер по умолчанию.
 * @param 'action' - экшн по умолчанию (используется, если не передан какой-то другой экшн)
 * 'prefix' - Дополнительное правило для админ-панели, префикс должен совпадать с именем админ папки.
 */

use iframe\Router;

// Правило для страницы продукта
Router::add('^product/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);

// Правила по умлочанию для панели управления
Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

// Правила по умлочанию для пользователей
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
