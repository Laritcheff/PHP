<?php
// Подключение к БД
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mismatch');
  
// Константы
define('UPLOADPATH', 'images/');
define('MAXFILESIZE', 32768);      // 32 KB
define('MAXIMGWIDTH', 120);        // 120 pixels
define('MAXIMGHEIGHT', 120);       // 120 pixels
  
 // Добавление отладки
define('DEBUG_MODE', true); 
function debug_print($message) {
	if(DEBUG_MODE) {
		echo $message;
	}
}

// Обработка ошибок
function handle_error($user_error_message, $system_error) {
	if($system_error==error_get_last()) {
		$system_error_message = 'тип ошибки = '.$system_error['type'].'<br> Ошибка: '.$system_error['message'].'<br> Файл: '.$system_error['file'].'<br>Строка: '.$system_error['line'];	
	} else {
		$system_error_message = $system_error;
	}
	header("Location: show_error.php?error_message=$user_error_message&system_error_message=$system_error_message");
	exit();	
}
?>
