<?php 
	require_once("modules/config/connectdb.php");
	

	$id=$_SESSION['id_customer'];
	$infor="select * from customer where id = $id";
	$a=mysqli_query($conn,$infor);
	$row=mysqli_fetch_assoc($a);

	if(isset($_POST['sub_edit'])){
		$customer_name=trim($_POST['customer_name']);
		$customer_phonenumber=trim($_POST['customer_phonenumber']);
		$customer_address=trim($_POST['customer_address']);
		$old_pass=trim($_POST['oldpass']);
		$new_pass=trim($_POST['newpass']);

		$sql_u="update customer set customer_name='$customer_name', customer_phonenumber='$customer_phonenumber', customer_address='$customer_address' where id = $id ";

		if(!empty($old_pass) && !empty($new_pass)){
			$af="select customer_password from customer where id = $id and customer_password='$old_pass'";
			$c=mysqli_num_rows(mysqli_query($conn,$af));
			if($c>0){
				$sql_u="update customer set customer_name='$customer_name', customer_phonenumber='$customer_phonenumber', customer_address='$customer_address', customer_password='$new_pass' where id = $id ";
			}
		}

		$j=mysqli_query($conn,$sql_u);

		if(!$j){
			echo "<script> alert('Cập nhật không thành công'); </script>";
		}
		else{
			unset($_SESSION['acc']);
			unset($_SESSION['pass']);
			unset($_SESSION['id_customer']);
			unset($_SESSION['select']);
			header("Location:index.php?module=common&action=login");
		}


	}
?>	
<script type="text/javascript">
	function displayon(){
		document.getElementById('edit1').style.display="none";
		document.getElementById('edit2').style.display="table-row";
		document.getElementById('edit3').style.display="table-row";
		document.getElementById('cus_name').readOnly=false;
		document.getElementById('cus_phone').readOnly=false;
		document.getElementById('cus_address').readOnly=false;
		document.getElementById('cus_name').focus();
	}

	function displayoff(){
		document.getElementById('edit1').style.display="table-row";
		document.getElementById('edit2').style.display="none";
		document.getElementById('edit3').style.display="none";
		document.getElementById('cus_name').readOnly=true;
		document.getElementById('cus_phone').readOnly=true;
		document.getElementById('cus_address').readOnly=true;
		location.reload()
	}

</script>


<div style="width: 40%; height: 50%; background-color: #d5dbdf">
	
	<div style="width: 100%; height: 20%">
		<table style="width: 100%; height: 100%;border-collapse: collapse;">
			<tr>
				<td class="f1">Tài khoản</td>
				<td class="f2"><?php echo $row['customer_account'] ?></td>
			</tr>
			<tr>
				<td class="f1">Kiểu khách hàng</td>
				<td class="f2">
					<?php 
						if($row['customer_type']==1){
							echo "Khách hàng VIP";
						}
						else{
							echo "Khách hàng thường";
						}
					?>
				</td>
			</tr>
		</table>
			
	</div>

	<div style="width: 100%; height: 80%">
		<form action="" method="POST" style="width: 100%;height: 100%">
			<table style="width: 100%;height: 100%; border-collapse: collapse;">
				<tr>
					<td class="f1">Tên khách hàng</td>
					<td class="f2">
						<input type="text" id="cus_name" name="customer_name" readonly="true" value="<?php echo $row['customer_name']; ?>">
					</td>
				</tr>
				<tr>
					<td class="f1">Số điện thoại</td>
					<td class="f2">
						<input type="text" id="cus_phone" maxlength="10" name="customer_phonenumber" readonly="true" value="<?php echo $row['customer_phonenumber']; ?>">
					</td>
				</tr>
				<tr>
					<td class="f1">Địa chỉ</td>
					<td class="f2">
						<input type="text" id="cus_address" name="customer_address" readonly="true" value="<?php echo $row['customer_address'] ?>">
					</td>
				</tr>

				<tr style="width: 100%" id="edit1">
					<td colspan="2" style="width: 100%; height: 20%;">
						<div style="width: 100%; height: 100%;display: flex;justify-content: center;align-items: center;">
							<button type="button" style="width: 50%; height: 50%;" onclick="displayon()">Chỉnh sửa thông tin</button>
						</div>
						
					</td>
				</tr>
				<tr style="width: 100%;display: none" id="edit3">
					<td style="width: 35%;height: 20%;border:1px black solid;">
						<input type="text" placeholder="Nhập mật khẩu cũ" style="width: 100%; height: 100%;text-align: center; font-size: 18px" name="oldpass">
					</td>
					<td style="width: 35%;height: 20%;border:1px black solid;"> 
						<input type="text" placeholder="Nhập mật khẩu mới" style="width: 100%; height: 100%;text-align: center;font-size: 18px" name="newpass">
					</td>
				</tr>

				<tr style="width: 100%;display: none" id="edit2">
					<td style="width: 35%;height: 20%;">
						<div style="width: 100%; height: 100%;display: flex;justify-content: center;align-items: center;">
							<button type="button" style="width: 50%;height: 50%" onclick="displayoff()">Hủy</button>
						</div>
					</td>

					<td style="width: 65%;height: 20%;">
						<div style="width: 100%; height: 100%;display: flex;justify-content: center;align-items: center;">
							<button type="submit" style="width: 50%;height: 50%" name="sub_edit">Lưu thay đổi</button>
						</div>
						
					</td>
				</tr>

			</table>
		</form>
	</div>	
</div>