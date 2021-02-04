<?php 
	require_once("modules/config/connectdb.php");
	if(isset($_POST['sub_c'])){
		$name_color=trim($_POST['name_color']);
		$g=1;
		$sql="select * from color_product";
		$a=mysqli_query($conn,$sql);
		while($b=mysqli_fetch_assoc($a)){
				if($b['color_name']==$name_color){
					$g=0;
				}	
			}
		if($g==1){
			$sqlz="insert into color_product values(null,'$name_color')";
			$c=mysqli_query($conn,$sqlz);
			header("Location:index.php?supplier&color");
		}
		else{
			header("Location:index.php?supplier&color");
		}
	}

	$sql="select * from color_product";
	$a=mysqli_query($conn,$sql);

	
?>

<div style="width: 100%; height: 100%;display: flex;justify-content: center;align-items: center;background-color: #c2c4c5">
	<div style="width: 70%; height: 70%; background-color: white;display: flex;justify-content: center;align-items: center;">
		<div style="width: 50%; height: 100%; float: left; overflow: scroll;">
			<p>Các màu đã có : </p>
			<?php 
				while ($b=mysqli_fetch_assoc($a)){
					echo "<p>".$b['color_name']."</p>";
				}
			?>
		</div>

		<div style="width: 50%; height: 50%; float: left;">
			<form action="" method="POST" style="width: 100%;height: 100%;">
				<input type="text" name="name_color" placeholder="Nhập tên màu"><br><br>
				<button type="submit" name="sub_c">Thêm màu</button>
			</form>
		</div>
	</div>
</div>