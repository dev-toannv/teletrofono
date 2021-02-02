<?php 
	session_start();
	if(isset($_SESSION['admin_acc'])==false || isset($_SESSION['admin_pass'])==false){
		header("Location:index.php");
	}
	if(isset($_POST['sub'])){
		session_destroy();
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
		<img src="modules/interface/img/logo3.png"  id="logo"alt="">
	</div>
	<!--Đây là khu vực giao diện của admin-->
	<div id="body">
		<div id="content">
			<table cellspacing="10px">
				<tr id="row1">
					<td id="infor" class="col">
						<a href="index.php?module=inforAdmin&action=inforAdmin">Thông tin ADMIN</a>
					</td>
					<td id="staff" class="col">
						<a href="index.php?module=staff&action=staffManagement">Nhân viên</a>
					</td>
				</tr>
				<tr id="row2">
					<td id="supplier" class="col">
						<a href="index.php?module=supplier&action=supplierManagement">Về sản phẩm</a>
					</td>
					<td id="bill" class="col">
						<a href="index.php?module=bill&action=billManagement">Hóa đơn</a>
					</td>
				</tr>
				<tr id="row3">
					<td id="revenue" class="col" colspan="2">
						<a href="index.php?module=revenue&action=revenueManagement">Doanh thu</a>
					</td>
				</tr>
				<tr id="row4">
					<td id="dangxuat" class="col" colspan="2" >
						<form action="" method="POST">
							<label for="sub">
								<div id="label">
									Đăng xuất
								</div>
							</label>
							<button id="sub" name="sub" type="submit" style="display:none"></button>
						</form>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>