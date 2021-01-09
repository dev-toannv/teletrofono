<?php 
	session_start();
	if(isset($_SESSION['staff_code'])==false || isset($_SESSION['staff_password'])==false){
		header("Location:index.php");
	}
	require_once("modules/interface/config/fix_confirm_form_resubmission.php");
	if(isset($_POST['logout'])){
		unset($_SESSION['staff_code']);
		unset($_SESSION['staff_password']);
		unset($_SESSION['right_display']);
		header("Location:index.php");
	}
	// lưu session để làm đậm màu của thanh bên trái khi chọn nó, mặc định đậm infor
	if(isset($_SESSION['right_display'])==false){
		$_SESSION['right_display']='infor';
	}
	else{
		if(isset($_GET['choose'])){
			if($_GET['choose']=="infor"){
				$_SESSION['right_display']="infor";
			}
			if($_GET['choose']=="mproduct"){
				$_SESSION['right_display']="mproduct";
			}
			if($_GET['choose']=="mbill"){
				$_SESSION['right_display']="mbill";
			}
			if($_GET['choose']=="mcustomer"){
				$_SESSION['right_display']="mcustomer";
			}
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="modules/interface/interfaceStaff.css">
	<link rel="stylesheet" type="text/css" href="modules/left/left.css">
	<title>Staff</title>
	<style type="text/css">
		<?php
		if($_SESSION['right_display']=="infor"){
			echo"#left_infor{
				background:#e7e4ec;
			}";
		}
		if($_SESSION['right_display']=="mproduct"){
			echo"#left_product{
				background:#e7e4ec;
			}";
		}
		if($_SESSION['right_display']=="mbill"){
			echo"#left_bill{
				background:#e7e4ec;
			}";
		}
		if($_SESSION['right_display']=="mcustomer"){
			echo"#left_customer{
				background:#e7e4ec;
			}";
		}
		?>
	</style>
</head>
<body>
	<div id="container">
		<div id="left">
			<?php
				require_once("modules/left/left.php");
			?>
		</div>
		<div id="right">
			<?php
				 
			?>
		</div>
	</div>
		
</body>
</html>