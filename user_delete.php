<?php
	include("staff.php");
	session_start();
	if ($_POST['login'] != NULL && $_POST['delete'] != NULL)
	{
		$users = get_users();
		$i = 0;
		foreach($users as $user)
		{
			if ($user['login'] == $_POST['login'] && $user['login'] == $_SESSION['user_logged_in'])
				$_SESSION['error'] = "There is something wrong\n";
			if ($user['login'] != $_POST['login'] || $user['login'] == $_SESSION['user_logged_in'])
				$array[$i++] = array('login' => $user['login'], 'password' => $user['password'], 'type' => $user['type']);
		}
		if ($i > 0)
			file_put_contents("database/users", serialize($array));
	}
	header('Location: admin.php');
	return ;
?>