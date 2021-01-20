<link rel="stylesheet" href="modules/edit/edit.css">
<div>
	<h1>Chỉnh sửa sản phẩm</h1>
</div>

<div>
	<div id="page_add">
	<link rel="stylesheet" type="text/css" href="modules/edit/edit.css">
<?php
	if(isset($_GET['id_edit'])){
		$id=$_GET['id_edit'];
		$sql11="select*from product where id='$id'";
		$query_sql11=mysqli_query($conn,$sql11);
		$result_sql11=mysqli_fetch_assoc($query_sql11);

		$product_videocall_frontcamera = $result_sql11['product_videocall_frontcamera'];
		// xu ly mau sac
		$color_id=$result_sql11['product_color'];
		// xu ly ten hang
		$product_manu=$result_sql11['product_manu'];
		$sql10="select * from manu_product where id ='$product_manu'";
		$n=mysqli_query($conn,$sql10);
		$roww=mysqli_fetch_assoc($n);
		$manu_name =$roww['manu_name'];
		$manu_id=$roww['id'];
		$folder="../public/product/".$manu_name."/";
		// xu ly ten anh
		$image="select * from image where product_id = '$id'";
		$query_image=mysqli_query($conn,$image);
		$t=array();
		while($result_img=mysqli_fetch_assoc($query_image)){
			$t[]=$result_img['image_name'];
		}
		if($t[0]==""){
			$path="../public/product/product.svg";
		}
		else{
			$path=$folder.$t[0];
		}
		if($t[1]==""){
			$path2="../public/product/product.svg";
		}
		else{
			$path2=$folder.$t[1];
		}
		if($t[2]==""){
			$path3="../public/product/product.svg";
		}
		else{
			$path3=$folder.$t[2];
		}
		
	}
	//-------------------------------------------
		

	//-------------------------------------------


