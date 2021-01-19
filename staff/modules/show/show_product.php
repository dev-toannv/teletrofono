
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
					$image="select * from image where product_id = '$id'";
					$query_image=mysqli_query($conn,$image);
					$result=mysqli_fetch_assoc($query_image);
					// lay anh trong thu muc
					$folder="../public/product/".$hangsx."/";
					$path=$folder.$result['image_name'];
					// echo $result['image_name'];


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
							echo $a['product_price'];
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