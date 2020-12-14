<?php
// Front controller
// Общие настройки - здесь мы делаем настройки, к-ые касаются всего сайта полностью
// Отображение ошибок на время разработки сайта
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Подключение файлов системы
 // используем полный путь к файлу на диске; получаем его с помощью ф-ции dirname и псевдоконстанты __FILE__
    define('ROOT', dirname(__FILE__));
    require_once ROOT.'/components/Router.php';

// Установка соединения с БД
// Вызов Router
$router=new Router();
$router->run();

?>