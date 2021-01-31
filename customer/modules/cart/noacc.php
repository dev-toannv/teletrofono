<?php
		if(isset($_SESSION['cart'])){
			$count=count($_SESSION['cart']);
		}
?> 
 <div>
 	<?php 
 		if($count>0){
 			require_once("modules/cart/noacc1.php");
 		}
 		else{
 			require_once("modules/cart/none.php");
 		}
 	?>
 	
 </div>