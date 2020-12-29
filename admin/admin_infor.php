<?php  
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
				$error="Ban khong phai admin";
				header("Location:login.php?error=$error");
			}
			else{
				$row=mysqli_fetch_assoc($result);
				$sql1="select phone.phonenumber as phone1 from phone  inner join superadmin on phone.user_id = superadmin.id where phone.usertype=superadmin.admin_phonenumbertype";
				$result1=mysqli_query($conn,$sql1);
				$row1=mysqli_fetch_assoc($result1);
				$admin_acc=$row['admin_acc'];
				$admin_pass=$row['admin_pass'];
				$admin_name=$row['admin_name'];
				$admin_email=$row['admin_email'];
				$admin_phone=$row1['phone1'];
				$admin_avatar=$row['admin_avatar'];
				$admin_address=$row['admin_address'];
				echo $admin_phone;
			}
		}
	}
?>