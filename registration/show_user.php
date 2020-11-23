<?php 
require_once 'app_config.php';
$connect=mysqli_connect(DB_HOST,USERNAME,PASSWORD,DB_NAME) or handle_error("DB ERORR!", error_get_last());

mysqli_set_charset($connect,'utf8');
$user_id=$_GET['user_id'];//передаца данных о ползователе профиль которого нада загрузить
$query = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($connect, $query) or handle_error("DB ERORR!", mysqli_error($connect));
$row = mysqli_fetch_array($result);
if ($row) {
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$email=$row['email'];
$facebook = $row['facebook'];
$twitter = $row['twitter'];
$bio =$row['bio'];
$user_image= web_path($row['user_image']);
} else {
	handle_error("USER NOT FOUND", "USER ID $user_id NOT FOUND");
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Информация о пользователе</title>
<link href="css/phpMM.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="header"><h1>PHP & MySQL: The Missing Manual</h1></div>
<div id="example">Профиль</div>

<div id="content">
	<div class="user_profile">
		<h1><?php echo "$first_name $last_name";?></h1>   
		<p>
			<img src="<?php echo $user_image; ?>" class="user_pic">
			<?php echo $bio;?>
		</p>
		<p class="contact_info">Поддерживайте связь с <?php echo "$first_name"; ?>:</p>
		<ul>
			<li>...по <a href="mailto:<?php echo $email;?>">электронной почте </a></li>
			<li>...посетив <a href="<?php echo $facebook; ?>">страницу на Facebook</a></li>
			<li>...читая <a href="<?php echo $twitter; ?>">сообщения в Twitter</a></li>
		</ul>
	</div>
</div>

<div id="footer"></div>
</body>
</html>