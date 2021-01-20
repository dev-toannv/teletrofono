<?php
	require_once("modules/config/connectdb.php");
	// lay thong tin hang san xuat de search
	$manu="select * from manu_product";
	$query_manu=mysqli_query($conn,$manu);
	// $result_manu=mysqli_fetch_assoc($query_manu);
	$ram="select product_ram from product group by product_ram";
	$query_ram=mysqli_query($conn,$ram);

	$storage="select product_storage from product group by product_storage";
	$query_storage=mysqli_query($conn,$storage);

	$color="select * from color_product";
	$query_color=mysqli_query($conn,$color);
	$arr_color=array();
	while($result_color=mysqli_fetch_assoc($query_color)){
		$arr_color[$result_color['id']]=$result_color['color_name'];
	}

	$sql="select id,product_name,product_manu,product_color,product_quantity,product_price,product_status,product_ram,product_storage from product";
	if(isset($_POST['subsearch'])){
		$ma=$_POST['s_manu'];
		$ra=$_POST['s_ram'];
		$na=trim($_POST['s_name']);
		$sto=$_POST['s_storage'];
		if(!empty($na)){
			$na="product_name "."like'%".$na."%'";
		}
		else{
			$na="product_name like'%%' ";
		}

		if(!empty($ma)){
			$ma="and "."product_manu=".$ma;
		}
		else{
			$ma="";
		}

		if(!empty($ra)){
			$ra="and "."product_ram=".$ra;
		}
		else{
			$ra="";
		}

		if(!empty($sto)){
			$sto="and "."product_storage=".$sto;
		}
		else{
			$sto="";
		}
		$sql="select id,product_name,product_manu,product_color,product_quantity,product_price,product_status,product_ram,product_storage from product where $na $ma $ra $sto";
		$soluong=1;
	}
	$re=mysqli_query($conn,$sql);
?>
<div id="show_container">
	<link rel="stylesheet" type="text/css" href="modules/show/show.css">
	<style type="text/css">
		#container{
			height: auto;
		}
		#right{
			height:969px;
		}
		#show_container{
			width: 100%;
			height: 100%;
		}
		#show_search *{
			height: 100%;
		}
		#s_name:hover{
			border-color: green;
		}
		select:hover{
			background-color: #dedede;
			border-color: green;
		}
		button:hover{
			border-color: green;
		}
		select option{
			background-color:white;
		}
	</style>
	<!-------------------->
	<?php 
		if(isset($_GET['id_edit'])){
			require_once("modules/edit/edit.php");
		}
		else{
			require_once("modules/show/show_product.php");
		}
	?>
</div>