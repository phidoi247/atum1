<?php
	if(isset($_GET['nav']) and $_GET['nav']=='k'){
		if(isset($_GET['sub']) and $_GET['sub']=='ncc'){
			include('ncc.php');
		}elseif(isset($_GET['sub']) and $_GET['sub']=='dv'){
			include('donvi.php');
		}else{
			include('sp.php');
		}
	}else{}
?>