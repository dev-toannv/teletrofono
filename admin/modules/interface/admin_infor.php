<?php  
	session_start();
	if(isset($_SESSION['acc']) && isset($_SESSION['pass'])){
		$acc=$_SESSION['acc'];
		$pass=$_SESSION['pass'];
		$conn=mysqli_connect('localhost','root','','teletrofono');
		if(!$conn){
			die("Connect error : ".mysqli_connect_error());
		}
		else{
			$sql="select * from superadmin where admin_acc='$acc' and admin_pass='$pass'";
			$result=mysqli_query($conn,$sql);
			
				$row=mysqli_fetch_assoc($result);
				$admin_id=$row['id'];
				$admin_type=$row['admin_phonenumbertype'];
				$sql1="select phone.phonenumber as phone1 from phone  inner join superadmin on phone.user_id = '$admin_id' where phone.usertype='$admin_type'";
				$result1=mysqli_query($conn,$sql1);
				$row1=mysqli_fetch_assoc($result1);
				$admin_acc=$row['admin_acc'];
				$admin_pass=$row['admin_pass'];
				$admin_name=$row['admin_name'];
				$admin_email=$row['admin_email'];
				$admin_phone=$row1['phone1'];
				$admin_avatar=$row['admin_avatar'];
				$admin_address=$row['admin_address'];
				echo $admin_acc."<br>";
				echo $admin_pass."<br>";
				echo $admin_name."<br>";
				echo $admin_email."<br>";
				echo $admin_phone."<br>";
				echo $admin_avatar."<br>";
				echo $admin_address."<br>";
				echo $admin_id."<br>";
				echo $admin_type."<br>";
				echo "abc";
		}
	}
	else{
		header("Location:index.php");
	}
?>