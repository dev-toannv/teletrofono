<link rel="stylesheet" type="text/css" href="modules/staff/staff.css">
<div id="m_staff">
    <div class="head">
    	<a href="?staff&add_staff">Thêm nhân viên</a>
    </div>
    <div class="head">
    	<a href="?staff&edit_staff">Chỉnh sửa nhân viên</a>
    </div>
    <div id="body_mstaff">
    	<?php 
    		if(isset($_GET['add_staff'])){
    			require_once("modules/staff/add_staff.php");
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