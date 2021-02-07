<?php 
	session_start();
	if(isset($_SESSION['staff_code'])==false || isset($_SESSION['staff_password'])==false){
		header("Location:index.php");
	}
	else{
		
		$staff_code=$_SESSION['staff_code'];
		$staff_password=$_SESSION['staff_password'];
	}
	require_once("modules/config/fix_confirm_form_resubmission.php");
	if(isset($_POST['logout'])){
		unset($_SESSION['staff_code']);
		unset($_SESSION['staff_password']);
		unset($_SESSION['right_display']);
		unset($_SESSION['mpr']);
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
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="modules/interface/interfaceStaff.css">
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
		?>
	</style>
	<script type="text/javascript">
		if ( window.history.replaceState ) {
    		window.history.replaceState( null, null, window.location.href );
		}
	</script>
	<script type="text/javascript" src="modules/staff_infor/staff_infor.js"></script>
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
				if($_SESSION['right_display']=="infor"){
					require_once("modules/staff_infor/staff_infor.php"); 
				}
				if($_SESSION['right_display']=="mproduct"){
					require_once("modules/staff_management_product/staff_management_product.php");
				}
				if($_SESSION['right_display']=="mbill"){
					require_once("modules/staff_management_bill/staff_management_bill.php");
				}
			?>
		</div>
	</div>
		
</body>
</html>