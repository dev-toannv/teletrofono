
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AdminLogin</title>
</head>
<body>
	<div>
		<p>
			<?php 
				if(isset($_GET['error'])){
					echo $_GET['error'];
				}
				
			 ?>
		</p>
		<form action="admin_infor.php" method="POST" >
			<input type="text" id="admin_acc" name="admin_acc" placeholder="Tai khoan"> <br>
			<input type="password" id="admin_pass" name="admin_pass" placeholder="Mat khau"> <br>
			<button type="submit" id="sub" name="sub">Login</button>
		</form>
	</div>
</body>
</html>