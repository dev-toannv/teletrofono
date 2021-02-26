<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
		if(isset($_POST['sub'])){
			$acc=$_POST['acc'];
			$pass=$_POST['pass'];
			$nameuser=$_POST['nameuser'];
			$sql="insert into customer(id,customer_account,customer_password,customer_name,customer_type,user_type) values(null,'$acc','$pass','$nameuser',0,3)";
			$result=mysqli_query($conn,$sql);
			$al=mysqli_affected_rows($conn);
			if($al>0){
				$_SESSION['acc']=$acc;
				$_SESSION['pass']=$pass;
				$_SESSION['username']=$nameuser;

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
				header("Location:index.php");
			}
			else{
				mysqli_close($conn);
				$error="Tài khoản này đã được đăng ký, vui lòng đăng ký lại";
			}
		}
	}
?>