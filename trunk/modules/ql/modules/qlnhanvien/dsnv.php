<?php 
$cnt=1;
if(isset($_GET['nvbh'])){
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="SELECT * FROM `tblnhanvien` WHERE level_id =2 order by ngay_vao_lam limit $from,10";
	}else{
		$r="SELECT * FROM `tblnhanvien` WHERE level_id =2 order by ngay_vao_lam limit 0,10";}
}elseif(isset($_GET['nvk'])){
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="SELECT * FROM `tblnhanvien` WHERE level_id =3 order by ngay_vao_lam limit $from,10";
	}else{
		$r="SELECT * FROM `tblnhanvien` WHERE level_id =3 order by ngay_vao_lam limit 0,10";}
}else{
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="SELECT * FROM `tblnhanvien` order by ngay_vao_lam limit $from,10";
	}else{
		$r="SELECT * FROM `tblnhanvien` order by ngay_vao_lam limit 0,10";}
}
$q=mysqli_query($dbc,$r);?>
<table>
	<thead>
    <tr><td>Mã NV</td><td>Avatar</td><td>Tên NV</td><td>Level</td><td>Ngày sinh</td><td>Địa chỉ</td><td>Phone</td><td>Join Day</td><td>Tùy chọn</td></tr>
    </thead>
<?php while ($row=mysqli_fetch_array($q)){?>
	<tbody>
    	<tr><td><input class="ma_nv" type='text' id='ma_nv<?php echo $cnt; ?>' value='<?php echo $row['nhanvien_id']; ?>' readonly></td><td><img width='30px' height='30px' src='<?php echo $row['avatar']; ?>'></td><td><?php echo $row['ten_nhanvien']; ?></td><td><?php echo $row['level_id']; ?></td><td><?php echo $row['ngay_sinh']; ?></td><td><?php echo $row['dia_chi']; ?></td><td><?php echo $row['SDT']; ?></td><td><?php echo $row['ngay_vao_lam']; ?></td><td><input id='edit-emp-but<?php echo $cnt; ?>' onclick='edit_emp(cnt=<?php echo $cnt; ?>);' value='Sửa' type='button' ><input class='delete-emp-but' id='id_del_but<?php echo $cnt; ?>' onclick='delete_emp(cnt=<?php echo $cnt; ?>);' value='Sa thải' type='button' ></td></tr>
       </tbody>	
<?php	$cnt++;
}?>
</table>
<!--Begin Addition Employees Box--->
<div class="add-emp-box" >
	<img alt="" class="add-emp-close" src="sourse/close.png">
	<form action="" id="add-emp-form" method="post" name="add-emp-form" enctype="multipart/form-data"><table>
		<thead><tr><th colspan="2">Thêm nhân viên</th></tr></thead>
		<tbody>
		<tr><td>Tên Nhân viên:</td><td><input name="name" type="text"></td></tr>
		<tr><td>Ảnh:</td><td><input name="avatar" type="file"></td></tr>
		<tr><td>Loại:</td><td><select name="position"><option value="BH">NV Bán Hàng</option><option value="TK">Thủ Kho</option></select></td></tr>
		<tr><td>Mật khẩu:</td><td><input name="password" type="text"></td></tr>
		<tr><td>Địa chỉ:</td><td><input name="address" type="text"></td></tr>
        <tr><td>Phone:</td><td><input name="phone" type="text"></td></tr>
		<tr><td>Ngày sinh:</td><td><input name="dateofbirth" type="date" placeholder="mm/dd/yyyy"></td></tr>
		<tr><td></td><th><input type="reset"><input name="add" id='add-emp-submit' type="submit" value="Thêm"></th></tr>
		</tbody>
	</table></form>
