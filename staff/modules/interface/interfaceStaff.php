<?php 
	session_start();
	if(isset($_SESSION['staff_code'])==false || isset($_SESSION['staff_password'])==false){
		header("Location:index.php");
	}
	require_once("modules/interface/config/fix_confirm_form_resubmission.php");
	if(isset($_POST['logout'])){
		unset($_SESSION['staff_code']);
		unset($_SESSION['staff_password']);
		header("Location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="modules/interface/interfaceStaff.css">
	<link rel="stylesheet" type="text/css" href="modules/left/left.css">
	<title>Staff</title>
</head>
<body>
	<div id="container">
		<div id="left">
			<?php
				require_once("modules/left/left.php");
			?>
		</div>
		<div id="right">
			<?php
				require_once("modules/right/right.php"); 
			?>
		</div>
	</div>
		
</body>
</html>