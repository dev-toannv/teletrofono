
	<style>
		body{
		min-width: 1652px;
	}
	#body{
		min-width: 1652px;
	}
	</style>
<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
	$module = $action ='';
	if(isset($_GET['module']) && isset($_GET['action'])){
		$module=$_GET['module'];
		$action=$_GET['action'];
	}
	if($module=='' || $action==''){
		$module='common';
		$action='login';
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
