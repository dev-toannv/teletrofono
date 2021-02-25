<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	require_once("modules/config/connectdb.php");
	// phan display
	$ram="select product_ram from product group by product_ram";
	$query_ram=mysqli_query($conn,$ram);

	$storage="select product_storage from product group by product_storage";
	$query_storage=mysqli_query($conn,$storage);

	$manuu=array();// xu ly ten hang
	$sql22="select * from manu_product";
	$query_sql22=mysqli_query($conn,$sql22);
	while($r=mysqli_fetch_assoc($query_sql22)){
		$manuu[$r['id']]=$r['manu_name'];
	}
	// foreach ($manuu as $key => $value) {
	// 	echo $key ." la ".$value;
	// }
	// xu lý mảng màu sắc
	$cor=array();
	$color="select * from color_product";
	$color=mysqli_query($conn,$color);
	while ($f=mysqli_fetch_assoc($color)){
		$cor[$f['id']]=$f['color_name'];
	}

	$cos="select product_color from product group by product_color";
	$cos=mysqli_query($conn,$cos);
	//--------------------------------------------------------------------------
	if(isset($_POST['reset'])){
		unset($_SESSION['s_name']);
		unset($_SESSION['s_ram']);
		unset($_SESSION['s_storage']);
		unset($_SESSION['s_color']);
		unset($_SESSION['ram_check']);
		unset($_SESSION['storage_check']);
		unset($_SESSION['color_check']);
		unset($_SESSION['price']);
		unset($_SESSION['price2']);
		$s=$_SESSION['search_manu'];
		header("Location:index.php?search_manu=$s");

	}
	
	// phan nay xu ly session va ra va bo nho trong khi goi cau lenh sql
	$s_name=$s_manu=$s_ram=$s_storage=$s_color=$storage_check=$ram_check=$color_check=$price1="";
	if(isset($_SESSION['s_name'])){
		$s_name=$_SESSION['s_name'];
	}

	if(isset($_SESSION['s_color'])){
		$s_color=$_SESSION['s_color'];
	}

	if(isset($_SESSION['s_ram'])){
		$s_ram=$_SESSION['s_ram'];
	}
	if(isset($_SESSION['s_storage'])){
		$s_storage=$_SESSION['s_storage'];
	}

	if(isset($_SESSION['price'])){
		$price1=$_SESSION['price2'];
	}

	//-------------------------------------------------------------------
	// phan nay de check xem ram va bo nho minh da chon la gi
	if(isset($_SESSION['ram_check'])){
		$ram_check=$_SESSION['ram_check'];
	}

	if(isset($_SESSION['storage_check'])){
		$storage_check=$_SESSION['storage_check'];
	}

	if(isset($_SESSION['color_check'])){
		$color_check=$_SESSION['color_check'];
	}
	//---------------------------------------------------------------
	// phan nay xu ly ten hang khi goi sql
	if($_SESSION['search_manu']!="" && $_SESSION['search_manu']!="all"){
		$manu=$_SESSION['search_manu'];
		$sql21="select id from manu_product where manu_name='$manu'";
		$sql21=mysqli_query($conn,$sql21);
		$sql21=mysqli_fetch_assoc($sql21);
		$s_manu=$sql21['id'];
		$s_manu=" and product_manu ='$s_manu'";
	}
	//------------------------------------
	// phan nay kiem tra xem nut tim kiem co duoc an hay ko
	if(isset($_POST['subsearch'])){
		$_SESSION['s_ram']="";
		$_SESSION['s_storage']="";
		$_SESSION['s_color']="";
		$_SESSION['ram_check']="";
		$_SESSION['storage_check']="";
		$_SESSION['color_check']="";
		$s_name=trim($_POST['s_name']);
		$_SESSION['s_name']=$s_name;
		$s_name=$_SESSION['s_name'];

		$s_ram=$_POST['s_ram'];
		if($s_ram!=""){
			$ram_check=$s_ram;
			$_SESSION['ram_check']=$ram_check;
			// xu ly cau lenh sql tim kiem dung luong ram
			$s_ram=" and product_ram = '$s_ram'";
			$_SESSION['s_ram']=$s_ram;
			$s_ram=$_SESSION['s_ram'];
		}

		$s_storage=$_POST['s_storage'];
		if($s_storage !=""){
			$storage_check=$s_storage;
			$_SESSION['storage_check']=$storage_check;
			// xu ly cau lenh sql tim kiem dung luong bo nho trong
			$s_storage=" and product_storage = '$s_storage'";
			$_SESSION['s_storage']=$s_storage;
			$s_storage=$_SESSION['s_storage'];
		}

		$s_color=$_POST['s_color'];
		if($s_color!=""){
			$color_check=$s_color;
			$_SESSION['color_check']=$color_check;
			$s_color="and product_color = '$s_color'";
			$_SESSION['s_color']=$s_color;
			$s_color=$_SESSION['s_color'];
		}

		if(!empty($_POST['s_price'])){
			if($_POST['s_price']==1){
				$price1=" and product_price<=5000000 " ;
				$_SESSION['price']=1;
				$_SESSION['price2']=$price1;

			}
			else if($_POST['s_price']==2){
				$price1=" and product_price >= 5000000 and product_price<= 10000000 ";
				$_SESSION['price']=2;
				$_SESSION['price2']=$price1;
			}
			else if($_POST['s_price']==3){
				$price1=" and product_price >= 10000000 and product_price<= 20000000 ";
				$_SESSION['price']=3;
				$_SESSION['price2']=$price1;
			}

			else{
				$price1=" and product_price>20000000 ";
				$_SESSION['price']=4;
				$_SESSION['price2']=$price1;
			}
		}


	}
	//----------------------------------------------------

	$sql19="select id,product_name,product_price,product_manu,product_status,product_quantity from product where product_name like '%$s_name%' $s_ram $s_storage $s_manu $s_color $price1";
	$query_sql19=mysqli_query($conn,$sql19);
	$aff=mysqli_num_rows($query_sql19);
	$limit=9;
	$pages=ceil($aff/$limit);
	if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }

    if($page>$pages){
        $page=$pages;
    }
    if($page<1){
        $page=1;
    }
	
    $offset=($page-1)*$limit;

    $sql19=$sql19."LIMIT $offset,$limit";
	// Cau lenh thuc thi
	$query_sql19=mysqli_query($conn,$sql19);
	$num_chia=mysqli_num_rows($query_sql19);

