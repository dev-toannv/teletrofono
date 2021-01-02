<?php 
	session_start();
	$error="";
	require_once("modules/sign_up/config/connectdb.php");
	require_once("modules/sign_up/config/process_signup_customer.php");
	require_once("modules/sign_up/config/fix_confirm_form_resubmission.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="modules/sign_up/sign_up.css">
</head>
<body>
	<div id="container">
		<div id="header">
			<div class="ff" id="lg">
				<a href="index.php?module=sign_up&action=sign_up">
					<img src="modules/sign_up/img/logo3.png" id="logo"alt="">
				</a>
			</div>
			<div class='ff' id="chu">
				<p id="chu1">
					Đăng ký tài khoản <span style="color:#8c247d">ISTORE</span>
				</p>
			</div>
		</div>
		<div id="body">
			<div id="bodyleft">
				
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
									Tên người dùng
								</td>
								<td>
									<input type="text" id="nameuser" name="nameuser">
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
									<label for="sub">
										<div id="label_sub">
											<p id="chu2">Đăng ký</p>
										</div>
									</label>
									<button type="submit" id="sub" name="sub"></button>
								</td>
							</tr>
						</form>
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
		<div id="footer">
			
		</div>
	</div>
</body>
</html>