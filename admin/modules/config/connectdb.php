 <?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	$conn=mysqli_connect('localhost','root','','teletrofono');
		if(!$conn){
			die("Connect error : ".mysqli_connect_error());
		}