
<div id="page_add">
<?php
	if(isset($_POST['add_product'])){
		// $product_id="null";
		$product_color=$_POST['product_color'];
		$product_manu=$_POST['product_manu'];
		$product_os=$_POST['product_os'];
		$product_des=$_POST['product_des'];
		$product_tech_screen=$_POST['product_tech_screen'];
		$product_resolution_screen=$_POST['product_resolution_screen'];
		$product_width_screen=$_POST['product_width_screen'];
		$product_touch_glass=$_POST['product_touch_glass'];
		$product_resolution_camerarear=$_POST['product_resolution_camerarear'];
		$product_record_camerarear=$_POST['product_record_camerarear'];
		$product_flash_camerarear=$_POST['product_flash_camerarear'];
		$product_feature_camerarear=$_POST['product_feature_camerarear'];
		$product_resolution_frontcamera=$_POST['product_resolution_frontcamera'];
		$product_videocall_frontcamera=$_POST['product_videocall_frontcamera'];
		$product_feature_frontcamera=$_POST['product_feature_frontcamera'];
		$product_cpu=$_POST['product_cpu'];
		$product_specification_cpu=$_POST['product_specification_cpu'];
		$product_gpu=$_POST['product_gpu'];
		$product_specification_gpu=$_POST['product_specification_gpu'];
		$product_ram=$_POST['product_ram'];
		$product_storage=$_POST['product_storage'];
		$product_memorycard=$_POST['product_memorycard'];
		$product_mobilenetwork=$_POST['product_mobilenetwork'];
		$product_sim=$_POST['product_sim'];
		$product_wifi=$_POST['product_wifi'];
		$product_gps=$_POST['product_gps'];
		$product_bluetooth=$_POST['product_bluetooth'];
		$product_chargingport=$_POST['product_chargingport'];
		$product_jack=$_POST['product_jack'];
		$product_otherconnect=$_POST['product_otherconnect'];
		$product_design=$_POST['product_design'];
		$product_material=$_POST['product_material'];
		$product_size=$_POST['product_size'];
		$product_weight=$_POST['product_weight'];
		$product_batterycapacity=$_POST['product_batterycapacity'];
		$product_batterytype=$_POST['product_batterytype'];
		$product_timeoflaunch=$_POST['product_timeoflaunch'];
		$product_timeofposting='now()';
		$product_guarantee=$_POST['product_guarantee'];
		$product_quantity=$_POST['product_quantity'];
		$product_name=$_POST['product_name'];
		$product_status=$_POST['product_status'];
		//------------------------------------------------------
		$conn=mysqli_connect('localhost','root','','teletrofono');
		if(!$conn){
			die("Connect error : ".mysqli_connect_error());
		}
		$sql9="insert into product values(null,
			'$product_color',
			'$product_manu',
			'$product_os',
			'$product_des',
			'$product_tech_screen',
			'$product_resolution_screen',
			'$product_width_screen',
			'$product_touch_glass',
			'$product_resolution_camerarear',
			'$product_record_camerarear',
			'$product_flash_camerarear',
			'$product_feature_camerarear',
			'$product_resolution_frontcamera',
			'$product_videocall_frontcamera',
			'$product_feature_frontcamera',
			'$product_cpu',
			'$product_specification_cpu',
			'$product_gpu',
			'$product_specification_gpu',
			'$product_ram',
			'$product_storage',
			'$product_memorycard',
			'$product_mobilenetwork',
			'$product_sim',
			'$product_wifi',
			'$product_gps',
			'$product_bluetooth',
			'$product_chargingport',
			'$product_jack',
			'$product_otherconnect',
			'$product_design',
			'$product_material',
			'$product_size',
			'$product_weight',
			'$product_batterycapacity',
			'$product_batterytype',
			'$product_timeoflaunch',
			now(),
			'$product_guarantee',
			'$product_quantity',
			'$product_name',
			'$product_status'
		)";
		$a=mysqli_query($conn,$sql9);
		if(!$a){
			echo "<script type='text/javascript'>alert('Không thể thêm sản phẩm, vui lòng thêm đầy đủ các trường thông tin!');</script>";
		}
		// lay id san pham moi tao de them anh
		$sql8="select id from product order by id DESC limit 1";
		$b=mysqli_query($conn,$sql8);
		$layidsanpham=mysqli_fetch_assoc($b);
		$idsanpham=$layidsanpham['id'];
		// Xu ly ten anh
			$img=$_FILES['image_name'];
			// xet ten hang san pham
			$sql10="select * from manu_product where id ='$product_manu'";
			$n=mysqli_query($conn,$sql10);
			$roww=mysqli_fetch_assoc($n);
			$manu_name =$roww['manu_name'];
			$folder="../public/product/".$manu_name."/";
			$folder1="../public/product/".$manu_name;
			if(file_exists($folder)==false){
				mkdir($folder1);
			}
			// day hinh anh len
			$path=$folder.$img['name'];
			move_uploaded_file($img['tmp_name'],$path);
			// rename anh theo id
			$old_name=$folder.$img['name'];
			$new_name="product_".$idsanpham;
			$new=$folder.$new_name;
			rename($old_name,$new);
		//-----------------------------------------
		$sql7="insert into image values('$idsanpham','$new_name')";
		if(!$sql7){
			echo "loi".mysqli_error($conn);
		}
		mysqli_query($conn,$sql7);
	}