</div>
<!--End Addition Employees Box--->
<!--Begin Edit Employees Box--->
<div class="edit-emp-box" >
	<img alt="" class="edit-emp-close" src="sourse/close.png">
	<form action="" id="edit-emp-form" method="post" name="edit-emp-form" enctype="multipart/form-data"><table>
		<thead><tr><th colspan="2">Sửa thông tin nhân viên<input style="width:45px" id="eid" name="eid" type="text"></th></tr></thead>
		<tbody>
        <tr><th><img width="100px" height="50px" id="old_avt" ></th></tr>
		<tr><td>Tên Nhân viên:</td><td><input id="ename" name="ename" type="text"></td></tr>
		<tr><td>Ảnh:</td><td><input name="eavatar" id="eavatar" type="file"></td></tr>
		<tr><td>Loại:</td><td><select name="eposition" id="eposition"><option value="BH">NV Bán Hàng</option><option value="TK">Thủ Kho</option></select></td></tr>
		<tr><td>Mật khẩu:</td><td><input name="epassword" id="epassword" placeholder="Nhập mật khẩu mới" type="text"></td></tr>
		<tr><td>Địa chỉ:</td><td><input name="eaddress" id="eaddress" type="text"></td></tr>
		<tr><td>Phone:</td><td><input name="ephone" id="ephone" type="text"></td></tr>
        <tr><td>Ngày sinh:</td><td><input name="edateofbirth" id="edateofbirth" type="date" placeholder="mm/dd/yyyy"></td></tr>
		<tr><td></td><th><input type="reset"><input name="edit" id='edit-emp-submit' type="submit" value="Sửa"></th></tr>
		</tbody>
	</table></form>
</div>
<!--End Edit Employees Box--->
<!--Begin Delete Employees Box--->
<div class="delete-emp-box"><form id='delete-emp-form' action="" method="post" ><table><tr><th colspan="6">Bạn thật sự muốn Sa thải NV <input id="id_emp_del" readonly><input type="hidden" id="id_emp_row" readonly>?</tr><tr><th></th><th><input class="delete-emp-submit" value="Có" type="button" ></th><th></th><th><input class="delete-emp-close" value="Không" type="button" ></th><th></th><th></th></tr></table></form>
</div>
<!--End Delete Employees Box--->
<div class="nav-page">
<?php
	if(isset($_GET['nvbh'])){
		$r="SELECT count(a.nhanvien_id) as sl FROM `tblnhanvien` as a WHERE a.level_id=2 ";
		$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		echo "<a href='default.php?nvbh&f=0'>Trang1</a>";
		$from=10;$i=1;$modpage=$so_page[0]%10;$page=$so_page[0]/10;
		if($modpage==0 and $page>=1){
			while($i<$page){
				echo "<a href='default.php?nvbh&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}
		}
		elseif($page>=1){
			while($i<=($page)){
				echo "<a href='default.php?nvbh&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}	
		}	
	}elseif(isset($_GET['nvk'])){
		$r="SELECT count(a.nhanvien_id) as sl FROM `tblnhanvien` as a WHERE a.level_id=3 ";
		$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		echo "<a href='default.php?nvk&f=0'>Trang1</a>";
		$from=10;$i=1;$modpage=$so_page[0]%10;$page=$so_page[0]/10;
		if($modpage==0 and $page>=1 ){
			while($i<$page){
				echo "<a href='default.php?nvk&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}
		}
		elseif($page>=1){
			while($i<=($page)){
				echo "<a href='default.php?nvk&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}	
		}
	}else{
		$r="SELECT count(a.nhanvien_id) as sl FROM `tblnhanvien` as a";
		$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		echo "<a href='default.php?nv&f=0'>Trang1</a>";
		$from=10;$i=1;$modpage=$so_page[0]%10;$page=$so_page[0]/10;
		if($modpage==0 and $page>=1 ){
			while($i<$page){
				echo "<a href='default.php?nv&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}
		}
		elseif($page>=1){
			while($i<=($page)){
				echo "<a href='default.php?nv&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}	
		}
	}
?>
</div>