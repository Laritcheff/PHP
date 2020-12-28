<?php
require_once 'startsession.php';
require_once 'app_config.php';
$title = 'Несоответствия. Просмотр профиля';
require_once 'head.php';
require_once 'nav.php';

// Подключение к БД
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or handle_error("Возникла проблема с подключением к базе данных.", error_get_last()); 
mysqli_set_charset($connect, 'UTF8');

// Вывод данных из БД
if (!isset($_GET['user_id'])) {
	$query = "SELECT username, first_name, last_name, gender, birthdate, city, picture FROM mismatch_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
} else {
	$query = "SELECT username, first_name, last_name, gender, birthdate, city, picture FROM mismatch_user WHERE user_id = '" . $_GET['user_id'] . "'";
}
$data = mysqli_query($connect, $query);

// Вывод данных о пользователе
if (mysqli_num_rows($data) == 1) { 
	$row = mysqli_fetch_array($data);
    echo '<table>';
    if (!empty($row['username'])) {
		echo '<tr><td class="label">Логин:</td><td>' . $row['username'] . '</td></tr>';
    }  // логин
    if (!empty($row['first_name'])) {
		echo '<tr><td class="label">Имя:</td><td>' . $row['first_name'] . '</td></tr>';
    } // имя
    if (!empty($row['last_name'])) {
      echo '<tr><td class="label">Фамилия:</td><td>' . $row['last_name'] . '</td></tr>';
    } // фамилия
    if (!empty($row['gender'])) {
		echo '<tr><td class="label">Пол:</td><td>';
		if ($row['gender'] == 'M') {
			echo 'Муж.';
		} else if ($row['gender'] == 'F') {
			echo 'Жен.';
		} else {
			echo '?';
		}
		echo '</td></tr>';
    } // пол
    if (!empty($row['birthdate'])) {
		if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
		// показываем пользователю его день рождения
			echo '<tr><td class="label">День рождения:</td><td>' . $row['birthdate'] . '</td></tr>';
		} else {
        // показываем только год рождения всем остальным
			list($year, $month, $day) = explode('-', $row['birthdate']);  // explode('разделитель', строка) - разбивает строку на массив строк с помощью разделителя
			echo '<tr><td class="label">Год рождения:</td><td>' . $year . '</td></tr>';
		}
    } // день рождения
    if (!empty($row['city'])) {
		echo '<tr><td class="label">Город:</td><td>' . $row['city'] . '</td></tr>';
    } // город
    if (!empty($row['picture'])) {
		echo '<tr><td class="label">Фото:</td><td><img src="' . UPLOADPATH . $row['picture'] . '" alt="Фото профиля"></td></tr>';
    } // фото
    echo '</table>';
	
    if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
		echo '<p>Вы хотите <a href="editprofile.php">отредактировать ваш профиль</a>?</p>';
    }
} // конец вывода инфо о пользователе
  else {
	  handle_error('Возникла проблема с отображением Вашего профиля.', 'Проблема с выводом профиля '.$_SESSION['user_id']);
}

mysqli_close($connect);
?>
</body> 
</html>
