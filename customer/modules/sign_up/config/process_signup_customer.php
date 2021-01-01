<?php 
		session_start();
		if(isset($_POST['sub'])){
			$acc=$_POST['acc'];
			$pass=$_POST['pass'];
			$nameuser=$_POST['nameuser'];
			$sql="insert into customer(id,customer_account,customer_password,customer_name) values(null,'$acc','$pass','$nameuser')";
			$result=mysqli_query($conn,$sql);
			$al=mysqli_affected_rows($conn);
			if($al>0){
				mysqli_close($conn);
				$_SESSION['acc']=$acc;
				$_SESSION['pass']=$pass;
				header("Location:index.php?module=common&action=login");
			}
			else{
				mysqli_close($conn);
				$error="Tài khoản này đã được đăng ký, vui lòng đăng ký lại";
			}
		}
?>