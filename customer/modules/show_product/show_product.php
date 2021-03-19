<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<link rel="stylesheet" type="text/css" href="modules/show_product/show_product.css">
<?php
	require_once("modules/config/connectdb.php");

	$cor=array();
	$color="select * from color_product";
	$color=mysqli_query($conn,$color);
	while ($f=mysqli_fetch_assoc($color)){
		$cor[$f['id']]=$f['color_name'];
	}

	$manu=array();
	$pic=array();
	if(isset($_GET['product_detail'])){
		$id=$_GET['product_detail'];
		$id=trim($id);
		$id=(int)$id;
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
        function abc(){
        	document.getElementById("product_detail").style.display = "block";
        	document.getElementById("product_container").style.height = "765px";
        }
        function cba(){
        	document.getElementById("product_detail").style.display = "none";
        	document.getElementById("product_container").style.height = "770px";
        }

		function comeback(){
			history.back();
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
							<p align="left"> &nbsp&nbsp- Khách hàng với tổng thanh toán theo tài khoản >= 100.000.000VNĐ sẽ được nâng cấp lên V.I.P</p>
							<p>
								 &nbsp- Khuyến mại chỉ áp dụng đối với khách hàng đã tạo tài khoản và đúng thông tin chi tiết.
							</p>
							<p>
								&nbsp - Khách hàng V.I.P được giảm giá 3% mọi mặt hàng.
							</p>
							<p>
								&nbsp - Bảo hành <?php echo $result['product_guarantee']?>&nbsp tháng, chính hãng.
							</p>
							<br>
							<p style="text-align: center">Liên hệ : 037.6886.282</p>
						</div>
						<div id="a2_sale_right">
							<?php
								echo "<p>".'Màu sắc : '.$cor[$result['product_color']]."</p>";
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
								echo number_format($result['product_price'],0,'','.')." VNĐ";
							?>
						</p>
					</div>
					<div id="a2_addcart">
						<?php 
							if($result['product_status']<=0){
								echo "<p>"."Ngừng kinh doanh"."</p>";
							}
							else{
								if($result['product_quantity']<=0){
									echo "<p>"."Đang kinh doanh, hết hàng"."</p>";
								}
								else{
									echo "<a href='index.php?module=cart&action=cart&id_product=".$id."&detail'><img src='../public/customer/add_cart.png' id='i2'>&nbsp&nbspThêm vào giỏ hàng</a>";
								}
							}
						 ?>
					</div>
				</div>
			</div>
			<div style="width:100%; height:5%;">
				<button type="button" style="width: 15%;height:100%;color:red; font-size:109%" onclick="comeback()"><-- Quay lại</button>
			</div>
			<div id="b">
				<!-- An de xem chi tiet san pham -->
				<label for="aa" style="width: 50%; height: 100%; display: inline-block;display: flex;justify-content: center;align-items: center;">
					<div id ="label" style="width: 100%; height: 100%;">
						Xem thông số kỹ thuật <img src="../public/customer/tap.png" style="max-height: 60%; max-width: 60%;">
					</div>
				</label>
				<button type="button" id="aa" style="display: none;" onclick="abc()"></button>
			</div>
		</div>

		<div id="product_detail">
			<div id="left_detail" onclick="cba()">
			</div>
			<div id="center_detail">
				<h2>Thông số kỹ thuật chi tiết <?php echo $result['product_name'] ?></h2>
				
				<div>
					<table>
						<!--Màn hình-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Màn hình</td>
								</tr>
								<tr>
									<td>Công nghệ màn hình</td>
									<td><?php echo $result['product_tech_screen']; ?></td>
								</tr>
								<tr>
									<td>Độ phân giải</td>
									<td> <?php echo $result['product_resolution_screen']; ?></td>
								</tr>
								<tr>
									<td>Màn hình rộng</td>
									<td><?php echo $result['product_width_screen'];  ?></td>
								</tr>
								<tr>
									<td>Màn hình cảm ứng</td>
									<td><?php echo $result['product_touch_glass']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!--Camera sau-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Camera sau</td>
								</tr>
								<tr>
									<td>Độ phân giải</td>
									<td><?php echo $result['product_resolution_camerarear']; ?></td>
								</tr>
								<tr>
									<td>Quay phim</td>
									<td> <?php echo $result['product_record_camerarear']; ?></td>
								</tr>
								<tr>
									<td>Đèn Flash</td>
									<td><?php echo $result['product_flash_camerarear'];  ?></td>
								</tr>
								<tr>
									<td>Tính năng</td>
									<td><?php echo $result['product_feature_camerarear']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!-- camera truoc-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Camera trước</td>
								</tr>
								<tr>
									<td>Độ phân giải</td>
									<td><?php echo $result['product_resolution_frontcamera']; ?></td>
								</tr>
								<tr>
									<td>Videl Call</td>
									<td> <?php if($result['product_videocall_frontcamera']==1){ echo "Có";}else{echo "Không";} ?></td>
								</tr>
								<tr>
									<td>Tính năng</td>
									<td><?php echo $result['product_feature_frontcamera']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!--Hệ điều hành & CPU-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Hệ điều hành và CPU</td>
								</tr>
								<tr>
									<td>Hệ điều hành</td>
									<td><?php echo $result['product_os']; ?></td>
								</tr>
								<tr>
									<td>Chip xủ lý(CPU)</td>
									<td> <?php echo $result['product_cpu']; ?></td>
								</tr>
								<tr>
									<td>Chi tiết CPU</td>
									<td><?php echo $result['product_specification_cpu']; ?></td>
								</tr>

								<tr>
									<td>Chip đồ họa(GPU)</td>
									<td><?php echo $result['product_gpu']; ?></td>
								</tr>
								<tr>
									<td>Chi tiết GPU</td>
									<td><?php echo $result['product_specification_gpu']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!--Bộ nhớ và bộ lưu trữ-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Bộ nhớ và bộ lưu trữ</td>
								</tr>
								<tr>
									<td>RAM</td>
									<td><?php echo $result['product_ram']; ?>GB</td>
								</tr>
								<tr>
									<td>Bộ nhớ trong</td>
									<td> <?php echo $result['product_storage']; ?>GB</td>
								</tr>
								<tr>
									<td>Chi tiết CPU</td>
									<td><?php echo $result['product_specification_cpu']; ?></td>
								</tr>
								<tr>
									<td>Thẻ nhớ ngoài</td>
									<td><?php echo $result['product_memorycard']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!--Kết nối-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Kết nối</td>
								</tr>
								<tr>
									<td>Mạng di động</td>
									<td><?php echo $result['product_mobilenetwork']; ?></td>
								</tr>
								<tr>
									<td>SIM</td>
									<td> <?php echo $result['product_sim']; ?></td>
								</tr>
								<tr>
									<td>Wifi</td>
									<td><?php echo $result['product_wifi']; ?></td>
								</tr>
								<tr>
									<td>GPS</td>
									<td><?php echo $result['product_gps']; ?></td>
								</tr>
								<tr>
									<td>Bluetooth</td>
									<td><?php echo $result['product_bluetooth']; ?></td>
								</tr>
								<tr>
									<td>Cổng kết nối/sạc</td>
									<td><?php echo $result['product_chargingport']; ?></td>
								</tr>
								<tr>
									<td>Jack tai nghe</td>
									<td><?php echo $result['product_jack']; ?></td>
								</tr>
								<tr>
									<td>Kết nối khác</td>
									<td><?php echo $result['product_otherconnect']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!--Thiết kế và trọng lượng-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Thiết kế và trọng lượng</td>
								</tr>
								<tr>
									<td>Thiết kế</td>
									<td><?php echo $result['product_design']; ?></td>
								</tr>
								<tr>
									<td>Chất liệu</td>
									<td> <?php echo $result['product_material']; ?></td>
								</tr>
								<tr>
									<td>Kích thước</td>
									<td><?php echo $result['product_size']; ?></td>
								</tr>
								<tr>
									<td>Trọng lượng</td>
									<td><?php echo $result['product_weight']; ?>g</td>
								</tr>
						    </td>	
						</tr>
						<!--Pin và sạc-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Pin và sạc</td>
								</tr>
								<tr>
									<td>Dung lượng pin</td>
									<td><?php echo $result['product_batterycapacity']; ?></td>
								</tr>
								<tr>
									<td>Loại pin</td>
									<td><?php echo $result['product_batterytype']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!--Thời điểm ra mắt-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Thông tin khác</td>
								</tr>
								<tr>
									<td>Thời điểm ra mắt</td>
									<td><?php echo $result['product_timeoflaunch']; ?></td>
								</tr>
						    </td>	
						</tr>
					</table>
				</div>
			</div>
			<div id="right_detail" onclick="cba()">
				
			</div>
		</div>

	</div>
</body>
</html>