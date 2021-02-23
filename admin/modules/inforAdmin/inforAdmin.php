 <?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	require_once("modules/config/connectdb.php");
	$code=$_SESSION['admin_acc'];
	$sql3="select manager_password from manager where id=1 and manager_code='$code'";
	$a=mysqli_fetch_assoc(mysqli_query($conn,$sql3));
	$a=$a['manager_password'];
	if(isset($_POST['changePASS'])){
		$oldpass=$_POST['oldPASS'];
		$newpass=$_POST['newPASS'];
		if($oldpass==$a){
			$sql4="update manager set manager_password='$newpass' where id=1 and manager_code='$code'";
			mysqli_query($conn,$sql4);
		}
		else{
			echo "<script>";
				echo "alert('Thay đổi thất bại')";
			echo "</script>";
		}
	}
?>
<style type="text/css">
	#changePASS{
		width: 100%;
		height: 100%;
		display: flex;
	    justify-content: center;
	    align-items: center;
	}

	#formChange{
		width: 50%;
		height: 30%;
		border:1px black solid;
	}
	#formChange input{
		height: 20%;
		width: 50%;
		text-align:center;
		margin-top:5%;
	}

	#formChange button{
		width: 20%;
		height: 15%;
		margin-top:4%;
	}

</style>
<div id="changePASS">
	<form action="" method="POST" id="formChange">
		<input type="text" name="oldPASS" placeholder="Nhập mật khẩu cũ"><br>
		<input type="text" name="newPASS" placeholder="Nhập mật khẩu mới"><br>
		<button type="submit" name="changePASS">Thay đổi</button>
	</form>
</div>