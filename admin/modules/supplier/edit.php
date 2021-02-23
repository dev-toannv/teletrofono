 <?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	$img='';
	if(isset($_GET['edit_id'])){
		$id = $_GET['edit_id'];
		$view="select * from manu_product where id = $id";
		$folder="../public/product/";
		$row=mysqli_fetch_assoc(mysqli_query($conn,$view));
		$img=$folder.$row['manu_image'];
		$_SESSION['image']=$img;
	}
	if(isset($_POST['sub_edit'])){
		$name=$_POST['manu_name'];
		$img=$_FILES['manu_img'];
		$status=$_POST['status'];
		$sql="update manu_product set manu_name = '$name', manu_status='$status' where id = $id";
		mysqli_query($conn,$sql);

		if($name!=$row['manu_name']){
			$old_folder="../public/product/".$row['manu_name'];
			$new_folder="../public/product/".$name;
			rename($old_folder,$new_folder);
		}


		if($status==0){
			$mysql="update product set product_status= 0 where product_manu= $id";
			mysqli_query($conn,$mysql);
		}

		if($_FILES['manu_img']['size']>0){
			unlink($_SESSION['image']);
			unset($_SESSION['image']);
			$imgname=$_FILES['manu_img']['name'];
			$folder="../public/product/";
			$check=$folder.$imgname;
			move_uploaded_file($_FILES['manu_img']['tmp_name'], $check);
			$sql2="update manu_product set manu_image = '$imgname' where id = $id";
			mysqli_query($conn,$sql2);
			if(mysqli_query($conn,$sql2)==false){
				echo mysqli_error($conn);
			}
		}
		header("Location:index.php?supplier&manu");
	}

?>

<div style="width: 100%; height: 50%;border-bottom:1px solid black;display: flex;justify-content: center;align-items: center;">
	<img src="<?php echo $img; ?>" id="imgg" style="max-width: 100%;max-height: 100%; ">
</div>
<div style="width: 100%; height: 50%; display: flex;justify-content: center;align-items: center;">
	<form action="" method="POST" style="width: 100%; height: 70%" enctype="multipart/form-data">
		<input type="file" name="manu_img" id='file' onchange="displayon()"><br>
		<input type="text" value="<?php echo $row['manu_name']; ?>" name="manu_name" style="width: 50%;height: 15%; margin-bottom:3%; margin-top: 3% " placeholder="Nhập tên hãng"><br>
		<select name="status" id="">
			<option value="1" <?php if($row['manu_status']==1) echo "selected"; ?> >Kinh doanh</option>
			<option value="0" <?php if($row['manu_status']==0) echo "selected"; ?>>Ngừng kinh doanh</option>
		</select>
		<button type="submit" name="sub_edit">Lưu thay đổi</button>
	</form>
</div>