<link rel="stylesheet" type="text/css" href="modules/supplier/sup.css">
<div id="supplier_color">
	<div id="head_sup">
		<div class="hs1">
			<a href="index.php?supplier&manu">Hãng sản xuất</a>
		</div>
		<div class="hs1">
			<a href="index.php?supplier&color">Màu sản phẩm</a>
		</div>
	</div>
	<div id='contents'>
		<?php
			if(isset($_GET['manu'])){
				require_once("modules/supplier/manu.php");
			} 
			else if(isset($_GET['color'])){
				require_once("modules/supplier/color.php");
			}
			else{
				require_once("modules/supplier/manu.php");
			}
		?>
	</div>
</div> 