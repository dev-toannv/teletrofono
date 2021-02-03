
<?php 

	require_once("modules/config/connectdb.php");
	//--------------------------------------------------
	if(isset($_GET['id_edit'])){
		$id=$_GET['id_edit'];
		$sql1="select * from manager where id = '$id'";
		$sql1=mysqli_query($conn,$sql1);
		$result=mysqli_fetch_assoc($sql1);
	}
	else{
		header("Location:index.php?staff&edit_staff");
	}
	//----------------------------------------------

	if(isset($_POST['sub_edit'])){
		$manager_code=$_POST['manager_code'];
		$manager_name=$_POST['manager_name'];
		$manager_password=$_POST['manager_password'];
		$manager_email=$_POST['manager_email'];
		$manager_sex=$_POST['manager_sex'];
		$manager_dob=$_POST['manager_dob'];
		$manager_address=$_POST['manager_address'];
		$manager_hometown=$_POST['manager_hometown'];
		$manager_status=$_POST['manager_status'];
		$sql="update manager set manager_code = '$manager_code',manager_name='$manager_name',manager_password='$manager_password', manager_email='$manager_email',manager_sex='$manager_sex',manager_dob='$manager_dob',manager_address='$manager_address',manager_hometown='$manager_hometown',manager_status='$manager_status' where id = $id";

		$c=mysqli_query($conn,$sql);

		if(isset($_POST['manager_timestart']) && $_POST['manager_timestart']==1 && $c==true){
			$sql2="update manager set manager_timestart = now() where id = $id";
			mysqli_query($conn,$sql2);
		}

		if(!$c){
			echo "<script>";
				echo "alert('Chỉnh sửa thất bại, vui lòng nhập lại thông tin')";
			echo "</script>";
		}
		else{
			header("Location:index.php?staff&edit_staff");
		}
	}
?>

<style type="text/css">
	.error::placeholder {
			  color: red;
			  opacity: 1;
		}

	#manager_code,#manager_name,#manager_password,#manager_email{
		width: 80%;
		height: 8%;
		margin-top:1%;
		font-size: 20px;
		text-align: center;
	}
	#manager_status,#user_type,#manager_timestart{
		width: 30%;
		height: 5%;
		margin-top:1%;
	}
	#manager_address,#manager_hometown{
		width: 80%;
		height: 11%;
		margin-top: 2%;
		font-size: 18px;
		text-align: center;
	}

</style>
<div id="add">
	<form action="" method="POST">
	<div id="add_right">
		
			<input type="text" name="manager_code" id="manager_code" placeholder="Mã nhân viên (Số căn cước)" maxlength="12" value="<?php echo $result['manager_code'] ?>"><br>
			<input type="text" value="<?php echo $result['manager_name']; ?>"  name="manager_name" id="manager_name" placeholder="Tên nhân viên"><br>
			<input type="text" value="<?php echo $result['manager_password']; ?>" name="manager_password" id="manager_password" required placeholder="Mật khẩu"><br>
			<input type="text" value="<?php echo $result['manager_email']; ?>" name="manager_email" id="manager_email" placeholder="EMAIL"><br>
			Giới tính&nbsp&nbsp&nbsp&nbsp<select name="manager_sex" id="manager_sex">
				<option value="1" <?php if($result['manager_sex']==1) echo "selected"; ?> >Nam</option>
				<option value="0" <?php if($result['manager_sex']==0) echo "selected"; ?>>Nữ</option>
			</select><br>
			Ngày sinh &nbsp<input value="<?php echo $result['manager_dob']; ?>" type="date" name="manager_dob" id="manager_dob"><br>
			Tình trạng&nbsp<select name="manager_status" id="manager_status">
				<option value="1" <?php if($result['manager_status']==1) echo "selected"; ?> >Đang làm</option>
				<option value="0" <?php if($result['manager_status']==0) echo "selected"; ?>>Nghỉ làm</option>
			</select> <br>

			Cấp độ&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select name="user_type" id="user_type">
				<option value="1" <?php if($result['user_type']==1) echo "selected"; ?>>ADMIN</option>
				<option value="2" <?php if($result['user_type']==2) echo "selected"; ?>>STAFF</option>
			</select>
			<br> <br>
			Làm từ :<?php echo " ".$result['manager_timestart']; ?>
			/ Lấy thời gian hiện tại : <input type="checkbox" name="manager_timestart" value="1">
			<textarea name="manager_address" id="manager_address" placeholder="Địa chỉ hiện tại"><?php echo $result['manager_address']; ?></textarea><br>

			<textarea name="manager_hometown" id="manager_hometown" placeholder="Quê quán"><?php echo $result['manager_hometown']; ?></textarea><br>
			<button type="submit" name="sub_edit">Thay đổi</button>
	</div>
	</form>
	
</div>
