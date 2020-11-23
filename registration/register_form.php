<?php
ob_start();
require_once 'app_config.php';
$connect=mysqli_connect(DB_HOST, USERNAME, PASSWORD, DB_NAME) or handle_error("DB ERORR!", error_get_last());

$first_name=trim($_POST['first_Name']);
$last_name=trim($_POST['last_Name']);
$email=trim($_POST['email']);
$facebook=trim($_POST['facebook']);
$position=strpos($facebook, "http");
$position_ru=strpos($facebook, "facebook.ru");
if ($position_ru !==false){
  $facebook=str_replace("facebook.ru","facebook.com",$facebook);
}
$position2=strpos($facebook, "facebook.com");

if ($position===0){
    
}
elseif($position2===false){
  $facebook='https://www.facebook.com/'.$facebook;
}
else{
    $facebook="http://www.".$facebook;
}

$twitter=trim($_POST['twitter']);
$position_twitter=strpos($twitter,"@");
if($position_twitter===false){
    $twitter='http://www.twitter.com/'.$twitter;
}
else{
    $twitter='http://www.twitter.com/'.substr($twitter, $position_twitter+1);
}
$bio=trim($_POST['bio']);

$img=$_FILES['user_image'];
$upload_dir=HOST_ROOT.'Lessons/registration/profile_pics/';
//cheking errors
$php_errors=array(
  1=>"Превышен max размер файла PHP.INI",
  2=>"Превышен max размер файла HTML",
  3=>"Отправлена часть файла",
  4=>"Файл для отправки не выбран");


if($img['error']!=0){
  handle_error('FILE LOADING ERROR',$php_errors[$img['error']]);
}
else{
  @is_uploaded_file($img['tmp_name']) or handle_error('File type error','file type error!');
  @getImagesize($img['tmp_name']) or handle_error('File is not a image','File is not a image');
//присвоение файлу уникального имени
$now=time();
while(file_exists($upload_file=$upload_dir.$now.'-'.$img['name'])){
  $now++;
}
//перемещение файла в постоянную директорию
move_uploaded_file($img['tmp_name'], $upload_file) or handle_error('LOAD FILE ERROR', "LOAD FILE ERROR!!!$upload_file");
}


mysqli_set_charset($connect, "UTF8");// установка кодировки.
$query="INSERT INTO users(first_name, last_name, email,facebook, twitter,bio,user_image)
VALUES('$first_name','$last_name','$email','$facebook','$twitter','$bio','$upload_file')";
mysqli_query($connect, $query) or handle_error('Request error',mysqli_error($connect));

//show_user.php connection
header("Location:show_user.php?user_id=".mysqli_insert_id($connect));
exit();
    ?>
</body>
</html>