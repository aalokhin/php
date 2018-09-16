<?php
	include("staff.php");
	header('Location: admin.php');
	if ($_GET['title'] != NULL && $_GET['price'] != NULL && $_GET['img_url'] != NULL && $_GET['categories'] != NULL && $_GET['add'] != NULL)
	{
		$products = get_all_products();
		$categories = ft_split($_GET['categories']);
		if (check_categories($categories) == 0)
		{
			$_SESSION['error'] = "There are not such categories\n";
			return ;
		}
		$i = 0;
		foreach ($products as $prod) {
			if ($_GET['title'] == $prod['title'])
			{
				$_SESSION['error'] = "The item already exists\n";
				return ;
			}
			$i++;
		}
		if (!is_numeric($_GET['price']) || $_GET['price'] < 0)
		{
			$_SESSION['error'] = "Invalid data\n";
			return ;
		}
		$products[$i] = array('title' => $_GET['title'], 'price' => $_GET['price'], 'img_url' => $_GET['img_url'], 'categories' => $categories, 'descr' => $_GET['descr']);
		file_put_contents("database/products", serialize($products));
	}
?>