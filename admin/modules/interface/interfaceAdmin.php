<?php 
	session_start();
	if(isset($_SESSION['acc'])==false || isset($_SESSION['pass'])==false){
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
						<a href="modules/inforAdmin">Thông tin ADMIN</a>
					</td>
					<td id="customer" class="col">
						<a href="modules/customer">Khách hàng</a>
					</td>
					<td id="staff" class="col">
						<a href="modules/staff">Nhân viên</a>
					</td>
					<td id="product" class="col">
						<a href="modules/product">Sản phẩm</a>
					</td>
				</tr>
				<tr id="row2">
					<td id="supplier" class="col">
						<a href="modules/supplier">Nhà cung cấp</a>
					</td>
					<td id="bill" class="col">
						<a href="modules/bill">Hóa đơn</a>
					</td>
					<td id="history" class="col">
						<a href="modules/history">Nhật ký</a>
					</td>
					<td id="ConceptPage" class="col">
						<a href="modlues/ConceptPage">Concept</a>
					</td>
				</tr>
				<tr id="row3">
					<td id="importProduct" class="col" colspan="2">
						<a href="modules/importProduct">Nhập hàng</a>
					</td>
					<td id="revenue" class="col" colspan="2">
						<a href="modules/revenue">Doanh thu</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div id="footer"></div>
</body>
</html>