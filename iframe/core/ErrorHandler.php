<?php

namespace iframe;

/**
 * Description of ErrorHandler
 * Класс обработки ошибок.
 * @func error_reporting() Определяет, какие ошибки попадают в отчет.
 * @func set_exception_handler() исключения по умлочанию вне блока try/catch.
 * Благодаря этой функции в конструкторе, класс успешно обработает исключения при их возникновении.
 * @func error_log() Отправляет сообщение об ошибке заданному обработчику ошибок.
 * @func http_response_code Получает или устанавливает код ответа HTTP.
 * @method logErrors логирование ошибки.
 * @method displayError вывод ошибки на экран.
 */
class ErrorHandler
{
    public function __construct(){
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e){
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logErrors($message = '', $file = '', $line = ''){
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line}\n=================\n", 3, ROOT . '/tmp/errors.log');
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $responce = 404){
        http_response_code($responce);
        if($responce == 404 && !DEBUG){
            require WWW . '/errors/404.php';
            die;
        }
        if(DEBUG){
            require WWW . '/errors/dev.php';
        }else{
            require WWW . '/errors/prod.php';
        }
        die;
    }
}
