
<?php 
	session_start();
	$module = $action ='';
	if(isset($_GET['module']) && isset($_GET['action'])){
		if($_GET['module']=="common" || $_GET['module']=="cart" || $_GET['module']=="sign_up"  || $_GET['module']=="interface_customer"){
			$module=$_GET['module'];
			$action=$_GET['action'];
		}
	}
	if($module=='' || $action==''){
		$module='interface_customer';
		$action='interface';
	}
	$path="modules/$module/$action.php";
	if(file_exists($path)){
		define("MY_PROJECT", true);
		require_once($path);
	}
	else{
		$path="modules/common/error404.php";
		require_once($path);
	}
 ?>