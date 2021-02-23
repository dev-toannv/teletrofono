 <?php 
    if(!defined("MY_PROJECT")) die("Connect error");
?>
<link rel="stylesheet" type="text/css" href="modules/staff/staff.css">
<div id="m_staff">
    <div class="head">
    	<a href="?staff&add_staff">Thêm nhân viên</a>
    </div>
    <div class="head">
    	<a href="?staff&edit_staff">Thông tin nhân viên</a>
    </div>
    <div id="body_mstaff">
    	<?php 
    		if(isset($_GET['add_staff'])){
    			require_once("modules/staff/add_staff.php");
    		}
    		else if(isset($_GET['id_edit'])){
    			require_once("modules/staff/edit.php");
    		}
			else if(isset($_GET['edit_staff'])){
    			require_once("modules/staff/edit_staff.php");
    		}
    		else{
    			require_once("modules/staff/add_staff.php");
    		}
    	?>
    </div>
</div>