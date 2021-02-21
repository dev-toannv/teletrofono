<link rel="stylesheet" href="modules/edit/edit.css">
<div>
	<h1>Chỉnh sửa sản phẩm</h1>
</div>

<div> 
	<div id="page_add">
	<link rel="stylesheet" type="text/css" href="modules/edit/edit.css">
<?php
	if(isset($_SESSION['staff_code'])){

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
			$t=array();
			$nn="product_".$id."_"."1"."_";
			$image="select * from image where product_id='$id' and image_name like'%$nn%'";
			$query_image=mysqli_query($conn,$image);
			$result_img=mysqli_fetch_assoc($query_image);

			if(mysqli_num_rows($query_image)>0){
				$t[0]=$result_img['image_name'];
			}
			else{
				$t[0]="";
			}
			if($t[0]==""){
				$path="../public/product/product.svg";
			}
			else{
				$path=$folder.$t[0];
			}


			$nn="product_".$id."_"."2"."_";
			$image="select * from image where product_id='$id' and image_name like'%$nn%'";
			$query_image=mysqli_query($conn,$image);
			$result_img=mysqli_fetch_assoc($query_image);
			if(mysqli_num_rows($query_image)>0){
				$t[1]=$result_img['image_name'];
			}
			else{
				$t[1]="";
			}
			if($t[1]==""){
				$path2="../public/product/product.svg";
			}
			else{
				$path2=$folder.$t[1];
			}

			$nn="product_".$id."_"."3"."_";
			$image="select * from image where product_id='$id' and image_name like'%$nn%'";
			$query_image=mysqli_query($conn,$image);
			$result_img=mysqli_fetch_assoc($query_image);
			if(mysqli_num_rows($query_image)>0){
				$t[2]=$result_img['image_name'];
			}
			else{
				$t[2]="";
			}
			if($t[2]==""){
				$path3="../public/product/product.svg";
			}
			else{
				$path3=$folder.$t[2];
			}

		}
		//Lay du lieu tu POST
		$staff_code=$_SESSION['staff_code'];
		if(isset($_POST['edit_product'])){
			$product_color=trim($_POST['product_color']);
			$product_manu=trim($_POST['product_manu']);
			$product_os=trim($_POST['product_os']);
			// $product_des=trim($_POST['product_des']);
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
		
		//Ket noi database va update
			require_once("modules/config/connectdb.php");
			$sql9="update product set
					product_color='$product_color',
					product_manu='$product_manu',
					product_os='$product_os',
					product_tech_screen='$product_tech_screen',
					product_resolution_screen='$product_resolution_screen',
					product_width_screen='$product_width_screen',
					product_touch_glass='$product_touch_glass',
					product_resolution_camerarear='$product_resolution_camerarear',
					product_record_camerarear='$product_record_camerarear',
					product_flash_camerarear='$product_flash_camerarear',
					product_feature_camerarear='$product_feature_camerarear',
					product_resolution_frontcamera='$product_resolution_frontcamera',
					product_videocall_frontcamera='$product_videocall_frontcamera',
					product_feature_frontcamera='$product_feature_frontcamera',
					product_cpu='$product_cpu',
					product_specification_cpu='$product_specification_cpu',
					product_gpu='$product_gpu',
					product_specification_gpu='$product_specification_gpu',
					product_ram='$product_ram',
					product_storage='$product_storage',
					product_memorycard='$product_memorycard',
					product_mobilenetwork='$product_mobilenetwork',
					product_sim='$product_sim',
					product_wifi='$product_wifi',
					product_gps='$product_gps',
					product_bluetooth='$product_bluetooth',
					product_chargingport='$product_chargingport',
					product_jack='$product_jack',
					product_otherconnect='$product_otherconnect',
					product_design='$product_design',
					product_material='$product_material',
					product_size='$product_size',
					product_weight='$product_weight',
					product_batterycapacity='$product_batterycapacity',
					product_batterytype='$product_batterytype',
					product_timeoflaunch='$product_timeoflaunch',
					product_guarantee='$product_guarantee',
					product_quantity='$product_quantity',
					product_name='$product_name',
					product_status='$product_status',
					product_price='$product_price'
					where id='$id'
				";
			$a=mysqli_query($conn,$sql9);
			//---------------------------------------------------------------------------------------------------
			// xu ly anh 1
			// kiem tra neu ko co anh cu ma tai anh moi len
			$f1="product_".$id."_"."1"."_";
			$f="select * from image where image_name like '%$f1%'";
			$query_f=mysqli_query($conn,$f);
			$dem=mysqli_affected_rows($conn);
			if($dem > 0){
				$tencu=mysqli_fetch_assoc($query_f);
			}
			if($dem==0 && $_FILES['image_name']['size'] > 0){
				$img_new_1=$_FILES['image_name'];
					// xet ten hang san pham
					$sql20="select * from manu_product where id ='$product_manu'";
					$n=mysqli_query($conn,$sql20);
					$row_new_1=mysqli_fetch_assoc($n);
					$manu_name_new_1 =$row_new_1['manu_name'];
					$folder2="../public/product/".$manu_name_new_1."/";
					$folder3="../public/product/".$manu_name_new_1;
					if(file_exists($folder3)==false){
						mkdir($folder3);
					}
				$path_new_1=$folder2.$img_new_1['name'];
				move_uploaded_file($img_new_1['tmp_name'],$path_new_1);

				$old_name=$folder2.$img_new_1['name'];
					$c=explode(".",$img_new_1['name']);
					$prm=$c[count($c)-1];

					$new_name="product_".$id."_"."1"."_".".".$prm;
					$new=$folder2.$new_name;
					rename($old_name,$new);
					//-----------------------------------------
					$sql7="insert into image values('$id','$new_name')";
					if(!$sql7){
						 die("loi".mysqli_error($conn));
					}
					mysqli_query($conn,$sql7);

			}
				// doi hang ko doi anh
			if($_FILES['image_name']['size']<=0 && $dem>0){
				$img_new_1=$tencu['image_name'];
					// xet ten hang san pham
					$sql20="select * from manu_product where id ='$product_manu'";
					$n=mysqli_query($conn,$sql20);
					$row_new_1=mysqli_fetch_assoc($n);
					$manu_name_new_1 =$row_new_1['manu_name'];
				if($manu_name_new_1 != $manu_name){
					$folder2="../public/product/".$manu_name_new_1."/";
					$folder3="../public/product/".$manu_name_new_1;
					if(file_exists($folder3)==false){
						mkdir($folder3);
					}
					$path_new_1=$folder2.$img_new_1;
					// neu khac thi se coppy file cu vao file moi va xoa file cu di
					copy($path,$path_new_1);
					unlink($path);
				}
			}
			// doi anh ko doi hang hoac doi anh doi hang
			if($_FILES['image_name']['size']>0 && $dem>0){ 
				$img_new_1=$_FILES['image_name'];
				$img_na=$img_new_1['name'];
				// xet ten hang san pham
				$sql20="select * from manu_product where id ='$product_manu'";
				$n=mysqli_query($conn,$sql20);
				$row_new_1=mysqli_fetch_assoc($n);
				$manu_name_new_1 =$row_new_1['manu_name'];
				
				// Neu hang moi bang hang cu
				if($manu_name_new_1 == $manu_name){
					// kiem tra neu thu muc moi khac thu muc cu
					$folder2=$folder;
					if(file_exists($folder2)==false){
						mkdir($folder2);
					}
				}
				// Neu hang moi khong bang hang cu
				if($manu_name_new_1 != $manu_name){
					$folder2="../public/product/".$manu_name_new_1."/";
					$folder3="../public/product/".$manu_name_new_1;
					if(file_exists($folder3)==false){
						mkdir($folder3);
					}
				}
				unlink($path);
				// day hinh anh len
				$path_new_1=$folder2.$img_new_1['name'];
				move_uploaded_file($img_new_1['tmp_name'],$path_new_1);

				// rename anh theo id
				$old_name=$folder2.$img_new_1['name'];
				$c=explode(".",$img_new_1['name']);
				$prm=$c[count($c)-1];

				$new_name="product_".$id."_"."1"."_".".".$prm;
				$new=$folder2.$new_name;
				rename($old_name,$new);

				$name_old_1=$tencu['image_name'];
				$sql21="update image set image_name = '$new_name' where image_name = '$name_old_1'";
				if(!$sql21){
					 die("loi".mysqli_error($conn));
				}
				mysqli_query($conn,$sql21);
			}


			// xu ly anh 2

			$f1="product_".$id."_"."2"."_";
			$f="select * from image where image_name like '%$f1%'";
			$query_f=mysqli_query($conn,$f);
			$dem=mysqli_affected_rows($conn);
			if($dem > 0){
				$tencu=mysqli_fetch_assoc($query_f);
			}
			if($dem==0 && $_FILES['image_name2']['size'] > 0){
				$img_new_2=$_FILES['image_name2'];
					// xet ten hang san pham
					$sql20="select * from manu_product where id ='$product_manu'";
					$n=mysqli_query($conn,$sql20);
					$row_new_2=mysqli_fetch_assoc($n);
					$manu_name_new_2 =$row_new_2['manu_name'];
					$folder2="../public/product/".$manu_name_new_2."/";
					$folder3="../public/product/".$manu_name_new_2;
					if(file_exists($folder3)==false){
						mkdir($folder3);
					}
				$path_new_2=$folder2.$img_new_2['name'];
				move_uploaded_file($img_new_2['tmp_name'],$path_new_2);

				$old_name=$folder2.$img_new_2['name'];
					$c=explode(".",$img_new_2['name']);
					$prm=$c[count($c)-1];

					$new_name="product_".$id."_"."2"."_".".".$prm;
					$new=$folder2.$new_name;
					rename($old_name,$new);
					//-----------------------------------------
					$sql7="insert into image values('$id','$new_name')";
					if(!$sql7){
						 die("loi".mysqli_error($conn));
					}
					mysqli_query($conn,$sql7);

			}
				// doi hang ko doi anh
			if($_FILES['image_name2']['size']<=0 && $dem>0){
				$img_new_2=$tencu['image_name'];
					// xet ten hang san pham
					$sql20="select * from manu_product where id ='$product_manu'";
					$n=mysqli_query($conn,$sql20);
					$row_new_2=mysqli_fetch_assoc($n);
					$manu_name_new_2 =$row_new_2['manu_name'];
				if($manu_name_new_2 != $manu_name){
					$folder2="../public/product/".$manu_name_new_2."/";
					$folder3="../public/product/".$manu_name_new_2;
					if(file_exists($folder3)==false){
						mkdir($folder3);
					}
					$path_new_2=$folder2.$img_new_2;
					// neu khac thi se coppy file cu vao file moi va xoa file cu di
					copy($path2,$path_new_2);
					unlink($path2);
				}
			}
			// doi anh ko doi hang hoac doi anh doi hang
			if($_FILES['image_name2']['size']>0 && $dem>0){ 
				$img_new_2=$_FILES['image_name2'];
				$img_na=$img_new_2['name'];
				// xet ten hang san pham
				$sql20="select * from manu_product where id ='$product_manu'";
				$n=mysqli_query($conn,$sql20);
				$row_new_2=mysqli_fetch_assoc($n);
				$manu_name_new_2 =$row_new_2['manu_name'];
				
				// Neu hang moi bang hang cu
				if($manu_name_new_2 == $manu_name){
					// kiem tra neu thu muc moi khac thu muc cu
					$folder2=$folder;
					if(file_exists($folder2)==false){
						mkdir($folder2);
					}
				}
				// Neu hang moi khong bang hang cu
				if($manu_name_new_2 != $manu_name){
					$folder2="../public/product/".$manu_name_new_2."/";
					$folder3="../public/product/".$manu_name_new_2;
					if(file_exists($folder3)==false){
						mkdir($folder3);
					}
				}
				unlink($path2);
				// day hinh anh len
				$path_new_2=$folder2.$img_new_2['name'];
				move_uploaded_file($img_new_2['tmp_name'],$path_new_2);

				// rename anh theo id
				$old_name=$folder2.$img_new_2['name'];
				$c=explode(".",$img_new_2['name']);
				$prm=$c[count($c)-1];

				$new_name="product_".$id."_"."2"."_".".".$prm;
				$new=$folder2.$new_name;
				rename($old_name,$new);

				$name_old_2=$tencu['image_name'];
				$sql21="update image set image_name = '$new_name' where image_name = '$name_old_2'";
				if(!$sql21){
					 die("loi".mysqli_error($conn));
				}
				mysqli_query($conn,$sql21);
			}

			// xu ly anh 3

			$f1="product_".$id."_"."3"."_";
			$f="select * from image where image_name like '%$f1%'";
			$query_f=mysqli_query($conn,$f);
			$dem=mysqli_affected_rows($conn);
			if($dem > 0){
				$tencu=mysqli_fetch_assoc($query_f);
			}
			if($dem==0 && $_FILES['image_name3']['size'] > 0){
				$img_new_3=$_FILES['image_name3'];
					// xet ten hang san pham
					$sql20="select * from manu_product where id ='$product_manu'";
					$n=mysqli_query($conn,$sql20);
					$row_new_3=mysqli_fetch_assoc($n);
					$manu_name_new_3 =$row_new_3['manu_name'];
					$folder2="../public/product/".$manu_name_new_3."/";
					$folder3="../public/product/".$manu_name_new_3;
					if(file_exists($folder3)==false){
						mkdir($folder3);
					}
				$path_new_3=$folder2.$img_new_3['name'];
				move_uploaded_file($img_new_3['tmp_name'],$path_new_3);

				$old_name=$folder2.$img_new_3['name'];
					$c=explode(".",$img_new_3['name']);
					$prm=$c[count($c)-1];

					$new_name="product_".$id."_"."3"."_".".".$prm;
					$new=$folder2.$new_name;
					rename($old_name,$new);
					//-----------------------------------------
					$sql7="insert into image values('$id','$new_name')";
					if(!$sql7){
						 die("loi".mysqli_error($conn));
					}
					mysqli_query($conn,$sql7);

			}
				// doi hang ko doi anh
			if($_FILES['image_name3']['size']<=0 && $dem>0){
				$img_new_3=$tencu['image_name'];
					// xet ten hang san pham
					$sql20="select * from manu_product where id ='$product_manu'";
					$n=mysqli_query($conn,$sql20);
					$row_new_3=mysqli_fetch_assoc($n);
					$manu_name_new_3 =$row_new_3['manu_name'];
				if($manu_name_new_3 != $manu_name){
					$folder2="../public/product/".$manu_name_new_3."/";
					$folder3="../public/product/".$manu_name_new_3;
					if(file_exists($folder3)==false){
						mkdir($folder3);
					}
					$path_new_3=$folder2.$img_new_3;
					// neu khac thi se coppy file cu vao file moi va xoa file cu di
					copy($path3,$path_new_3);
					unlink($path3);
				}
			}
			// doi anh ko doi hang hoac doi anh doi hang
			if($_FILES['image_name3']['size']>0 && $dem>0){ 
				$img_new_3=$_FILES['image_name3'];
				$img_na=$img_new_3['name'];
				// xet ten hang san pham
				$sql20="select * from manu_product where id ='$product_manu'";
				$n=mysqli_query($conn,$sql20);
				$row_new_3=mysqli_fetch_assoc($n);
				$manu_name_new_3=$row_new_3['manu_name'];
				
				// Neu hang moi bang hang cu
				if($manu_name_new_3 == $manu_name){
					// kiem tra neu thu muc moi khac thu muc cu
					$folder2=$folder;
					if(file_exists($folder2)==false){
						mkdir($folder2);
					}
				}
				// Neu hang moi khong bang hang cu
				if($manu_name_new_3 != $manu_name){
					$folder2="../public/product/".$manu_name_new_3."/";
					$folder3="../public/product/".$manu_name_new_3;
					if(file_exists($folder3)==false){
						mkdir($folder3);
					}
				}
				unlink($path3);
				// day hinh anh len
				$path_new_3=$folder2.$img_new_3['name'];
				move_uploaded_file($img_new_3['tmp_name'],$path_new_3);

				// rename anh theo id
				$old_name=$folder2.$img_new_3['name'];
				$c=explode(".",$img_new_3['name']);
				$prm=$c[count($c)-1];

				$new_name="product_".$id."_"."3"."_".".".$prm;
				$new=$folder2.$new_name;
				rename($old_name,$new);

				$name_old_3=$tencu['image_name'];
				$sql21="update image set image_name = '$new_name' where image_name = '$name_old_3'";
				if(!$sql21){
					 die("loi".mysqli_error($conn));
				}
				mysqli_query($conn,$sql21);
			}
			//---------------------------------------------------------------------------------------
			// cap nhat nguoi sua lan cuoi
			$sql99="select id from manager where manager_code = '$staff_code'";
			$staff_code=mysqli_fetch_assoc(mysqli_query($conn,$sql99));
			$staff_code=$staff_code['id'];
			$last_update="update add_edit_product set id_user_edit_last = '$staff_code', time_edit_last=now() where id_product='$id'";
			mysqli_query($conn,$last_update);
			header("Location:index.php?module=interface&action=interfaceStaff&choose=mproduct&mpr=show&id_edit=$id");
		}
	}
	else{
		header("Location:index.php");
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
			<div class="ac" style="width:30%;height: 100%;float: left;">
				<img src="<?php echo $path2; ?>" id="anh4" style="max-height: 80%; max-width: 80%">
			</div>
			<div  class="ac" style="width:40% ;height: 100%;float: left;">
				<img src="<?php echo $path; ?>" id="anh1" style="max-height: 80%; max-width: 80%">
			</div>
			<div  class="ac" style="width:30%;height: 100%;float: right;">
				<img src="<?php echo $path3; ?>" id="anh6" alt="" style="max-height: 80%; max-width: 80%">
			</div>
			
		</div>

		<div style="width:100%;height:40px;margin-top: 10px; background: #ebffee">
			<div class="ac" style="width:25%;height: 100%;float: left;">
				<input type="file" name="image_name2" id="anh3" style="text-align: left;" onchange="myfunc2()">
			</div>
			<div class="ac" style="width:50% ;height: 100%;float: left;">
				<input type="file" name="image_name" id="anh" style="text-align: center;" onchange="myfunc()">
			</div>
			<div class="ac" style="width:25%;height: 100%;float: right;">
				<input type="file" name="image_name3" id="anh5" style="text-align: right;" onchange="myfunc1()">
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