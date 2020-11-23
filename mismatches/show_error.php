<?php
require_once 'app_config.php';
if(isset($_REQUEST['error_message'])) {
	$error_message = $_REQUEST['error_message'];
} else {
	$error_message = "Вы здесь оказались из-за сбоя в работе программы.";
}
if(isset($_REQUEST['system_error_message'])) {
	$system_error_message = $_REQUEST['system_error_message']; 
} else {
	$system_error_message = "Сообщения о системных ошибках отсутствуют.";
}
?>
<!doctype html>
<html>
 <head>
 <meta charset="utf-8">
 <title>Страница ошибки</title>
  <link href="styles/style.css" rel="stylesheet" type="text/css">
 </head>

 <body>
 <div class="wrapper">
  <h1>Несоответствия</h1>

  <div id="content">
    <h2>Нам очень жаль...</h2>
    <p><img src="images/error.jpg" class="error">...но что-то пошло не так. <span class="error_message"><?php echo $error_message; ?> </span></p>
	<p>Не волнуйтесь, мы в курсе происходящего и предпримем необходимые меры. Если Вы хотите связаться с нами и узнать подробности произошедшего, пришлите нам <a href="mailto:info@mail.com">сообщение</a>, и мы непременно откликнемся.</p>
    <p>А сейчас, если вы желаете вернуться на страницу, ставшую причиной проблемы, можете щелкнуть <a href="javascript:history.go(-1);">здесь.</a> Если возникнет такая же проблема, вернитесь на страницу чуть позже. Уверены, что к тому времени мы во всем разберемся. Еще раз спасибо... надеемся на ваше скорое возвращение. И еще раз извините за причиненные неудобства.</p>  
  <?php
debug_print("<hr> <p>Было получено следующее сообщение об ошибке системного уровня: <b>$system_error_message</b> </p>");
?> 
</div>
  <div id="footer"></div>
</div>  
 </body>
</html>