?>
<div id="body">
	<div id="body_search">
		<div style="height:68%; width: 100%;">
			<div id="fo1">
				<form action="" id="fo" method="POST" style="display:inline-block">
					<input type="text" id="s_name" name="s_name" placeholder="Tìm theo tên sản phẩm" style="width:100%;height: 22%; text-align: center;"><br>
					<div style="width: 100%;height:78%">
						<div style="width: 50%;height: 100%;float: left;">
							<select name="s_ram" style="width:80%;height: 25%; text-align: center; margin-bottom: 2%; ">
								<option value="">Ram</option>
								<?php 
									while($result_ram=mysqli_fetch_assoc($query_ram)){
										$product_ram=$result_ram['product_ram'];
										if($product_ram==$ram_check){
											echo "<option value='$product_ram' selected>";
												echo $result_ram['product_ram'];
											echo "</option>";
										}
										echo "<option value='$product_ram'>";
											echo $result_ram['product_ram'];
										echo "</option>";
									}
								?>
							</select>
							<br>
							<select name="s_storage" style="width:80%;height: 25%; text-align: center;margin-bottom: 2%; ">
									<option value="">Bộ nhớ trong</option>
									<?php 
										while($result_storage=mysqli_fetch_assoc($query_storage)){
											$product_storage=$result_storage['product_storage'];
											if($product_storage==$storage_check){
												echo "<option value='$product_storage' selected>";
													echo $result_storage['product_storage'];
												echo "</option>";
											}
											echo "<option value='$product_storage'>";
												echo $result_storage['product_storage'];
											echo "</option>";
										}
									?>
							</select>
							<br>
							<select name="s_color" style="width:80%;height: 25%; text-align: center;">
								<option value="">Màu sắc</option>
								<?php 
									while ($co=mysqli_fetch_assoc($cos)){
											$id_co=$co['product_color'];
										if($id_co==$color_check){
										echo "<option value='$id_co' selected>";
											echo $cor[$id_co];
										echo "</option>";
										}
										echo "<option value='$id_co'>";
											echo $cor[$id_co];
										echo "</option>";
									}
								?>
							</select>
						</div>
						<div style="width: 50%;height: 100%;float: left;display: flex;flex-direction: column;">
							<span><input type="radio" <?php if($_SESSION['price']==1) echo "checked"; ?> value="1" name='s_price'> Dưới 5 triệu</span> <br>
							<span><input type="radio" <?php if($_SESSION['price']==2) echo "checked"; ?>  value="2" name='s_price'> Từ 5 -> 10 triệu</span> <br>
							<span><input type="radio" <?php if($_SESSION['price']==3) echo "checked"; ?> value="3" name='s_price'> Từ 10 -> 20 triệu</span> <br>
							<span><input type="radio" <?php if($_SESSION['price']==4) echo "checked"; ?> value="4" name='s_price'> Trên 20 triệu</span>
						</div>
						
					</div>
			</div>
			<div id="fo2">
				<div class="fo21">
					<button type="submit" name="subsearch">Tìm kiếm</button>
				</div>
				<div class="fo21">
					<button type="submit" name="reset">Xóa các lựa chọn</button>
				</div>
				
			</div>
			
 
		</form>
		
		</div>
		<div style="width: 100%;height: 32%">
			<div style="width: 100%;height: 75%; border-top:1px dotted black;border-bottom:1px dotted black; ">
				<div align="center" style="font-size:20px;width: 50%;height: 100%;float: left;display: flex;justify-content: center;align-items: center;" >
					Trang : 
				</div>

				<div align="center" style="font-size:20px;width: 50%;height: 100%;float: left;display: flex;justify-content: right;align-items: center;flex-wrap:wrap;">
					<?php 
						for($i=1;$i<=$pages;$i++){
							echo "<a href='index.php?search_manu=".$_SESSION['search_manu']."&page=$i'>$i</a>"."&nbsp";
						}
					?>
				</div>
				
			</div>
			<div style="width: 100%;height: 25%; display: flex;justify-content: center;align-items: center;">
				<?php 
					echo "Trang hiện tại : ".$page;
				 ?>
			</div>

		</div>
	</div>
	<div id="body_show_product">
		<?php 
			if(isset($_GET['cart'])){
				require_once("modules/cart/cart.php");
			}
			else{
				if($aff>0){
					require_once("modules/body/body1.php");
				}
				else{
					echo "<div id='no'></div>";
				}
			}
			
		?>
	</div>
</div>