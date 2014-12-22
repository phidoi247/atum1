<?php
	if($_COOKIE['ps']!="Mannger"){
		header("location:../../");
		
	}else{
		
	}
?>
<?php include("../header.php") ?>
<section>
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
	<a href="../../default.php?logout">Thoát</a>
</aside>
<article class="fillter">
<?php

	if(isset($_GET['nav'])){
		$nav=$_GET['nav'];
			if($nav=='k'){
				
			}elseif($nav=='bc'){
				include 'modules/baocao/fillter.php';
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
				include 'modules/qlkho/default.php';
			}elseif($nav=='bc'){
				include 'modules/baocao/report_maker.php';
			}elseif ($nav=='ls'){
				include 'modules/lichsu/default.php';
			}elseif ($nav=='tl'){
				include 'modules/thietlap/default.php';
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
<!--Begin Addition Employees Box--->
<div class="add-emp-box" >
	<img alt="" class="add-emp-close" src="../../sourse/close.png">
	<form action="" id="add-emp-form" method="post" name="add-emp-form" enctype="multipart/form-data"><table>
		<thead><tr><th colspan="2">Thêm nhân viên</th></tr></thead>
		<tbody>
		<tr><td>Tên Nhân viên:</td><td><input name="name" type="text"></td></tr>
		<tr><td>Ảnh:</td><td><input name="avatar" type="file"></td></tr>
		<tr><td>Loại:</td><td><select name="position"><option value="BH">NV Bán Hàng</option><option value="TK">Thủ Kho</option><option value="QL">Quản Lý</option></select></td></tr>
		<tr><td>Level:</td><td><input name="level" min="0" type="number"></td></tr>
		<tr><td>Mật khẩu:</td><td><input name="password" type="text"></td></tr>
		<tr><td>Địa chỉ:</td><td><input name="address" type="text"></td></tr>
		<tr><td>Ngày sinh:</td><td><input name="dateofbirth" type="date" placeholder="mm/dd/yyyy"></td></tr>
		<tr><td></td><th><input type="reset"><input name="add" id='add-emp-submit' type="submit" value="Thêm"></th></tr>
		</tbody>
	</table></form>
</div>
<!--End Addition Employees Box--->
<!--Begin Edit Employees Box--->
<div class="edit-emp-box" >
	<img alt="" class="edit-emp-close" src="../../sourse/close.png">
	<form action="" id="edit-emp-form" method="post" name="edit-emp-form" enctype="multipart/form-data"><table>
		<thead><tr><th colspan="2">Sửa thông tin nhân viên<input style="width:45px" id="eid" name="eid" type="text"></th></tr></thead>
		<tbody>
        <tr><th><img width="100px" height="50px" id="old_avt" ></th></tr>
		<tr><td>Tên Nhân viên:</td><td><input id="ename" name="ename" type="text"></td></tr>
		<tr><td>Ảnh:</td><td><input name="eavatar" id="eavatar" type="file"></td></tr>
		<tr><td>Loại:</td><td><select name="eposition" id="eposition"><option value="BH">NV Bán Hàng</option><option value="TK">Thủ Kho</option><option value="QL">Quản Lý</option></select></td></tr>
		<tr><td>Level:</td><td><input name="elevel" id="elevel" min="0" type="number"></td></tr>
		<tr><td>Mật khẩu:</td><td><input name="epassword" id="epassword" type="text"></td></tr>
		<tr><td>Địa chỉ:</td><td><input name="eaddress" id="eaddress" type="text"></td></tr>
		<tr><td>Ngày sinh:</td><td><input name="edateofbirth" id="edateofbirth" type="date" placeholder="mm/dd/yyyy"></td></tr>
		<tr><td></td><th><input type="reset"><input name="edit" id='edit-emp-submit' type="submit" value="Sửa"></th></tr>
		</tbody>
	</table></form>
</div>
<!--End Edit Employees Box--->
<!--Begin Delete Employees Box--->
<div class="delete-emp-box"><form id='delete-emp-form' action="" method="post" ><table><tr><th colspan="6">Bạn thật sự muốn Sa thải NV <input id="id_emp_del" readonly>?</tr><tr><th></th><th><input class="delete-emp-submit" value="Có" type="button" ></th><th></th><th><input class="delete-emp-close" value="Không" type="button" ></th><th></th><th></th></tr></table></form>
</div>
<!--End Delete Employees Box--->
</section>
<footer>
Copyright &copy; by Atumt Team.
</footer>
</div>
</body>
</html>