﻿<?php
	
		//hàm date range				
		function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) {//năm tháng ngày	
			$dates = array();
			$current = strtotime( $first );
			$last = strtotime( $last );		
			while( $current <= $last ) {		
				$dates[] = date( $format, $current );
				$current = strtotime( $step, $current );
			}		
		return $dates;			
	};//kết thúc		


//hàm date range2
	function dateRange2( $first, $last, $step = '+1 day', $format = 'd-m-Y' ) {//ngày tháng năm
		$dates = array();
		$current = strtotime( $first );
		$last = strtotime( $last );
		while( $current <= $last ) {
			$dates[] = date( $format, $current );
			$current = strtotime( $step, $current );
		}
		return $dates;
	};//kết thúc
	
	function db_masp($dbc){
		$db_masp = array();
		$q = ' SELECT sanpham_id FROM tblsanpham ';
		$r =mysqli_query($dbc, $q) or die ("Query $q <br /> mysql error: ".mysqli_errno($dbc));
		while($dulieu = mysqli_fetch_array($r, MYSQLI_ASSOC)){
			$db_masp[] = $dulieu['sanpham_id'];
		}
		return $db_masp;
	};
	
	function db_ngay($dbc){
		$db_ngay = array();
		$q = ' SELECT left(thoigian,10)as time FROM tblhoadon GROUP BY time ';
		$r =mysqli_query($dbc, $q) or die ("Query $q <br /> mysql error: ".mysqli_errno($dbc));
		while($dulieu = mysqli_fetch_array($r, MYSQLI_ASSOC)){
			$db_ngay[] = $dulieu['time'];
		}
		return $db_ngay;
	};
?>
