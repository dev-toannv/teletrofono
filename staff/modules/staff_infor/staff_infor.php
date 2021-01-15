
<div id="staff_infor">
	<link rel="stylesheet" type="text/css" href="modules/staff_infor/staff_infor.css">
	<?php
		$conn=mysqli_connect('localhost','root','','teletrofono');
		if(!$conn){
			die("Connect error : ".mysqli_connect_error());
		}
		$sql="select * from manager where manager_code='$staff_code' and manager_password = '$staff_password' and user_type='2'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		$id=$row['id'];
		$avt=$row['manager_avatar'];
		if(isset($_POST['edit_pass_staff'])){
			if(!empty($_POST['mkht']) && !empty($_POST['mktd'])){
				$mktd=$_POST['mktd'];
				if($_POST['mkht']==$staff_password){
					$pass="update staff set manager_password='$mktd' where id='$id' and user_type='2'";
					mysqli_query($conn,$pass);
					unset($_SESSION['staff_code']);
					unset($_SESSION['staff_password']);
					unset($_SESSION['right_display']);
					unset($_SESSION['mpr']);
					unset($_GET['err']);
					header("Location:index.php");
				}
				else{
					header("Location:index.php?module=interface&action=interfaceStaff&err=err");
				}
			}
			else{
				header("Location:index.php");
			}
			
		}
	?>
	<?php
		if(isset($_GET['err'])){
			if($_GET['err']=='err'){
				echo "<p id='ab'>Thay đổi mật khẩu thất bại</p>";
			}
		}
	?>
	<?php
		if(isset($_POST['edit_pic-staff'])){
			if(!empty($_FILES['pic_new']['name'])){
				$img=$_FILES['pic_new'];

				$img_name=$img['name'];

				$folder="../public/staff/";
				$path1=$id."_".$img_name;
				$path=$folder.$path1;
				$pic_old=$folder.$avt;
				$pic_new=$folder.$img['name'];
				if(file_exists($pic_old)){
						unlink($pic_old);
				}
				move_uploaded_file($img['tmp_name'],$pic_new);
				rename($pic_new,$path);
				$pic="update manager set manager_avatar = '$path1' where id='$id' and user_type='2'";
				mysqli_query($conn,$pic);
				unset($_SESSION['staff_code']);
				unset($_SESSION['staff_password']);
				unset($_SESSION['right_display']);
				unset($_SESSION['mpr']);
				unset($_GET['err']);
				header("Location:index.php");
			}
		}
	?>
	<style type="text/css">
		#right{
			border:none;
			height: 800px;
		}
	</style>
	<img src="../public/staff/<?php echo $row['manager_avatar']?>" alt="" id="pic_old">
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" id="pic_new" name="pic_new" onchange="myfun()">
		<button type="submit" name="edit_pic-staff">Thay đổi</button>
	</form>

	<p>ID nhân viên : <?php echo $row['id'] ?></p>
	<p>Mã nhân viên : <?php echo $row['manager_code']?></p>
	<p>Tên nhân viên : <?php echo $row['manager_name'] ?></p>
	<p>Email : <?php echo $row['manager_email'] ?></p>
	<p>Giới tính : 
		<?php 
			if($row['manager_sex']==1){
				echo "Nam";
			}
			if($row['manager_sex']==0){
				echo "Nữ";
			}
		?>
	</p>
	<p>Ngày sinh : <?php echo $row['manager_dob'] ?></p>
	<p>Địa chỉ hiện tại : <?php echo $row['manager_address'] ?></p>
	<p>Quê quán : <?php echo $row['manager_hometown'] ?></p>
	<p>Thời gian vào làm chính thức : <?php echo $row['manager_timestart'] ?></p>
	<p>Lương cơ bản : <?php echo $row['manager_salary_basic'] ?></p>
	<p>Lương phụ cấp : <?php echo $row['manager_allowance'] ?></p>
	<button type="button" id="but_pass_staff" onclick="change2()">Thay đổi mật khẩu</button>
	<form action="" id="form_edit_pass" method="POST">
		<input type="text" name="mkht" placeholder="Mật khẩu hiện tại"><br>
		<input type="password" name="mktd" placeholder="Mật khẩu mới"><br>
		<button type="submit" name="edit_pass_staff">Thay đổi</button>
	</form>
</div>