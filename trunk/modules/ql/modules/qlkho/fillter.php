<?php
	if(isset($_GET['nav']) and $_GET['nav']=='k'){
		if(isset($_GET['sub']) and $_GET['sub']=='ncc'){
			include('fil_ncc.php');
		}elseif(isset($_GET['sub']) and $_GET['sub']=='dv'){
			include('fil_dv.php');
		}else{
			include('fil_sp.php');
		}
	}else{}
?>