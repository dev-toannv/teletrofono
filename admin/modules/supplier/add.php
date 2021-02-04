<?php 
	require_once("modules/config/connectdb.php");
	if(isset($_POST['sub_add'])){
		$name=$_POST['manu_name'];
		$img=$_FILES['manu_img'];
		$imgname=$_FILES['manu_img']['name'];
		$folder="../public/product/";
		$check=$folder.$imgname;
		if(file_exists($check)){
			header("Location:index.php?supplier&manu");
		}
		else{
			$sql="insert into manu_product values(null,'$name','$imgname',1)";
			$a=mysqli_query($conn,$sql);
			if($a){
				move_uploaded_file($img['tmp_name'], $check);
				header("Location:index.php?supplier&manu");
			}
			else{
				echo mysqli_error($conn);
			}
		}
	}
?>
<div style="width: 100%; height: 50%;border-bottom:1px solid black">
	<img src="" id="imgg" style="max-width: 100%;max-height: 100%; ">
</div>
<div style="width: 100%; height: 50%; display: flex;justify-content: center;align-items: center;">
	<form action="" method="POST" style="width: 100%; height: 70%" enctype="multipart/form-data">
		<input type="file" name="manu_img" id='file' onchange="displayon()"><br>
		<input type="text" name="manu_name" style="width: 50%;height: 15%; margin-bottom:3%; margin-top: 3% " placeholder="Nhập tên hãng"><br>
		<button type="submit" name="sub_add">Thêm hãng</button>
	</form>
</div>