<?php
	include ("install.php");
	include ("staff.php");
	session_start();
	create_databases();
	initial();
	$products = get_all_products();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="header clearfix">

		<?php if($_SESSION['user_logged_in'] == NULL) : ?>
			<div class="authorization">
				<a href="authorization.php" class="button authorization_button">
					Войти
				</a>
			</div>
		<?php else : ?>
			<div class="authorization">
				<a href="logout.php" class="button authorization_button">
					Выйти
				</a>
			</div>
		<?php endif; ?>

		<div class="categories">
			<div class="dropdown">
				<a class="button">Categories</a>
				<?php echo output_categories() ?>
			</div>
		</div>
	
		<div class="basket">

			<?php if($_SESSION['user_logged_in'] != NULL) : ?>
				<a href="basket.php" class="button basket_button">
					Корзина
				</a>
			<?php else : ?>
				<a class="button basket_button ub">
					Корзина
				</a>
			<?php endif; ?>

		</div>

	</div>
	
	<div class="main_container">
		<?php 
			if (isset($products) && $products != NULL)
				echo output_products($products);
		?>
	</div>
</body>
</html>