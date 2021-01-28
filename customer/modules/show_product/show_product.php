<link rel="stylesheet" type="text/css" href="modules/show_product/show_product.css">
<?php
	require_once("modules/config/connectdb.php");
	$manu=array();
	$pic=array();
	if(isset($_GET['product_detail'])){
		$id=$_GET['product_detail'];
		$sql50="select*from product where id='$id'";
		$query_sql50=mysqli_query($conn,$sql50);
		if(mysqli_num_rows($query_sql50)>0){
			$result=mysqli_fetch_assoc($query_sql50);
			// xu ly ten hang
			$sql_manu="select * from manu_product";
			$query_sql_manu=mysqli_query($conn,$sql_manu);
			while ($a=mysqli_fetch_assoc($query_sql_manu)){
				$manu[$a['id']]=$a['manu_name'];
			}
			// xu ly folder picture
			$folder="../public/product/".$manu[$result['product_manu']]."/";
			// xu ly anh 3 anh chinh
			for($i=1;$i<=3;$i++){
				$pic[$i]="product_".$id."_".$i."_";
				$sql_img="select * from image where product_id='$id' and image_name like'%$pic[$i]%'";
				if(mysqli_num_rows(mysqli_query($conn,$sql_img))<=0){
					$pic[$i]="../public/product/no_image.png";
				}
				else{
					$b=mysqli_fetch_assoc(mysqli_query($conn,$sql_img));
					$pic[$i]=$folder.$b['image_name'];
				}
			}
			// xu ly path den 3 anh chinh

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

	<script type="text/javascript">
        function myfunc(){
            var a= document.getElementById('anh4');
            var b= document.getElementById('anh1');
            var url = b.src;
            a.src=url;
        }
        function myfunc2(){
            var a= document.getElementById('anh4');
            var b= document.getElementById('anh2');
            var url = b.src;
            a.src=url;
        }
        function myfunc3(){
            var a= document.getElementById('anh4');
            var b= document.getElementById('anh3');
            var url = b.src;
            a.src=url;
        }
        
    </script>
</head>
<body>
	<div id="product_container">
		<div id="product_basic">
			<div id="a">
				<div id="a1">
					<!-- Anh san pham -->
					<div id="a1_top">
						<?php
							echo "<img src='".$pic[1]."' id='anh4'/>";
						?>
					</div>
					<div id="a1_bottom">
						<div id="a1_pic2">
							<?php 
								echo "<img src='".$pic[1]."' id='anh1' onclick='myfunc()'/>";
							?>
						</div>
						<div id="a1_pic3">
							<?php 
								echo "<img src='".$pic[2]."' id='anh2' onclick='myfunc2()'/>";
							?>
						</div>
						<div id="more_pic">
							<?php 
								echo "<img src='".$pic[3]."' id='anh3' onclick='myfunc3()'/>";
							?>
						</div>
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
						<div id="a2_sale_left">
							<p align="left">- Khách hàng khi thanh toán trên 100.000.000VNĐ sẽ được nâng cấp lên V.I.P</p>
							<p>
								- Khuyến mại chỉ áp dụng đối với khách hàng đã tạo tài khoản và đúng thông tin chi tiết
							</p>
							<p>
								- Khách hàng V.I.P được giảm giá 3% mọi mặt hàng 
							</p>
							<br>
							<p style="text-align: center">Liên hệ : 037.6886.282</p>
						</div>
						<div id="a2_sale_right">
							<?php
								if($result['product_quantity']>0){
									echo "<p id='st'>"."Tình trạng: Còn hàng"."</p>";
								} 
								else{
									echo "<p id='st'>"."Tình trạng: Hết hàng"."</p>";
								}
							?>
						</div>
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
							if($result['product_status']>0){
								echo "<a href='https://www.facebook.com/'><img src='../public/customer/add_cart.png' id='i2'>&nbsp&nbspThêm vào giỏ hàng</a>";
							}
							else{
								echo "<p>"."Ngừng kinh doanh"."</p>";
							}
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