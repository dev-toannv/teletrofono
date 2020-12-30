
<?php
	$error='';
	if(isset($_SESSION['acc'])==true && isset($_SESSION['pass'])==true){
		header("Location:admin_infor.php");
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
					$error="Ban khong phai admin";
				}
				else{
					// session
						session_start();
						$_SESSION['acc']=$acc;
						$_SESSION['pass']=$pass;
						header("Location:admin_infor.php");
				}
			}
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AdminLogin</title>
	<link rel="stylesheet" type="text/css" href="admincss/login.css">
</head>
<body>
	<div id="head">
			<a href="login.php"><img src="img/logo3.png" id="logo"></a>
	</div>

	<div id="body">
		<div id="error">
				<?php 
					if(!empty($error)){
						echo "<p>".$error."</p>";
					}
				 ?>
		</div>
		<div id="form">
			<form action="login.php" method="POST" >
				<input type="text" id="admin_acc" name="admin_acc" placeholder="Account"> <br>
				<input type="password" id="admin_pass" name="admin_pass" placeholder="Password"> <br>
				<label for="sub">
					<div id="label_sub">
						<p id="chu">LOGIN</p>
					</div>
				</label>
				<button type="submit" id="sub" name="sub">Login</button>
			</form>
		</div>	
	</div>
</body>
</html>