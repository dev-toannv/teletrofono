<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 	
	$s_status=$s_date=$ss="";

	if(isset($_POST['delete'])){
			if(isset($_SESSION['s1']) && isset($_SESSION['s2'])){
				unset($_SESSION['s1']);
				unset($_SESSION['s2']);
				
			}
	}

	if(isset($_POST['s_sub'])){
		$s_status=$_POST['s_status'];
		$s_date=$_POST['s_date'];
		$ss=$_POST['ss'];
		if(!empty($s_status)){
			if($s_status==7){
				$_SESSION['s1']['status']=$s_status;
				$s_status="(bill.bill_status=1 or bill.bill_status=2 or bill.bill_status=5)";
				$_SESSION['s2']['status']=$s_status;
				$_SESSION['s2']['check']="";
			}
			else if($s_status==8){
				$_SESSION['s1']['status']=$s_status;
				$s_status="bill.bill_status = 6 ";
				$_SESSION['s2']['status']=$s_status;
				$_SESSION['s2']['check']="";
				
			}
			else{
				$_SESSION['s1']['status']=$s_status;
				$s_status="bill.bill_status = '$s_status' ";
				$_SESSION['s2']['status']=$s_status;
				$_SESSION['s2']['check']="";
				
			}
			
		}
		else{
			$_SESSION['s1']['status']=$s_status;
			$s_status="(bill.bill_status!=9)";
			$_SESSION['s2']['status']=$s_status;
			$_SESSION['s2']['check']="";
			
		}


		if(!empty($s_date)){
			$_SESSION['s1']['date']=$s_date;
			$s_date=" and active_bill.time_receive = '$s_date' ";
			$_SESSION['s2']['date']=$s_date;
			$_SESSION['s2']['check']="";
			
			
		}
		if(!empty($ss)){
			if($ss==1){
				$_SESSION['s1']['sort']=$ss;
				$ss=" order by active_bill.time_active ASC";
				$_SESSION['s2']['sort']=$ss;
				$_SESSION['s2']['check']="";
			}
			if($ss==2){
				$_SESSION['s1']['sort']=$ss;
				$ss=" order by active_bill.time_active DESC";
				$_SESSION['s2']['sort']=$ss;
				$_SESSION['s2']['check']="";
			}
		}

		

	}
	if(isset($_SESSION['s2']) && isset($_SESSION['s1'])){
		if(empty($_SESSION['s2'])){
			$s_status="";
		}
		else{
			$s_status=$_SESSION['s2']['status'];
		}
		
		$s_date=$_SESSION['s2']['date'];
		$ss=$_SESSION['s2']['sort'];
	}
	

	if(empty($s_status)){
		$s_status="(bill.bill_status!=9)";
	}
	$arr=array(1=>"ADMIN", 2=>"STAFF", 3=>"CUSTOMER");
	$stt=array(3=>"X??c nh???n thanh to??n th??nh c??ng", 4=>"X??c nh???n kh??ch kh??ng nh???n h??ng", 6 => "X??c nh???n h???y ????n h??ng");
	$sql="select * from bill inner join active_bill on bill.id=active_bill.id_bill where $s_status and bill.customer_id = $id_customer  $s_date $ss ";
	$sql=mysqli_query($conn,$sql);
?>

