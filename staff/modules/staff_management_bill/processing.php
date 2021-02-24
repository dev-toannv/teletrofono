 <?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	$manager=$_SESSION['id'];
	// lay type cua manager de them neu manager xoa bill
	$manager_type="select user_type from manager where id = $manager";
	$manager_type=mysqli_query($conn,$manager_type);
	$manager_type=mysqli_fetch_assoc($manager_type);
	$manager_type=$manager_type['user_type'];

	$sql="select * from bill inner join active_bill on bill.id=active_bill.id_bill where bill.bill_status!=0 and bill.bill_status!=3 and bill.bill_status!=4 and bill.bill_status!=6 and active_bill.id_manager='$manager' ";
	date_default_timezone_set("Asia/Ho_Chi_Minh");

	$sql=mysqli_query($conn,$sql);
	$t=time();
	$t=date("Y-m-d",$t);

	if(isset($_POST['update'])){
		$id_pro=$_POST['id_pro'];
		$date=$_POST['date'];
		$select=$_POST['select'];

		$sq="select id from bill where id = $id_pro";
		$sq=mysqli_query($conn,$sq);
		$sq=mysqli_num_rows($sq);
		if($sq<=0){
			header("Location:index.php?module=interface&action=interfaceStaff&choose=mbill&progress=processing");
		}
		else{
			if($select==6 || $select==4){
			// kiem tra xem nhan vien xoa hoa don ko
				// neu xoa hoa don hoac khach khong nhan hang thi se bu lai so luong san pham
				$qtt="select * from bill_detail where id_bill=$id_pro";
				$qtt=mysqli_query($conn,$qtt);
				while($g=mysqli_fetch_assoc($qtt)){
					$sl=$g['quantity'];
					$id_delete_product=$g['id_product'];
					// lay so luong san pham hien tai de cong voi so luong da bi xoa
					$ht="select product_quantity from product where id = $id_delete_product";
					$ht=mysqli_query($conn,$ht);
					$ht=mysqli_fetch_assoc($ht);
					$ht=$ht['product_quantity'];

					$sl=$sl+$ht;
					$update3="update product set product_quantity = '$sl' where id = $id_delete_product";
					mysqli_query($conn,$update3);

					$sql1="update bill set bill_status = $select where id = $id_pro";
					mysqli_query($conn,$sql1);
				}
				// $sql_de="delete from bill_detail where id_bill=$id_pro";
				// mysqli_query($conn,$sql_de);

				// $sql_de="delete from active_bill where id_bill=$id_pro";
				// mysqli_query($conn,$sql_de);

				// $sql_de="delete from bill where id=$id_pro";
				// mysqli_query($conn,$sql_de);

			}
			else{
				$sql1="update bill set bill_status = $select where id = $id_pro";
				mysqli_query($conn,$sql1);

				if(!empty($date)){
					$sql2="update active_bill set time_receive = '$date' where id_bill='$id_pro'";
					mysqli_query($conn,$sql2);
				}
				else{
					$sql2="update active_bill set time_receive = null where id_bill='$id_pro'";
					mysqli_query($conn,$sql2);
				}

				// kiem tra neu giao hang thanh cong thi nag vip cho nguoi co tk,
				if($select == 3){
					// lay id khach hang thong qua bill
					$id_cus="select customer_id from bill where id = $id_pro";
					$id_cus=mysqli_query($conn,$id_cus);
					$id_cus=mysqli_fetch_assoc($id_cus);
					$id_cus=$id_cus['customer_id'];	

					// nguoi co tai khoan thi id se khac 2, vi 2 danh cho nguoi ko co tk
					if($id_cus!=2){
						// xem khach hang da vip hay chua, neu chua thi update, roi thi thoi
						$cus_type="select customer_type from customer where id = $id_cus";
						$cus_type=mysqli_query($conn,$cus_type);
						$cus_type=mysqli_fetch_assoc($cus_type);
						$cus_type=$cus_type['customer_type'];
						if($cus_type==0){ // 0 la kieu khach hang thuong
							$sum="SELECT sum(bill_money) as sum1 FROM bill WHERE customer_id = $id_cus";
							$sum=mysqli_query($conn,$sum);
							$sum=mysqli_fetch_assoc($sum);
							$sum=$sum['sum1'];

							if($sum>=100000000){
								$update2="update customer set customer_type=1 where id = $id_cus";
								mysqli_query($conn,$update2);
							}
						}
						
					}

				}


			}
		}
		header("Location:index.php?module=interface&action=interfaceStaff&choose=mbill&progress=processing");
	}
?>

<link rel="stylesheet" type="text/css" href="modules/staff_management_bill/processing.css">
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

			// lay time receive ben active
			$active="select time_receive from active_bill where id_bill='$id_bill' and id_manager='$manager'";
			$active=mysqli_query($conn,$active);
			$active=mysqli_fetch_assoc($active);
			$active=$active['time_receive'];
			// lay tat ca san pham thuoc bill trong bill_detail
			$detail="select * from bill_detail where id_bill='$id_bill' ";
			$detail=mysqli_query($conn,$detail);
			//--------
			echo "<div style='width:70%;height:350px;border:4px solid #068604; margin-top:7px; margin-bottom:12px;'>";
				echo "<div class='task1'>";
					// thoi gian dat hangf
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
						echo $khuyenmai;

					echo "</div>";
				echo "</div>";

				echo "<div class='task3'>";
					echo "Địa chỉ : ".$a['bill_address'];
				echo "</div>";

				echo "<div class='task4'>";
						require("modules/staff_management_bill/option.php");
				echo "</div>";
			echo "</div>";
		}
	?>
</div>
