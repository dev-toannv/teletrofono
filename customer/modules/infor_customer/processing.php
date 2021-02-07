<?php 
	require_once("modules/config/connectdb.php");
	$sql="select * from bill where bill_status=0 and customer_id = $id_customer ";
	$sql=mysqli_query($conn,$sql);
	if(isset($_GET['delete'])){
		$id_b=$_GET['delete'];
		$v="select id from bill where id = $id_b and customer_id = $id_customer";
		$v=mysqli_query($conn,$v);
		if(mysqli_num_rows($v)>0){
			$sql_delete="delete from bill_detail where id_bill = $id_b";
			mysqli_query($conn,$sql_delete);
			$sql_delete="delete from bill where id = $id_b and customer_id = $id_customer";
			$sql_delete=mysqli_query($conn,$sql_delete);
			header("Location:index.php?infor=infor&bill&select=processing");
		}
		else{
			header("Location:index.php?infor=infor&bill&select=processing");
		}
	}
?>

<link rel="stylesheet" type="text/css" href="modules/infor_customer/processing.css">
<div id="container_processing">
	<?php 
		while ($a=mysqli_fetch_assoc($sql)){
			$id_bill=$a['id'];
			$id_cus=$a['customer_id'];
			// lay type khach hang
			$type="select customer_type from customer where id = '$id_cus'";
			$type=mysqli_query($conn,$type);
			$type=mysqli_fetch_assoc($type);
			$type=$type['customer_type'];
			if($type==0){
				$khuyenmai="Không có giảm giá";
			}
			else{
				$khuyenmai="Đã giảm 3% khách VIP";
			}
			// lay tat ca san pham thuoc bill trong bill_detail
			$detail="select * from bill_detail where id_bill='$id_bill' ";
			$detail=mysqli_query($conn,$detail);
			//--------
			echo "<div style='width:70%;height:350px;border:4px solid #068604; margin-top:7px; margin-bottom:12px;'>";
				echo "<div class='task1'>";
					// thoi gian dat hang
					echo "<div class='time'>";
						echo "Thời gian đặt hàng :".'<br>';
						echo $a['bill_time'];
					echo "</div>";
					// ten khach hang
					echo "<div class='name_customer'>";
						echo "Tên khách hàng :"."<br>";
						echo $a['bill_namecustomer'];
					echo "</div>";
					// so dien thoai
					echo "<div class='phonenumber'>";
						echo "Số điện thoại :"."<br>";
						echo $a['bill_phonenumber'];
					echo "</div>";
					// id bill
					echo "<div class='id_bill'>";
						echo "ID hóa đơn : ".$a['id'];
					echo "</div>";
				echo "</div>";

				echo "<div class='task2'>";
				// noi dung ben trai
					echo "<div style='width:80%; height:100%;float:left;border-bottom:2px solid #068604;' >";
						echo "<div style='width:100%;height:25%' id='gh'>";
							// id san pham
							echo "<div class='idpr' style='border-bottom:1px solid black; height:100%'>";
								echo "ID sản phẩm";
							echo "</div>";

							// ten san pham
							echo "<div class='namepr' style='border-bottom:1px solid black; height:100%'>";
								echo "Tên sản phẩm";
							echo "</div>";

							// so luong
							echo "<div class='quanpr' style='border-bottom:1px solid black; height:100%'>";
								echo "Số lượng";
							echo "</div>";

							// gia tien
							echo "<div class='monpr' style='border-bottom:1px solid black; height:100%'>";
								echo "Giá tiền";
							echo "</div>";
						echo "</div>";
						
						echo "<div style='width:100%;height:75%;overflow-y:scroll' class='scroll'>";
							// xu ly thong tin chi tiet tung san pham
							while($z=mysqli_fetch_assoc($detail)){
								$k=$z['id_product'];
								$namepr="select product_name from product where id= $k";
								$namepr=mysqli_query($conn,$namepr);
								$namepr=mysqli_fetch_assoc($namepr);
								$namepr=$namepr['product_name'];
								echo "<div class='idpr' style='margin-bottom:4px'>";
									echo $z['id_product'];
								echo "</div>";

								// ten san pham
								echo "<div class='namepr' style='margin-bottom:4px'>";
									echo "<a href='../customer/index.php?search_manu=all&product_detail=".$k."' target='_blank'>".$namepr."</a>";
								echo "</div>";

								// so luong
								echo "<div class='quanpr' style='margin-bottom:4px'>";
									echo $z['quantity'];
								echo "</div>";

								// gia tien
								echo "<div class='monpr' style='margin-bottom:4px'>";
									echo $z['money'];
								echo "</div>";
							}
						echo "</div>";
					echo "</div>";
				// tong tien
					echo "<div style='width:20%; height:100%; float:left;display: flex;justify-content: center;align-items: center;border-left:1px solid black;border-bottom:2px solid #068604'>";
						echo "Tổng tiền :"."<br>";
						echo  number_format($a['bill_money'],0,'','.')." VNĐ"."<br><br>";
						echo $khuyenmai;;
					echo "</div>";
				echo "</div>";

				echo "<div class='task3'>";
					echo "Địa chỉ : ".$a['bill_address'];
				echo "</div>";

				echo "<div class='task4'>";
					echo "<a href='index.php?infor=infor&bill&select=processing&delete=$id_bill'>Hủy đơn</a>";
				echo "</div>";
			echo "</div>";
		}
	?>
</div>