 <?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	$s_idmanager=$s_idbill=$s_status=$s_date=$ss="";
	$flag=0;
	if(isset($_POST['s_sub'])){
		$s_idmanager=$_POST['s_idmanager'];
		$s_status=$_POST['s_status'];
		$s_date=$_POST['s_date'];
		$ss=$_POST['ss'];
		$s_idbill=$_POST['s_idbill'];
		if(!empty($s_idbill)){
			$s_idbill=" and bill.id=$s_idbill ";
			$flag=1;
		}

		if(!empty($s_idmanager)){
			$s_idmanager=" and active_bill.id_manager=$s_idmanager ";
			$flag=1;
		}
		if(!empty($s_status)){
			$s_status=" and bill.bill_status = '$s_status' ";
			$flag=1;
		}
		if(!empty($s_date)){
			$s_date=" and active_bill.time_receive = '$s_date' ";
			$flag=1;
		}
		if(!empty($ss)){
			if($ss==1){
				$ss=" order by active_bill.time_active ASC";
				$flag=1;
			}
			if($ss==2){
				$ss=" order by active_bill.time_active DESC";
				$flag=1;
			}
		}
		$ser="";
	}
	$arr=array(1=>"ADMIN", 2=>"STAFF", 3=>"CUSTOMER");
	$stt=array(3=>"Xác nhận thanh toán thành công", 4=>"Xác nhận không nhận", 6 =>"Được xóa");
	$sql="select * from bill inner join active_bill on bill.id=active_bill.id_bill where bill.bill_status!=0 and bill.bill_status!=1 and bill.bill_status!=2 and bill.bill_status!=5 $s_idbill $s_idmanager $s_status $s_date $ss ";
	$sql=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($sql);
?>

<link rel="stylesheet" type="text/css" href="modules/staff_management_bill/all_bill.css">
<div style="width: 100%; height: 6%;">
	<form action="" method="POST" style="width: 100%; height: 100%;">
		<div style="width: 100%; height: 50%; border-bottom:1px dotted green">
			<div class='bar1'>
				ID 
			</div>
			<div class='bar1'>
				Trạng thái đơn hàng
			</div>
			<div class='bar1'>
				Ngày nhận hàng
			</div>
			<div class='bar1'>
				Sắp xếp theo thời gian đặt hàng
			</div>
			<div class='bar1'>
				*
			</div>
		</div>
		<div style="width: 100%; height: 50%;">

			<div class='bar1'>
				<input type="number" name='s_idbill' min="1" placeholder="ID hóa đơn" style="text-align: center; width: 48%"> &nbsp
				<input type="number" name='s_idmanager' min="1" placeholder="ID nhân viên" style="text-align: center; width: 48%">
			</div>
			<div class='bar1'>
				<select name="s_status">
					<option value="">--Tất cả--</option>
					<option value="3">Giao hàng thành công</option>
					<option value="4">Khách không nhận</option>
					<option value="6">Bị xóa</option>
				</select>
			</div>
			<div class='bar1'>
				<input type="date" name='s_date'>
			</div>
			<div class='bar1'>
				<select name="ss">
					<option value="">--Mặc định--</option>
					<option value="1">Từ trước tới nay</option>
					<option value="2">Mới nhất</option>
				</select>
			</div>
			<div class='bar1'>
				<button type="submit" name='s_sub'>Tìm kiếm</button>
			</div>
		</div>
		
	</form>
</div>

<div id="container_processing">
	<div id="result"><?php if(isset($ser) && $flag==1){echo "Có ". $num." hóa đơn được tìm thấy";}else{echo "Tất cả : ".$num." hóa đơn";}  ?></div>
	<?php 
		while ($a=mysqli_fetch_assoc($sql)){
			$id_bill=$a['id'];
			$id_cus=$a['customer_id'];
			// lay type cua manager
			$type_manager=$a['id_manager'];
			$manager=$type_manager;
			$type_manager="select user_type from manager where id = $type_manager";
			$type_manager=mysqli_query($conn,$type_manager);
			$type_manager=mysqli_fetch_assoc($type_manager);
			$type_manager=$type_manager['user_type'];
			
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
			// lay time receive ben active
			$active="select time_receive from active_bill where id_bill='$id_bill' and id_manager='$manager'";
			$active=mysqli_query($conn,$active);
			$active=mysqli_fetch_assoc($active);
			$active=$active['time_receive'];
			
			if(!empty($active)){
				$date=date_create($active);
				$date=date_format($date,"Y/m/d");
			}
			else{
				$date="Chưa cập nhật thời gian";
			}
			
			// lay tat ca san pham thuoc bill trong bill_detail
			$detail="select * from bill_detail where id_bill='$id_bill' ";
			$detail=mysqli_query($conn,$detail);
			//--------
			echo "<div style='width:70%;min-height:350px;border:4px solid #068604; margin-top:7px; margin-bottom:12px;'>";
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
				echo "<div class='t41'>";
					echo "Thời gian nhận hàng : ".$date;
				echo "</div>";
					
				echo "<div class='t42'>";
					echo $stt[$a['bill_status']]." bởi ".$arr[$type_manager].' với ID : '.$a['id_manager'] ;
				echo "</div>";
				
				echo "</div>";
			echo "</div>";
		}
	?>
</div>