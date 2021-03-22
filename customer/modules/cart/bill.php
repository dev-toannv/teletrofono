<?php 
	if(!defined("MY_PROJECT")) die("Connect error");
?>
<?php 
		if(isset($_POST['sub_bill'])){
			$cus_id=$_POST['cus_id'];
			$cus_address=trim($_POST['cus_address']);
			$cus_phone=trim($_POST['cus_phone']);
			$cus_name=trim($_POST['cus_name']);
			if($cus_address =="" || $cus_phone=="" || $cus_name==""){
				header("Location:index.php?cart=cart&err");
			}
			else{
				// KIEM TRA XEM SAN PHAM CON DU HANG CHO MINH MUA KHONG
				$flag=1;
				foreach ($_SESSION['cart'] as $key => $value) {
					$sql_delete="select product_quantity from product where id = $key";
					$delete=mysqli_fetch_assoc(mysqli_query($conn,$sql_delete));
					$delete=$delete['product_quantity'];
					if($_SESSION['cart'][$key]>$delete){
						$_SESSION['cart'][$key]=$delete;
						$flag=0;
						header("Location:index.php?cart=cart&err1");
					}
					if($delete==0){
						unset($_SESSION['cart'][$key]);
						$flag=0;
						header("Location:index.php?cart=cart&err1");
					}
				}
				if($flag<=0){
					header("Location:index.php?cart=cart&err1");
				}
				else{
					$am=date('Y:m:d H:i:s');
					$sql_bill="insert into bill(id,customer_id,bill_time,bill_status,bill_namecustomer,bill_address,bill_phonenumber) values(null,$cus_id,'$am',0,'$cus_name','$cus_address','$cus_phone')";
	
					mysqli_query($conn,$sql_bill);
					// lay ra id bill moi tao
					$id_bill="select id from bill order by id DESC limit 1";
					$id_bill=mysqli_fetch_assoc(mysqli_query($conn,$id_bill));
					$id_bill=$id_bill['id'];
					// bat dau insert bill_detail
					$total=0;
					foreach ($_SESSION['cart'] as $key => $value) {
						// them vao bill_detail
						$p="select product_price, product_quantity from product where id = $key";
						$p=mysqli_fetch_assoc(mysqli_query($conn,$p));
						$u=$p['product_quantity'];
						$p=$p['product_price'];
						$total+=($p*$value);
						$sqlll="insert into bill_detail values($key,$id_bill,$value,$p)";
						mysqli_query($conn,$sqlll);
						// giam so luong san pham voi id hien co
						$new_quantity=$u-$value;
						$update="update product set product_quantity = $new_quantity where id = $key";
						mysqli_query($conn,$update);
					}
					// update lai tong so tien cua bill
					$type="select customer_type from customer where id = '$cus_id'";
					$type=mysqli_query($conn,$type);
					$type=mysqli_fetch_assoc($type);
					$type=$type['customer_type'];
					if($type==1){
						$total=$total - ($total*3)/100;
					}
	
					$update2="update bill set bill_money = $total where id = $id_bill";
					mysqli_query($conn,$update2);
	
					unset($_SESSION['cart']);
					header("Location:index.php?complete");
				}
	
				
			}
			
		}
	
		if(isset($_SESSION['cart'])){
			if(count($_SESSION['cart'])>0){
				if(isset($_SESSION['id_customer'])){
				$id=$_SESSION['id_customer'];
				$sqll="select customer_name,customer_address,customer_phonenumber from customer where id = $id";
				$a=mysqli_fetch_assoc(mysqli_query($conn,$sqll));
				$address=$a['customer_address'];
				$phone=$a['customer_phonenumber'];
				$name=$a['customer_name'];
			}
				else{
					$id=2;
					$phone="";
					$name="";
					$address="";
				}
			}
			else{
				header("Location:index.php");
			}
		}
	
?>

<link rel="stylesheet" type="text/css" href="modules/cart/bill.css">
<div style="position: relative; left:5%; top : 5%">
			<a href="index.php?cart=cart"> <-- Quay về giỏ hàng</a>
		</div>
<div id="xyz">
		<form action="" method="POST" id="form">
			<table id="table">
				<tr>
					<td class='bill_left'><span class="span">*</span> Họ và tên : </td>
					<td class='bill_right'>
						<input type="text" name="cus_name" value="<?php echo  $name;?>">
					</td>
				</tr>
				<tr>
					<td class='bill_left'><span class="span">*</span> Địa chỉ:  </td>
					<td class='bill_right'>
						<textarea name="cus_address" cols="30" rows="10"><?php echo  $address;?></textarea>
					</td>
				</tr>
				<tr>
					<td class='bill_left'><span class="span">*</span> Số điện thoại : </td>
					<td class='bill_right'>
						<input type="text" name="cus_phone" value="<?php echo  $phone;?>">
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<button type="submit" name="sub_bill">Thanh toán</button>
					</td>
				</tr>
				<span style="display:none">
					<input type="number" name="cus_id" value="<?php echo $id; ?>">
				</span>
			</table>
			<p style="text-align: center; color:red; margin-top: 17px">Những nơi đánh dấu * không được để trống</p>
			<p style="text-align: center; color:red; margin-top: 17px">Thời gian nhận hàng từ 3 đến 7 ngày</p>
		</form>
</div>