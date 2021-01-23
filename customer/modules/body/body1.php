<div id="page">
			<?php 
				for($i=1;$i<=$pages;$i++){
					echo "<a href='index.php?search_manu=".$_SESSION['search_manu']."&page=$i'>$i</a>"."&nbsp";
				}
			?>
</div>
<div style="height:1000px">
	<table>
		<?php 
		while($row=mysqli_fetch_assoc($query_sql19)){
			$id=$row['id'];
			// lay hang
			echo "<tr>";
				echo "<td>";
					echo $row['id']." la ".$row['product_name'];
				echo "</td>";
			echo "</tr>";
		}
	?>
	</table>
</div>