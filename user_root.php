<?php
	include ("staff.php");
	if ($_POST['login'] != NULL && ($_POST['add_root'] != NULL || $_POST['remove_root'] != NULL))
	{
		$users = get_users();
		foreach($users as &$user)
		{
			if ($user['login'] == $_POST['login'] && $user['login'] != $_SESSION['user_logged_in'])
			{
				if ($_POST['add_root'] != NULL)
					$user['type'] = "admin";
				else
					$user['type'] = "user";
				break ;
			}
		}
		file_put_contents("database/users", serialize($users));
	}
	header('Location: admin.php');
?>