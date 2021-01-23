
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
	//--------------------------------------------------------------------------
	
	// phan nay xu ly session va ra va bo nho trong khi goi cau lenh sql
	$s_name=$s_manu=$s_ram=$s_storage="";
	if(isset($_SESSION['s_name'])){
		$s_name=$_SESSION['s_name'];
	}
	if(isset($_SESSION['s_ram'])){
		$s_ram=$_SESSION['s_ram'];
	}
	if(isset($_SESSION['s_storage'])){
		$s_storage=$_SESSION['s_storage'];
	}
	//-------------------------------------------------------------------
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

		$s_name=trim($_POST['s_name']);
		$_SESSION['s_name']=$s_name;
		$s_name=$_SESSION['s_name'];

		$s_ram=$_POST['s_ram'];
		if($s_ram!=""){
			// $ram_check=$s_ram;
			
			// xu ly cau lenh sql tim kiem dung luong ram
			$s_ram=" and product_ram = '$s_ram'";
			$_SESSION['s_ram']=$s_ram;
			$s_ram=$_SESSION['s_ram'];
		}

		$s_storage=$_POST['s_storage'];
		if($s_storage !=""){
			// $storage_check=$s_storage;
			
			// xu ly cau lenh sql tim kiem dung luong bo nho trong
			$s_storage=" and product_storage = '$s_storage'";
			$_SESSION['s_storage']=$s_storage;
			$s_storage=$_SESSION['s_storage'];
		}
	}
	//----------------------------------------------------

	$sql19="select * from product where product_name like '%$s_name%' $s_ram $s_storage $s_manu";
	$query_sql19=mysqli_query($conn,$sql19);
	$aff=mysqli_num_rows($query_sql19);
	// echo $sql19;

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
?>
<div id="body">
	<div id="body_search">
		<div style="height:300px; width: 100%;">
			<form action="" method="POST" style="display:inline-block">
			<input type="text" id="s_name" name="s_name" placeholder="Tìm theo tên sản phẩm" style="width:250px; text-align: center;"><br>
			<select name="s_ram">
					<option value="">Ram</option>
					<?php 
						while($result_ram=mysqli_fetch_assoc($query_ram)){
							$product_ram=$result_ram['product_ram'];
							echo "<option value='$product_ram'>";
								echo $result_ram['product_ram'];
							echo "</option>";
						}
					?>
			</select>
			<br>
			<select name="s_storage">
					<option value="">Bộ nhớ trong</option>
					<?php 
						while($result_storage=mysqli_fetch_assoc($query_storage)){
							$product_storage=$result_storage['product_storage'];
							echo "<option value='$product_storage'>";
								echo $result_storage['product_storage'];
							echo "</option>";
						}
					?>
			</select>
			<br>
			<button type="submit" name="subsearch">Tìm kiếm</button>
		</form>
		</div>
	</div>
	<div id="body_show_product">
		<?php 
			if($aff>0){
				require_once("modules/body/body1.php");
			}
			else{
				echo "<div id='no'></div>";
			}
		?>
	</div>
</div>