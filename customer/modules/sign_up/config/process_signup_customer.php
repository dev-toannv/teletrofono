<?php 
		if(isset($_POST['sub'])){
			$acc=$_POST['acc'];
			$pass=$_POST['pass'];
			$nameuser=$_POST['nameuser'];
			$sql="insert into customer(id,customer_account,customer_password,customer_name,customer_type,user_type) values(null,'$acc','$pass','$nameuser',1,3)";
			$result=mysqli_query($conn,$sql);
			$al=mysqli_affected_rows($conn);
			if($al>0){
				mysqli_close($conn);
				$_SESSION['acc']=$acc;
				$_SESSION['pass']=$pass;
				$_SESSION['username']=$nameuser;
				header("Location:index.php");
			}
			else{
				mysqli_close($conn);
				$error="Tài khoản này đã được đăng ký, vui lòng đăng ký lại";
			}
		}
?>