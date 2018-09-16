<?php
	include("staff.php");
	session_start();
	header('Location: index.php');

	if ($_GET['name'] != NULL && $_GET['price'] != NULL)
	{
		if (!isset($_SESSION['goods']))
			$_SESSION['goods'] = NULL;
		$i = 0;
		if ($_SESSION['goods'] == NULL)
			$len = 0;
		else
			$len = count($_SESSION['goods']);
		while ($i < $len)
		{
			if ($_SESSION['goods'][$i]['name'] == $_GET['name'])
			{
				$_SESSION['goods'][$i]['quantity'] += 1;
				return ;
			}
			$i++;
		}
		$_SESSION['goods'][$i] = array('name' => $_GET['name'], 'quantity' => 1, 'price' => $_GET['price']);
	}
?>