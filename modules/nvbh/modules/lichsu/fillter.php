<form  id="ls_search" action="" method="get">
<input type="hidden" name="nav" value="ls"/>
<input type="text" name="ls_search" id='search_box'/>
<input type="submit" id="search_but" value="Tìm"/>
</form>
<label><strong>Tổng giao dịch trên </strong> 
<?php
	$idu=$_SESSION['idu'];
$r="select d.day,w.week,m.month,y.year from ";
	$r.="(select count(ten_hoadon) as day from tblhoadon where day(thoigian)=day(now()) and nhanvien_id='$idu') as d,";
	$r.="(select count(ten_hoadon) as week from tblhoadon where week(thoigian)=week(now()) and nhanvien_id='$idu') as w,";
	$r.="(select count(ten_hoadon) as month from tblhoadon where month(thoigian)=month(now()) and nhanvien_id='$idu') as m,";
	$r.="(select count(ten_hoadon) as year from tblhoadon where year(thoigian)=year(now()) and nhanvien_id='$idu') as y";

	$q=mysqli_query($dbc,$r);
	$f=mysqli_fetch_row($q);
	echo "Ngày: {$f[0]} Tuần: {$f[1]} Tháng: {$f[2]} Năm: {$f[3]}";
?>(<em>đv:lần</em>)
</label>