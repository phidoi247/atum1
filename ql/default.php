<?php
	if($_COOKIE['ps']!="Mannger"){
		header("location:../");
		
	}else{
		
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Demo.Project.One</title>
<link rel="stylesheet" type="text/css" href="../css/StyleMain.css">
<link rel="icon" href="../sourse/icon.ico">
<script type="text/javascript" src="../js/jquery-2-1-1.js"></script>
<script type="text/javascript" src="../js/popup.js"></script>
<script type="text/javascript" src="../js/script1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var tab='#<?php if(isset($_GET['nav'])){echo (strip_tags($_GET['nav'])); } ?>';
		if(tab.length != 1){
			$('.tab').removeClass('active-tab');
			$(tab).addClass('active-tab');
		}
		/*Post bang ajax ma khong can refesh*/
		$('#add-emp-form').submit(function(event){
			event.preventDefault()
			var form_add_emp=new FormData($(this)[0]);
			$.ajax({
				url:"modules/qlnhanvien/xuly.php",
				type:"POST",
				data:form_add_emp,
				async:false,
				cache:false,
				processData:false,
				contentType:false,
				success: function(notify){
					if(notify=='Ok'){
						window.location.reload();
					}else{
						alert(notify);	
					}
				}
			});
		})
		/*************************/
		$('.delete-emp-submit').click(function(){
			var id_del=$('#id_emp_del').val();
			$.ajax({
				url:"modules/qlnhanvien/xuly.php",
				type:"POST",
				data:"id_emp_del="+id_del,
				success: function(){
					window.location.reload();
				}
			});
		})
	});
</script>
</head>

<body>
<div class="swapper">
<!--Begin Header-->
<header>
<div class="logo">Logo</div>
<div class="banner"><img alt="Banner" src="../sourse/banner.jpg"></div>
<div class="nav">
	<?php echo "Xin chào ".ucfirst($_COOKIE['user']) ?>
</div>
</header>
<!--End Header-->
<section>
<nav class="menu">
<ul>
	<li class='tab active-tab' id='nv'><a href="?nav=nv" >Nhân Viên</a></li>
	<li class='tab' id='k'><a href="?nav=k">Kho</a></li>
	<li class='tab' id='bc'><a href="?nav=bc">Báo Cáo</a></li>
	<li class='tab' id='ls'><a href="?nav=ls">Lịch sử GD</a></li>
	<li class='tab' id='tl'><a href="?nav=tl">Thiết lập</a></li>
</ul>
</nav>
<aside class="aside">
	<a href="../default.php?logout">Thoát</a>
</aside>
<article class="fillter">
<?php

	if(isset($_GET['nav'])){
		$nav=$_GET['nav'];
			if($nav=='k'){
				
			}elseif($nav=='bc'){
			
			}elseif ($nav=='ls'){
				
			}elseif ($nav=='tl'){
				
			}else {
				include 'modules/qlnhanvien/fillter.php';
			}
			
		}
		else{
			include 'modules/qlnhanvien/fillter.php';
		}

?>
</article>
<div class="pop-up"></div>
<div class="Bar">
<div id="notify"></div>
<?php	
if($_SERVER['REQUEST_METHOD']='GET'){
		if(isset($_GET['nav'])){
		$nav=$_GET['nav'];
			if($nav=='k'){
				
			}elseif($nav=='bc'){
			
			}elseif ($nav=='ls'){
				
			}elseif ($nav=='tl'){
				
			}else {
				include 'modules/qlnhanvien/dsnv.php';
			}
			
		}
		else{
			include 'modules/qlnhanvien/dsnv.php';
		}	
}
else{
	include 'modules/qlnhanvien/dsnv.php';
}
?>
</div>
<div class="add-emp-box" >
	<img alt="" class="add-emp-close" src="../sourse/close.png">
	<form action="" id="add-emp-form" method="post" name="add-emp-form" enctype="multipart/form-data"><table>
		<thead><tr><th colspan="2">Thêm nhân viên</th></tr></thead>
		<tbody>
		<tr><td>Tên Nhân viên:</td><td><input name="name" type="text"></td></tr>
		<tr><td>Ảnh:</td><td><input name="avatar" type="file"></td></tr>
		<tr><td>Loại:</td><td><select name="position"><option value="BH">NV Bán Hàng</option><option value="TK">Thủ Kho</option><option value="QL">Quản Lý</option></select></td></tr>
		<tr><td>Level:</td><td><input name="level" type="number"></td></tr>
		<tr><td>Mật khẩu:</td><td><input name="password" type="text"></td></tr>
		<tr><td>Địa chỉ:</td><td><input name="address" type="text"></td></tr>
		<tr><td>Ngày sinh:</td><td><input name="dateofbirth" type="date" placeholder="mm/dd/yyyy"></td></tr>
		<tr><td></td><th><input type="reset"><input name="add" id='add-emp-submit' type="submit" value="Thêm"></th></tr>
		</tbody>
	</table></form>
</div>
<div class="delete-emp-box"><form id='delete-emp-form' action="" method="post" ><table><tr><th colspan="6">Bạn thật sự muốn Sa thải NV <input id="id_emp_del" readonly="readonly">?</tr><tr><th></th><th><input class="delete-emp-submit" value="Có" type="button" ></th><th></th><th><input class="delete-emp-close" value="Không" type="button" ></th><th></th><th></th></tr></table></form></div>
</section>
<footer>
Copyright &copy; by Atumt Team.
</footer>
</div>
</body>
</html>