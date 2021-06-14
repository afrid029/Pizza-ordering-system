<?php include "order.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Order Pizza</title>
<link rel="stylesheet" type="text/css" href="pizza.css">
</head>
<body style = "width : 100%; height : 100%">

<div class = "cont">
<?php if(isset($_GET['cus'])){ ?>
<h2>ORDER AND ENJOY</h2>
<table>
<tr><td class = "a">Put Your Order Here</td></tr>
<tr><td>
	<form action = "order.php" method ="post">
		<input class = "in" type="hidden" name = "id">
		
		<h4><label>Customer Name </label><br>
		<input class = "in" type="text" name = "Customer_name" required></h4>
		
		<h4><label>Customer Phone Number  </label>
		<input class = "in" type="number" name = "Phone_num" required></h4>
		
		<h4><label>NIC  </label>
		<input class = "in" type="text" name = "NIC" required></h4>
		
		<h4><label>Deleivery Date  </label>
		<input class = "in" type="date" name = "Delivery_date" value = <?php echo date("Y-m-d"); ?> required></h4>
		
		<h4><label>Pizza type  </label>
		<select class = "in" type = "text" name = "Pizza_type" required>
			<option value = "chicken">Chicken Pizza</option>
			<option value = "mutton">Mutton Pizza</option>
			<option value = "veg">Vegetable Pizza</option></select></h4>
			
		<h4><label>Pizza Size  </label>
		<select class = "in" type = "text" name = "Pizza_size" required>
			<option value = "large">Large</option>
			<option value = "medium">Medium</option>
			<option value = "small">Small</option></select></h4>
			
		<h4><label>Quantity  </label>
		<input class = "in" type="number" name = "Quantity" required></h4>
		
		
		<input class = "a" type="Submit" name="submit" value="Order Now">
		
	</form></td></tr></table>
	<div class = "list">
		<?php $plist = mysqli_query($data, "SELECT * from pricelist ");
		?>
		<table>
			<thead>
			<tr>
				<th>Pizz Type</th>
				<th>Pizz Size</th>
				<th>Prize</th>
			</tr>
			</thead>
			<tbody>
			<?php while($rowk = mysqli_fetch_array($plist)){?>
			<tr>
					<td><?php echo $rowk['Pizza_type']; ?></td>
					<td><?php echo $rowk['Pizza_size']; ?></td>
					<td><?php echo $rowk['price']; ?></td>
					
			</tr>
			
			<?php } ?>
			</tbody>
		</table>
	</div>
<?php } ?>
</div><?php 

if(isset($_POST['adm']) || isset($_SESSION['message'])){ ?>
<h2>ADMINS ONLY</h2>
<div class="login">
	<form action = "order.php" method ="post">
		<h3><label>Username</label><br>
		<input class= "in" type="text" name="username" required>
		
		<h3><label>Password</label><br>
		<input class= "in" type="password" name="password" required><br>
	
		<input class= "a" type="Submit" name="login" value="LOGIN">
	</form>
</div>
	
<?php } 
	if(isset($_SESSION['message'])){?>
	<div class="error"><?php
			echo $_SESSION['message'];
			unset ($_SESSION['message']);
			if(isset($_POST['log']) ){
				$_SESSION['log'] = "false";
			}?>
		</div><?php
	}
	
?>
	
</body>
</html>