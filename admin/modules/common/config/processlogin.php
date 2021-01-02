<?php
	session_start();
	$error='';
	if(isset($_SESSION['acc'])==true && isset($_SESSION['pass'])==true){
		header("Location:index.php?module=interface&action=interfaceAdmin");
	}
	else{
		if(isset($_POST['sub'])){
			$acc=$_POST['admin_acc'];
			$pass=$_POST['admin_pass'];
			$conn=mysqli_connect('localhost','root','','teletrofono');
			if(!$conn){
				die("Connect error : ".mysqli_connect_error());
			}
			else{
				$sql="select * from superadmin where admin_acc='$acc' and admin_pass='$pass'";
				$result=mysqli_query($conn,$sql);
				$count=mysqli_num_rows($result);
				if($count<=0){
					$error="You are not an administrator";
				}
				else{	
						$_SESSION['acc']=$acc;
						$_SESSION['pass']=$pass;
						header("Location:index.php?module=interface&action=interfaceAdmin");
				}
			}
		}
	}