 <?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<link rel="stylesheet" type="text/css" href="modules/staff_management_bill/container.css">
<?php 
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	if(!isset($_SESSION['select'])){
		$_SESSION['select']="waiting";
	}
	else{
		if(isset($_GET['progress'])){
			if($_GET['progress']=="waiting"){
			$_SESSION['select']="waiting";
			}
			 if($_GET['progress']=="processing"){
				$_SESSION['select']="processing";
			}
			 if($_GET['progress']=="all"){
				$_SESSION['select']="all";
			}

			if($_GET['progress']=="processing_all"){
				$_SESSION['select']="processing_all";
			}
		}
		
	}
	require_once("modules/config/connectdb.php");
	$id_ma=$_SESSION['staff_code'];
	$p="select id from manager where manager_code= '$id_ma'";
	$p=mysqli_query($conn,$p);
	$p=mysqli_fetch_assoc($p);
	$_SESSION['id']=$p['id'];
	$sql_bill="select * from bill where bill_status =0";
	$number_bill=mysqli_num_rows(mysqli_query($conn,$sql_bill));

	$manager1=$_SESSION['id'];
	$sql_private="select bill.id from bill inner join active_bill on bill.id=active_bill.id_bill where bill.bill_status!=0 and bill.bill_status!=3 and bill.bill_status!=4 and bill.bill_status!=6 and active_bill.id_manager='$manager1' ";
	$private=mysqli_num_rows(mysqli_query($conn,$sql_private));

?>

<style rel="stylesheet" type="text/css">
	<?php 
		if($_SESSION['select']=="waiting"){
			echo "#waiting a{
				background-color: #e9e2ec;
				color: red;
			}";
		}
		if($_SESSION['select']=="processing"){
			echo "#processing a{
				background-color: #e9e2ec;
				color: red;
			}";
		}
		if($_SESSION['select']=="processing_all"){
			echo "#processing_all a{
				background-color: #e9e2ec;
				color: red;
			}";
		}
		if($_SESSION['select']=="all"){
			echo "#all_bill a{
				background-color: #e9e2ec;
				color: red;
			}";
		}

	?>
</style>
<div id="container_bill" style="width: 100%; height: 100%;">
	<div id="task">
		<div id="waiting">
			<a href="index.php?module=interface&action=interfaceStaff&choose=mbill&progress=waiting" class="task">????n h??ng ??ang ch??? (<?php echo $number_bill ?>)</a>
		</div>
		<div id="processing">
			<a href="index.php?module=interface&action=interfaceStaff&choose=mbill&progress=processing" class="task">????n h??ng ??ang x??? l?? b???i t??i (<?php echo $private ?>)</a>
		</div>
		<div id="processing_all">
			<a href="index.php?module=interface&action=interfaceStaff&choose=mbill&progress=processing_all" class="task">C??c ????n h??ng ??ang x??? l??</a>
		</div>
		<div id="all_bill">
			<a href="index.php?module=interface&action=interfaceStaff&choose=mbill&progress=all" class="task">T???t c??? ????n h??ng ???? x??? l??</a>
		</div>
	</div>
	<div id="body_bill">
		<?php 
			if($_SESSION['select']=="waiting"){
				require_once("modules/staff_management_bill/waiting.php");
			}
			else if($_SESSION['select']=="processing"){
				require_once("modules/staff_management_bill/processing.php");
			}
			else if($_SESSION['select']=="processing_all"){
				require_once("modules/staff_management_bill/processing_all.php");
			}
			else if($_SESSION['select']=="all"){
				require_once("modules/staff_management_bill/all_bill.php");
			}
			else{
				require_once("modules/staff_management_bill/all_bill.php");
			}
		?>
	</div>
</div>