<?php
require_once 'app_config.php';
if (isset($_GET["user_error"])){
   $user_error=$_GET["user_error"];//error report for user
 } else {$user_error="This page doesnt work!";
}
if (isset($_GET["system_error"])){
  $system_error=$_GET["system_error"];//error report for developer
} else {$system_error="NO ERRORS REPORT";
}
?>
<!doctype html>
<html>
 <head>
 <meta charset="utf-8">
 <title>Страница ошибки</title>
  <link href="css/phpMM.css" rel="stylesheet" type="text/css">
 </head>

 <body>
  <div id="header"><h1>PHP & MySQL: The Missing Manual</h1></div>
  <div id="example">Извините</div>

  <div id="content">
    <h1>Нам очень жаль...</h1>
    <p><img src="images/error.jpg" class="error">...но что-то пошло не так. <span class="error_message"><?php echo $user_error;?> </span></p>
	<p>Не волнуйтесь, мы в курсе происходящего и предпримем необходимые меры. Если Вы хотите связаться с нами и узнать подробности произошедшего, пришлите нам <a href="mailto:info@mail.com">сообщение</a>, и мы непременно откликнемся.</p>
    <p>А сейчас, если вы желаете вернуться на страницу, ставшую причиной проблемы, можете щелкнуть <a href="javascript:history.go(-1);">здесь.</a> Если возникнет такая же проблема, вернитесь на страницу чуть позже. Уверены, что к тому времени мы во всем разберемся. Еще раз спасибо... надеемся на ваше скорое возвращение. И еще раз извините за причиненные неудобства.</p>  


<?php debug_print ("<p> System error: <b>$system_error</b></p> "); ?>
</div>
  <div id="footer"></div>                                         
 </body>
</html>
