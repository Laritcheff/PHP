<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Рискованные работы - Поиск</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="page">
  <img src="images/riskyjobs_title.gif" alt="Risky Jobs">
  <img src="images/riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right">
  <h3>Рискованные работы - Результат поиска</h3>

<?php
// Получаем данные из формы
$user_search = $_GET['usersearch'];

// Создаем таблицу с результатами
echo '<table border="0" cellpadding="2">';
echo '<tr class="heading">';
echo '<td>Название работы</td><td>Описание</td><td>Город</td><td>Дата размещения вакансии</td>';
echo '</tr>';

// Подключение к БД
require_once 'app_config.php';
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or handle_error("Возникла проблема с подключением к базе данных.", error_get_last()); 
mysqli_set_charset($connect, 'UTF8');

// Получение результата запроса
$query = "SELECT * FROM riskyjobs WHERE title = '$user_search'";
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_array($result)) {
    echo '<tr class="results">';
    echo '<td valign="top" width="20%">' . $row['title'] . '</td>';
    echo '<td valign="top" width="50%">' . $row['description'] . '</td>';
    echo '<td valign="top" width="10%">' . $row['city'] . '</td>';
    echo '<td valign="top" width="20%">' . $row['date_posted'] . '</td>';
    echo '</tr>';
} 
echo '</table>';

mysqli_close($connect);
?>

</body>
</html>
