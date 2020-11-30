<?php
if(isset($_SESSION['user_id'])) {
	echo '&#10084; <a href="index.php?<?php echo SID; ?>">На главную</a><br>';
	echo '&#10084; <a href="viewprofile.php?<?php echo SID; ?>">Просмотр профиля</a><br>';
	echo '&#10084; <a href="editprofile.php?<?php echo SID; ?>">Редактирование профиля</a><br>';
	echo '&#10084; <a href="logout.php?<?php echo SID; ?>">Выход</a><br>';
} else {
	echo '&#10084; <a href="login.php">Вход</a><br>';
	echo '&#10084; <a href="register.php">Создание учетной записи</a>';
}
?>