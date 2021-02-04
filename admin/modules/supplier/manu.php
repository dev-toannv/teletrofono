<?php 
	require_once("modules/config/connectdb.php");
	$sql="select * from manu_product";
	$sql=mysqli_query($conn,$sql);

	
?>

<script type="text/javascript">
	function displayon(){
		var a= document.getElementById('imgg');
        var b= document.getElementById('file');
        var url = URL.createObjectURL(b.files[0]);
        a.src=url;
	}
</script>
<div id="add_manu">
	<div id="show">
		<table>
			<tr>
				<th class="i1">ID và tên</th>
				<th class="i2">Ảnh</th>
				<th class="i3">Thao tác</th>
			</tr>
			<?php 
			$folder="../public/product/";
				while($row=mysqli_fetch_assoc($sql)){
					echo "<tr>";
						echo "<td class='i1'>";
							echo $row['id']."<br>";
							echo $row['manu_name'];
						echo "</td>";
						echo "<td class='i2'>";
							echo "<img src='".$folder.$row['manu_image']."'/>";
						echo "</td>";
						echo "<td>";
							echo "<a href='index.php?supplier&edit_id=".$row['id']."'>Chỉnh sửa</a>";
						echo "</td>";
					echo "</tr>";
				}
			?>
		</table>
		
	</div>
</div>
<div id="edit_manu">
	<?php 
		if(isset($_GET['edit_id'])){
			require_once("modules/supplier/edit.php");
		}
		else{
			require_once("modules/supplier/add.php");
		}
	?>
</div>