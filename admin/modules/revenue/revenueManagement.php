<?php 
	require_once("modules/config/connectdb.php");
	$y=$m='';
	if(isset($_GET['delete'])){
		unset($_SESSION['search']);
		header("Location:index.php?revenue");
	}
	// xu ly nam
	if(isset($_POST['ysub'])){
		$year=$_POST['s_year'];
		if(!empty($year)){
			$y="and year(bill_time)= $year";
			$_SESSION['search']['year']=$year;

		}
		unset($_SESSION['search']['month']);
	}
	if(isset($_SESSION['search']['year'])){
		$y=$_SESSION['search']['year'];
		$y="and year(bill_time)= $y";
		
	}
	// xu ly thang

	if(isset($_POST['msub'])){
		$month=$_POST['s_month'];
		if(!empty($month)){
			$m="and month(bill_time)= $month";
			$_SESSION['search']['month']=$month;
		}
	}
	if(isset($_SESSION['search']['month'])){
		$m=$_SESSION['search']['month'];
		$m="and month(bill_time)= $m";
	}

	$sql="select * from bill inner join active_bill on bill.id = active_bill.id_bill where bill.bill_status=3 $y $m";
	$sql=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($sql);
	// dem so luong san pham
	$sql1="select sum(bill_detail.quantity) as count_product from bill_detail inner join bill on bill.id = bill_detail.id_bill inner join active_bill on bill.id=active_bill.id_bill where bill.bill_status=3 $y $m";
	$count_product=mysqli_query($conn,$sql1);
	$count_product=mysqli_fetch_assoc($count_product);
	$count_product=$count_product['count_product'];

	
?>

<link rel="stylesheet" type="text/css" href="modules/revenue/revenue.css">

<div id="container_revenue">
	<div id="t_search">
		<div id="s">
			<?php 
			$sql_year="SELECT year(bill_time) as year FROM `bill` GROUP BY year(bill_time)";
				$sql_year=mysqli_query($conn,$sql_year);
			?>
			<div id="form_search">
				<form action="" method="POST" class='mi' style="width: 50%; height: 95%; display: inline-block;">
					<select name='s_year'>
						<option value="">-Chọn năm-</option>
						<?php 
							while($y=mysqli_fetch_assoc($sql_year)){
									if($_SESSION['search']['year']==$y['year']){
										echo "<option value='".$y['year']."' selected >".$y['year']."</option>";
									}
									else{
										echo "<option value='".$y['year']."' >".$y['year']."</option>";
									}
									
								}
						?>
					</select>
					<button type="submit" name='ysub'>Chọn</button>
				</form>
				<form action="" class='mi' method="POST" style="width: 50%; height: 95%; display: inline-block;">

					<select name='s_month'>
						<option value="">-Chọn tháng-</option>
						<?php 
						if(isset($_SESSION['search']['year'])){
							$ye=$_SESSION['search']['year'];
							$sql_month="SELECT month(bill_time) as month FROM `bill` where year(bill_time)=$ye GROUP BY month(bill_time)";
							$sql_month=mysqli_query($conn,$sql_month);
							while ($m=mysqli_fetch_assoc($sql_month)){
									if($_SESSION['search']['month']==$m['month']){
										echo "<option value='".$m['month']."' selected >".$m['month']."</option>";
									}
									else{
										echo "<option value='".$m['month']."' >".$m['month']."</option>";
									}
									
								}
						}
					?>
					</select>
					<button type="submit" name="msub">chọn</button>
				</form>
		</div>
		</div>
		<div id="delete">
			<a href="index.php?revenue&delete">Xóa lựa chọn</a>
		</div>

		<div id="result">
				<?php 
					if(!isset($_SESSION['search']['year']) && !isset($_SESSION['search']['month'])){
						echo "Tất cả : ".$count_product." sản phẩm / ".$num." hóa đơn";
					}
					else{
						echo "Tìm thấy : ".$count_product." sản phẩm / ".$num." hóa đơn";;
					}

				?>
		</div>
		


	</div>
	<div id="t_body">
		<div style="width: 100%; height: 5%; background-color: #d8dcdf;">
			<div class='t1'>ID hóa đơn</div>
			<div class='t1'>ID nhân viên</div>
			<div class='t1'>Thời gian tạo hóa đơn</div>
			<div class='t1'>Thời gian nhận đơn</div>
			<div class='t1'>Thời gian nhận hàng</div>
			<div class='t1'>Tổng tiền\hóa đơn</div>
		</div>
		<div style="width: 100%; height: 95%; overflow-y:scroll;">
			<?php
				$total=0;
				while($a=mysqli_fetch_assoc($sql)){
					$id=$a['id'];
					$id_manager=$a['id_manager'];

					$time_create=$a['bill_time'];
					$time_create=date_create($time_create);
					$time_create=date_format($time_create,"Y/m/d H:i:s");

					$time_active=$a['time_active'];
					$time_active=date_create($time_active);
					$time_active=date_format($time_active,"Y/m/d H:i:s");

					$time_receive=$a['time_receive'];
					$time_receive=date_create($time_receive);
					$time_receive=date_format($time_receive,"Y/m/d");

					$money=$a['bill_money'];
					$total+=$money;
					$money=number_format($money,0,'','.');

					echo "<div class='t2'>";
						// id hoa don
						echo "<div class='t22'>";
							echo $id;
						echo "</div>";
						// id nhan vien
						echo "<div class='t22'>";
							echo $id_manager;
						echo "</div>";
						// thoi gian tao hoa don
						echo "<div class='t22'>";
							echo $time_create;
						echo "</div>";
						// thoi gian nhan hoa don
						echo "<div class='t22'>";
							echo $time_active;
						echo "</div>";
						// thoi gian nhan hang
						echo "<div class='t22'>";
							echo $time_receive;
						echo "</div>";
						// tien
						echo "<div class='t22'>";
							echo $money;
						echo "</div>";
					echo "</div>";
				}
			?>
		</div>	
	</div>
	<div style="width: 100%; height: 6%; background-color: #d8dcdf;display: flex;justify-content: center;align-items: center;">
			<?php echo "Tổng thu nhập : ".number_format($total,0,'','.')." VNĐ"; ?>
		</div>	
</div>