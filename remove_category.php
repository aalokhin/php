<?php
	include("staff.php");
	session_start();
	header('Location: admin.php');
	if ($_GET['category'] != NULL && $_GET['remove'] != NULL)
	{
		$products = get_all_products();
		foreach($products as &$p)
		{
			$i = 0;
			$j = 0;
			$len = count($p['categories']);
			$array = NULL;
			while ($i < $len)
			{
				if ($p['categories'][$i] != $_GET['category'])
					$array[$j++] = $p['categories'][$i];
				$i++;
			}
			$p['categories'] = $array;
		}
		file_put_contents("database/products", serialize($products));
		$i = 0;
		$categories = unserialize(file_get_contents("database/categories"));
		foreach ($categories as $value) {
			if ($value['category'] != $_GET['category'])
				$array[$i++] = array('category' => $value['category']);
		}
		file_put_contents("database/categories", serialize($array));
	}
?>