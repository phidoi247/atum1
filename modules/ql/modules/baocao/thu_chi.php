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
			$dates = dateRange($tungay, $denngay);
			$db_ngay = db_ngay($dbc);			
			$checkngay = 0;
			
			if(in_array($tungay,$db_ngay) && in_array($denngay,$db_ngay)){
				$checkngay++;
			};

			if($checkngay>0){
				for($i=0;$i<count($dates);$i++){
					$qthu[$i] = " SELECT SUM(tblchitietdonhang.soluong * tblsanpham.gia_ban) AS ban FROM tblchitietdonhang JOIN tblhoadon ON tblchitietdonhang.ten_hoadon = tblhoadon.ten_hoadon
						JOIN tblsanpham ON tblchitietdonhang.sanpham_id = tblsanpham.sanpham_id WHERE tblchitietdonhang.loaigiaodich_id = 1 AND left(tblhoadon.thoigian,10) = '".$dates[$i]."' ";
					$qchi[$i] = " SELECT SUM(tblchitietdonhang.soluong * tblsanpham.gia_nhap) AS nhap FROM tblchitietdonhang JOIN tblhoadon
							ON tblchitietdonhang.ten_hoadon = tblhoadon.ten_hoadon JOIN tblsanpham ON tblchitietdonhang.sanpham_id = tblsanpham.sanpham_id WHERE tblchitietdonhang.loaigiaodich_id = 2 AND left(tblhoadon.thoigian,10) = '".$dates[$i]."' ";
					$rban = mysqli_query($dbc, $qthu[$i]) or die ("Query $qthu[$i] <br /> mysql error: ".mysqli_errno($dbc));
					$rnhap = mysqli_query($dbc, $qchi[$i]) or die ("Query $qchi[$i] <br /> mysql error: ".mysqli_errno($dbc));
					while($dulieu = mysqli_fetch_array($rban, MYSQLI_ASSOC)){
						$datathu[$i] = $dulieu['ban'];
					};
					while($dulieu = mysqli_fetch_array($rnhap, MYSQLI_ASSOC)){
						$datachi[$i] = $dulieu['nhap'];
					};
					if($datathu[$i]==NULL){
						$datathu[$i] = 0;
					}else if($datachi[$i]==NULL){
						$datachi[$i] = 0;
					};				
				};		
			}else{
			header('Location: ../../../../error/error.php');
		};
		?>
		<script type="text/javascript">//biểu đồ
		$(function () {
		    $('#container').highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: "Biểu đồ nhập xuất",
				    x: -20
		        },
		        subtitle: {
		            text: "Từ ngày <?php echo " $tungayht đến ngày $denngayht";?>",
				    x: -20
		        },
		        xAxis: {
		            categories: [<?php $ngayhienthi = dateRange2($tungay, $denngay);
		                 			foreach ($ngayhienthi as $date){
        								echo "'"."$date"."'".","; 
		                 			}; 
        						?>]	
		        },
		        yAxis: {
		            min: 0,
		            title: {
		                text: 'VNĐ'
		            }
		        },
		        tooltip: {		            
		            shared: true,
		            useHTML: true
		        },
		        plotOptions: {
		            column: {
		                pointPadding: 0.2,
		                borderWidth: 0
		            }
		        },
		        series: [{
		            name: 'Xuất',
		            data: [<?php 
		            			for($i=0;$i<count($dates);$i++){
		            				echo $datathu[$i].",";
		            			};		            			
		            		?>]

		        }, {
		            name: 'Nhập',
		            data: [<?php 
	            			for($i=0;$i<count($dates);$i++){
	            				echo $datachi[$i].",";
	            			};		            			
	            		?>]

		        }]
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
			<div id="title"><center><h2><p>Báo cáo nhập xuất hàng</p></h2><p><?php echo "Từ ngày: "."$tungayht"." đến ngày: "."$denngayht";?></p></center></div>								
			<div id="container" style="height: 400px; min-width: 310px; max-width: 1000px;margin: 0 auto;padding-bottom:15px;"></div>
            <footer>
				Copyright &copy; by ATUM Corporation.
			</footer>			
	</body>
</html>