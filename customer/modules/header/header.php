<div id="header">
	<?php
	if(isset($_POST['logout'])){
		unset($_SESSION['acc']);
		unset($_SESSION['pass']);
		unset($_SESSION['id_customer']);
		unset($_SESSION['select']);
		header("Location:index.php");
	}
	if(isset($_SESSION['acc'])==false&&isset($_SESSION['pass'])==false){
			echo "<div class='ss' id='dangnhap'>";
				echo "<a href='index.php?module=common&action=login' class='thanhtren'>Đăng nhập</a>";
			echo "</div>";	

			echo "<div class='ss' id='dangky'>";
				echo "<a href='index.php?module=sign_up&action=sign_up' class='thanhtren'>Đăng ký</a>";
			echo "</div>";
		}
	else{
		echo "<div id='username'>";

			echo"<div id='tennguoidung' class='thanhtren'>";
				echo "<p>".$_SESSION['username']."</p>";
			echo"</div>";

			
			echo"<div id='manage' class='hov'>";
				echo"<a href='index.php?infor=infor'>Tài khoản của tôi</a></div>";
			echo"<div id='dangxuat' class='hov'>";
				echo"<form action='' method='POST'>";
					echo"<label for='logout' id='lb'>";
						echo"<div id='label_sub'>";
							echo"Đăng xuất";
						echo"</div>";
					echo"</label>";
					echo"<button type='submit' name='logout' id='logout'>dangxuat</button>";
				echo"</form>";
			echo"</div>";

		echo "</div>";
	}
	?>
</div>	
 
