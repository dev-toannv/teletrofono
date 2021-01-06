
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

					if(isset($_GET['basic'])){
						unset($_SESSION['search_manu']);
						header("Location:index.php");
					}

					if(isset($_SESSION['search_manu'])==false){
						$_SESSION['search_manu']="";
					}
					else{
						if($_GET['search_manu']=="iphone"){
							$_SESSION['search_manu']="iphone";
						}
						if($_GET['search_manu']=="samsung"){
							$_SESSION['search_manu']="samsung";
						}
						if($_GET['search_manu']=="oppo"){
							$_SESSION['search_manu']="oppo";
						}
					}
					if($_SESSION['search_manu']=='iphone'){
					echo"<img src='modules/taskbar/img/iPhone_logo.png' class='icon'>";
					}
					else if($_SESSION['search_manu']=='samsung'){
						echo"<img src='modules/taskbar/img/sam.png' class='icon'>";
					}
					else if($_SESSION['search_manu']=='oppo'){
						echo"<img src='modules/taskbar/img/OPPO_logo.png' class='icon'>";
					}
					else{
						echo "<p>Sản phẩm</p>";
					}
				?>
			</div>
			
		</div>
		<div id="close">
				<div id="dong" onclick="close1()">X</div>
		</div>
		<div id="taskbar_iphone" class="logo" >
			<a href="?search_manu=iphone">
				<img src="modules/taskbar/img/iPhone_logo.png" alt="" class="icon">
			</a>
		</div>
		<div id="taskbar_samsung" class="logo" >
			<a href="?search_manu=samsung">
				<img src="modules/taskbar/img/sam.png" alt="" class="icon" >
			</a>

			
		</div>
		<div id="taskbar_oppo" class="logo" >
			<a href="?search_manu=oppo">
				<img src="modules/taskbar/img/OPPO_logo.png" alt="" class="icon">
			</a>
		</div>
	</div>
	<div id="taskbar_search">
	</div>
	<div id="taskbar_cart">
		
	</div>
	
</div>

