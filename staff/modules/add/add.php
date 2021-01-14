
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
		// $sql9="insert into product(
		// 	id,product_color,product_manu,product_os,product_des,product_tech_screen,product_resolution_screen,product_width_screen,product_touch_glass,product_resolution_camerarear,product_record_camerarear,product_flash_camerarear,product_feature_camerarear,product_resolution_frontcamera,product_videocall_frontcamera,product_feature_frontcamera,product_cpu,product_specification_cpu,product_gpu,product_specification_gpu,product_ram,product_storage,product_memorycard,product_mobilenetwork,product_sim,product_wifi,product_gps,product_bluetooth,product_chargingport,product_status)
		// 	values(null,'$product_color','$product_manu','$product_os','$product_des','$product_tech_screen','$product_resolution_screen','$product_width_screen','$product_touch_glass','$product_resolution_camerarear','$product_record_camerarear','$product_flash_camerarear','$product_feature_camerarear','$product_resolution_frontcamera',product_videocall_frontcamera,'$product_feature_frontcamera','$product_cpu','$product_specification_cpu','$product_gpu','$product_specification_gpu','$product_ram','$product_storage','$product_memorycard','$product_mobilenetwork','$product_sim','$product_wifi','$product_gps','$product_bluetooth','$product_chargingport','$product_status')";




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
			echo "dang that bai".mysqli_error($conn);
		}
	}
?>
<!--Duoi day la nhung dong code danh cho front-->

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
			<input type="file" name="image_name">
		</div>
		<div>
			<!--Thong tin so bo-->
			<input type="text" placeholder="Tên sản phẩm" name="product_name"><br>
			<input type="text" placeholder="Hệ điều hành" name="product_os"><br>
			<select name="product_manu">
				<option value="1">APPLE</option>
				<option value="2">SAMSUNG</option>
				<option value="3">OPPO</option>
			</select><br>
			<select name="product_color">
				<option value="1">Trắng</option>
				<option value="2">Đen</option>
				<option value="3">Đỏ</option>
				<option value="4">Xanh lục</option>
				<option value="5">Xanh lam</option>
				<option value="6">Bạc</option>
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