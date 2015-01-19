<?php 	
	include '../../../../Connections/connect.php';
	include '../../../../functions/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="Text/html; charset=utf-8">
		<title>Báo cáo</title>
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		<script type="text/javascript" src="js/themes/dark-unica.js"></script>
		<script type="text/javascript" src="js/modules/exporting.js"></script>
        <link rel="stylesheet" type="text/css" href="../../../../CSS/report.css">
	</head>
	<body>		
		<?php 	
			
			//khai báo biến
			$tungay = strip_tags(date('Y-m-d',strtotime($_POST['tuNgay'])));
			$denngay = strip_tags(date('Y-m-d',strtotime($_POST['denNgay'])));
			$tungayht = date('d-m-Y',strtotime($_POST['tuNgay']));
			$denngayht = date('d-m-Y',strtotime($_POST['denNgay']));
			$masp = explode(',',$_POST['maSanPham']);
			$dates = dateRange2($tungay, $denngay);
			$db_masp = db_masp($dbc);
			$db_ngay = db_ngay($dbc);
			$checksp = 0;
			$checkngay = 0;
			
			//kiểm tra mã sản phẩm và ngày có tồn tại trong db không 
			for($i=0;$i<count($masp);$i++){
				if(in_array($masp[$i],$db_masp)){
					$checksp++;
				};
			};

			if(in_array($tungay,$db_ngay) && in_array($denngay,$db_ngay)){
				$checkngay++;
			};			
			//kết thúc kiểm tra
			
			if($checksp=count($masp) && $checkngay>0){
				//lấy phần name trong series
				$qname = " SELECT tblsanpham.ten_sanpham,tblchitietdonhang.soluong,tbldonvi.ten_donvi ";
				$qname .= " FROM tblhoadon JOIN tblchitietdonhang ";
				$qname .= " ON tblhoadon.ten_hoadon = tblchitietdonhang.ten_hoadon	JOIN tblsanpham ";
				$qname .= " ON tblsanpham.sanpham_id = tblchitietdonhang.sanpham_id JOIN tbldonvi ";
				$qname .= " ON tbldonvi.donvi_id = tblsanpham.donvi_id ";
				$qname .= "	WHERE tblchitietdonhang.loaigiaodich_id = 1 AND left(tblhoadon.thoigian,10) BETWEEN "."'" .$tungay ."'"." AND "."'".$denngay ."'"." AND tblsanpham.sanpham_id IN ( ";
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
			
			//lấy data
			for($i=0;$i<count($masp);$i++){
				$qdata[$i] = " SELECT left(tblhoadon.thoigian,10) as ngay,sum(tblchitietdonhang.soluong)as soluong ";
				$qdata[$i] .= " FROM tblhoadon JOIN tblchitietdonhang ";
				$qdata[$i] .= " ON tblhoadon.ten_hoadon = tblchitietdonhang.ten_hoadon ";
				$qdata[$i] .= " JOIN tblsanpham ON tblsanpham.sanpham_id = tblchitietdonhang.sanpham_id ";
				$qdata[$i] .= "	WHERE tblchitietdonhang.loaigiaodich_id = 1 AND left(tblhoadon.thoigian,10) BETWEEN "."'" .$tungay ."'"." AND "."'".$denngay ."'"." AND tblsanpham.sanpham_id IN (" ."'".$masp[$i]."'".")";
				$qdata[$i] .= " GROUP BY ngay ";
				$qdata[$i] .= " ORDER BY tblsanpham.sanpham_id ASC; ";
				$r = mysqli_query($dbc, $qdata[$i]);
				
				while($dulieu = mysqli_fetch_array($r, MYSQLI_ASSOC)){
					$thoigian[$i][] = $dulieu['ngay'];
					$data[$i][] = $dulieu['soluong'];  
				};			
			};
			
			//ép kiểu
			for($i=0;$i<count($masp);$i++){
				for($j=0;$j<count($thoigian[$i]);$j++){
					$thoigian[$i][$j]=date('d-m-Y',strtotime($thoigian[$i][$j]));
				};
			};
			
			//sửa data cho đúng ngày, ngày nào không có thì data là 0 
			for($i=0;$i<count($masp);$i++){
				for($j=0;$j<count($dates);$j++){
					if(!in_array($dates[$j],$thoigian[$i])){
						array_splice($thoigian[$i],$j,0,0);
						array_splice($data[$i],$j,0,0);
					};
				};
			}; 		
		}else{
			header('Location: ../../../../error/error.php');
		};
		
		?>
		<script type="text/javascript">//biểu đồ
		$(function () {
		    $('#container').highcharts({
		        title: {
		            text: "Biểu đồ doanh số",
		            x: -20 //center
		        },
		        subtitle: {
		            text: "Từ ngày <?php echo " $tungayht đến ngày $denngayht";?>",
		            x: -20
		        },
		        xAxis: {
			        title: {
						text: "Khoảng thời gian",
						x: -20
				        },
		            categories: [<?php $dates = dateRange2($tungay, $denngay);
		        			foreach ($dates as $date){
		        				echo "'"."$date"."'".","; }; ?>]
		        },
		        yAxis: {
		            title: {
		                text: "Đơn vị",
		            },
		            plotLines: [{
		                value: 0,
		                width: 1,
		                color: '#808080'
		            }]
		        },
		        tooltip: {
		            valueSuffix:''
		        },
		        legend: {
		            layout: 'vertical',
		            align: 'right',
		            verticalAlign: 'middle',
		            borderWidth: 0
		        },
		        series: [<?php 
		        	for($i=0;$i<count($masp);$i++){
		        		$data1[$i] = implode(",",$data[$i]);
		        		echo "{name: "."'".$name[$i]."'".","."data: "."[".$data1[$i]."]"."},";
		        	};
		        ?>]
		    });
		});
		</script>
            <div class="swapper">
            <!--Begin Header-->
            <header>
            <div class="logo"></div>
            <div class="banner"><img alt="Banner" src="../../../../sourse/banner.jpg"></div>
            </header>
            </div>
            <!--End Header-->           
			<div id="title"><center><h2><p>Báo cáo doanh số bán hàng</p></h2><p><?php echo "Từ ngày: "."$tungayht"." đến ngày: "."$denngayht";?></p></center></div>						
			<div id="container" style="width: 1000px; height: 400px; margin: 0 auto; padding-bottom:15px;"></div>
			<footer>
				Copyright &copy; by ATUM Corporation.
			</footer>	
	</body>
</html>