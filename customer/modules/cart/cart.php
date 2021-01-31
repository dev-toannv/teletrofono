<?php 
	session_start();
	require_once("modules/config/connectdb.php");
	if(isset($_GET['id_product'])==true && $_GET['id_product']!="" && isset($_SESSION['id_customer'])==true && $_SESSION['id_customer']!=""){
		$id_p=$_GET['id_product'];
		$id_c=$_SESSION['id_customer'];
		$sql="select id from product where id = '$id_p'";
		$sql1="select id from customer where id = '$id_c'";
		$re=mysqli_query($conn,$sql);
		$re1=mysqli_query($conn,$sql1);
		
		if(mysqli_num_rows($re)>0 && mysqli_num_rows($re1)>0){
			$sql33="select id,product_quantity from cart where product_id='$id_p' and customer_id='$id_c'";
			$que=mysqli_query($conn,$sql33);
			$check_cart=mysqli_num_rows($que);
			if($check_cart>0){
				$l=mysqli_fetch_assoc($que);
				$quantity=$l['product_quantity'];
				$id_cart=$l['id'];
				$quantity=$quantity+1;
				$s="update cart set product_quantity = $quantity where id ='$id_cart'";
				mysqli_query($conn,$s);
				header("Location:index.php");
			}
			else{
				$sqlz="insert into cart values(null,'$id_p','$id_c',1)";
				mysqli_query($conn,$sqlz);
				header("Location:index.php");
			}
		}
		else{
			header("Location:index.php");
		}
	}
	// khong co tai khoan
	if(isset($_GET['id_product'])==true && $_GET['id_product']!="" && isset($_SESSION['id_customer'])==false){
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

	<link rel="stylesheet" typep="text/css" href="modules/cart/noacc1.css">
<script type="text/javascript">
	
</script>
<div id="global">
	<div id="local1">
		<div id="local11">
			<a href="index.php"><img src="../public/customer/logo3.png" alt=""></a>
		</div>
		<div id="local12">
			<?php 
				if(isset($_SESSION['id_customer'])){
					require_once("modules/cart/acc.php");
				}
				else{
					require_once("modules/cart/noacc.php");
				}
	 		?>
		</div>
	</div>
</div>
</div>
	