<link rel="stylesheet" type="text/css" href="modules/staff_management_product/staff_management_product.css">
<div id="mproduct">
	<?php
		if(!isset($_SESSION['mpr'])){
			$_SESSION['mpr']='show';
		}
		else{
			if(isset($_GET['mpr'])){
				if($_GET['mpr']=='show'){
					$_SESSION['mpr']='show';
				}
				if($_GET['mpr']=='add'){
					$_SESSION['mpr']='add';
				}
			}
		}
	?>
	<!--Chinh mau nen show va add-->
	<style type="text/css">
		<?php 
			if($_SESSION['mpr']=='show'){
				echo"#show{";
					echo "background-color:#e7e4ec;";
				echo"}";
			}

			if($_SESSION['mpr']=='add'){
				echo"#add{";
					echo "background-color:#e7e4ec;";
				echo"}";
			}
		?>
		#right{
			height: 1600px;
		}
	</style>
	<div id="headmpr">
		<table>
			<tr>
				<td id="show">
					<a href="index.php?module=interface&action=interfaceStaff&choose=mproduct&mpr=show" >Sản phẩm</a>
				</td>
				<td id="add">
					<a href="index.php?module=interface&action=interfaceStaff&choose=mproduct&mpr=add" >Thêm sản phẩm</a>
				</td>
			</tr>
		</table>
	</div>
	<div id="bodympr">
		<?php
			 if($_SESSION['mpr']=='show'){
			 	require_once("modules/show/show.php");
			 }
			 if($_SESSION['mpr']=='add'){
			 	require_once("modules/add/add.php");
			 }
		?>
	</div>
</div>