<?php
	if($_COOKIE['ps']!="Mannger"){
		header("location:../../");
		
	}else{
		
	}
?>
<?php include("../header.php") ?>
<section>
<script type="text/javascript">
$(function(){
	var tab="#<?php if(isset($_GET['nav'])){echo (strip_tags($_GET['nav'])); } ?>";
		if(tab.length != 1){
			$('.tab').removeClass('active-tab');
			$(tab).addClass('active-tab');
		}});
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

</section>
<footer>
Copyright &copy; by Atumt Team.
</footer>
</div>
</body>
</html>