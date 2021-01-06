
<div id="taskbar">
	<div id="taskbar_logo">
		<a href="index.php"><img src="modules/taskbar/img/logo3.png" id="logo"alt=""></a>
	</div>
	<div id="taskbar_product">
		<div id="taskbar_sanpham">
			<div id="quaylai">
				<img src="modules/taskbar/img/Menu_icon_icon-icons.com_71858.png" id="quaylai1" onclick="hienthi()"alt="">
			</div>
			<div id="hang">
				<?php 
					if($_GET['search']=='iphone'){
						echo"<img src='modules/taskbar/img/iPhone_logo.png' class='icon'>";
					}
					else if($_GET['search']=='samsung'){
						echo"<img src='modules/taskbar/img/sam.png' class='icon'>";
					}
					else if($_GET['search']=='oppo'){
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
			<a href="index.php?search=iphone">
				<img src="modules/taskbar/img/iPhone_logo.png" alt="" class="icon">
			</a>
		</div>
		<div id="taskbar_samsung" class="logo" >
			<a href="index.php?search=samsung">
				<img src="modules/taskbar/img/sam.png" alt="" class="icon" >
			</a>

			
		</div>
		<div id="taskbar_oppo" class="logo" >
			<a href="index.php?search=oppo">
				<img src="modules/taskbar/img/OPPO_logo.png" alt="" class="icon">
			</a>
		</div>
	</div>
	<div id="taskbar_search">
		
	</div>
	<div id="taskbar_cart">
		
	</div>
	
</div>

