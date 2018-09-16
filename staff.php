<?php
	session_start();
	function ft_split($string)
	{
		$arr = array_filter(explode(',', $string), strlen);
		return array_values($arr);
	}
	function get_users()
	{
		if (file_exists("database/users"))
			return unserialize(file_get_contents("database/users"));
		return NULL;
	}
	function initial()
	{
		if (!isset($_SESSION['user_logged_in']))
			$_SESSION['user_logged_in'] = NULL;
		if ($_SESSION['user_logged_in'] == NULL)
		{
			$i = 0;
			$users = get_users();
			if ($users === NULL)
				$count = 0;
			else
				$count = count($users);
			while ($i < $count)
			{
				if ($_COOKIE['login'] == $users[$i]['login'] && $_COOKIE['password'] == $users[$i]['password'])
				{
					$_SESSION['user_logged_in'] = $_COOKIE['login'];
					break ;
				}
				$i++;
			}
		}
	}
	function get_user()
	{
		if (isset($_SESSION['user_logged_in']))
		{
			$users = get_users();
			foreach($users as $user)
			{
				if ($_SESSION['user_logged_in'] == $user['login'])
				{
					return $user;
				}
			}
		}
		return 0;
	}
	function get_all_products()
	{
		if (file_exists("database/products") == 1)
			return unserialize(file_get_contents("database/products"));
		return NULL;
	}
	function output_products($array)
	{
		if ($array == NULL)
			return NULL;
		$str = "<div class='products'>";
		$i = 0;
		$len = count($array);
		while ($i < $len)
		{
			if (!isset($_SESSION['category']) || array_search($_SESSION['category'], $array[$i]['categories']) === 0)
			{
				$str = $str."<div class='item'>
								<div class='item_img'>
									<img src='{$array[$i][img_url]}'>
								</div>
								<div class='item_descr'>
									<p class='item_title'>{$array[$i][title]}</p>
									<p class='item_price'>{$array[$i][descr]}</p>
									<p class='item_price'>{$array[$i][price]}</p>
									<a href='add_to_card.php?name={$array[$i][title]}&price={$array[$i][price]}' class='item_button'>Добавить в корзину</a>
								</div>
							</div>";
			}
			$i++;
		}
		$str = $str."</div>";
		return $str;
	}
	function output_categories()
	{
		if (file_exists("database/categories") == 0)
			return ;
		$categories = unserialize(file_get_contents("database/categories"));
		$str = "<ul class='dropdown_list'>";
		foreach($categories as $array)
		{
			$str = $str."<li class='dropdown-list_elem'>
							<a class='link";
			if (isset($_SESSION['category']) && $_SESSION['category'] == $array['category'])
				$str = $str." link_checked";
			$str = $str."' href='categories.php?category={$array['category']}' class='link dropdown_link'>
								{$array['category']}
							</a>
						</li>";
		}
		$str = $str."</ul>";
		return $str;
	}
	function check_categories($categories)
	{
		$all_categories = unserialize(file_get_contents("database/categories"));
		foreach($categories as $category)
		{
			$flag = 0;
			foreach ($all_categories as $inner_category)
			{
				if ($category == $inner_category['category'])
				{
					$flag = 1;
					break ;
				}
			}
			if ($flag != 1)
				return 0;
		}
		if ($flag == 1)
			return 1;
		return 0;
	}
?>