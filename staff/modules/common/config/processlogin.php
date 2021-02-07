<?php
	session_start();
	$error='';
	if(isset($_SESSION['staff_code'])==true && isset($_SESSION['staff_password'])==true){
		header("Location:index.php?module=interface&action=interfaceStaff");
	}
	else{
		if(isset($_POST['sub'])){
			$acc=$_POST['staff_code'];
			$pass=$_POST['staff_password'];
			// $conn=mysqli_connect('localhost','root','','teletrofono');
			// if(!$conn){
			// 	die("Connect error : ".mysqli_connect_error());
			// }
			require_once("modules/config/connectdb.php");
			$sql="select * from manager where (manager_code='$acc' and manager_password='$pass') and id!=1 and (user_type=2 or user_type=1)";
			echo $sql;
			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($result);
			if($count<=0 || $count>1){
				$error="You are not a staff";
			}
			else{	
					$_SESSION['staff_code']=$acc;
					$_SESSION['staff_password']=$pass;
					header("Location:index.php?module=interface&action=interfaceStaff");
			}
		}
	}