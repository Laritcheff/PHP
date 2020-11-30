<?php
require_once 'startsession.php';

if(isset($_SESSION['user_id'])) {
	$_SESSION = array();
	if(isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-3600);
	}
	session_destroy();
	
	setcookie('user_id', '', time()-3600);
	setcookie('username', '', time()-3600);
}

$home_url = '/mismatches/index.php';
header("Location: $home_url");
?>