<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	require_once("modules/config/connectdb.php");
	require_once("modules/sign_up/config/process_signup_customer.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="modules/sign_up/sign_up.css">
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
<script type="text/javascript">
	function validate(){
		var a = document.getElementById('acc');
		var b = document.getElementById('nameuser');
		var c = document.getElementById('pass');
		var flag=0;

		const checka=/^[a-zA-Z0-9]{5,30}$/;
		const checkb=/^[a-zA-Z]{5,40}$/;
		const checkc=/^[a-zA-Z0-9]{5,50}$/;
		if(checka.test(a.value)==false){
			a.classList.add("error");
			flag=1;
			alert("Lỗi tên tài khoản, chưa đúng định dạng theo yêu cầu");
		}
		if(checkb.test(b.value)==false){
			b.classList.add("error");
			flag=1;
			alert("Lỗi tên người dùng, chưa đúng định dạng theo yêu cầu");
		}
		if(checkc.test(c.value)==false){
			c.classList.add("error");
			flag=1;
			alert("Lỗi mật khẩu, chưa đúng định dạng theo yêu cầu");
		}

		if(flag==0){
			
			return true;
		}
		else{
			return false;
		}
	}
</script>
<style type="text/css">
	.error::placeholder{
			  color: red;
			  opacity: 1;
		}
</style>
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
						<form action="" method="POST" onsubmit="return validate()">
							<tr>
								<td class="leftform" style="font-weight: bold;">
									Tài khoản
								</td>
								<td>
									<input type="text" id="acc" name="acc" placeholder="a-zA-z0-9, 5->30 ký tự">
								</td>
							</tr>

							<tr>
								<td class="leftform" style="font-weight: bold;">
									Tên người dùng
								</td>
								<td>
									<input type="text" id="nameuser" name="nameuser"placeholder="a-zA-z, 5->40 ký tự">
								</td>
							</tr>

							<tr>
								<td class="leftform" style="font-weight: bold;">
									Mật khẩu
								</td>
								<td>
									<input type="password" id="pass" name="pass" placeholder="a-zA-z0-9, 5->50 ký tự">
								</td>
							</tr>

							<tr align="right">
								<td colspan="2" id="bot">
									<label for="sub" id="lb">
										<div id="label_sub" style="font-weight: bold;">
											Đăng ký
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
	</div>
</body>
</html>

	<script>
		if ( window.history.replaceState ) {
    		window.history.replaceState( null, null, window.location.href );
		}
	</script>