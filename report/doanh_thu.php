<?php 	
	include '../connect.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="Text/html; charset=utf-8">
		<title>Báo cáo</title>
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		<script type="text/javascript" src="js/highcharts-3d.js"></script>
		<script type="text/javascript" src="js/themes/dark-unica.js"></script>
		<script type="text/javascript" src="js/modules/exporting.js"></script>
		<link rel="stylesheet" type="text/css" href="../CSS/report.css">
	</head>
	<body>
		<?php 
			//khai báo biến
			$tungay = date('Y-m-d',strtotime($_POST['tuNgay']));
			$denngay = date('Y-m-d',strtotime($_POST['denNgay']));
			$yaxis = $_POST['yaxis'];
			$xaxis = $_POST['xaxis'];
			$tenbieudo = $_POST['tenBieuDo'];
			$tenbaocao = $_POST['tenBaoCao'];
			$subtitle = $_POST['subtitle'];			
			$masp = explode(',',$_POST['maSanPham']);
			$dates = dateRange($tungay, $denngay);
											
			//lấy phần name trong series
			$qname = " SELECT tblsanpham.ten_sanpham,tblbanhang.soluong,tbldonvi.ten_donvi ";
			$qname .= " FROM tblhoadon JOIN tblbanhang ";
			$qname .= " ON tblhoadon.ten_hoadon = tblbanhang.ten_hoadon	JOIN tblsanpham ";
			$qname .= " ON tblsanpham.sanpham_id = tblbanhang.sanpham_id JOIN tbldonvi ";
			$qname .= " ON tbldonvi.donvi_id = tblsanpham.donvi_id ";
			$qname .= "	WHERE tblhoadon.ngay BETWEEN "."'" .$tungay ."'"." AND "."'".$denngay ."'"." AND tblsanpham.sanpham_id IN ( ";
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
				
			while($tensp = mysqli_fetch_array($r, MYSQLI_ASSOC)){
				$name[] = $tensp['ten_sanpham'];
				$donvi[] = $tensp['ten_donvi'];
			};//kết thúc
			
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
			
		
		?>
		<script type="text/javascript">//biểu đồ
		$(function () {
		    $('#container').highcharts({
		        chart: {
		            type: 'column',
		            margin: 75,
		            options3d: {
		                enabled: true,
		                alpha: 10,
		                beta: 25,
		                depth: 70
		            }
		        },
		        title: {
		            text: <?php echo "'"."$tenbieudo"."'"; ?>,
				    x: -20
		        },
		        subtitle: {
		        	text: <?php echo "'"."$subtitle"."'"; ?>,
				    x: -20
		        },
		        plotOptions: {
		            column: {
		                depth: 25
		            }
		        },
		        xAxis: {
			        title :{
						text: <?php echo "'"."$xaxis"."'"; ?>,
						x: -20
				        },
		            categories: [<?php $dates = dateRange($tungay, $denngay);
        			foreach ($dates as $date){
        				echo "'"."$date"."'".","; }; ?>]
		        },
		        yAxis: {		        	
		            opposite: true
		        },
		        series: [{
		            name: <?php echo "'"."$yaxis"."'"; ?>,
		            data: [2, 3, null, 4, 0, 5, 1, 4, 6, 3]
		        }]
		    });
		});
		</script>		
		<table style="width: 1000px; height: auto; margin: 0 auto">
			<tr>
				<td style="width: 300px">
					<div id="headerleft"><p><strong>Nhà sách Trí Tuệ</strong><br>
       	  				Địa chỉ: 76 Ngọc Lâm - Long Biên - Hà Nội<br>
       	  				Tel: 043 877 8357</p>
       	  			</div>	
				</td>
				<td style="width: 300px">
				</td>
				<td>
					<div id="headerright"><img src="../images/Logo.jpg" width="350px" height="200px"></div>
				</td>				
			</tr>
			<tr>
				<td colspan= "3">
					<div id="title"><center><h2><p><?php echo "$tenbaocao";?></p></h2><p><?php echo "Từ ngày: "."$tungay"." đến ngày: "."$denngay";?></p></center></div>
				</td>
			</tr>
			<tr>
				<td colspan = "3">
					<p>
					
					</p>
					<p>
						<strong>Biểu đồ:</strong>
					</p>
				</td>
			</tr>
			<tr>
				<td colspan= "3">					
					<div id="container" style="height: 400px; min-width: 310px; max-width: 800px;margin: 0 auto;"></div>
				</td>
			</tr>			
		</table>
	</body>
</html>