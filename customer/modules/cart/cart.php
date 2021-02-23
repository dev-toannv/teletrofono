<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	require_once("modules/config/connectdb.php");
	// Thao tac voi gio hang them va xoa
	if(isset($_GET['id_product'])==true && $_GET['id_product']!=""){
		$id_p=$_GET['id_product'];
		if($_SESSION['cart'][$id_p]){
			$_SESSION['cart'][$id_p]+=1;
			header("Location:index.php");
		}
		else{
			$_SESSION['cart'][$id_p]=1;
			header("Location:index.php");
		}
		
	}
?>
<div id="lz">
	<style type="text/css">
		#l{
			width: 100%;
			height: auto;
		}
		#taskbar{
			display: none;
		}
	</style>

	<link rel="stylesheet" typep="text/css" href="modules/cart/cart.css">
<div id="global">
	<div id="local1">
		<div id="local11">
			<a href="index.php"><img src="../public/customer/logo3.png" alt=""></a>
		</div>
		<div id="local12">
			<?php 
				if(isset($_GET['bill'])){
					require_once("modules/cart/bill.php");
				}
				else{
					require_once("modules/cart/noacc.php");
				}
				
	 		?>
		</div>
	</div>
</div>
</div>
	