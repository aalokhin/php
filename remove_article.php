<?php
	include("staff.php");
	session_start();
	header('Location: admin.php');
	if ($_GET['title'] != NULL && $_GET['remove'] != NULL)
	{
		$products = get_all_products();
		$i = 0;
		foreach($products as $prod)
		{
			if ($_GET['title'] != $prod['title'])
				$array[$i++] = array('title' => $prod['title'], 'price' => $prod['price'], 'img_url' => $prod['img_url'], 'categories' => $prod['categories'], 'descr' => $prod['descr']);
		}
		file_put_contents("database/products", serialize($array));
	}
	else
	{
		$_SESSION['error'] = "There is no such item\n";
		return ;
	}
?>