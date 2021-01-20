
<div id="show_search" style="height:5%">
	<style type="text/css">
		body::-webkit-scrollbar { 
		    display: none; 
		}
	</style>
		<form action="" method="POST" style="display:inline-block">
			<input type="text" id="s_name" name="s_name" placeholder="Tìm theo tên sản phẩm" style="width:250px; text-align: center;">
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


<div id="show_body">
		<table>
			<tr style="overflow: hidden;">
				<th style="text-align: center; font-weight: bold; font-size: 20px; color:red;">id</th>
				<th style="text-align: center; font-weight: bold; font-size: 20px; color:red; ">Tên và ảnh</th>
				<th style="text-align: center; font-weight: bold; font-size: 20px; color:red; ">Hãng</th>
				<th style="text-align: center; font-weight: bold; font-size: 20px; color:red; ">Màu sắc</th>
				<th style="text-align: center; font-weight: bold; font-size: 20px; color:red; ">Số lượng</th>
				<th style="text-align: center; font-weight: bold; font-size: 20px; color:red; ">Giá (VNĐ)</th>
				<th style="text-align: center; font-weight: bold; font-size: 20px; color:red; ">Ram</th>
				<th style="text-align: center; font-weight: bold; font-size: 20px; color:red; ">Bộ nhớ trong</th>
				<th style="text-align: center; font-weight: bold; font-size: 20px; color:red; ">Tình trạng</th>
				<th style="text-align: center; font-weight: bold; font-size: 20px; color:red; ">Thao tác</th>
			</tr>
			<?php
				$arr_status=array(1=>"Đang bán", 0 => "Không bán");
				while($a=mysqli_fetch_assoc($re)){
					$id=$a['id'];
					$hangsx=$arr_manu[$a['product_manu']];
					// lay ten anh trong mysql
					$image="select * from image where product_id = '$id' order by image_name ASC limit 1";
					$query_image=mysqli_query($conn,$image);
					$result=mysqli_fetch_assoc($query_image);
					
					// lay anh trong thu muc
					$folder="../public/product/".$hangsx."/";
					$path=$folder.$result['image_name'];
					
					// xu ly dinh dang cua gia tien
					$price=$a['product_price'];
					$price=number_format($price,0,'','.');

					//cach khac :)))
					// $price=strrev($price); // dao nguoc chuoi de lay moi 3 ky tu thi '.' 1 lan
					// $price=chunk_split($price,3,'.');
					// $price=strrev($price); // khi da cham xong thi dao lai chuoi nhu ban dau
					// // kiem tra xem neu dau chuoi la ky tu '.' thi xoa di, vi du truong hop .200.000.000 vi cu 3 ky tu thi '.' 1 lan
					// if($price[0]=='.'){
					// 	$price=ltrim($price,'.'); // ham ltrim de xoa ben trai cua chuoi ky tu jj do
					// }

					echo "<tr>";
						echo "<td class='id height'>";
							echo $a['id'];
						echo "</td>";

						echo "<td class='product_name height'>";
							echo "<div class='na'>".$a['product_name']."</div>";
							echo "<div class='im'>"."<img src='".$path."'>"."</div>";
						echo "</td>";

						echo "<td class='product_manu height'>";
							echo $arr_manu[$a['product_manu']];
						echo "</td>";

						echo "<td class='product_color height'>";
							echo $arr_color[$a['product_color']];
						echo "</td>";

						echo "<td class='product_quantity height'>";
							echo $a['product_quantity'];
						echo "</td>";

						echo "<td class='product_price height'>";
							// echo $a['product_price'];
							echo $price;
						echo "</td>";

						echo "<td class='product_ram height'>";
							echo $a['product_ram']." GB";
						echo "</td>";

						echo "<td class='product_storage height'>";
							echo $a['product_storage']." GB";
						echo "</td>";

						echo "<td class='product_status height'>";
							echo $arr_status[$a['product_status']];
						echo "</td>";

						echo "<td class='edit height'>";
							echo "<a href='index.php?module=interface&action=interfaceStaff&choose=mproduct&mpr=show&id_edit=".$a['id']."'>Chỉnh sửa</a>";
						echo "</td>";
					echo "</tr>";
				} 
			?>
		</table>
	</div>