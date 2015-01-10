
<nav class="menu">
<ul>
	<li class='tab active-tab' id='nv'><a href="?nav=nv" >Nhân Viên</a></li>
	<li class='tab' id='k'><a href="?nav=k">Kho</a></li>
	<li class='tab' id='bc'><a href="?nav=bc">Báo Cáo</a></li>
	<li class='tab' id='ls'><a href="?nav=ls">Lịch sử GD</a></li>
	<li class='tab' id='tl'><a href="?nav=tl">Thiết lập</a></li>
    <li class='tab' id='out'><form action="default.php" method="post"><input name="logout" type="submit" value="Thoát"></form></li>
</ul>
</nav>
	
<article class="fillter">
<?php

	if(isset($_GET['nav'])){
		$nav=$_GET['nav'];
			if($nav=='k'){
				include 'modules/qlkho/fillter.php';
			}elseif($nav=='bc'){
				include 'modules/baocao/fillter.php';
			}elseif ($nav=='ls'){
				include 'modules/lichsu/fillter.php';
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
