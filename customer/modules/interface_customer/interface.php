
<?php
	session_start();
	require_once("modules/interface_customer/config/fix_confirm_form_resubmission.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="modules/header/header.css">
	<link rel="stylesheet" type="text/css" href="modules/taskbar/taskbar.css">
	<link rel="stylesheet" type="text/css" href="modules/body/body.css">
	<!-- <style type="text/css">
		/*#div1{
			 width: 100px;
			 height: 100px;
			 background: purple;
			 -webkit-transition: width 2s; 
			 transition: width 2s;
			}
		#div1:hover {
		 width: 300px;
		}*/
	</style> -->

	<script type="text/javascript" src="modules/taskbar/taskbar.js"></script>
</head>
<body>
	<?php 
		require_once("modules/header/header.php");
	?>
	<?php 
		require_once("modules/taskbar/taskbar.php");
	?>
	<?php 
		require_once("modules/body/body.php");
	?>

</body>
</html>