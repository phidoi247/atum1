<?php 	
	include '../Connections/connect.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="Text/html; charset=utf-8">
		<title>Báo cáo</title>
		<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="../js/highcharts.js"></script>
		<script type="text/javascript" src="../js/themes/dark-unica.js"></script>
		<script type="text/javascript" src="../js/modules/exporting.js"></script>
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
			
			/*echo "<pre>";
			print_r($name);
			echo "</pre>";*/
			
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
			$qdata[$i] = " SELECT tblhoadon.ngay,sum(tblbanhang.soluong)as soluong ";
			$qdata[$i] .= " FROM tblhoadon JOIN tblbanhang ";
			$qdata[$i] .= " ON tblhoadon.ten_hoadon = tblbanhang.ten_hoadon ";
			$qdata[$i] .= " JOIN tblsanpham ON tblsanpham.sanpham_id = tblbanhang.sanpham_id ";
			$qdata[$i] .= "	WHERE tblhoadon.ngay BETWEEN "."'" .$tungay ."'"." AND "."'".$denngay ."'"." AND tblsanpham.sanpham_id IN (" ."'".$masp[$i]."'".")";
			$qdata[$i] .= " GROUP BY tblhoadon.ngay ";
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
		
		/*echo "<pre>";
		print_r($dates);
		echo "</pre>";
		
		echo "<pre>";
		print_r($thoigian);
		echo "</pre>";
		
		
		echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		
		?>
		<script type="text/javascript">//biểu đồ
		$(function () {
		    $('#container').highcharts({
		        title: {
		            text: <?php echo "'"."$tenbieudo"."'"; ?>,
		            x: -20 //center
		        },
		        subtitle: {
		            text: <?php echo "'"."$subtitle"."'"; ?>,
		            x: -20
		        },
		        xAxis: {
			        title: {
						text: <?php echo "'"."$xaxis"."'"; ?>,
						x: -20
				        },
		            categories: [<?php $dates = dateRange($tungay, $denngay);
		        			foreach ($dates as $date){
		        				echo "'"."$date"."'".","; }; ?>]
		        },
		        yAxis: {
		            title: {
		                text: <?php echo "'"."$yaxis"."'"; ?>,
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
		<!--  <div id="header">
       	  <div id="headerleft"><p>Nhà sách Trí Tuệ<br>
       	  Địa chỉ: 76 Ngọc Lâm - Long Biên - Hà Nội<br>
       	  Tel: 043 877 8357</p>
       	  </div>
          <div id="headerright"><img src="../images/Logo.jpg" width="350px" height="200px"></div>
        </div>
		<div id="title"><h3><p><?php //echo "$tenbaocao";?></p></h3><p><?php //echo "Từ ngày: "."$tungay"." đến ngày: "."$denngay";?></p></div>		
		<div id="container"></div>
		<div id="footer">
			
		</div>-->
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
					<?php 
						for($i=0;$i<count($masp);$i++){
							echo "<strong>Sản phẩm ".$name[$i]."</strong>".", <br />";
							for($j=0;$j<count($dates);$j++){
								if($j<(count($dates)-1)){								
									echo " trong ngày ".$dates[$j]." bán được ".$data[$i][$j]." $donvi[$i]".", ";
								}else{
									echo " trong ngày ".$dates[$j]." bán được ".$data[$i][$j]." $donvi[$i]"."<br /> ";									
								};
							};
						};
					?>
					</p>
					<p>
						<strong>Biểu đồ:</strong>
					</p>
				</td>
			</tr>
			<tr>
				<td colspan= "3">					
					<div id="container" style="width: 1000px; height: 400px; margin: 0 auto"></div>
				</td>
			</tr>			
		</table>
	</body>
</html>