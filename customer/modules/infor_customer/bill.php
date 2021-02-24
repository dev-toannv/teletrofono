<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	require_once("modules/config/connectdb.php");
	$id_customer=$_SESSION['id_customer'];
	if(!isset($_SESSION['s'])){
		$_SESSION['s']="processing";
	}
	if(isset($_GET['select'])){
		if($_GET['select']=='processing'){
			$_SESSION['s']="processing";
		}
		if($_GET['select']=='private'){
			$_SESSION['s']="private";
		}
	}

?>
<link rel="stylesheet" href="modules/infor_customer/bill.css">
<style rel="stylesheet" type="text/css">
	<?php 
		if($_SESSION['s']=="processing"){
			echo "#a1{background: #d9dad9;color:red;}";
		}
		else{
			echo "#a2{background: #d9dad9;color:red;}";
		}
	?>
</style>
<div id="bill_process">
	<div id='select1'>
		<div class="ss1">
			<a href="index.php?infor=infor&bill&select=processing" id='a1'>Đơn hàng đang chờ</a>
		</div>
		<div class="ss1">
			<a href="index.php?infor=infor&bill&select=private" id='a2'>Các đơn hàng của tôi</a>
		</div>
	</div>
	<div id='select2'>
		<?php 
		if(isset($_SESSION['id_customer'])){
			if($_SESSION['s']=="processing"){
				require_once("modules/infor_customer/processing.php");
			}
			else{
				require_once("modules/infor_customer/private.php");
			}
		}
		else{
			header("Location:index.php");
		}
		?>
	</div>
</div>