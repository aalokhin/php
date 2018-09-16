<?php
	session_start();
	$_SESSION['user_logged_in'] = NULL;
	setcookie('login', "", time() - 3600);
	setcookie('password', "", time() - 3600);
	header('Location: index.php');
?>