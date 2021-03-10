<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	$error="";
		if(isset($_SESSION['acc'])&&isset($_SESSION['pass'])){
			header("Location:index.php");
		}
		else{
			require_once("modules/config/connectdb.php");
			require_once("modules/common/config/process_login_customer.php");
		}
		require_once("modules/config/fix_confirm_form_resubmission.php");
?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="modules/common/login.css">
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
	<div id="container">
		<div id="header">
			<div class="ff" id="lg">
				<a href="index.php?module=interface_customer&action=interface">
					<img src="modules/sign_up/img/logo3.png" id="logo"alt="">
				</a>
			</div>
			<div class='ff' id="chu">
				<p id="chu1">
					Chào mừng bạn đến với <span style="color:#8c247d">ISTORE</span>
				</p>
			</div>
		</div>
		<div id="body">
			<div id="bodyleft">
				<!-- <img src="../public/customer/abc.gif" style="max-width: 100%;max-height:100%;" alt=""> -->
			</div>
			<div id="bodyright">
				<div id="divform">
					<table>
						<form action="" method="POST">
							<tr>
								<td class="leftform">
									Tài khoản
								</td>
								<td>
									<input type="text" id="acc" name="acc">
								</td>
							</tr>

							<tr>
								<td class="leftform">
									Mật khẩu
								</td>
								<td>
									<input type="password" id="pass" name="pass">
								</td>
							</tr>

							<tr align="right">
								<td colspan="2" id="bot">
									<label for="sub" id="bb">
										<div id="label_sub">
											Đăng nhập
										</div>
									</label>
									<button type="submit" id="sub" name="sub"></button>
								</td>
							</tr>
						</form>
						<tr align="right">
							<td colspan="2">
								<p style="margin-top:10px">
									Bạn chưa có tài khoản? <a href='index.php?module=sign_up&action=sign_up'> Đăng ký tài khoản</a>
					  			</p>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<p>
									<?php 
										echo $error;
									?>
					  			</p>
							</td>
						</tr>	
					</table>
				</div>
			</div>
		</div>
		<!-- <div id="footer"></div> -->
	</div>
</body>
</html>

<script>
		if ( window.history.replaceState ) {
    		window.history.replaceState( null, null, window.location.href );
		}
	</script>