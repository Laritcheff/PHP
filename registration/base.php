<?php
/*require_once 'app_config.php';
$connect=mysqli_connect(DB_HOST,USERNAME,PASSWORD,DB_NAME) or die ("ERROR");
mysqli_set_charset($connect,'utf8');

$query = "SELECT * FROM users";
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_array($result))
{
echo $row['first_name'].'<br>';
echo $row['last_name'].'<br>';
echo $row['email'].'<br>';
}*/

$im_path = $_SERVER['DOCUMENT_ROOT'].'/Lessons/registration/profile_pics/'; echo "Путь в БД:$im_path"; 

$br_path= str_replace($_SERVER['DOCUMENT_ROOT'],'', $im_path);
echo"<br>$br_path";

?>
<img src="profile_pics/1602489259-horse.jpg">