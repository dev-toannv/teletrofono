
<?php
	session_start();
	$error='';
	if(isset($_SESSION['admin_acc'])==true && isset($_SESSION['admin_pass'])==true){
		header("Location:index.php?module=interface&action=interfaceAdmin");
	}
	else{
		if(isset($_POST['sub'])){
			$acc=$_POST['admin_acc'];
			$pass=$_POST['admin_pass'];
			require_once("modules/config/connectdb.php");
			

				$sql="select * from manager where manager_code='$acc' and manager_password='$pass' and user_type='1' and id = 1";
				$result=mysqli_query($conn,$sql);
				$count=mysqli_num_rows($result);
				if($count<=0){
					$error="You are not the administrator";
				}
				else{	
						$_SESSION['admin_acc']=$acc;
						$_SESSION['admin_pass']=$pass;
						header("Location:index.php");
				}
		}
	}