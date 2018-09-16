<?php
	session_start();
	header('Location: basket.php');
	$_SESSION['goods'] = NULL;
?>