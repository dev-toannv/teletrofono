<?php
		if(isset($_SESSION['cart'])){
			$count=count($_SESSION['cart']);
		}
		
?> 
 <div style="width: 100%; height: auto; display: flex;justify-content: center;align-items: center;">
 	<?php 
 		if(isset($count) && $count>0){
 			require_once("modules/cart/noacc1.php");
 		}
 		else{
 			require_once("modules/cart/none.php");
 		}
 	?>
 	
 </div>