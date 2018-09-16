<?php
	include("staff.php");
	session_start();
	header('Location: admin.php');
	if ($_GET['category'] != NULL && $_GET['add'] != NULL)
	{
		$i = 0;
		$categories = unserialize(file_get_contents("database/categories"));
		foreach ($categories as $value) {
			if ($value['category'] == $_GET['category'])
			{
				$_SESSION['error'] = "Such category already exists\n";
				return ;
			}
			$i++;
		}
		$categories[$i] = array('category' => $_GET['category']);
		file_put_contents("database/categories", serialize($categories));
	}
?>