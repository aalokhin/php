<?php
	include("staff.php");
	session_start();
	$user = get_user();
	if ($user['type'] != "admin")
	{
		header('Location: index.php');
		return ;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['error']))
		echo "<div class='error_block'>".$_SESSION['error']."</div>";
		$_SESSION['error'] = NULL;
	?>
	<div class="header clearfix">
		<div class="authorization">
			<a href="logout.php" class="button authorization_button">
				Выйти
			</a>
		</div>
	</div>
	<div class="user_section">
		<form action="user_root.php" method="post">
			<legend>
				Root:
			</legend>
			Login: <input type="text" placeholder="login" name="login" required><br>
			<input type="submit" name="add_root" value="add root">
			<input type="submit" name="remove_root" value="remove root">
		</form>
		<form action="user_delete.php" method="post">
			<legend>
				Delete user:
			</legend>
			Login: <input type="text" placeholder="login" name="login" required><br>
			<input type="submit" name="delete" value="delete user">
		</form>
		<form action="user_add.php" method="post">
			<legend>
				Add user:
			</legend>
			Login: <input type="text" placeholder="login" name="login" required><br>
			Password: <input type="text" placeholder="password" name="password" required><br>
			<input type="checkbox" name="root" value="root">
			<input type="submit" name="add" value="add user">
		</form>
	</div>
	<div class="articles_section">
		<form action="add_article.php" method="get">
			<legend>
				Add item:
			</legend>
			Title: <input type="text" placeholder="title" name="title" required><br>
			Price: <input type="text" placeholder="price" name="price" required><br>
			Image URL: <input type="text" placeholder="img url" name="img_url" required><br>
			Categories: <input type="text" placeholder="categories" name="categories" required><br>
			<textarea name="descr" placeholder="description" cols="30" rows="10"></textarea>
			<input type="submit" name="add" value="add">
		</form>
		<form action="modify_article.php" method="get">
			<legend>
				Modify item:
			</legend>
			Title: <input type="text" placeholder="title" name="title" required><br>
			Price: <input type="text" placeholder="price" name="price" required><br>
			Image URL: <input type="text" placeholder="img url" name="img_url" required><br>
			Categories: <input type="text" placeholder="categories" name="categories" required><br>
			<textarea name="descr" placeholder="description" cols="30" rows="10"></textarea>
			<input type="submit" name="modify" value="modify">
		</form>
		<form action="remove_article.php" method="get">
			<legend>
				Remove item:
			</legend>
			Title: <input type="text" placeholder="title" name="title" required><br>
			<input type="submit" name="remove" value="remove">
		</form>
	</div>
	<div class="categories_section">
		<form action="add_category.php" method="GET">
			<legend>
				Add category:
			</legend>
			Title: <input type="text" placeholder="title" name="category" required><br>
			<input type="submit" name="add" value="add category">
		</form>
		<form action="remove_category.php" method="GET">
			<legend>
				Remove category:
			</legend>
			Title: <input type="text" placeholder="title" name="category" required><br>
			<input type="submit" name="remove" value="remove category">
		</form>
	</div>

	<script>
		var okno = document.querySelector(".error_block");

		if (okno)
		{
			okno.addEventListener("click", function(event){
				event.target.style.display = "none";
			});
			setTimeout(function(){
				okno.style.display = "none";
			}, 3000);
		}
	</script>
</body>
</html>