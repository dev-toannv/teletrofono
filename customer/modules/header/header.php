<div id="header">
	<?php
	if(isset($_POST['logout'])){
		session_destroy();
		header("Location:index.php");
	}
	if(isset($_SESSION['id'])==false&&isset($_SESSION['acc'])==false){
			echo "<div class='ss' id='dangnhap'>";
				echo "<a href='index.php?module=common&action=login'>Đăng nhập</a>";
			echo "</div>";	

			echo "<div class='ss' id='dangky'>";
				echo "<a href='index.php?module=sign_up&action=sign_up'>Đăng ký</a>";
			echo "</div>";
		}
		else{
			echo "<div id='username'>";

				echo"<div id='tennguoidung'>";
					echo $_SESSION['username'];
				echo"</div>";

				
				echo"<div id='manage' class='hov'>";
					echo"<a href='index.php?module=infor_customer&action=infor'>Tài khoản của tôi</a></div>";
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
 
