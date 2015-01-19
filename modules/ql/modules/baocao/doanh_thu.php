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
		<script type="text/javascript" src="js/highcharts-3d.js"></script>
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
					$qban[$i] = " SELECT SUM(tblchitietdonhang.soluong * tblsanpham.gia_ban) AS ban FROM tblchitietdonhang JOIN tblhoadon ON tblchitietdonhang.ten_hoadon = tblhoadon.ten_hoadon 
						JOIN tblsanpham ON tblchitietdonhang.sanpham_id = tblsanpham.sanpham_id WHERE tblchitietdonhang.loaigiaodich_id = 1 AND left(tblhoadon.thoigian,10) = '".$dates[$i]."' ";
					$qnhap[$i] = " SELECT SUM(tblchitietdonhang.soluong * tblsanpham.gia_nhap) AS nhap FROM tblchitietdonhang JOIN tblhoadon 
							ON tblchitietdonhang.ten_hoadon = tblhoadon.ten_hoadon JOIN tblsanpham ON tblchitietdonhang.sanpham_id = tblsanpham.sanpham_id WHERE tblchitietdonhang.loaigiaodich_id = 2 AND left(tblhoadon.thoigian,10) = '".$dates[$i]."' "; 
					$rban = mysqli_query($dbc, $qban[$i]) or die ("Query $qban[$i] <br /> mysql error: ".mysqli_errno($dbc));
					$rnhap = mysqli_query($dbc, $qnhap[$i]) or die ("Query $qnhap[$i] <br /> mysql error: ".mysqli_errno($dbc));
					while($dulieu = mysqli_fetch_array($rban, MYSQLI_ASSOC)){
						$databan[$i] = $dulieu['ban'];
						};
					while($dulieu = mysqli_fetch_array($rnhap, MYSQLI_ASSOC)){
							$datanhap[$i] = $dulieu['nhap'];
						};
					if($databan[$i]==NULL){
						$databan[$i] = 0;
						}else if($datanhap[$i]==NULL){
							$datanhap[$i] = 0;
						};
					$loinhuan[$i] = $databan[$i]-$datanhap[$i];
					};		
			}else{
			header('Location: ../../../../error/error.php');
		};
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
		            text: "Biểu đồ doanh thu",
				    x: -20
		        },
		        subtitle: {
		        	text: "Từ ngày <?php echo " $tungayht đến ngày $denngayht";?>",
				    x: -20
		        },
		        plotOptions: {
		            column: {
		                depth: 25
		            }
		        },
		        xAxis: {			        
		        	categories: [<?php $ngayhienthi = dateRange2($tungay, $denngay);
        								foreach ($ngayhienthi as $date){
        									echo "'"."$date"."'".","; 
        								}; 
        				?>]
		        },
		        yAxis: {		        	
		            opposite: true
		        },
		        series: [{
		            name: "Doanh thu",
		            data: [<?php for($i=0;$i<count($dates);$i++){
							echo $loinhuan[$i].","; }; ?>]
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
					<div id="title"><center><h2><p>Báo cáo doanh thu cửa hàng</p></h2><p><?php echo "Từ ngày: "."$tungayht"." đến ngày: "."$denngayht";?></p></center></div>
			<div id="container" style="height: 400px; min-width: 310px; max-width: 1000px;margin: 0 auto;padding-bottom:15px;"></div>
            <footer>
				Copyright &copy; by ATUM Corporation.
			</footer>				
	</body>
</html>