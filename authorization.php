<?php
	include ("staff.php");
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['auth_error']))
		echo "<div class='error_block'>".$_SESSION['auth_error']."</div>";
		$_SESSION['auth_error'] = NULL;
	?>
	<div class="login_container">
		<form action="login.php" method="POST">
			<input type="text" name="login">
			<input type="password" name="password">
			<input type="submit" name="submit_login" value="login">
			<input type="submit" name="submit_register" value="register">
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