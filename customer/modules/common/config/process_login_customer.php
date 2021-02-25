<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php
	if(isset($_POST["sub"])){
		$acc=$_POST['acc'];
		$pass=$_POST['pass'];
		$sql="select*from customer where customer_account='$acc' and customer_password='$pass'";
		$result=mysqli_query($conn,$sql);
		$all=mysqli_affected_rows($conn);
		if($all>0){
			$row=mysqli_fetch_assoc($result);
			$_SESSION['acc']=$row['customer_account'];
			$_SESSION['pass']=$row['customer_password'];
			$_SESSION['id_customer']=$row['id'];
			$_SESSION['type']=$row['customer_type'];
			$_SESSION['username']=$row['customer_name'];
			if(isset($_SESSION['cart'])){
				unset($_SESSION['cart']);
			}
			header("Location:index.php");
		}
		else{
			$error="Đăng nhập thất bại, quý khách vui lòng đăng nhập lại!";
		}
	}