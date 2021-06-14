<?php include "order.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pizza Home</title>
	<link rel="stylesheet"type="text/css"href="pizza.css">
</head>
<body style = "width : 100%;">
<h2>WELCOME TO PIZZA HOME</h2>
<?php 	
			if(isset($_SESSION['message'])){
				echo "<table class = 'table'>
	<tr>
		<td></td>
		<td colspan = 3>";
				echo $_SESSION['message'];
				unset ($_SESSION['message']);
				echo "</td>
		<td></td>
	</tr>
	</table>";
			}
		
		?>
	<form action = "customer.php" method = "Post">
	<div class = "admin">
		<input class = "a" type="Submit" name="adm" value=" Admin "></div>
	<img class = "home" src = "pizzahome.jpg" />
		<div class = "order">
		<a  class = "a" href="customer.php?cus=<?php echo'set'?>">Order Pizza</a></div>
		

	</form></br></br>
	
	
	
		<?php 	
			if(isset($_SESSION['message'])){
				echo "<table class = 'table'>
	<tr>
		<td></td>
		<td colspan = 3>";
				echo $_SESSION['message'];
				unset ($_SESSION['message']);
				echo "</td>
		<td></td>
	</tr>
	</table>";
			}
		
		?>
		
	
	
</body>
</html>