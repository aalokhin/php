<?php
	include("staff.php");
	if ($_POST['login'] != NULL && $_POST['password'] != NULL && $_POST['add'] != NULL)
	{
		header('Location: admin.php');
		$users = get_users();
		$i = 0;
		foreach($users as $user)
		{
			if ($user['login'] == $_POST['login'])
			{
				$_SESSION['error'] = "There is such login\n";
				return ;
			}
			$i++;
		}
		$users[$i] = array('login' => $_POST['login'], 'password' => hash("whirlpool", $_POST['password']), ($_POST['root']) ? "admin" : "user");
		file_put_contents("database/users", serialize($users));
	}
?>