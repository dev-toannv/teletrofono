<?php 
	$error="";
	require_once("modules/config/connectdb.php");
	require_once("modules/sign_up/config/process_signup_customer.php");
	require_once("modules/config/fix_confirm_form_resubmission.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="modules/sign_up/sign_up.css">
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
			alert("sai a");
		}
		if(checkb.test(b.value)==false){
			b.classList.add("error");
			flag=1;
			alert("sai b");
		}
		if(checkc.test(c.value)==false){
			c.classList.add("error");
			flag=1;
			alert("sai c");
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
								<td class="leftform">
									Tài khoản
								</td>
								<td>
									<input type="text" id="acc" name="acc" placeholder="a-zA-z0-9, 5->30 ký tự">
								</td>
							</tr>

							<tr>
								<td class="leftform">
									Tên người dùng
								</td>
								<td>
									<input type="text" id="nameuser" name="nameuser"placeholder="a-zA-z, 5->40 ký tự">
								</td>
							</tr>

							<tr>
								<td class="leftform">
									Mật khẩu
								</td>
								<td>
									<input type="password" id="pass" name="pass" placeholder="a-zA-z0-9, 5->50 ký tự">
								</td>
							</tr>

							<tr align="right">
								<td colspan="2" id="bot">
									<label for="sub" id="lb">
										<div id="label_sub">
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
		<div id="footer">
			
		</div>
	</div>
</body>
</html>