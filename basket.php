<?php
	include ("staff.php");
	session_start();

	function output_card($array)
	{
		$i = 0;
		$len = count($array);
		$str = "<table><tr><th>Name</th><th>Quantity</th><th>Price</th></tr>";
		while ($i < $len)
		{
			$str = $str."<tr><td>{$array[$i]['name']}</td><td>{$array[$i]['quantity']}</td><td>{$array[$i]['price']}</td></tr>";
			$i++;
		}
		$str = $str."</table>";
		return $str;
	}

	function output_total_sum($array)
	{
		$ret = 0;
		$i = 0;
		$len = count($array);
		$str = "<div class='total'>";
		while ($i < $len)
		{
			$ret += intval($array[$i]['price']) * intval($array[$i]['quantity']);
			$i++;
		}
		$str .= "<p>Your total amount is:</p><p>{$ret}</p></br>";
		$str.= "</div>";
		return $str;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cart</title>
	<link rel="stylesheet" href="style.css">
	<style>
		table {
			margin: 0 auto;
		}
		table, td, th {
			background-color: #fff;
			border-collapse: collapse;
			border: 1px solid black;
			text-align: center;
		}
		td, th {
			font-size: 20px;
			padding: 10px;
		}
		.home {
			background-color: black;
			color: #8948f9;
			text-decoration: none;
			float: left;
			display: block;
			padding: 10px 10px;
		}
		.validate {
			text-align: center;
		}
		.validate > a {
			text-decoration: none;
			background-color: green;
			font-size: 22px;
			padding: 6px;
			border-radius: 3px;
		}
		.total {
			text-align: center;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div class="header clearfix">
		<div class="header_home">
			<a href="index.php" class="home">Home</a>
		</div>
	</div>
	<?php if (isset($_SESSION['goods'])) : ?>
		<div class="card_table">
			<?php
				echo output_card($_SESSION['goods']);
				echo output_total_sum($_SESSION['goods']);
				echo "<div class='validate'><a href='validate_it.php'>Validate!</a></div>";
			?>
		</div>
	<?php endif; ?>
</html>