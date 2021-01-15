<?php 
	require_once("modules/common/config/processlogin.php");
	require_once("modules/common/config/fix_confirm_form_resubmission.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>StaffLogin</title>
	<link rel="stylesheet" type="text/css" href="modules/common/common_css/login.css">
</head>
<body>
	<div id="head">
			<a href="index.php"><img src="modules/common/img/logo3.png" id="logo"></a>
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
			<form action="" method="POST" >
				<input type="text" id="staff_acc" name="staff_code" placeholder="Account"> <br>
				<input type="password" id="staff_pass" name="staff_password" placeholder="Password"> <br>
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