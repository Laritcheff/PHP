<?php
require_once 'startsession.php';
require_once 'app_config.php';
$title = 'Несоответствия. Там, где сходятся противоположности!';
require_once 'head.php';
// Создание гиперссылок
require_once 'nav.php';

// Подключение к БД
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or handle_error("Возникла проблема с подключением к базе данных.", error_get_last()); 
mysqli_set_charset($connect, 'UTF8');

// Извлечение записей из БД  
$query = "SELECT user_id, first_name, picture FROM mismatch_user WHERE first_name IS NOT NULL ORDER BY join_date DESC";  
$data = mysqli_query($connect, $query);

// Вывод данных из БД
echo '<h4>Новые члены сообщества:</h4>';
echo '<table>';
while ($row = mysqli_fetch_array($data)) {
	if (is_file(UPLOADPATH . $row['picture']) && filesize(UPLOADPATH . $row['picture']) > 0) {
		echo '<tr><td><img src="' . UPLOADPATH . $row['picture'] . '" alt="' . $row['first_name'] . '"></td>';
    } else {
		echo '<tr><td><img src="' . UPLOADPATH . 'nopic.jpg' . '" alt="' . $row['first_name'] . '"></td>';
    }
	if(isset($_SESSION['user_id'])) {
		echo '<td><a href="viewprofile.php?user_id='. $row['user_id'] . '">' . $row['first_name'] . '</a></td></tr>';
		
	} else {
		echo '<td>' . $row['first_name'] . '</td></tr>';
	}    
}  // конец while
echo '</table>';

mysqli_close($connect);
?>

</body> 
</html>
