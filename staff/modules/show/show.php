<?php
	$conn=mysqli_connect('localhost','root','','teletrofono');
	if(!$conn){
		die("Connect error : ".mysqli_connect_error());
	}
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
	</style>
	<!-------------------->
	<div id="show_search" style="height:5%">
		<form action="" method="POST" style="display:inline-block">
			<input type="text" id="s_name" name="s_name" placeholder="Tìm theo tên sản phẩm">
			<select name="s_manu">
					<option value="">Chọn hãng</option>
					<?php 
						$arr_manu= array();
						while($result_manu=mysqli_fetch_assoc($query_manu)){
							$id_manu=$result_manu['id'];
							$arr_manu[$id_manu] = $result_manu['manu_name'];
							echo "<option value='$id_manu'>";
								echo $result_manu['manu_name'];
							echo "</option>";
						}
					?>
			</select>

			<select name="s_ram">
					<option value="">Ram</option>
					<?php 
						while($result_ram=mysqli_fetch_assoc($query_ram)){
							$product_ram=$result_ram['product_ram'];
							echo "<option value='$product_ram'>";
								echo $result_ram['product_ram'];
							echo "</option>";
						}
					?>
			</select>

			<select name="s_storage">
					<option value="">Bộ nhớ trong</option>
					<?php 
						while($result_storage=mysqli_fetch_assoc($query_storage)){
							$product_storage=$result_storage['product_storage'];
							echo "<option value='$product_storage'>";
								echo $result_storage['product_storage'];
							echo "</option>";
						}
					?>
			</select>
			<button type="submit" name="subsearch">Tìm kiếm</button>
		</form>
			<?php 
				if($soluong==1){
					$soluong=mysqli_num_rows($re);
					echo "<span>"."Kết quả tìm kiếm : ".$soluong." kết quả"."</span>";
				}
			?>
	</div>
	<!-------------------->
	<?php 
		require_once("modules/show/show_product.php");

	?>
</div>