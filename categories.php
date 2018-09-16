<?php
	session_start();
	$_SESSION['category'] = $_GET['category'];
	header('Location: index.php');
?>