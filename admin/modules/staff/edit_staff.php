 <?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
	$s_id="";
	$s_code="";
	$s_email="";
	$s_status="";
	$user=array(1 => 'ADMIN', 2=> 'STAFF');
	$status=array(0=>"Nghỉ làm", 1=> 'Đang làm');
	if(isset($_POST['s_sub'])){
		if($_POST['s_id']!=""){
			$s_id=$_POST['s_id'];
			$s_id=" and id = '$s_id'";
		}
		if($_POST['s_code']!=""){
			$s_code=trim($_POST['s_code']);
			$s_code=" and manager_code='$s_code'";
		}
		if($_POST['s_email']!=""){
			$s_email=trim($_POST['s_email']);
		}
		if($_POST['s_status']!=""){
			$s_status=$_POST['s_status'];
			$s_status=" and manager_status='$s_status'";
		}
	}
	$sql_s="select id,manager_code,manager_name,manager_email,user_type,manager_status from manager where manager_email like'%$s_email%' $s_id $s_code $s_status and id != 1";
	$a=mysqli_query($conn,$sql_s);
?>
<div id="container_edit">
	<div id="search_edit">
		<form action="" method="POST" id="formsearch">
			<input type="number" min="1" name="s_id" placeholder="id" style="width:5%">
			<input type="text" name="s_code" placeholder="Mã nhân viên">
			<input type="text" name="s_email" placeholder="Email">
			<select name="s_status" id="">
				<option value="">Tất cả</option>
				<option value="1">Đang làm</option>
				<option value="0">Nghỉ làm</option>
			</select>
			<button type="submit" name="s_sub" style="width:10%">Tìm kiếm</button>
		</form>
	</div>
	<div id="body_edit">
		<table>
			<tr>
				<th>ID</th>
				<th>Mã NV</th>
				<th>Tên NV, email</th>
				<th>Cấp độ</th>
				<th>Tình trạng</th>
				<th>Thao tác</th>
			</tr>
			<?php 
				while($row=mysqli_fetch_assoc($a)){
					echo "<tr>";
						echo "<td>";
							echo $row['id'];
						echo "</td>";
						echo "<td>";
							echo $row['manager_code'];
						echo "</td>";

						echo "<td>";
							echo $row['manager_name']."<br>";
							echo $row['manager_email'];
						echo "</td>";

						echo "<td>";
							echo $user[$row['user_type']];
						echo "</td>";

						echo "<td>";
							echo $status[$row['manager_status']];
						echo "</td>";

						echo "<td>";
							echo "<a href='?staff&edit_staff&id_edit=".$row['id']."'>Chỉnh sửa</a>";
						echo "</td>";
					echo "</tr>";
				}
			?>
		</table>
		
	</div>
</div>