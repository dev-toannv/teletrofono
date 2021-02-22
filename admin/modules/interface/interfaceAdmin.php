
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
		<a href="index.php"><img src="modules/common/img/logo3.png" id="logo"></a>
	</div>
	<!--Đây là khu vực giao diện của admin-->
	<div id="body">
		<?php 
			require_once("modules/config/connectdb.php");
		?>
	<div id="left">

	</div>
	<div id="center">
		<?php
			if(!isset($_GET['infor']) && !isset($_GET['staff']) && !isset($_GET['supplier']) && !isset($_GET['bill']) && !isset($_GET['revenue'])){
				require_once("modules/interface/main.php");
			}
			else{
				if(isset($_GET['infor'])){
					require_once("modules/inforAdmin/inforAdmin.php");
				}
				else if(isset($_GET['staff'])){
					require_once("modules/staff/staffManagement.php");
				}
				else if(isset($_GET['supplier'])){
					require_once("modules/supplier/supplierManagement.php");
				}
				else if(isset($_GET['revenue'])){
					require_once("modules/revenue/revenueManagement.php");
				}
				else{
					require_once("modules/interface/main.php");
				}
			}
			
			
		?>
	</div>
	<div id="right">
		<script>
			if ( window.history.replaceState ) {
	    		window.history.replaceState( null, null, window.location.href );
			}
		</script>
	</div>
		
	</div>
</body>
</html>