
<?php 
	session_start();
	$data = mysqli_connect('localhost','root','','pizza');
	
	$id = "";
	$Customer_name = "";
	$Phone_num = "";
	$NIC= "";
	$Delivery_date = "";
	$Pizza_type = "";
	$Pizza_size = "";
	$Quantity = "";
	$status = "";
	
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$Customer_name = $_POST['Customer_name'];
		$Phone_num = $_POST['Phone_num'];
		$NIC= $_POST['NIC'];
		$Delivery_date = $_POST['Delivery_date'];
		$Pizza_type = $_POST['Pizza_type'];
		$Pizza_size = $_POST['Pizza_size'];
		$Quantity = $_POST['Quantity'];
		// for saving orders. but not delivered
		mysqli_query($data, "insert into orders(ID,Customer_name,Phone_num, NIC,Delivery_date, Pizza_type, Pizza_size, Quantity  ) values ('$id','$Customer_name', '$Phone_num', '$NIC','$Delivery_date', '$Pizza_type', '$Pizza_size', '$Quantity' )");
		//for saving delivered orders
		mysqli_query($data, "insert into delivered(ID,Customer_name,Phone_num, NIC,Delivery_date, Pizza_type, Pizza_size, Quantity  ) values ('$id','$Customer_name', '$Phone_num', '$NIC','$Delivery_date', '$Pizza_type', '$Pizza_size', '$Quantity' )");
		
		$_SESSION['message'] = "YOUR ORDER IS ACCEPTED" ;
		header('location:Pizzahome.php');
	}
	$username = "";
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$un = mysqli_query($data, "select * from admins where username = '$username'");
		
		 if(mysqli_fetch_row($un) != false){
			$password = $_POST['password'];
			$pw = mysqli_fetch_array(mysqli_query($data, "select password from admins where username = '$username'"));
			 if( $pw['password'] == $password){
				 $_SESSION['log'] = "true";
				header('location:admin.php');
			}else{
				$_SESSION['message'] = "Your PassWord is Wrong" ;
				header('location:customer.php');
			} 
		}else{
			
			$_SESSION['message'] = "You are not ALLOWED here !!!. Add Admin Manually";
			header('location:Pizzahome.php');
		
		}
	}
?>