<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
require_once("modules/config/connectdb.php");
?>
<div id="taskbar">
	<div id="taskbar_logo">
		<a href="index.php?basic=basic"><img src="modules/taskbar/img/logo3.png" id="logo"alt=""></a>
	</div>
	<div id="taskbar_product">
		<div id="taskbar_sanpham">
			<div id="quaylai">
				<img src="modules/taskbar/img/Menu_icon_icon-icons.com_71858.png" id="quaylai1" onclick="hienthi()"alt="">
			</div>
			<div id="hang">
				<?php 
					if(isset($_SESSION['search_manu'])==false){
						$_SESSION['search_manu']="";
					}
					$search_manu='';
					if(isset($_GET['basic'])){
						unset($_SESSION['search_manu']);
						unset($_SESSION['s_name']);
						unset($_SESSION['s_ram']);
						unset($_SESSION['s_storage']);
						unset($_SESSION['ram_check']);
						unset($_SESSION['storage_check']);
						unset($_SESSION['s_color']);
						unset($_SESSION['color_check']);
						unset($_SESSION['price']);
						unset($_SESSION['price2']);
						header("Location:index.php");
					}
					if(isset($_SESSION['search_manu']) && isset($_GET['search_manu'])){
						if($_SESSION['search_manu']!=$_GET['search_manu']){
							unset($_SESSION['s_name']);
							unset($_SESSION['s_ram']);
							unset($_SESSION['s_storage']);
							unset($_SESSION['s_color']);
							unset($_SESSION['ram_check']);
							unset($_SESSION['storage_check']);
							unset($_SESSION['color_check']);
							unset($_SESSION['price']);
							unset($_SESSION['price2']);
						}
						$_SESSION['search_manu']=$_GET['search_manu'];
						$search_manu=$_SESSION['search_manu'];
						
					}
					$folder="../public/product/";
					$hang2="select * from manu_product where manu_name ='$search_manu'";
					$hang22=mysqli_query($conn,$hang2);
					$j=mysqli_num_rows($hang22);
					if($j>0){
						$hang222=mysqli_fetch_assoc($hang22);
						$img=$folder.$hang222['manu_image'];
						$_SESSION['search_manu']=$search_manu;
						echo"<img src='".$img."' class='icon'>";
					}
					else{
						$_SESSION['search_manu']="all";
						echo "<p>S???n ph???m</p>";
					}
				?>
			</div>
			
		</div>
		<div id="close">
				<div id="dong" onclick="close1()">X</div>
		</div>
		<?php
			$folder="../public/product/";
			// $conn=mysqli_connect('localhost','root','','teletrofono');
			$hang1="select * from manu_product";
			$hang11=mysqli_query($conn,$hang1);
			while($hang111=mysqli_fetch_assoc($hang11)){
				$tenhang =$hang111['manu_name'];
				$anhhang =$folder.$hang111['manu_image'];
				echo "<div class='logo'>";
					echo "<a href=index.php?search_manu=".$tenhang.">";
						echo "<img src='".$anhhang."'class='icon'>";
					echo "</a>";
				echo "</div>";
			}
			// mysqli_close($conn);
		?>
	</div>
	<div id="taskbar_search">
		<img src="../public/customer/acc.gif"  style="max-height: 100%;width: 100%;"alt="">
	</div>
	<div id="taskbar_cart">
		<a href="index.php?cart=cart"><img src="../public/customer/cart.png" id ='cart1'alt="">
		<?php
			if(isset($_SESSION['cart'])){
				$cart = $_SESSION['cart'];
				$total_cart=0;
				foreach($cart as $key=>$value){
					$total_cart++;
				}
				if($total_cart>0){
					echo "<span style='font-size:135%; color:red;'>".$total_cart."</span>";
				}
			}
		?>
		</a>
		
	</div>
	
</div>

