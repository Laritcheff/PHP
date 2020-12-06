<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Рискованные работы - Регистрация</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="page">
  <img src="images/riskyjobs_title.gif" alt="Risky Jobs">
  <img src="images/riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right">
  <h3>Рискованные работы - Регистрация</h3>

<?php
require_once 'app_config.php';
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or handle_error("Возникла проблема с подключением к базе данных.", error_get_last()); 
mysqli_set_charset($connect, 'UTF8');
   if (isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job = $_POST['job'];
    $resume = $_POST['resume'];
    $output_form = 'no';
    
    if (empty($first_name)) {
      echo '<p class="error">Вы не указали свое имя.</p>';
      $output_form = 'yes';
    }

    if (empty($last_name)) {
      echo '<p class="error">Вы не указали фамилию.</p>';
      $output_form = 'yes';
    }

    if (empty($email)) {
      echo '<p class="error">Вы не указали свой e-mail.</p>';
      $output_form = 'yes';
    }

    if (empty($phone)) {
      echo '<p class="error">Вы не указали номер телефона.</p>';
      $output_form = 'yes';
    }
    $pattern='/^\(?[1-9]\d{2}\)?[-\s]?\d{3}[-\s]?\d{2}[-\s]?\d{2}$/';
    if (!preg_match($pattern, $phone)){
    echo'<p class="error">Вы указали неверный номер телефона.</p>'; 
      $output_form = 'yes';
    }     
    $pattern2 = '/[\s\(\)\-]/';
    $new_phone = preg_replace($pattern2,'',$phone);

    if (empty($job)) {
      echo '<p class="error">Вы не указали, какая работа Вам нужна.</p>';
      $output_form = 'yes';
    }

    if (empty($resume)) {
      echo '<p class="error">Вы не ввели свое резюме.</p>';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes';
  }

  if ($output_form == 'yes') {

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <p>Зарегистрируйтесь на сайте "Рискованные работы" и отправьте свое резюме.</p>
  <table>
    <tr>
      <td><label for="firstname">Имя:</label></td>
      <td><input id="firstname" name="firstname" type="text" value="<?php echo $first_name; ?>"/></td></tr>
    <tr>
      <td><label for="lastname">Фамилия:</label></td>
      <td><input id="lastname" name="lastname" type="text" value="<?php echo $last_name; ?>"/></td></tr>
    <tr>
      <td><label for="email">E-mail:</label></td>
      <td><input id="email" name="email" type="text" value="<?php echo $email; ?>"/></td></tr>
    <tr>
      <td><label for="phone">Телефон:</label></td>
      <td><input id="phone" name="phone" type="text" value="<?php echo $phone; ?>"/></td></tr>
    <tr>
      <td><label for="job">Желаемая работа:</label></td>
      <td><input id="job" name="job" type="text" value="<?php echo $job; ?>"/></td>
  </tr>
  </table>
  <p>
    <label for="resume">Напишите здесь ваше резюме:</label><br />
    <textarea id="resume" name="resume" rows="4" cols="40"><?php echo $resume; ?></textarea><br />
    <input type="submit" name="submit" value="Submit" />
  </p>
</form>

<?php
  }
  else if ($output_form == 'no') {
    $query="INSERT INTO riskyjobs.applicants(firstname, lastname, email, phone, job, resume)
    VALUES('$first_name','$last_name','$email','$phone','$job','$resume')";
     mysqli_query($connect, $query) or handle_error('Request error',mysqli_error($connect));
     echo '<p>' . $first_name . ' ' . $last_name . ', спасибо за регистрацию на сайте "Рискованные работы"!</br>
    Ваш номер телефона ',$new_phone.'</p>';
    
   
      }
?>

</body>
</html>
