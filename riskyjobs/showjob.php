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
<?php
//require_once 'search.php';
// Подключение к БД
require_once 'app_config.php';
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or handle_error("Возникла проблема с подключением к базе данных.", error_get_last()); 
mysqli_set_charset($connect, 'UTF8');
$job_id=$_GET['job_id'];
$query="SELECT * FROM riskyjobs WHERE job_id='$job_id'";
$current_job = mysqli_query($connect, $query);
$row = mysqli_fetch_array($current_job);

    echo '<tr class="results">';
    echo '<td valign="top" width="20%">' . $row['title']. '</td>';    
    echo '<td valign="top" width="50%">' . $row['description'].'</td>';
    echo '<td valign="top" width="10%">' . $row['city'] . '</td>';
    echo '<td valign="top" width="20%">' . $row['date_posted'].'</td>';
    echo '</tr>';
    echo '</table>';
?>
</body>
</html>