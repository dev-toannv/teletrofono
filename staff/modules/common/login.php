 <?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	require_once("modules/common/config/processlogin.php");
	require_once("modules/config/fix_confirm_form_resubmission.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>StaffLogin</title>
	<link rel="stylesheet" type="text/css" href="modules/common/common_css/login.css">
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
	<style type="text/css">
		body{
		min-width: 1652px;
	}
	</style>
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

<script>
		if ( window.history.replaceState ) {
    		window.history.replaceState( null, null, window.location.href );
		}
	</script>