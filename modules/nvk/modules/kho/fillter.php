
<a class="sach" href="default.php?nav=k&sub=s">Sách</a>
<a  class="vpp" href="default.php?nav=k&sub=vpp">VPP</a>
<a class="dc" href="default.php?nav=k&sub=dc">Đồ chơi</a>
<form  id="sp_search" action="" method="get">
<input type="hidden" name="nav" value="k"/>
<input type="text" name="sp_search" id='search_box'/>
<input type="submit" id="search_but" value="Tìm"/>
</form>
<label>
<strong>Tổng: </strong>
<?php
	$r="select t.tc,s.sach,vpp.vpp,dc.dc from ";
	$r.="(select count(id) as tc from tblsanpham) as t,";
	$r.="(select count(id) as sach from tblsanpham where danhmuc_id=1) as s,";
	$r.="(select count(id) as vpp from tblsanpham where danhmuc_id=2) as vpp,";
	$r.="(select count(id) as dc from tblsanpham where danhmuc_id=3) as dc";
	$q=mysqli_query($dbc,$r);
	$f=mysqli_fetch_row($q);
	echo "{$f[0]}, Sách: {$f[1]}, VPP: {$f[2]}, ĐC: {$f[3]}";
?>(<em>sp</em>)
</label>
