
<div id="page">
	<marquee scrollamount="9"  style="padding:0;font-size:30px">I.STORE - Nơi chất lượng và dịch vụ là thứ tồn tại duy nhất</marquee>
</div>

<div style="height: auto;width: 100%;display: flex;flex-direction: column;justify-content: space-around;z-index: 1;">
	<div class='div_product'>
	<?php 
		if(isset($_GET['complete'])){
			echo "<script type='text/javascript'>";
 			echo "alert('Thanh toán thành công');";
 			echo "</script>";
		}
	?>
	<?php 
		$dem=0;
		while($row=mysqli_fetch_assoc($query_sql19)){
			$id=$row['id'];
			// $manu=$row['product_manu'];
			$sql_img="SELECT * FROM image WHERE image_name like '%product_".$id."_1%' or image_name like '%product_".$id."_2%' or image_name like '%product_".$id."_3%' limit 1";
			$a=mysqli_fetch_assoc(mysqli_query($conn,$sql_img));
			$folder_img=$manuu[$row['product_manu']];
			$path="../public/product/".$folder_img."/".$a['image_name'];
			// lay hang
				echo "<div class='show_product'>";
					echo "<div class='show_product_name'>";
						echo "<div>".$row['product_name']."</div>";
					echo "</div>";
					echo "<div class='show_product_image'>";
						echo "<img src='".$path."' class='show_img' />";
						echo "<div class='overlay'>";
							echo "<a href='"."?search_manu=".$_SESSION['search_manu']."&product_detail=".$id."'>Chi tiết sản phẩm</a>";
						echo "</div>";
					echo "</div>";
					echo "<div class='price'>";
						echo number_format($row['product_price'],0,'','.')." VNĐ";
					echo "</div>";
					echo "<div class='add_cart'>";
					if($row['product_status']<=0){
						echo "<p style='font-size:23px;'>Ngừng kinh doanh</p>";
					}
					else{
						if($row['product_quantity']<=0){
							echo "<p style='font-size:23px;'>Hết hàng</p>";
						}
						else{
							echo "<a href='index.php?module=cart&action=cart&id_product=".$id."'><img src='../public/customer/add_cart.png' class='iii'>&nbsp&nbspThêm vào giỏ hàng</a>";
						}
					}

					// if($row['product_quantity']<=0){
					// 	echo "<p style='font-size:23px;'>Hết hàng</p>";
					// }
					// else{
					// 	if($row['product_status']>0){
					// 	echo "<a href='index.php?module=cart&action=cart&id_product=".$id."'><img src='../public/customer/add_cart.png' class='iii'>&nbsp&nbspThêm vào giỏ hàng</a>";
					// }
					// else{
					// 	echo "<p style='font-size:23px;'>Ngừng kinh doanh</p>";
					// }
					// }
					
					echo "</div>";
				echo "</div>";
			$dem=$dem+1;
            if($dem%3==0 && $dem!=0 && $dem<$limit){
                echo "</div>";
                echo "<div class='div_product'>";
            }
		}
	?>
	</div>
</div>