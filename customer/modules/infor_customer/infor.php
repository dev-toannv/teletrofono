<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>

<?php 
	if(!isset($_SESSION['select'])){
		$_SESSION['select']="account";
	}

	if(isset($_GET['bill'])){
		$_SESSION['select']="bill";
	}
	if(isset($_GET['account'])){
		$_SESSION['select']="account";
	}

?>
<style rel="stylesheet" type="text/css">
	<?php 
		if($_SESSION['select']=="account"){
			echo "#infor1  a{
	background-color: #d9dad9;}";
			echo "#bill1  a{
	background-color: white;}";
		}
		
		else{
			echo "#bill1  a{
	background-color: #d9dad9;}";
			echo "#infor1  a{
	background-color: white;}";
		}
	?>
</style>
<link rel="stylesheet" href="modules/infor_customer/infor.css" type="text/css">
<div id="container_infor">
	<div id="left_c">
		<div id="infor1">
			<a href="index.php?infor=infor&account" style="display: inline-block;width: 80%;height: 75%; border:1px solid black;">
				<div style="width: 30%; height: 100%; float: left;display: flex;justify-content: center;align-items: center;">
					<img src="../public/customer/account.png" style="max-height: 90%; max-width: 90%" alt="">
				</div>
				<div style="width: 70%; height: 100%; float: left;float: left;display: flex;justify-content: center;align-items: center;font-size: 150%;color:black">
					Thông tin cá nhân
				</div>
			</a>
		</div>
		<div id="bill1">
			<a href="index.php?infor=infor&bill" style="display: inline-block;width: 80%;height: 75%; border:1px solid black;">
				<div style="width: 30%; height: 100%; float: left;float: left;display: flex;justify-content: center;align-items: center;">
					<img src="../public/customer/invoices.png" style="max-height: 90%; max-width: 90%" alt="">
				</div>
				<div style="width: 70%; height: 100%; float: left;float: left;display: flex;justify-content: center;align-items: center;font-size: 150%; color:black">
					Hóa đơn
				</div>
			</a>
		</div>
	</div>
	<div id="right_c">
		<?php 
			if(isset($_SESSION['id_customer'])){
				if($_SESSION['select']=="account"){
					require_once("modules/infor_customer/infor1.php");
				}
				else{
					require_once("modules/infor_customer/bill.php");
				}
			}
			else{
				header("Location:index.php");
			}
		?>
	</div>
</div>
<?php 
	// echo $_SESSION['username']."<br>";
	// echo $_SESSION['acc'] . " va ". $_SESSION['pass'];
	

?>