<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php
	require_once("modules/config/fix_confirm_form_resubmission.php");
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ISTORE</title>
	<link rel="stylesheet" type="text/css" href="modules/header/header.css">
	<link rel="stylesheet" type="text/css" href="modules/taskbar/taskbar.css">
	<link rel="stylesheet" type="text/css" href="modules/body/body.css">
	<script type="text/javascript" src="modules/taskbar/taskbar.js"></script>
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
<body style="width:100%;margin:0px">
	<?php 
		require_once("modules/header/header.php");
	?>
	<?php 
		require_once("modules/taskbar/taskbar.php");
	?>
	<?php
	if(isset($_GET['infor'])){
		require_once("modules/infor_customer/infor.php");
	}
	else{
		if(isset($_GET['cart'])){
			require_once("modules/cart/cart.php");
			// header("Location:index.php?module=cart&action=cart");
		}
		else{
			if(isset($_GET['product_detail'])){
				require_once("modules/show_product/show_product.php");
			} 
			else{
				require_once("modules/body/body.php");
			}
		}
		
	}
	
	?>
	<?php 
		require_once("modules/footer/footer.php");
	?>
</body>
</html>