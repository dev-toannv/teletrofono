
<form action='' method='POST' style='width:100%; height:100%'>
	<div class='form1'>
		Thời gian giao hàng : &nbsp
		<input type="date" name="date" value=<?php echo $active ?> >
	</div>
	<div class='form1'>
		Trạng thái đơn hàng : &nbsp
		<select name="select">
			<option value="1" <?php if($a['bill_status']==1) echo "selected"; ?> >Đang chờ</option>
			<option value="2" <?php if($a['bill_status']==2) echo "selected"; ?> >Đang giao hàng</option>
			<option value="3" >Khách đã nhận hàng</option>
			<option value="4" >Khách không nhận hàng</option>
			<option value="5" <?php if($a['bill_status']==5) echo "selected"; ?> >Đã liên lạc</option>
			<option value="6" >Xóa hóa đơn</option>
		</select>
	</div>
	<div class='form1'>
		<input type="number" name='id_pro' style="width: 0%; height: 0%;opacity: 0;" value="<?php echo $a['id'];?>">
		<button type="submit" name="update">Cập nhật</button>
	</div>

</form>