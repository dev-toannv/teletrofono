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
							<p align="left"> &nbsp&nbsp- Kh??ch h??ng v???i t???ng thanh to??n theo t??i kho???n >= 100.000.000VN?? s??? ???????c n??ng c???p l??n V.I.P</p>
							<p>
								 &nbsp- Khuy???n m???i ch??? ??p d???ng ?????i v???i kh??ch h??ng ???? t???o t??i kho???n v?? ????ng th??ng tin chi ti???t.
							</p>
							<p>
								&nbsp - Kh??ch h??ng V.I.P ???????c gi???m gi?? 3% m???i m???t h??ng.
							</p>
							<p>
								&nbsp - B???o h??nh <?php echo $result['product_guarantee']?>&nbsp th??ng, ch??nh h??ng.
							</p>
							<br>
							<p style="text-align: center">Li??n h??? : 037.6886.282</p>
						</div>
						<div id="a2_sale_right">
							<?php
								echo "<p>".'M??u s???c : '.$cor[$result['product_color']]."</p>";
								if($result['product_quantity']>0){
									echo "<p id='st'>"."T??nh tr???ng: C??n h??ng"."</p>";

								} 
								else{
									echo "<p id='st'>"."T??nh tr???ng: H???t h??ng"."</p>";
								}
							?>
						</div>
					</div>
					<div id="a2_price">
						<p>
							<?php 
								echo number_format($result['product_price'],0,'','.')." VN??";
							?>
						</p>
					</div>
					<div id="a2_addcart">
						<?php 
							if($result['product_status']<=0){
								echo "<p>"."Ng???ng kinh doanh"."</p>";
							}
							else{
								if($result['product_quantity']<=0){
									echo "<p>"."??ang kinh doanh, h???t h??ng"."</p>";
								}
								else{
									echo "<a href='index.php?module=cart&action=cart&id_product=".$id."&detail'><img src='../public/customer/add_cart.png' id='i2'>&nbsp&nbspTh??m v??o gi??? h??ng</a>";
								}
							}
						 ?>
					</div>
				</div>
			</div>
			<div style="width:100%; height:5%;">
				<button type="button" style="width: 15%;height:100%;color:red; font-size:109%" onclick="comeback()"><-- Quay l???i</button>
			</div>
			<div id="b">
				<!-- An de xem chi tiet san pham -->
				<label for="aa" style="width: 50%; height: 100%; display: inline-block;display: flex;justify-content: center;align-items: center;">
					<div id ="label" style="width: 100%; height: 100%;">
						Xem th??ng s??? k??? thu???t <img src="../public/customer/tap.png" style="max-height: 60%; max-width: 60%;">
					</div>
				</label>
				<button type="button" id="aa" style="display: none;" onclick="abc()"></button>
			</div>
		</div>

		<div id="product_detail">
			<div id="left_detail" onclick="cba()">
			</div>
			<div id="center_detail">
				<h2>Th??ng s??? k??? thu???t chi ti???t <?php echo $result['product_name'] ?></h2>
				
				<div>
					<table>
						<!--M??n h??nh-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>M??n h??nh</td>
								</tr>
								<tr>
									<td>C??ng ngh??? m??n h??nh</td>
									<td><?php echo $result['product_tech_screen']; ?></td>
								</tr>
								<tr>
									<td>????? ph??n gi???i</td>
									<td> <?php echo $result['product_resolution_screen']; ?></td>
								</tr>
								<tr>
									<td>M??n h??nh r???ng</td>
									<td><?php echo $result['product_width_screen'];  ?></td>
								</tr>
								<tr>
									<td>M??n h??nh c???m ???ng</td>
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
									<td>????? ph??n gi???i</td>
									<td><?php echo $result['product_resolution_camerarear']; ?></td>
								</tr>
								<tr>
									<td>Quay phim</td>
									<td> <?php echo $result['product_record_camerarear']; ?></td>
								</tr>
								<tr>
									<td>????n Flash</td>
									<td><?php echo $result['product_flash_camerarear'];  ?></td>
								</tr>
								<tr>
									<td>T??nh n??ng</td>
									<td><?php echo $result['product_feature_camerarear']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!-- camera truoc-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Camera tr?????c</td>
								</tr>
								<tr>
									<td>????? ph??n gi???i</td>
									<td><?php echo $result['product_resolution_frontcamera']; ?></td>
								</tr>
								<tr>
									<td>Videl Call</td>
									<td> <?php if($result['product_videocall_frontcamera']==1){ echo "C??";}else{echo "Kh??ng";} ?></td>
								</tr>
								<tr>
									<td>T??nh n??ng</td>
									<td><?php echo $result['product_feature_frontcamera']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!--H??? ??i???u h??nh & CPU-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>H??? ??i???u h??nh v?? CPU</td>
								</tr>
								<tr>
									<td>H??? ??i???u h??nh</td>
									<td><?php echo $result['product_os']; ?></td>
								</tr>
								<tr>
									<td>Chip x??? l??(CPU)</td>
									<td> <?php echo $result['product_cpu']; ?></td>
								</tr>
								<tr>
									<td>Chi ti???t CPU</td>
									<td><?php echo $result['product_specification_cpu']; ?></td>
								</tr>

								<tr>
									<td>Chip ????? h???a(GPU)</td>
									<td><?php echo $result['product_gpu']; ?></td>
								</tr>
								<tr>
									<td>Chi ti???t GPU</td>
									<td><?php echo $result['product_specification_gpu']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!--B??? nh??? v?? b??? l??u tr???-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>B??? nh??? v?? b??? l??u tr???</td>
								</tr>
								<tr>
									<td>RAM</td>
									<td><?php echo $result['product_ram']; ?>GB</td>
								</tr>
								<tr>
									<td>B??? nh??? trong</td>
									<td> <?php echo $result['product_storage']; ?>GB</td>
								</tr>
								<tr>
									<td>Chi ti???t CPU</td>
									<td><?php echo $result['product_specification_cpu']; ?></td>
								</tr>
								<tr>
									<td>Th??? nh??? ngo??i</td>
									<td><?php echo $result['product_memorycard']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!--K???t n???i-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>K???t n???i</td>
								</tr>
								<tr>
									<td>M???ng di ?????ng</td>
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
									<td>C???ng k???t n???i/s???c</td>
									<td><?php echo $result['product_chargingport']; ?></td>
								</tr>
								<tr>
									<td>Jack tai nghe</td>
									<td><?php echo $result['product_jack']; ?></td>
								</tr>
								<tr>
									<td>K???t n???i kh??c</td>
									<td><?php echo $result['product_otherconnect']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!--Thi???t k??? v?? tr???ng l?????ng-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Thi???t k??? v?? tr???ng l?????ng</td>
								</tr>
								<tr>
									<td>Thi???t k???</td>
									<td><?php echo $result['product_design']; ?></td>
								</tr>
								<tr>
									<td>Ch???t li???u</td>
									<td> <?php echo $result['product_material']; ?></td>
								</tr>
								<tr>
									<td>K??ch th?????c</td>
									<td><?php echo $result['product_size']; ?></td>
								</tr>
								<tr>
									<td>Tr???ng l?????ng</td>
									<td><?php echo $result['product_weight']; ?>g</td>
								</tr>
						    </td>	
						</tr>
						<!--Pin v?? s???c-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Pin v?? s???c</td>
								</tr>
								<tr>
									<td>Dung l?????ng pin</td>
									<td><?php echo $result['product_batterycapacity']; ?></td>
								</tr>
								<tr>
									<td>Lo???i pin</td>
									<td><?php echo $result['product_batterytype']; ?></td>
								</tr>
						    </td>	
						</tr>
						<!--Th???i ??i???m ra m???t-->
						<tr>
							<td>
								<tr>
									<td colspan="2" class='tr'>Th??ng tin kh??c</td>
								</tr>
								<tr>
									<td>Th???i ??i???m ra m???t</td>
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