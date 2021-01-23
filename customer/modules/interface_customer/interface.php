
<?php
	session_start();
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
</head>
<body style="width:100%;margin:0px">
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