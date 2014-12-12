<?php 	
	$dbc = mysqli_connect('localhost', 'root', '', 'atum1_db_6') or die ("Die connect:" .mysqli_error($dbc));	
	mysqli_query($dbc,"SET NAMES 'utf8'");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="Text/html; charset=utf-8">
		<title>Báo cáo</title>
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		<script type="text/javascript" src="js/themes/dark-unica.js"></script>
		<script type="text/javascript" src="js/modules/exporting.js"></script>
	</head>
	<body>
		<?php 
			//khai báo biến
			$tungay = date('Y-m-d',strtotime($_POST['tuNgay']));
			$denngay = date('Y-m-d',strtotime($_POST['denNgay']));
			$ten = $_POST['tenBieuDo'];
			$subtitle = $_POST['subtitle'];
			$suffix = $_POST['suffix'];
			$masp = explode(',',$_POST['maSanPham']);
			$dates = dateRange($tungay, $denngay);
											
			//lấy phần name trong series
			$qname = " SELECT tblsanpham.ten_sanpham,tblbanhang.soluong ";
			$qname .= " FROM tblhoadon JOIN tblbanhang ";
			$qname .= " ON tblhoadon.ten_hoadon = tblbanhang.ten_hoadon	JOIN tblsanpham ";
			$qname .= " ON tblsanpham.sanpham_id = tblbanhang.sanpham_id ";
			$qname .= "	WHERE tblhoadon.thoi_gian BETWEEN "."'" .$tungay ."'"." AND "."'".$denngay ."'"." AND tblsanpham.sanpham_id IN ( ";
			for($i=0;$i<count($masp);$i++){//bo dau phay o cuoi cung
				if($i<count($masp)-1){
					$qname .= "'"."$masp[$i]"."'".",";
				}else {
					$qname .= "'"."$masp[$i]"."'";
				};
			};
			$qname .= " ) ";
			$qname .= " GROUP BY tblsanpham.ten_sanpham ";
			$qname .= " ORDER BY tblsanpham.sanpham_id ASC; ";
			$r = mysqli_query($dbc, $qname) or die ("Query $qname <br /> mysql error: ".mysqli_errno($dbc));
				
			while($ten = mysqli_fetch_array($r, MYSQLI_ASSOC)){
				$name[] = $ten['ten_sanpham'];
			};//kết thúc
			
			echo "<pre>";
			print_r($name);
			echo "</pre>";
			
			//hàm date range				
			function dateRange( $first, $last, $step = '+1 day', $format = 'd-m-Y' ) {//ham tạo range ngày có định dạng đầu ra		
				$dates = array();
				$current = strtotime( $first );
				$last = strtotime( $last );		
				while( $current <= $last ) {		
					$dates[] = date( $format, $current );
					$current = strtotime( $step, $current );
				}		
			return $dates;			
		}//kết thúc		
		
		//lấy data
		for($i=0;$i<count($masp);$i++){
			$qdata[$i] = " SELECT tblhoadon.thoi_gian,sum(tblbanhang.soluong)as soluong ";
			$qdata[$i] .= " FROM tblhoadon JOIN tblbanhang ";
			$qdata[$i] .= " ON tblhoadon.ten_hoadon = tblbanhang.ten_hoadon ";
			$qdata[$i] .= " JOIN tblsanpham ON tblsanpham.sanpham_id = tblbanhang.sanpham_id ";
			$qdata[$i] .= "	WHERE tblsanpham.sanpham_id IN (" ."'".$masp[$i]."'".")";
			$qdata[$i] .= " GROUP BY tblhoadon.thoi_gian ";
			$r = mysqli_query($dbc, $qdata[$i]);
			
			while($dulieu = mysqli_fetch_array($r, MYSQLI_ASSOC)){
				$thoigian[$i][] = $dulieu['thoi_gian'];
				$data[$i][] = $dulieu['soluong'];  
			};			
		};
		for($i=0;$i<count($masp);$i++){
		echo "<pre>";
		print_r($qdata);
		echo "<pre>";};
		//ép kiểu
		for($i=0;$i<count($masp);$i++){
			for($j=0;$j<count($thoigian[$i]);$j++){
				$thoigian[$i][$j]=date('d-m-Y',strtotime($thoigian[$i][$j]));
			};
		};
		
		/*for($i=0;$i<count($masp);$i++){
			for($j=0;$j<count($thoigian[$i]);$j++){
				for($k=0;$k<count($dates);$k++){
					if($thoigian[$i][$j] != $dates[$k]){
						array_splice($thoigian[$i], $k, 0, 0);
						array_splice($data[$i], $k, 0, 0);
					};
				};
			};
		};*/
		for($i=0;$i<count($masp);$i++){
		echo "<pre>";
		print_r($thoigian[$i]);
		echo "</pre>";};
		
		for($i=0;$i<count($masp);$i++){
		echo "<pre>";
		print_r($data[$i]);
		echo "</pre>";};
		
		?>
		<script type="text/javascript">//biểu đồ
		$(function () {
		    $('#container').highcharts({
		        title: {
		            text: <?php echo "'"."$ten"."'"; ?>,
		            x: -20 //center
		        },
		        subtitle: {
		            text: <?php echo "'"."$subtitle"."'"; ?>,
		            x: -20
		        },
		        xAxis: {
		            categories: [<?php $dates = dateRange($tungay, $denngay);
		        			foreach ($dates as $date){
		        				echo "'"."$date"."'".","; }; ?>]
		        },
		        yAxis: {
		            title: {
		                text: <?php echo "'"."$suffix"."'"; ?>,
		            },
		            plotLines: [{
		                value: 0,
		                width: 1,
		                color: '#808080'
		            }]
		        },
		        tooltip: {
		            valueSuffix: '°C'
		        },
		        legend: {
		            layout: 'vertical',
		            align: 'right',
		            verticalAlign: 'middle',
		            borderWidth: 0
		        },
		        series: [{
		            name: 'Tokyo',
		            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		        }, {
		            name: 'New York',
		            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
		        }, {
		            name: 'Berlin',
		            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
		        }, {
		            name: 'London',
		            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
		        }]
		    });
		});
		</script>
		<div id="container" style="width: 100%; height: 500px; margin: 0 auto"></div>
	</body>
</html>