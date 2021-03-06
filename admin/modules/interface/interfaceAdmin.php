 <?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
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
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="modules/interface/interfaceAdmin.css">
	<link rel="apple-touch-icon" sizes="57x57" href="z.ico/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="z.ico/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="z.ico/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="z.ico/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="z.ico/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="z.ico/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="z.ico/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="z.ico/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="z.ico/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="z.ico/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="z.ico/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="z.ico/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="z.ico/favicon-16x16.png">
		<link rel="manifest" href="z.ico/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="z.ico/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
</head>
<body>
	<div id="header">
		<style type="text/css">
			body{
				
				min-width: 1652px;
			}
			#body{
				
				min-width: 1652px;
			}
		</style>
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