<?php
	include '../../../Connections/config.php';
		if (isset($_POST['name'])){
			$error=array();
			
			if(empty($error)){
				echo "Ok";
			}else {
				echo "Not Ok";
			}
		}
?>