?>
<!--Duoi day la nhung dong code danh cho front-->
	<script type="text/javascript">
        function myfunc(){
            var a= document.getElementById('anh1');
            var b= document.getElementById('anh');
            var url = URL.createObjectURL(b.files[0]);
            a.src=url;
        }
    </script>
	<style type="text/css">
		#page_add{
			width: 100%;
			height: 100%;
		}
		#page_add form{
			width: 100%;
			height: 100%;
		}
		#page_img{
			width:50%;
			height:30%;
			background-color: #8fff97;
			margin:auto;
			margin-top:3px;
			display: flex;
		  	justify-content: center;
		  	align-items: center;
		}
		form div{
			margin-bottom: 5px;
			border:1px solid red;
			}
	</style>
	<form action="" method="POST" enctype="multipart/form-data">
		<div id="page_img">
			<img src="../public/product/product.svg" id="anh1" style="max-width: 100%; max-height: 100%"alt="">
		</div>
		<div style="display: flex;justify-content: center;align-items: center;margin-top: 5px">
			<input type="file" name="image_name" id="anh" onchange="myfunc()">
		</div>
		<div>
			<!--Thong tin so bo-->
			<input type="text" placeholder="Tên sản phẩm" name="product_name"><br>
			<input type="text" placeholder="Hệ điều hành" name="product_os"><br>
			<select name="product_manu">
				<?php 
					$conn=mysqli_connect('localhost','root','','teletrofono');
					if(!$conn){
						die("Connect error : ".mysqli_connect_error());
					}
					$sql6="select * from manu_product";
					$c=mysqli_query($conn,$sql6);
					while($row = mysqli_fetch_assoc($c)){
				        echo "<option value='".$row['id']."'>".$row["manu_name"]."</option>";
				    }
				 ?>
			</select><br>
			<select name="product_color">
				<?php 
					$conn=mysqli_connect('localhost','root','','teletrofono');
					if(!$conn){
						die("Connect error : ".mysqli_connect_error());
					}
					$sql5="select * from color_product";
					$c1=mysqli_query($conn,$sql5);
					while($row = mysqli_fetch_assoc($c1)){
				        echo "<option value='".$row['id']."'>".$row["color_name"]."</option>";
				    }
				 ?>
			</select>
		</div>
		<div>
			<!--man hinh -->
			<input type="text" placeholder="Công nghệ màn hình" name="product_tech_screen"> <br>
			<input type="text" placeholder="Độ phân giải" name="product_resolution_screen"><br>
			<input type="text" placeholder="Màn hình rộng" name="product_width_screen"><br>
			<input type="text" placeholder="Mặt kính cảm ứng" name="product_touch_glass">
		</div>

		<div>
			<!--camera sau-->
			<input type="text" placeholder="Độ phân giải" name="product_resolution_camerarear"> <br>
			<input type="text" placeholder="Quay phim" name="product_record_camerarear"><br>
			<input type="text" placeholder="Đèn Flash" name="product_flash_camerarear"><br>
			<input type="text" placeholder="Tính năng" name="product_feature_camerarear">
		</div>

		<div>
			<!--camera truoc-->
			<input type="text" placeholder="Độ phân giải" name="product_resolution_frontcamera"><br>
			Video CAll
			<select name="product_videocall_frontcamera">
				<option value="1">Có</option>
				<option value="0">Không</option>
			</select><br>
			<input type="text" placeholder="Tính năng" name="product_feature_frontcamera">
		</div>

		<div>
			<!--CPU va GPU-->
			<input type="text" placeholder="Tên CPU" name="product_cpu"><br>
			<input type="text" placeholder="Thông số CPU" name="product_specification_cpu"><br>
			<input type="text" placeholder="Tên GPU" name="product_gpu"><br>
			<input type="text" placeholder="Thông số GPU" name="product_specification_gpu">
		</div>

		<div>
			<!--Bo nho va luu tru-->
			<input type="number" placeholder="Ram" name="product_ram"><br>
			<input type="number" placeholder="Bộ nhớ trong" name="product_storage"><br>
			<input type="text" placeholder="Thẻ nhớ ngoài" name="product_memorycard">
		</div>

		<div>
			<!--Ket noi-->
			<input type="text" placeholder="Mạng di động" name="product_mobilenetwork"><br>
			<input type="text" placeholder="Sim" name="product_sim"><br>
			<input type="text" placeholder="Wifi" name="product_wifi"><br>
			<input type="text" placeholder="GPS" name="product_gps"><br>
			<input type="text" placeholder="Bluetooth" name="product_bluetooth"><br>
			<input type="text" placeholder="Cổng sạc va kết nối" name="product_chargingport"><br>
			<input type="text" placeholder="Jack tai nghe" name="product_jack"><br>
			<input type="text" placeholder="Kết nối khác" name="product_otherconnect">
		</div>

		<div>
			<!--Thiet ke va trong luong-->
			<input type="text" placeholder="Thiết kế" name="product_design"><br>
			<input type="text" placeholder="Chất liệu" name="product_material"><br>
			<input type="text" placeholder="Kích thước" name="product_size"><br>
			<input type="number" placeholder="Trọng lượng" name="product_weight"><br>
		</div>

		<div>
			<!--Pin va sac-->
			<input type="text" placeholder="Dung lượng pin" name="product_batterycapacity"><br>
			<input type="text" placeholder="Loại pin" name="product_batterytype">
		</div>

		<div>
			<!--Thời gian-->
			<input type="date" name="product_timeoflaunch"><br><!--thoi diem ra mat-->
			<!--them time posting -->
			<input type="number" placeholder="Bảo hành" name="product_guarantee">
		</div>
		<div>
			<!--Mo ta san pham-->
			<textarea placeholder="Mô tả sản phẩm" name="product_des"></textarea>
		</div>
		<div>
			<input type="number" placeholder="Số lưọng sản phẩm" name="product_quantity"><br>
			<select name="product_status">
				<option value="1">Còn hàng</option>
				<option value="0">Hết hàng</option>
			</select>
		</div>
		<div>
			<button type="submit" name="add_product">SAVE</button>
		</div>
	</form>
</div>