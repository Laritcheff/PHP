<?php
require_once 'app_config.php';
require_once 'startsession.php';
$error_msg='';
// Проверка логина и пароля
/*if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: Basic realm="Несоответствия"');
	exit('<h3>В доступе отказано</h3>');
}*/
if(!isset($_SESSION['user_id'])) {
	if(isset($_POST['submit'])) {
		// Подключение к БД и кодировка
		$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
				or handle_error("Возникла проблема с подключением к базе данных.", error_get_last()); 
		mysqli_set_charset($connect, 'utf8');

		// Получение введенных пользователем данных
		$login = mysqli_real_escape_string($connect, trim($_POST['username']));
		$password= mysqli_real_escape_string($connect, trim($_POST['password']));
		$password = hash('ripemd128', "xx$password");
		
		if(!empty($login) && !empty($password)) {
			// Поиск пользователя и его пароля в БД
			$query = "SELECT user_id, username FROM mismatch_user WHERE username='$login' AND password='$password'";
			$data = mysqli_query($connect, $query);

			// Если в БД найдена подходящая запись, сохраняем id и логин пользователя в переменные, если нет - повторяем аутентификацию
			if(mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_array($data);
				//$user_id = $row['user_id'];
				//$username = $row['username'];
				setcookie('user_id', $row['user_id'], time()+(60*60*24*30));
				setcookie('username', $row['username'], time()+(60*60*24*30));
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];
				$home_url = '/mismatches/index.php';				
				header("Location: $home_url");
			} else {
				$error_msg = 'Неверное сочетание имени и пароля.';
			}
		} else { 
			$error_msg = 'Заполните все поля.';
		} // end !empty($login) && !empty($password)
	} // end isset($_POST['submit'])
} // end  !isset($_COOKIE['user_id'])


$title = 'Несоответствия. Вход в приложение';
require_once 'head.php';


	if(empty($_SESSION['user_id'])) {
		echo "<p class='error'> $error_msg</p>";
	
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<fieldset>
<legend>Вход в приложение</legend>
<label for="username">Имя пользователя:</label>
<input type="text" id="username" name="username"><br>
<label for="password">Пароль:</label>
<input type="password" id="password" name="password"><br>
</fieldset><br>
<input type="submit" value="Вход" name="submit">
</form>
<?php
	} else {
		// Подтверждение успешного входа в приложение
		echo "<p class='login'>Вы вошли в приложение как ". $_SESSION['username']."</p>";
	}
?>
</body>
</html>
