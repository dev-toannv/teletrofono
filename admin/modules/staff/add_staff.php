
<script type="text/javascript">
	function validate(){
		var a= document.getElementById("manager_code");
		var b= document.getElementById("manager_name");
		var c = document.getElementById("manager_email");
		var d = document.getElementById("manager_address");
		var e = document.getElementById("manager_hometown");
		var flag = 1;
		const check = /^[0-9]{12}$/;
		const check2= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(check.test(a) == false){
			a.classList.add("error");
			flag = 0;
		}

		if(b.value == "" || b.length <= 0){
			b.classList.add("error");
			flag = 0;
		}

		if(d.value == "" || d.length <= 0){
			d.classList.add("error");
			flag = 0;
		}

		if(e.value == "" || e.length <= 0){
			e.classList.add("error");
			flag = 0;
		}

		if(check2.test(c)==false){
			c.classList.add("error");
			flag = 0;
		}

		if(flag == 0){
			
			alert("Thêm thất bại, vui lòng nhập lại thông tin");
			return false;
		}
		else{
			return true;
		}

	}
</script>
<?php 
	require_once("modules/config/connectdb.php");
	if(isset($_POST['sub_add'])){
		$manager_code=$_POST['manager_code'];
		$manager_name=$_POST['manager_name'];
		$manager_password=$_POST['manager_password'];
		$manager_email=$_POST['manager_email'];
		$manager_sex=$_POST['manager_sex'];
		$manager_dob=$_POST['manager_dob'];
		$manager_address=$_POST['manager_address'];
		$manager_hometown=$_POST['manager_hometown'];

		$sql="insert into manager(id,manager_code,manager_name,manager_password,manager_email,manager_sex,manager_dob,manager_address,manager_hometown,manager_timestart,user_type,manager_status) values(null,'$manager_code','$manager_name','$manager_password','$manager_email','$manager_sex','$manager_dob','$manager_address','$manager_hometown',now(),2,1)";
		$c=mysqli_query($conn,$sql);
		if(!$c){
			echo "<script>";
				echo "alert('Thêm thất bại, vui lòng nhập lại thông tin')";
			echo "</script>";
		}
	}
?>

<style type="text/css">
	.error::placeholder {
			  color: red;
			  opacity: 1;
		}
</style>
<div id="add">
	<form action="" method="POST" onsubmit="return validate()">
	<div id="add_right">
		
			<input type="text" name="manager_code" id="manager_code" placeholder="Mã nhân viên (Số căn cước)" maxlength="12"><br>
			<input type="text" name="manager_name" id="manager_name" placeholder="Tên nhân viên"><br>
			<input type="text" name="manager_password" id="manager_password" required placeholder="Mật khẩu"><br>
			<input type="text" name="manager_email" id="manager_email" placeholder="EMAIL"><br>
			Giới tính&nbsp&nbsp&nbsp&nbsp<select name="manager_sex" id="manager_sex">
				<option value="1">Nam</option>
				<option value="0">Nữ</option>
			</select><br>
			Ngày sinh &nbsp<input type="date" name="manager_dob" id="manager_dob"><br>
			<textarea name="manager_address" id="manager_address" placeholder="Địa chỉ hiện tại"></textarea><br>
			<textarea name="manager_hometown" id="manager_hometown" placeholder="Quê quán"></textarea><br>
			<button type="submit" name="sub_add">Thêm</button>
	</div>
	</form>
	
</div>