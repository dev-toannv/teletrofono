
<?php 
	// kiem tra khi vao gio hang, neu so luong hang con lai lon hon so luong san pham trong gio hang
	foreach ($_SESSION['cart'] as $key => $value) {
		$sql_delete="select product_quantity from product where id = $key";
		$delete=mysqli_fetch_assoc(mysqli_query($conn,$sql_delete));
		$delete=$delete['product_quantity'];
		if($_SESSION['cart'][$key]>$delete){
			$_SESSION['cart'][$key]=$delete;
		}
		if($delete==0){
			unset($_SESSION['cart'][$key]);
		}
	}

	// lay ten hang
	$manu=array();
	$sql_manu="select * from manu_product";
	$a=mysqli_query($conn,$sql_manu);
	while ($b = mysqli_fetch_assoc($a)){
		$manu[$b['id']]=$b['manu_name'];
	}
	if(isset($_GET['minus'])){
		$g=$_GET['minus'];
		if($_SESSION['cart'][$g] >1){
			$_SESSION['cart'][$g]-=1;
		}
		else{
			unset($_SESSION['cart'][$g]);
		}
		header("Location:index.php?cart=cart");
	}

	if(isset($_GET['add'])){
		$g=$_GET['add'];
		$limit="select product_quantity from product where id = $g";
		$limit = mysqli_fetch_assoc(mysqli_query($conn,$limit));
		if($_SESSION['cart'][$g] < $limit['product_quantity']){
			$_SESSION['cart'][$g]+=1;
		}
		else{
			$_SESSION['cart'][$g]=$_SESSION['cart'][$g];
		}


		header("Location:index.php?cart=cart");
	}


 ?>
 <?php 
 	if(isset($_GET['err'])){
 		echo "<script type='text/javascript'>";
 			echo "alert('Thanh toán không thành công, vui lòng nhập đủ thông tin');";
 		echo "</script>";
 	}
 ?>

  <?php 
 	if(isset($_GET['err1'])){
 		echo "<script type='text/javascript'>";
 			echo "alert('Thanh toán không thành công, quý khách vui lòng chọn lại số lượng sản phẩm');";
 		echo "</script>";
 	}
 ?>
<div style="width: 80%; height: auto; margin-top: 19px;">
	<link rel="stylesheet" type="text/css" href="modules/cart/noacc1.css">
	<form action="" method="POST">
<table>
	<tr>
		<th colspan="4" style="font-size: 30px">
			GIỎ HÀNG
		</th>
	</tr>
	<tr>
		<th class="stt" style="height:55px">STT</th>
		<th class="name" style="height:55px">Tên sản phẩm</th>
		<th class="action" style="height:55px">Số lượng</th>
		<th class="money" style="height:55px">*</th>
	</tr>
	<?php 

		$cor=array();
		$color="select * from color_product";
		$color=mysqli_query($conn,$color);
		while ($f=mysqli_fetch_assoc($color)){
			$cor[$f['id']]=$f['color_name'];
		}

		$c=0;
		$money=0;
		foreach ($_SESSION['cart'] as $key => $value) {
			$c+=1;
			$sql="select id, product_manu, product_price, product_name, product_color from product where id= '$key'";
			$se=mysqli_fetch_assoc(mysqli_query($conn,$sql));
			$manu1=$manu[$se['product_manu']];
			$image="select image_name from image where product_id = $key limit 1";
			$image=mysqli_fetch_assoc(mysqli_query($conn,$image));
			$image=$image['image_name'];
			$folder="../public/product/".$manu1."/".$image;

			echo "<tr>";
				echo "<td class='stt'>";
					echo $c;
				echo "</td>";
				echo "<td class='name'>";
					// ten va anh
					echo "<div class='n1'>";
						echo $se['product_name']." /".$cor[$se['product_color']] ;
					echo "</div>";

					echo "<div class = 'n2'>";
						echo "<a href='index.php?search_manu=all&product_detail=$key'>"."<img src='".$folder."' class='y'/>"."</a>";
					echo "</div>";

				echo "</td>";
				echo "<td class='action'>";
					// thao tac them xoa
					echo "<div class='minus'>";
						echo "<a href='index.php?cart=cart&minus=$key'>-</a>";
					echo "</div>";

					echo "<div class='sl'>";
						echo $value;
					echo "</div>";

					echo "<div class='add'>";
						echo "<a href='index.php?cart=cart&add=$key'>+</a>";
					echo "</div>";
				
				echo "</td>";
				echo "<td class='money'>";

					echo "<div class='i1'>";
					// so tien
						echo number_format($se['product_price'],0,'','.')." /chiếc";
					echo "</div>";
					echo "<div class='i2'>";
					// tong tien 
					$u=$se['product_price']*$value;
					$money+=$u;
					echo "Thành tiền : ".number_format($u,0,'','.');
					echo "</div>";
				echo "</td>";
				
			echo "</tr>";
		}
		echo "<tr>";
			echo "<td colspan='3' align='right' height='40px' style='font-size:30px; color:red'>";
				echo "Tổng tiền : ";
			echo "</td>";

			echo "<td height='40px' style='font-size:30px; color:red'>";
				echo number_format($money,0,'','.')." VNĐ";
			echo "</td>";
		echo "</tr>";
	?>	

	<tr>
		<td colspan="4" height="60px">
			<div id='thanhtoan'>
				<a href="index.php?cart=cart&bill" id="thanhtoan1">Chuyển đến thanh toán</a>
			</div>
		</td>
	</tr>
</table>
</form>
</div>