<link rel="stylesheet" type="text/css" href="modules/infor_customer/private.css">
<div style="width: 100%; height: 7%;display: flex;justify-content: center;align-items: center; ">
	<div style="width: 75%; height: 100%; float: left;">
	<form action="" method="POST" style="width: 100%; height: 100%;">
		<div style="width: 100%; height: 50%; border-bottom:1px dotted green">
			<div class='bar1'>
				Tr???ng th??i ????n h??ng
			</div>
			<div class='bar1'>
				Ng??y nh???n h??ng
			</div>
			<div class='bar1'>
				S???p x???p theo
			</div>
			<div class='bar1'>
				*
			</div>
		</div>
		<div style="width: 100%; height: 50%;">
			<div class='bar1'>
				<select name="s_status">
					<option value="" >--T???t c???--</option>
					<option value="3" <?php if(isset($_SESSION['s1']) && $_SESSION['s1']['status']==3)  echo "selected" ?>>Giao h??ng th??nh c??ng</option>
					<option value="4" <?php if(isset($_SESSION['s1']) && $_SESSION['s1']['status']== 4) echo "selected" ?>>Kh??ng nh???n</option>
					<option value="8" <?php if(isset($_SESSION['s1']) && $_SESSION['s1']['status']== 8) echo "selected" ?>>H???y ????n h??ng</option>
					<option value="7" <?php if(isset($_SESSION['s1']) && $_SESSION['s1']['status']== 7) echo "selected" ?>>??ang x??? l??</option>

				</select>
			</div>
			<div class='bar1'>
				<input type="date" value= '<?php if(isset($_SESSION['s1']) && $_SESSION['s1']['date']!="") echo $_SESSION['s1']['date']; else echo "" ?>' name='s_date'>
			</div>
			<div class='bar1'>
				<select name="ss">
					<option value="1"<?php if(isset($_SESSION['s1']['sort']) && $_SESSION['s1']['sort']==1) echo "selected"; ?>>T??? tr?????c t???i nay</option>
					<option value="2"<?php if(isset($_SESSION['s1']['sort']) && $_SESSION['s1']['sort']==2) echo "selected"; ?>>M???i nh???t</option>
				</select>
			</div>
			<div class='bar1'>
				<button type="submit" name='s_sub'>T??m ki???m</button> &nbsp&nbsp&nbsp&nbsp&nbsp
				<button type="submit" name='delete'>X??a t??m ki???m</button>
			</div>
		</div>
	</form>
	</div>
	<div style="width: 25%; height: 100%; float: left;display: flex;justify-content: center;align-items: center;">
		<?php 
			if(!isset($_SESSION['s2']['check'])){
				echo "T???ng : ".mysqli_num_rows($sql)." ????n h??ng";
			}
			else{
				echo "K???t qu??? t??m ki???m : ".mysqli_num_rows($sql)." k???t qu???";
			}
		?>
	</div>
</div>

<div id="container_processing">
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
				$khuyenmai="Kh??ng c?? gi???m gi??";
			}
			else{
				$khuyenmai="???? gi???m 3% kh??ch VIP";
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
				$date="Ch??a nh???p th???i gian";
			}
			
			// lay tat ca san pham thuoc bill trong bill_detail
			$detail="select * from bill_detail where id_bill='$id_bill' ";
			$detail=mysqli_query($conn,$detail);
			//--------
			echo "<div style='width:70%;height:350px;border:4px solid #068604; margin-top:7px; margin-bottom:12px;'>";
				echo "<div class='task1'>";
					// thoi gian dat hang
					echo "<div class='time'>";
						echo "Th???i gian ?????t h??ng :".'<br>';
						echo $a['bill_time'];
					echo "</div>";
					// ten khach hang
					echo "<div class='name_customer'>";
						echo "T??n kh??ch h??ng :"."<br>";
						echo $a['bill_namecustomer'];
					echo "</div>";
					// so dien thoai
					echo "<div class='phonenumber'>";
						echo "S??? ??i???n tho???i :"."<br>";
						echo $a['bill_phonenumber'];
					echo "</div>";
					// id bill
					echo "<div class='id_bill'>";
						echo "ID h??a ????n : ".$a['id'];
					echo "</div>";
				echo "</div>";

				echo "<div class='task2'>";
				// noi dung ben trai
					echo "<div style='width:80%; height:100%;float:left;border-bottom:2px solid #068604;' >";
						echo "<div style='width:100%;height:25%' id='gh'>";
							// id san pham
							echo "<div class='idpr' style='border-bottom:1px solid black; height:100%'>";
								echo "ID s???n ph???m";
							echo "</div>";

							// ten san pham
							echo "<div class='namepr' style='border-bottom:1px solid black; height:100%'>";
								echo "T??n s???n ph???m";
							echo "</div>";

							// so luong
							echo "<div class='quanpr' style='border-bottom:1px solid black; height:100%'>";
								echo "S??? l?????ng";
							echo "</div>";

							// gia tien
							echo "<div class='monpr' style='border-bottom:1px solid black; height:100%'>";
								echo "Gi?? ti???n";
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
						echo "T???ng ti???n :"."<br>";
						echo  number_format($a['bill_money'],0,'','.')." VN??"."<br><br>";
						echo $khuyenmai;;
					echo "</div>";
				echo "</div>";

				echo "<div class='task3'>";
					echo "?????a ch??? : ".$a['bill_address'];
				echo "</div>";

				echo "<div class='task4'>";
				echo "<div class='t41'>";
					echo "Th???i gian nh???n h??ng : ".$date;
				echo "</div>";
					
				echo "<div class='t42'>";
					echo $stt[$a['bill_status']];
				echo "</div>";
				
				echo "</div>";
			echo "</div>";
		}
	?>
</div>