<input type="button" id='add-emp-but' value="      Thêm nhân viên">
<a href="default.php?nav=nv&sub=nv">Tất cả Nhân viên</a>
<a href="default.php?nav=nv&sub=nvbh">Nhân viên Bán</a>
<a href="default.php?nav=nv&sub=nvk">Nhân viên Kho</a>
<form target="_self" action="" method="get">
<input type="hidden" name="nav" value="nv"/>
<input type="text" name="nv_search" id='search_box'/>
<input type="submit" id="search_but" value="Tìm"/>
</form>
<label>
<strong

>Tổng: </strong>
<?php
	$r="select t.tc,bh.nvbh,tk.nvtk from ";
	$r.="(select count(id) as tc from tblnhanvien) as t,";
	$r.="(select count(id) as nvbh from tblnhanvien where level_id=1) as bh,";
	$r.="(select count(id) as nvtk from tblnhanvien where level_id=2) as tk";
	$q=mysqli_query($dbc,$r);
	$f=mysqli_fetch_row($q);
	echo "{$f[0]}, Bán hàng: {$f[1]}, Thủ kho: {$f[2]}";
?>
</label>