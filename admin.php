<?php include "order.php";?>
<!DOCTYPE html>
<html>
<head>
<title>Hurry Up The Orders!!!</title>
<link rel="stylesheet" type="text/css" href="pizza.css">
</head>
<body style = "width : 100%; height : 100%">
<h2>Hurry Up The Orders!!!</h2>
<?php
if(($_SESSION['log'])=="true"){
?>
<form action="admin.php" method = "post">
	<input class ="ref" type = "submit" name ="ref" value = "REFRESH">
</form>
<form action="customer.php" method = "post">
	<?php $_SESSION['message'] = "Logout Sucessfuy!!!" ;
	?>
	<input class = "logout" type = "submit" name ="log" value = "LOG Out">
</form>
<?php 
	
	if(isset($_GET['edit'])){
		$idn = $_GET['edit'];
		mysqli_query($data, "Delete from orders where ID = '$idn'");
		mysqli_query($data, "UPDATE delivered SET status = 'Deivered!' where ID = '$idn'");
		
	}

	if(isset($_POST['ref'])){
		unset($_POST['dat']);
		header('location:admin.php');
	}
	//Total orders
	$details = mysqli_query($data, "SELECT * from orders");?>
	<table class = "flist" border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>Customer Name</th>
				<th>Phone Number</th>
				<th>NIC</th>
				<th>Delivery Date</th>
				<th>Pizza Type</th>
				<th>Pizza Size</th>
				<th>Quantity</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		while($row = mysqli_fetch_array($details)){ ?>
			<tr>
				<td><?php echo $row['ID']; ?></td>
				<td><?php echo $row['Customer_name']; ?></td>
				<td><?php echo $row['Phone_num']; ?></td>
				<td><?php echo $row['NIC']; ?></td>
				<td><?php echo $row['Delivery_date']; ?></td>
				<td><?php echo $row['Pizza_type']; ?></td>
				<td><?php echo $row['Pizza_size']; ?></td>
				<td><?php echo $row['Quantity']; ?></td>
				<td><?php echo $row['status']; ?></td>
			</tr>
		<?php } ?>
	</tbody>		
	</table>
	<!-- list out orders-->
	<form action ="admin.php" method = "POST">
		<label class = "ent">Enter Date to view Orders</label><br>
		<input class = "date" type = "date" name = "dat" value="<?php echo date("Y-m-d"); ?>">
		<input class = "a1" type = "Submit" name = "subm" value = "List orders">
	</form>
	<?php 
	if(isset($_POST['subm'])){
		$date = $_POST['dat'];
		$date2 = $date;
		$list = mysqli_query($data, "select * from orders where Delivery_date = '$date' ");
		
		 ?>
	<table class = "flist" border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>Customer Name</th>
				<th>Phone Number</th>
				<th>NIC</th>
				<th>Delivery Date</th>
				<th>Pizza Type</th>
				<th>Pizza Size</th>
				<th>Quantity</th>
				<th>Status</th>
				<th>Bill</th>
				<th>Confirmation Of Delivery</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		while($row1 = mysqli_fetch_array($list)){ ?>
			<tr>
				<td><?php echo $row1['ID']; ?></td>
				<td><?php echo $row1['Customer_name']; ?></td>
				<td><?php echo $row1['Phone_num']; ?></td>
				<td><?php echo $row1['NIC']; ?></td>
				<td><?php echo $row1['Delivery_date']; ?></td>
				<td><?php echo $row1['Pizza_type']; ?></td>
				<td><?php echo $row1['Pizza_size']; ?></td>
				<td><?php echo $row1['Quantity']; ?></td>
				<td><?php echo $row1['status']; ?></td>
				<td>
					<?php 
						$idN = $row1['ID'];
						$type = $row1['Pizza_type'];
						$size = $row1['Pizza_size'];
						$price = mysqli_fetch_array(mysqli_query($data,"select * from pricelist where Pizza_type ='$type' and Pizza_size = '$size'"));
						$Fprice = $price['price'] * $row1['Quantity'];
						mysqli_query($data, "UPDATE delivered set bill='$Fprice' where ID ='$idN'");
						echo $Fprice; 
					?>
				</td>
				<td><a href="admin.php?edit=<?php echo $row1['ID']; ?>">Delivered???</a></td>
			</tr>
		<?php } ?>
	</tbody>		
	</table>
<?php
	}
	//see the revenue	
?>
<h3>REVENUE OF PARTICULAR DATE</h3>
<div class= "rev">
	<form action = "admin.php" method = "POST">
		<label>Deleivery Date</label>
			<input type="date" name = "Delivery_date" value = <?php echo date("Y-m-d"); ?> required>
		<label>Pizza type</label>
		<select type = "text" name = "Pizza_type" value = "SELECT PIZZA" required>
			<option value = "chicken">Chicken Pizza</option>
			<option value = "mutton">Mutton Pizza</option>
			<option value = "veg">Vegetable Pizza</option></select>
		<input class ="sub" type="submit" name="revenue" value="REVENUE">
	</form>
</div>
	<?php 
		if(isset($_POST['revenue'])){
			$date = $_POST['Delivery_date'];
			$type = $_POST['Pizza_type'];
			$rev = mysqli_fetch_array(mysqli_query($data, "select sum(bill) from delivered where Delivery_date ='$date' and Pizza_type = '$type' and status = 'Deivered!' "));?>
			<h2>Revenue of <?php echo $type; ?> Pizza in <?php echo $date; ?> is <?php echo $rev['sum(bill)'];?> /=<h2><?php
			
		}
	
}
else {
	$_SESSION['message'] = "LOG IN FIRST";
	header('location:customer.php');
}?>
</body>
</html>

