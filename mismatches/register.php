<?php
require_once 'app_config.php';

// Подключение к БД
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or handle_error("Возникла проблема с подключением к базе данных.", error_get_last());
 mysqli_set_charset($connect, 'utf8');
 if(isset($_POST['submit']))
{
	 //если форма отправлена
 	$username=mysqli_real_escape_string($connect, trim($_POST['username']));
	$password1=mysqli_real_escape_string($connect, trim($_POST['password1']));
	 //!!! в trim($_POST['password1']) было ['$password1']
	$password2=mysqli_real_escape_string($connect, trim($_POST['password2']));
		//!!! в trim($_POST['password2']) было ['$password2']
	//если все поля заплнены и пароли совпадают
	if(!empty($username) && !empty($password1) && !empty($password2) &&	($password1==$password2))
	{
		$password1=hash('ripemd128', "xx$password1");
		//проверка уникальности логина
		$query="SELECT * FROM mismatch_user WHERE username='$username'";
		$data=mysqli_query($connect,$query) OR DIE('20');
		if(mysqli_num_rows($data)==0)
		{
			//если логин уникальный
			$query="INSERT INTO mismatch_user(username, password) VALUES ('$username', '$password1')";
			mysqli_query($connect, $query) OR DIE('25');
			echo'<p>Registration successful. You may <a href ="editprofile.php">edit</a> your
			profile.</p>';
		}
			else
		{
			echo'<p>Change login.</p>';
			$username='';
		}

	}
			else
	{'<p>You should fill all fields.</p>';
  }
}else{echo"1233";}


?>

<!doctype html>
<html>
<head>
<title>Несоответствия. Регистрация</title>
<meta charset="utf-8">
<link href="styles/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<p>Создайте учетную запись в приложении "Несоответствия"</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<fieldset>
<legend>Входные данные</legend>
<label for="username">Имя пользователя:</label>
<input type="text" id="username" name="username"><br>
<label for="password1">Пароль:</label>
<input type="password" id="password1" name="password1"><br>
<label for="password2">Повторите пароль:</label>
<input type="password" id="password2" name="password2"><br>
</fieldset><br>
<input type="submit" value="Создать запись" name="submit">
</form>
</body>
</html>
