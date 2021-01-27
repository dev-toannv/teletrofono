<link rel="stylesheet" type="text/css" href="modules/show_product/show_product.css">
<?php
	require_once("modules/config/connectdb.php");
	if(isset($_GET['product_detail'])){
		$id=$_GET['product_detail'];
		$sql50="select*from product where id='$id'";
		$query_sql50=mysqli_query($conn,$sql50);
		if(mysqli_num_rows($query_sql50)>0){
			$result=mysqli_fetch_assoc($query_sql50);
			
			$sql_img="select * from image where product_id='$id'";

		}
		else{
			header("Location:index.php");
		}
		
	}
	else{
		header("Location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div id="product_container">
		<div id="product_basic">
			<div id="a">
				<div id="a1">
					<!-- Anh san pham -->
					<div id="a1_top">
						<?php
							
						?>
					</div>
					<div id="a1_bottom">
						
					</div>
				</div>
				<div id="a2">
					<!-- Ten, hang , gia va them vao gio hang -->
					<div id="a2_name">
						<p>
							<?php 
								echo $result['product_name'];
							?>
						</p>
							
					</div>
					<div id="a2_sale">
						sale
					</div>
					<div id="a2_price">
						<p>
							<?php 
								echo number_format($result['product_price'],0,'','.')." VNĐ";;
							?>
						</p>
					</div>
					<div id="a2_addcart">
						<?php 
							echo "<a href='https://www.facebook.com/'><img src='../public/customer/add_cart.png' id='i2'>&nbsp&nbspThêm vào giỏ hàng</a>";
						 ?>
					</div>
				</div>
			</div>
			<div id="b">
				<!-- An de xem chi tiet san pham -->
			</div>
			<div id="c">
				<!-- Danh gia va binh luan -->
			</div>
		</div>

		<div id="product_detail">
			
		</div>
	</div>
</body>
</html>