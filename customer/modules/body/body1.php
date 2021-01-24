<div id="page">
			<?php 
				for($i=1;$i<=$pages;$i++){
					echo "<a href='index.php?search_manu=".$_SESSION['search_manu']."&page=$i'>$i</a>"."&nbsp";
				}
			?>
</div>
<div style="height: auto;width: 100%;display: flex;flex-direction: column;justify-content: space-around;">
	<div class='div_product'>
	<?php 
		$dem=0;
		while($row=mysqli_fetch_assoc($query_sql19)){
			$id=$row['id'];
			// $manu=$row['product_manu'];
			$sql_img="SELECT * FROM image WHERE image_name like '%product_".$id."_1%' or image_name like '%product_".$id."_2%' or image_name like '%product_".$id."_3%' limit 1";
			$a=mysqli_fetch_assoc(mysqli_query($conn,$sql_img));
			$folder_img=$manuu[$row['product_manu']];
			$path="../public/product/".$folder_img."/".$a['image_name'];
			// lay hang
				echo "<div class='show_product'>";
					echo "<div class='show_product_name'>";
						echo $row['id']." la ".$row['product_name'];
					echo "</div>";
					echo "<div class='show_product_image'>";
						echo "<img src='".$path."' class='show_img' />";
					echo "</div>";
					echo "<div class='add_cart'>";
					echo "</div>";
				echo "</div>";
			$dem=$dem+1;
            if($dem%3==0 && $dem!=0 && $dem<$limit){
                echo "</div>";
                echo "<div class='div_product'>";
            }
		}
	?>
	</div>
</div>