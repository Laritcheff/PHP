<?php 
/* Абстрактный класс AdminBase содержит общую логику для контроллеров, которые 
используются в панели администратора */
abstract class AdminBase {

// Проверка прав доступа для администратора
    public static function checkAdmin() {
        $admin_name = '';
        $admin_pw = '';
  
        if( !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $admin_name) || ($_SERVER['PHP_AUTH_PW'] != $admin_pw) )  {
            header('HTTP/1.1 401 Unauthorized');
            header('WWW-Authenticate: Basic realm="Магазин"');
            exit('<h2>В доступе отказано.</h2>');	
        } else {
            return true;
        }

    } // end checkAdmin()
    
}

?>