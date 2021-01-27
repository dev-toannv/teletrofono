function hienthi(){
	var a= document.getElementById('close');
	var b= document.getElementsByClassName('logo');
	var c= b.length;
	var e=document.getElementById('taskbar_sanpham');
	var l=document.getElementById('product_container');
	a.style.height="27%";
	a.style.width="100%";
	for(var f = 0; f<c; f++){
		b[f].style.height="80%"
		b[f].style.width="100%";
	}
	e.style.background="#ebebeb";
	l.style.zIndex="-1";
}


function close1(){
	var a= document.getElementById('close');
	var b= document.getElementsByClassName('logo');
	var c= b.length;
	var e=document.getElementById('taskbar_sanpham');
	var l=document.getElementById('product_container');
	a.style.height="0%";
	a.style.width="0%";
	for(var f = 0; f<c; f++){
		b[f].style.height="0%"
		b[f].style.width="0%";
	}
	e.style.background="none";
	l.style.zIndex="0";
}
