<?php 
	session_start();
	if(isset($_SESSION['admin_acc'])==false || isset($_SESSION['admin_pass'])==false){
		header("Location:index.php?module=common&action=login");
	}
	if(isset($_POST['sub'])){
		unset($_SESSION['admin_acc']);
		unset($_SESSION['admin_pass']);
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>InterfaceAdmin</title>
	<link rel="stylesheet" type="text/css" href="modules/interface/interfaceAdmin.css">
</head>
<body>
	<div id="header">
		<img src="modules/interface/img/logo3.png"  id="logo"alt="">
	</div>
	<!--Đây là khu vực giao diện của admin-->
	<div id="body">
		<?php 
			require_once("modules/interface/main.php");
		?>
	</div>
</body>
</html>