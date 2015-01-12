
<script type="text/javascript">
	document.getElementById('dangnhap').remove();
</script>
<nav class="menu">
<ul>
	<li class='tab active-tab' id='bh'><a href="?nav=bh" >Bán hàng</a></li>
	<li class='tab' id='k'><a href="?nav=k">Kho</a></li>
	<li class='tab' id='ls'><a href="?nav=ls">Lịch sử GD</a></li>
	<li class='tab' id='tl'><a href="?nav=tl">Thiết lập</a></li>
    <li class='tab' id='out'><form action="default.php" method="post"><input name="logout" type="submit" value="Thoát"></form></li>
</ul>
</nav>
<?php

	if(isset($_GET['nav'])){
		$nav=$_GET['nav'];
		$size=432;
			if($nav=='k'){
				echo "<article class='fillter'>";
				include 'modules/nvbh/modules/kho/fillter.php';
				echo "</article>";
				$size=380;
			}elseif($nav=='ls'){
				echo "<article class='fillter'>";
				include 'modules/nvbh/modules/lichsu/fillter.php';
				echo "</article>";
				$size=380;
			}
	}else{
		$size=432;	
	}
?>
<div class="pop-up"></div>
<div class="Bar" style="height:<?php echo $size; ?>px">
<div id="notify"></div>
<?php	
if($_SERVER['REQUEST_METHOD']='GET'){
		if(isset($_GET['nav'])){
		$nav=$_GET['nav'];
			if($nav=='k'){
				include 'modules/kho/kho.php';
			}elseif ($nav=='ls'){
				include 'modules/lichsu/lichsu.php';
			}elseif ($nav=='tl'){
				include 'modules/thietlap/thietlap.php';
			}else {
				include 'modules/xuat/xuat.php';
			}
			
		}
		else{
			include 'modules/xuat/xuat.php';
		}	
}
else{
	include 'modules/xuat/xuat.php';
}
?>
</div>
<div class="user">
<?php
	if(isset($_SESSION['nameu'])){
		echo $_SESSION['nameu'];
	}
?>
</div>
