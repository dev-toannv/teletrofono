<?php 

	$sql="select * from bill where bill_status =0";
	$sql=mysqli_query($conn,$sql);
	if(isset($_GET['idbill'])){
		$id=$_GET['idbill'];
		$update="update bill set bill_status=1  where id='$id'";
		mysqli_query($conn,$update);
		$manager=$_SESSION['id'];
		$active="insert into active_bill(id_bill,id_manager,time_active) values('$id','$manager',now())";
		mysqli_query($conn,$active);

		header("Location:index.php?module=interface&action=interfaceStaff&choose=mbill");
	}
?>
<link rel="stylesheet" type="text/css" href="modules/staff_management_bill/waiting.css">
<div id="container_waiting">
	<?php 
	if(mysqli_num_rows($sql)>0){
		while ($a=mysqli_fetch_assoc($sql)){
			echo "<div style='width:70%;height:130px; border:1px solid black;margin-top:10px'>";
				echo "<div class='w1'>";
						echo "<div style='width:33.333%; height:100%;color:red; float:left; border-right: 1px solid #d4e1bb' class='w11'>";
							echo 'Thời gian đặt : '.$a['bill_time'];
						echo "</div>";
						echo "<div style='width:33.333%; height:100%; float:left' class='w11'>";
							echo "Tên khách hàng : ".$a['bill_namecustomer'];
						echo "</div>";
						echo "<div style='width:33.333%; height:100%; float:left ; border-left: 1px solid #d4e1bb' class='w11'>";
							echo "Số điện thoại : ".$a['bill_phonenumber'];
						echo "</div>";
				echo "</div>";

				echo "<div class='w2'>";
					echo "Địa chỉ : ".$a['bill_address'];
				echo "</div>";
				echo "<div class='w3'>";
					echo "<div class='w31'>";
						echo "Tổng tiền : ". number_format($a['bill_money'],0,'','.')." VNĐ";
					echo '</div>';

					echo "<div class='w32'>";
						echo "<a href='index.php?module=interface&action=interfaceStaff&choose=mbill&idbill=".$a['id']."'>Nhận hóa đơn</a>";
					echo '</div>';
				echo "</div>";
			echo "</div>";
		}
	}
	else{
		
	}
	?>
</div>