?>
<!--Duoi day la nhung dong code danh cho front-->
	<script type="text/javascript">
        function myfunc(){
            var a= document.getElementById('anh1');
            var b= document.getElementById('anh');
            var url = URL.createObjectURL(b.files[0]);
            a.src=url;
        }
        function myfunc2(){
            var a= document.getElementById('anh4');
            var b= document.getElementById('anh3');
            var url = URL.createObjectURL(b.files[0]);
            a.src=url;
        }
        function myfunc1(){
            var a= document.getElementById('anh6');
            var b= document.getElementById('anh5');
            var url = URL.createObjectURL(b.files[0]);
            a.src=url;
        }
    </script>
	<style type="text/css">
		#container{
			height:auto;
			border:none;
			}
		#right{
			height: 100%;
			text-align:center;
		}
		#page_add{
			width: 100%;
			height: 100%;
			
		}
		#boo{
			background-color: #c1c1c1;
		}
		#page_add form{
			width: 100%;
			height: 73%;
		}
		#page_img{
			width:100%;
			height: 500px;
			margin:auto;
			margin-top:3px;
		}
		.ac{
			display: flex;
		  	justify-content: center;
		  	align-items: center;
		}
		#anh1{
			max-height: 100%;
			max-width: 100%;
		}
		#anh4{
			max-height: 100%;
			max-width: 100%;
		}
		#anh6{
			max-height: 100%;
			max-width: 100%;
		}
	</style>
	<form action="" method="POST" enctype="multipart/form-data">
		<div id="page_img">
			<div class="ac" style="width:30%;height: 100%;float: left;">
				<img src="<?php echo $path2; ?>" id="anh4">
			</div>
			<div  class="ac" style="width:40% ;height: 100%;float: left;">
				<img src="<?php echo $path; ?>" id="anh1">
			</div>
			<div  class="ac" style="width:30%;height: 100%;float: right;">
				<img src="<?php echo $path3; ?>" id="anh6" alt="">
			</div>
			
		</div>

		<div style="width:100%;height:40px;margin-top: 10px; background: #ebffee">
			<div class="ac" style="width:25%;height: 100%;float: left;">
				<input type="file" name="image_name" id="anh3" style="text-align: left;" onchange="myfunc2()">
			</div>
			<div class="ac" style="width:50% ;height: 100%;float: left;">
				<input type="file" name="image_name" id="anh" style="text-align: center;" onchange="myfunc()">
			</div>
			<div class="ac" style="width:25%;height: 100%;float: right;">
				<input type="file" name="image_name" id="anh5" style="text-align: right;" onchange="myfunc1()">
			</div>
		</div>

	<div id="boo">
		
		<div>
			<!--Thong tin so bo-->
			<p class="custom">Thông tin cơ bản</p>
			<input type="text" value="<?php echo $result_sql11['product_name'] ?>" placeholder="Tên sản phẩm" name="product_name" id="product_name"><br>
			<input type="text" value="<?php echo $result_sql11['product_os'] ?>" placeholder="Hệ điều hành" name="product_os" id="product_os"><br>
			<p style="margin:3px;">Hãng sản xuất</p>
			<select name="product_manu" id="product_manu">
				<?php 
					require_once("modules/config/connectdb.php");
					$sql6="select * from manu_product";
					$c=mysqli_query($conn,$sql6);
					while($row = mysqli_fetch_assoc($c)){
						if($row['id']==$manu_id){
							echo "<option value='".$row['id']."' selected>".$row["manu_name"]."</option>";
						}
						else{
							echo "<option value='".$row['id']."'>".$row["manu_name"]."</option>";
						}
				    }
				 ?>
			</select><br>
			<p style="margin:3px;">Màu sắc</p>
			<select name="product_color" id="product_color">
				<?php 
					require_once("modules/config/connectdb.php");
					$sql5="select * from color_product";
					$c1=mysqli_query($conn,$sql5);
					while($row = mysqli_fetch_assoc($c1)){
						if($row['id']==$color_id){
							echo "<option value='".$row['id']."' selected>".$row["color_name"]."</option>";
						}
				        echo "<option value='".$row['id']."'>".$row["color_name"]."</option>";
				    }
				 ?>
			</select>
		</div>
		<div>
			<!--man hinh -->
			<p class="custom">Màn hình</p>
			<input type="text" value="<?php echo $result_sql11['product_tech_screen'] ?>" placeholder="Công nghệ màn hình" name="product_tech_screen" id="product_tech_screen"> <br>
			<input type="text" value="<?php echo $result_sql11['product_resolution_screen'] ?>" placeholder="Độ phân giải" name="product_resolution_screen" id="product_resolution_screen"><br>
			<input type="text" value="<?php echo $result_sql11['product_width_screen'] ?>" placeholder="Màn hình rộng" name="product_width_screen" id="product_width_screen"><br>
			<input type="text" value="<?php echo $result_sql11['product_touch_glass'] ?>" placeholder="Mặt kính cảm ứng" name="product_touch_glass" id="product_touch_glass">
		</div>

		<div>
			<!--camera sau-->
			<p class="custom">Camera sau</p>
			<input type="text" value="<?php echo $result_sql11['product_resolution_camerarear'] ?>" placeholder="Độ phân giải" name="product_resolution_camerarear" id="product_resolution_camerarear"> <br>
			<input type="text" value="<?php echo $result_sql11['product_record_camerarear'] ?>" placeholder="Quay phim" name="product_record_camerarear" id="product_record_camerarear"><br>
			<input type="text" value="<?php echo $result_sql11['product_flash_camerarear'] ?>" placeholder="Đèn Flash" name="product_flash_camerarear" id="product_flash_camerarear"><br>
			<input type="text" value="<?php echo $result_sql11['product_feature_camerarear'] ?>" placeholder="Tính năng" name="product_feature_camerarear" id="product_feature_camerarear">
		</div>

		<div>
			<!--camera truoc-->
			<p class="custom">Camera trước</p>
			<input type="text" value="<?php echo $result_sql11['product_resolution_frontcamera'] ?>" placeholder="Độ phân giải" name="product_resolution_frontcamera" id="product_resolution_frontcamera"><br>
			Video CAll &nbsp
			<select name="product_videocall_frontcamera" id="product_videocall_frontcamera">
				<option value="1" <?php if($product_videocall_frontcamera==1) echo "selected" ?> >Có</option>
				<option value="0" <?php if($product_videocall_frontcamera==0) echo "selected" ?> >Không</option>
			</select><br>
			<input type="text" value="<?php echo $result_sql11['product_feature_frontcamera'] ?>" placeholder="Tính năng" name="product_feature_frontcamera" id="product_feature_frontcamera">
		</div>

		<div>
			<!--CPU va GPU-->
			<p class="custom">CPU và GPU</p>
			<input type="text" value="<?php echo $result_sql11['product_cpu'] ?>" placeholder="Tên CPU" name="product_cpu" id="product_cpu"><br>
			<input type="text" value="<?php echo $result_sql11['product_specification_cpu'] ?>" placeholder="Thông số CPU" name="product_specification_cpu" id="product_specification_cpu"><br>
			<input type="text" value="<?php echo $result_sql11['product_gpu'] ?>" placeholder="Tên GPU" name="product_gpu" id="product_gpu"><br>
			<input type="text" value="<?php echo $result_sql11['product_specification_gpu'] ?>" placeholder="Thông số GPU" name="product_specification_gpu" id="product_specification_gpu">
		</div>

		<div>
			<!--Bo nho va luu tru-->
			<p class="custom">Bộ nhớ và lưu trữ</p>
			<input type="number" value="<?php echo $result_sql11['product_ram'] ?>" placeholder="Ram" name="product_ram" id="product_ram"><br>
			<input type="number" value="<?php echo $result_sql11['product_storage'] ?>" placeholder="Bộ nhớ trong" name="product_storage" id="product_storage"><br>
			<input type="text" value="<?php echo $result_sql11['product_memorycard'] ?>" placeholder="Thẻ nhớ ngoài" name="product_memorycard" id="product_memorycard">
		</div>

		<div>
			<!--Ket noi-->
			<p class="custom">Các kết nối</p>
			<input type="text" value="<?php echo $result_sql11['product_mobilenetwork'] ?>" placeholder="Mạng di động" name="product_mobilenetwork" id="product_mobilenetwork"><br>
			<input type="text" value="<?php echo $result_sql11['product_sim'] ?>" placeholder="Sim" name="product_sim" id="product_sim"><br>
			<input type="text" value="<?php echo $result_sql11['product_wifi'] ?>" placeholder="Wifi" name="product_wifi" id="product_wifi"><br>
			<input type="text" value="<?php echo $result_sql11['product_gps'] ?>" placeholder="GPS" name="product_gps" id="product_gps"><br>
			<input type="text" value="<?php echo $result_sql11['product_bluetooth'] ?>" placeholder="Bluetooth" name="product_bluetooth" id="product_bluetooth"><br>
			<input type="text" value="<?php echo $result_sql11['product_chargingport'] ?>" placeholder="Cổng sạc va kết nối" name="product_chargingport" id="product_chargingport"><br>
			<input type="text" value="<?php echo $result_sql11['product_jack'] ?>" placeholder="Jack tai nghe" name="product_jack" id="product_jack"><br>
			<input type="text" value="<?php echo $result_sql11['product_otherconnect'] ?>" placeholder="Kết nối khác" name="product_otherconnect" id="product_otherconnect">
		</div>

		<div>
			<!--Thiet ke va trong luong-->
			<p class="custom">Thiết kế và trọng lượng</p>
			<input type="text" value="<?php echo $result_sql11['product_design'] ?>" placeholder="Thiết kế" name="product_design" id="product_design"><br>
			<input type="text" value="<?php echo $result_sql11['product_material'] ?>" placeholder="Chất liệu" name="product_material" id="product_material"><br>
			<input type="text" value="<?php echo $result_sql11['product_size'] ?>" placeholder="Kích thước" name="product_size" id="product_size"><br>
			<input type="number" value="<?php echo $result_sql11['product_weight'] ?>" placeholder="Trọng lượng" name="product_weight" id="product_weight"><br>
		</div>

		<div>
			<!--Pin va sac-->
			<p class="custom">Pin và sạc</p>
			<input type="text" value="<?php echo $result_sql11['product_batterycapacity'] ?>" placeholder="Dung lượng pin" name="product_batterycapacity" id="product_batterycapacity"><br>
			<input type="text" value="<?php echo $result_sql11['product_batterytype'] ?>" placeholder="Loại pin" name="product_batterytype" id="product_batterytype">
		</div>

		<div>
			<!--Thời gian-->
			<p class="custom">Thời gian</p>
			Thời điểm ra mắt &nbsp<input type="date" value="<?php echo $result_sql11['product_timeoflaunch'] ?>" name="product_timeoflaunch" id="product_timeoflaunch"><br><!--thoi diem ra mat-->
			<!--them time posting -->
			<input type="number" value="<?php echo $result_sql11['product_guarantee'] ?>" placeholder="Bảo hành ? tháng" name="product_guarantee" id="product_guarantee">
		</div>
		<div>
			<!--Mo ta san pham--> 
			<textarea placeholder="Mô tả sản phẩm" value="<?php echo $result_sql11['product_des'] ?>" name="product_des" id="product_des"></textarea>
		</div>
		<div>
			<input type="number" value="<?php echo $result_sql11['product_quantity'] ?>" placeholder="Số lưọng sản phẩm" name="product_quantity" id="product_quantity"><br>
			<input type="number" value="<?php echo $result_sql11['product_price'] ?>" placeholder="Giá sản phẩm" name="product_price" id="product_price"><br>
			 <p style="display:block; height:25px;margin:0;margin-top:5px">Tình trạng</p>
			<select name="product_status" id="product_status">
				<option value="1" <?php if($result_sql11['product_status']==1) echo "selected" ?>>Kinh doanh</option>
				<option value="0" <?php if($result_sql11['product_status']==0) echo "selected" ?>>Không kinh doanh</option>
			</select>
		</div>
		<div>
			<button type="submit" name="edit_product" id="add_product">SAVE</button>
		</div>
	</div>
	</form>
</div>
</div>