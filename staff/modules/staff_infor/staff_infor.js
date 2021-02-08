function change2(){
	var a= document.getElementById('but_pass_staff');
	var b= document.getElementById('form_edit_pass');
	a.style.display="none";
	b.style.display="block";
}

function myfun(){
            var a= document.getElementById('pic_old');
            var b= document.getElementById('pic_new');
            var url = URL.createObjectURL(b.files[0]);
            a.src=url;
}

function doiso(){
	document.getElementById('ds').style.display="none";
	document.getElementById('edit_phone').style.display="block";
}