<?php
	include ("staff.php");
	session_start();
	if ($_POST['submit_login'] == "login" || $_POST['submit_register'] == "register")
	{
		if ($_POST['login'] == NULL || $_POST['password'] == NULL)
		{
			$_SESSION['auth_error'] = "You forgot to input data\n";
			header('Location: authorization.php');
			return ;
		}
		$users = get_users();
		if ($users === NULL)
			$counter = 0;
		else
			$counter = count($users);
		$i = 0;
		$flag = 0;
		while ($i < $counter)
		{
			if ($users[$i]['login'] == $_POST['login'])
			{
				$flag = 1;
				break ;
			}
			else
				$i++;
		}
		if ($_POST['submit_login'] == "login" && $flag == 1 && $users[$i]['password'] == hash("whirlpool", $_POST['password']))
		{
			$_SESSION['user_logged_in'] = $users[$i]['login'];
			setcookie('login', $_POST['login']);
			setcookie('password', hash("whirlpool", $_POST['password']));
			if ($users[$i]['type'] == "admin")
			{
				header('Location: admin.php');
				return ;
			}
		}
		else if ($_POST['submit_register'] == "register" && $flag == 0)
		{
			$users[$i] = array('login' => $_POST['login'], 'password' => hash("whirlpool", $_POST['password']), 'type' => "user");
			file_put_contents("database/users", serialize($users));
			$_SESSION['user_logged_in'] = $_POST['login'];
			setcookie('login', $_POST['login']);
			setcookie('password', hash("whirlpool", $_POST['password']));
		}
		else
		{
			$_SESSION['auth_error'] = "Some problem\n";
			header('Location: authorization.php');
			return ;
		}
		header('Location: index.php');
	}
?>