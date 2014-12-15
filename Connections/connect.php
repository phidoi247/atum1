<?php 	
	$dbc = mysqli_connect('localhost', 'root', '', 'atum1_db_6') or die ("Die connect:" .mysqli_error($dbc));
	mysqli_query($dbc,"SET NAMES 'utf8'");
?>