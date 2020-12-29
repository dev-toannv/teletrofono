
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
					if(isset($_GET['error'])){
						echo "<p>".$_GET['error']."</p>";
					}
				 ?>
		</div>
		<div id="form">
			<form action="admin_infor.php" method="POST" >
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