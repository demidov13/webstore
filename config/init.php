<?php

define("DEBUG", 1);                                 // Отвечает за режим работы (разработка или продакшн)
define("LAYOUT", 'default');                        // Название шаблона сайта
define("ROOT", dirname(__DIR__));                   // Определяет корневой каталог
define("WWW", ROOT . '/puplic');                    // Определяет публичный каталог
define("APP", ROOT . '/app');                       // Определяет каталог app, в котором расположены MVC
define("CORE", ROOT . '/vendor/iframe/core');       // Определяет каталог с ядром CMS
define("LIBS", ROOT . '/vendor/iframe/core/libs');  // Определяет каталог с библиотеками
define("CACHE", ROOT . '/tmp/cache');               // Определяет каталог, созданный для кэша
define("CONF", ROOT . '/config');                   // Определяет каталог с конфигурационными файлами

// Устанавливаем URL главной страницы:
// Находим путь к основному индексу http://webstore/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// Отрезаем index.php, получаем http://webstore/public/
$app_path = preg_replace('#[^/]+$#', '', $app_path);
// Отрезаем public/, получаем URL главной страницы http://webstore
$app_path = preg_replace('/public/', '', $app_path);

define("PATH", '$app_path');                        // Определяет URL главной страницы
define("ADMIN", PATH . '/admin');                   // Определяет URL панели администратора

// Подключаем автозагрузчик классов
require_once ROOT . '/vendor/autoload.php';