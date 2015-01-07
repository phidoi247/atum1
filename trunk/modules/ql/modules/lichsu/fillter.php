<a href="default.php?nav=ls&sub=nh">Nhập Hàng</a>
<a href="default.php?nav=ls&sub=bh">Bán Hàng</a>
<form  id="ls_search" action="" method="get">
<input type="hidden" name="nav" value="ls"/>
<input type="text" name="ls_search" id='search_box'/>
<input type="submit" id="search_but" value="Tìm"/>
</form>
<label><strong>Tổng giao dịch trên </strong> 
<?php
	if(isset($_GET['sub'])){
		$sub=$_GET['sub'];
		if(strcmp($sub,"bh")==0){
	$r="select d.day,w.week,m.month,y.year from ";
	$r.="(select count(ten_hoadon) as day from tblhoadon where day(thoigian)=day(now()) and ten_hoadon like '%BH%') as d,";
	$r.="(select count(ten_hoadon) as week from tblhoadon where week(thoigian)=week(now()) and ten_hoadon like '%BH%') as w,";
	$r.="(select count(ten_hoadon) as month from tblhoadon where month(thoigian)=month(now()) and ten_hoadon like '%BH%') as m,";
	$r.="(select count(ten_hoadon) as year from tblhoadon where year(thoigian)=year(now()) and ten_hoadon like '%BH%') as y";		
		}elseif(strcmp($sub,"nh")==0){
	$r="select d.day,w.week,m.month,y.year from ";
	$r.="(select count(ten_hoadon) as day from tblhoadon where day(thoigian)=day(now()) and ten_hoadon like '%NH%') as d,";
	$r.="(select count(ten_hoadon) as week from tblhoadon where week(thoigian)=week(now()) and ten_hoadon like '%NH%') as w,";
	$r.="(select count(ten_hoadon) as month from tblhoadon where month(thoigian)=month(now()) and ten_hoadon like '%NH%') as m,";
	$r.="(select count(ten_hoadon) as year from tblhoadon where year(thoigian)=year(now()) and ten_hoadon like '%NH%') as y";		
		}
	}else{
	$r="select d.day,w.week,m.month,y.year from ";
	$r.="(select count(ten_hoadon) as day from tblhoadon where day(thoigian)=day(now())) as d,";
	$r.="(select count(ten_hoadon) as week from tblhoadon where week(thoigian)=week(now())) as w,";
	$r.="(select count(ten_hoadon) as month from tblhoadon where month(thoigian)=month(now())) as m,";
	$r.="(select count(ten_hoadon) as year from tblhoadon where year(thoigian)=year(now())) as y";
	}
	$q=mysqli_query($dbc,$r);
	$f=mysqli_fetch_row($q);
	echo "Ngày: {$f[0]} Tuần: {$f[1]} Tháng: {$f[2]} Năm: {$f[3]}";
?>
 (<em>đv:lần</em>)</label>