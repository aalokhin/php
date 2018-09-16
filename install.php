<?php
	session_start();
	function create_databases()
	{
		if (file_exists("database") == 0)
			mkdir("database");
		if (file_exists("database/users") == 0)
		{
			$array[0] = array('login' => "root", 'password' => hash("whirlpool", "smookie"), 'type' => "admin");
			file_put_contents("database/users", serialize($array));
		}
	}
?>