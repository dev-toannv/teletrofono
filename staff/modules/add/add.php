 <?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<div id="page_add">
	<link rel="stylesheet" type="text/css" href="modules/add/add.css">
<?php
	$code=$_SESSION['staff_code'];
	if(isset($_POST['add_product'])){
		// $product_id="null";
		$product_color=trim($_POST['product_color']);
		$product_manu=trim($_POST['product_manu']);
		$product_os=trim($_POST['product_os']);
		$product_tech_screen=trim($_POST['product_tech_screen']);
		$product_resolution_screen=trim($_POST['product_resolution_screen']);
		$product_width_screen=trim($_POST['product_width_screen']);
		$product_touch_glass=trim($_POST['product_touch_glass']);
		$product_resolution_camerarear=trim($_POST['product_resolution_camerarear']);
		$product_record_camerarear=trim($_POST['product_record_camerarear']);
		$product_flash_camerarear=trim($_POST['product_flash_camerarear']);
		$product_feature_camerarear=trim($_POST['product_feature_camerarear']);
		$product_resolution_frontcamera=trim($_POST['product_resolution_frontcamera']);
		$product_videocall_frontcamera=trim($_POST['product_videocall_frontcamera']);
		$product_feature_frontcamera=trim($_POST['product_feature_frontcamera']);
		$product_cpu=trim($_POST['product_cpu']);
		$product_specification_cpu=trim($_POST['product_specification_cpu']);
		$product_gpu=trim($_POST['product_gpu']);
		$product_specification_gpu=trim($_POST['product_specification_gpu']);
		$product_ram=trim($_POST['product_ram']);
		$product_storage=trim($_POST['product_storage']);
		$product_memorycard=trim($_POST['product_memorycard']);
		$product_mobilenetwork=trim($_POST['product_mobilenetwork']);
		$product_sim=trim($_POST['product_sim']);
		$product_wifi=trim($_POST['product_wifi']);
		$product_gps=trim($_POST['product_gps']);
		$product_bluetooth=trim($_POST['product_bluetooth']);
		$product_chargingport=trim($_POST['product_chargingport']);
		$product_jack=trim($_POST['product_jack']);
		$product_otherconnect=trim($_POST['product_otherconnect']);
		$product_design=trim($_POST['product_design']);
		$product_material=trim($_POST['product_material']);
		$product_size=trim($_POST['product_size']);
		$product_weight=trim($_POST['product_weight']);
		$product_batterycapacity=trim($_POST['product_batterycapacity']);
		$product_batterytype=trim($_POST['product_batterytype']);
		$product_timeoflaunch=trim($_POST['product_timeoflaunch']);
		$product_guarantee=trim($_POST['product_guarantee']);
		$product_quantity=trim($_POST['product_quantity']);
		$product_name=trim($_POST['product_name']);
		$product_status=trim($_POST['product_status']);
		$product_price=trim($_POST['product_price']);
		//-----------------------------------------------------
		require_once("modules/config/connectdb.php");
		$sql9="insert into product values(null,
			'$product_color',
			'$product_manu',
			'$product_os',
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
			'$product_guarantee',
			'$product_quantity',
			'$product_name',
			'$product_status',
			'$product_price'
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
		if($a==true){ // neu them cac truong thong tin thanh cong thi se them anh
			// kiem tra xem files gui len co rong hay ko
			if($_FILES['image_name']['size']>0){ 
				$img=$_FILES['image_name'];
				// xet ten hang san pham
				$sql10="select * from manu_product where id ='$product_manu'";
				$n=mysqli_query($conn,$sql10);
				$roww=mysqli_fetch_assoc($n);
				$manu_name =$roww['manu_name'];
				$folder="../public/product/".$manu_name."/";
				$folder1="../public/product/".$manu_name;
				if(file_exists($folder1)==false){
					mkdir($folder1);
				}
				// day hinh anh len
				$path=$folder.$img['name'];
				move_uploaded_file($img['tmp_name'],$path);
				// rename anh theo id
				$old_name=$folder.$img['name'];
				$c=explode(".",$img['name']);
				$prm=$c[count($c)-1];

				$new_name="product_".$idsanpham."_"."1"."_".".".$prm;
				$new=$folder.$new_name;
				rename($old_name,$new);
				//-----------------------------------------
				$sql7="insert into image values('$idsanpham','$new_name')";
				if(!$sql7){
					 die("loi".mysqli_error($conn));
				}
				mysqli_query($conn,$sql7);
			}
			//----
			if($_FILES['image_name1']['size']>0){ 

				$img=$_FILES['image_name1'];
				// xet ten hang san pham
				$sql10="select * from manu_product where id ='$product_manu'";
				$n=mysqli_query($conn,$sql10);
				$roww=mysqli_fetch_assoc($n);
				$manu_name =$roww['manu_name'];
				$folder="../public/product/".$manu_name."/";
				$folder1="../public/product/".$manu_name;
				if(file_exists($folder1)==false){
					mkdir($folder1);
				}
				// day hinh anh len
				$path=$folder.$img['name'];
				move_uploaded_file($img['tmp_name'],$path);
				// rename anh theo id
				$old_name=$folder.$img['name'];
				$c=explode(".",$img['name']);
				$prm=$c[count($c)-1];

				$new_name="product_".$idsanpham."_"."2"."_".".".$prm;
				$new=$folder.$new_name;
				rename($old_name,$new);
				//-----------------------------------------
				$sql7="insert into image values('$idsanpham','$new_name')";
				if(!$sql7){
					 die("loi".mysqli_error($conn));
				}
				mysqli_query($conn,$sql7);
			}
			// anh3
			if($_FILES['image_name2']['size']>0){ 
				$img=$_FILES['image_name2'];
				// xet ten hang san pham
				$sql10="select * from manu_product where id ='$product_manu'";
				$n=mysqli_query($conn,$sql10);
				$roww=mysqli_fetch_assoc($n);
				$manu_name =$roww['manu_name'];
				$folder="../public/product/".$manu_name."/";
				$folder1="../public/product/".$manu_name;
				if(file_exists($folder1)==false){
					mkdir($folder1);
				}
				// day hinh anh len
				$path=$folder.$img['name'];
				move_uploaded_file($img['tmp_name'],$path);
				// rename anh theo id
				$old_name=$folder.$img['name'];
				$c=explode(".",$img['name']);
				$prm=$c[count($c)-1];

				$new_name="product_".$idsanpham."_"."3"."_".".".$prm;
				$new=$folder.$new_name;
				rename($old_name,$new);
				//-----------------------------------------
				$sql7="insert into image values('$idsanpham','$new_name')";
				if(!$sql7){
					 die("loi".mysqli_error($conn));
				}
				mysqli_query($conn,$sql7);
			}
		}
		

		// lay id de them vao add_edit_product
		$sql3="select id from manager where manager_code='$code' and user_type=2";
		$result=mysqli_query($conn,$sql3);
		$rr=mysqli_fetch_assoc($result);
		$code1=$rr['id'];
		$sql4="insert into add_edit_product values('$idsanpham','$code1','$code1',now(),now())";
		mysqli_query($conn,$sql4);
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
			<div class="ac" style="width:25%;height: 100%;float: left;">
				<img src="../public/product/product.svg" id="anh4">
			</div>
			<div  class="ac" style="width:50% ;height: 100%;float: left;">
				<img src="../public/product/product.svg" id="anh1">
			</div>
			<div  class="ac" style="width:25%;height: 100%;float: right;">
				<img src="../public/product/product.svg" id="anh6" alt="">
			</div>
			
		</div>

		<div style="width:100%;height:40px;margin-top: 10px; background: #ebffee">
			<div class="ac" style="width:25%;height: 100%;float: left;">
				<input type="file" name="image_name1" id="anh3" style="text-align: left;" onchange="myfunc2()">
			</div>
			<div class="ac" style="width:50% ;height: 100%;float: left;">
				<input type="file" name="image_name" id="anh" style="text-align: center;" onchange="myfunc()">
			</div>
			<div class="ac" style="width:25%;height: 100%;float: right;">
				<input type="file" name="image_name2" id="anh5" style="text-align: right;" onchange="myfunc1()">
			</div>
		</div>
	<div id="boo">
		
		<div>
			<!--Thong tin so bo-->
			<p class="custom">Thông tin cơ bản</p>
			<input type="text" placeholder="Tên sản phẩm" name="product_name" id="product_name"><br>
			<input type="text" placeholder="Hệ điều hành" name="product_os" id="product_os"><br>
			<p style="margin:3px;">Hãng sản xuất</p>
			<select name="product_manu" id="product_manu">
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
			<p style="margin:3px;">Màu sắc</p>
			<select name="product_color" id="product_color">
				<?php 
					require_once("modules/config/connectdb.php");
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
			<p class="custom">Màn hình</p>
			<input type="text" placeholder="Công nghệ màn hình" name="product_tech_screen" id="product_tech_screen"> <br>
			<input type="text" placeholder="Độ phân giải" name="product_resolution_screen" id="product_resolution_screen"><br>
			<input type="text" placeholder="Màn hình rộng" name="product_width_screen" id="product_width_screen"><br>
			<input type="text" placeholder="Mặt kính cảm ứng" name="product_touch_glass" id="product_touch_glass">
		</div>

		<div>
			<!--camera sau-->
			<p class="custom">Camera sau</p>
			<input type="text" placeholder="Độ phân giải" name="product_resolution_camerarear" id="product_resolution_camerarear"> <br>
			<input type="text" placeholder="Quay phim" name="product_record_camerarear" id="product_record_camerarear"><br>
			<input type="text" placeholder="Đèn Flash" name="product_flash_camerarear" id="product_flash_camerarear"><br>
			<input type="text" placeholder="Tính năng" name="product_feature_camerarear" id="product_feature_camerarear">
		</div>

		<div>
			<!--camera truoc-->
			<p class="custom">Camera trước</p>
			<input type="text" placeholder="Độ phân giải" name="product_resolution_frontcamera" id="product_resolution_frontcamera"><br>
			Video CAll &nbsp
			<select name="product_videocall_frontcamera" id="product_videocall_frontcamera">
				<option value="1">Có</option>
				<option value="0">Không</option>
			</select><br>
			<input type="text" placeholder="Tính năng" name="product_feature_frontcamera" id="product_feature_frontcamera">
		</div>

		<div>
			<!--CPU va GPU-->
			<p class="custom">CPU và GPU</p>
			<input type="text" placeholder="Tên CPU" name="product_cpu" id="product_cpu"><br>
			<input type="text" placeholder="Thông số CPU" name="product_specification_cpu" id="product_specification_cpu"><br>
			<input type="text" placeholder="Tên GPU" name="product_gpu" id="product_gpu"><br>
			<input type="text" placeholder="Thông số GPU" name="product_specification_gpu" id="product_specification_gpu">
		</div>

		<div>
			<!--Bo nho va luu tru-->
			<p class="custom">Bộ nhớ và lưu trữ</p>
			<input type="number" placeholder="Ram" name="product_ram" id="product_ram"><br>
			<input type="number" placeholder="Bộ nhớ trong" name="product_storage" id="product_storage"><br>
			<input type="text" placeholder="Thẻ nhớ ngoài" name="product_memorycard" id="product_memorycard">
		</div>

		<div>
			<!--Ket noi-->
			<p class="custom">Các kết nối</p>
			<input type="text" placeholder="Mạng di động" name="product_mobilenetwork" id="product_mobilenetwork"><br>
			<input type="text" placeholder="Sim" name="product_sim" id="product_sim"><br>
			<input type="text" placeholder="Wifi" name="product_wifi" id="product_wifi"><br>
			<input type="text" placeholder="GPS" name="product_gps" id="product_gps"><br>
			<input type="text" placeholder="Bluetooth" name="product_bluetooth" id="product_bluetooth"><br>
			<input type="text" placeholder="Cổng sạc va kết nối" name="product_chargingport" id="product_chargingport"><br>
			<input type="text" placeholder="Jack tai nghe" name="product_jack" id="product_jack"><br>
			<input type="text" placeholder="Kết nối khác" name="product_otherconnect" id="product_otherconnect">
		</div>

		<div>
			<!--Thiet ke va trong luong-->
			<p class="custom">Thiết kế và trọng lượng</p>
			<input type="text" placeholder="Thiết kế" name="product_design" id="product_design"><br>
			<input type="text" placeholder="Chất liệu" name="product_material" id="product_material"><br>
			<input type="text" placeholder="Kích thước" name="product_size" id="product_size"><br>
			<input type="number" placeholder="Trọng lượng" name="product_weight" id="product_weight"><br>
		</div>

		<div>
			<!--Pin va sac-->
			<p class="custom">Pin và sạc</p>
			<input type="text" placeholder="Dung lượng pin" name="product_batterycapacity" id="product_batterycapacity"><br>
			<input type="text" placeholder="Loại pin" name="product_batterytype" id="product_batterytype">
		</div>

		<div>
			<!--Thời gian-->
			<p class="custom">Thời gian</p>
			Thời điểm ra mắt &nbsp<input type="date" name="product_timeoflaunch" id="product_timeoflaunch"><br><!--thoi diem ra mat-->
			<!--them time posting -->
			<input type="number" placeholder="Bảo hành ? tháng" name="product_guarantee" id="product_guarantee">
		</div>
		<div>
			<input type="number" placeholder="Số lưọng sản phẩm" name="product_quantity" id="product_quantity"><br>
			<input type="number" placeholder="Giá sản phẩm" name="product_price" id="product_price"><br>
			 <p style="display:block; height:25px;margin:0;margin-top:5px">Tình trạng</p>
			<select name="product_status" id="product_status">
				<option value="1">Kinh doanh</option>
				<option value="0">Không kinh doanh</option>
			</select>
		</div>
		<div>
			<button type="submit" name="add_product" id="add_product">SAVE</button>
		</div>
	</div>
	</form>
</div>