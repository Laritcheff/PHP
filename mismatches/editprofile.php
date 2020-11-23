<?php
session_start();
if (!isset($_SESSION['user_id'])){
	if(isset($_COOKIE['user_id'])&& isset($_COOKIE['username'])){
	  $_SESSION['user_id']=$_COOKIE['user_id'];
	  $_SESSION['username']=$_COOKIE['username'];
	  }
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Несоответствия. Редактирование профиля</title>
  <link rel="stylesheet" type="text/css" href="styles/style.css" />
</head>

<body>
  <h3>Несоответствия. Редактирование профиля</h3>

<?php
require_once 'app_config.php';
// Подключение к БД
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or handle_error("Возникла проблема с подключением к базе данных.", error_get_last());
mysqli_set_charset($connect, 'UTF8');

if (isset($_POST['submit'])) {
// Сбор новых данных из $_POST
	$first_name = trim($_POST['firstname']);
	$last_name = trim($_POST['lastname']);
	$gender = trim($_POST['gender']);
	$birthdate = trim($_POST['birthdate']);
	$city = trim($_POST['city']);
	$old_picture = trim($_POST['old_picture']);
	$new_picture = trim($_FILES['new_picture']['name']);
	$new_picture_type = $_FILES['new_picture']['type'];
	$new_picture_size = $_FILES['new_picture']['size'];
	list($new_picture_width, $new_picture_height) = getimagesize($_FILES['new_picture']['tmp_name']); // list() используется для того, чтобы присвоить списку переменных значения за одну операцию.
	$error = false;

// Проверка и загрузка новых изображений
    if (!empty($new_picture)) {
		if ((($new_picture_type == 'image/gif') || ($new_picture_type == 'image/jpeg') || ($new_picture_type == 'image/pjpeg') || ($new_picture_type == 'image/png')) && ($new_picture_size > 0) && ($new_picture_size <= MAXFILESIZE) &&
        ($new_picture_width <= MAXIMGWIDTH) && ($new_picture_height <= MAXIMGHEIGHT)) {
			// Если нет ошибок, загружаем фото
			if ($_FILES['file']['error'] == 0) {
				$target = UPLOADPATH . $new_picture;
				if (move_uploaded_file($_FILES['new_picture']['tmp_name'], $target)) {
            // Если новое фото загружено успешно, удаляем старое
					if (!empty($old_picture) && ($old_picture != $new_picture)) {
						@unlink(UPLOADPATH . $old_picture);
					} // удаление фото
				} else {
            // Если новое фото не загружено , удаляем временный файл и выводим ошибку
					@unlink($_FILES['new_picture']['tmp_name']);
					$error = true;
					handle_error('Извините, возникли проблемы с загрузкой вашего изображения.', 'Изображение не загружено');
				}
			}
		} else {
			@unlink($_FILES['new_picture']['tmp_name']);
			$error = true;
			handle_error('Ваше изображение должно быть в формате GIF, JPEG или PNG, не должно превышать '.(MAXFILESIZE / 1024).' Kб и '.MAXIMGWIDTH .'x' . MAXIMGHEIGHT . ' пикселей.' ,'Неверный формат или размер изображения.');
		}
    } // конец проверки и загрузки фото

// Обновление данных в БД
    if (!$error) {
		if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($birthdate) && !empty($city)) {
			// Если пользователь загрузил новое изображение, обновляем все данные
			if (!empty($new_picture)) {
				$query = "UPDATE mismatch_user SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', birthdate = '$birthdate', city = '$city', picture = '$new_picture' WHERE user_id = '".$_SESSION['user_id']."'";
			} else { // обновляем все данные, кроме изображения
				$query = "UPDATE mismatch_user SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', birthdate = '$birthdate', city = '$city' WHERE user_id = '".$_SESSION['user_id']."'";
			}
			mysqli_query($connect, $query);
			echo '<p>Ваш профиль успешно обновлен. Хотите перейти <a href="viewprofile.php">к его просмотру</a>?</p>';
			mysqli_close($connect);
			exit();
		} else {
			echo '<p class="error">Вы должны заполнить все поля (фото можно не добавлять).</p>';
		}
	} // конец обновления данных
} else {
// Вывод данных профиля из БД
	$query = "SELECT first_name, last_name, gender, birthdate, city, picture FROM mismatch_user WHERE user_id = '".$_SESSION['user_id']."'";;
	$data = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($data);
    if ($row != NULL) {
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$gender = $row['gender'];
		$birthdate = $row['birthdate'];
		$city = $row['city'];
		$old_picture = $row['picture'];
    } else {
		handle_error('Возникла проблема с доступом к вашему профилю','Проблема с доступом к профилю'.$_SESSION['user_id']);
    }
}

mysqli_close($connect);
?>

<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAXFILESIZE; ?>">
    <fieldset>
      <legend>Персональная информация</legend>
      <label for="firstname">Имя:</label>
      <input type="text" id="firstname" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>"><br>
      <label for="lastname">Фамилия:</label>
      <input type="text" id="lastname" name="lastname" value="<?php if (!empty($last_name)) echo $last_name; ?>"><br>
      <label for="gender">Пол:</label>
      <select id="gender" name="gender">
        <option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>Муж.</option>
        <option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>Жен.</option>
      </select><br>
      <label for="birthdate">День рождения:</label>
      <input type="text" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)) echo $birthdate; else echo 'YYYY-MM-DD'; ?>"><br>
      <label for="city">Город:</label>
      <input type="text" id="city" name="city" value="<?php if (!empty($city)) echo $city; ?>" ><br>
      <input type="hidden" name="old_picture" value="<?php if (!empty($old_picture)) echo $old_picture; ?>">
      <label for="new_picture">Фото:</label>
      <input type="file" id="new_picture" name="new_picture">
      <?php if (!empty($old_picture)) {
        echo '<img class="profile" src="' . UPLOADPATH . $old_picture . '" alt="Фото профиля">';
      } ?>
    </fieldset>
    <input type="submit" value="Сохранить профиль" name="submit">
  </form>
</body>
</html>
