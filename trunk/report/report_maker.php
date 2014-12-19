<?php 	
	include '../Connections/connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="Text/html; charset=utf-8">
		<title>Tạo báo cáo</title>
		<link rel="stylesheet" type="text/css" href="../CSS/StyleMain.css">
        <script src="../js/jquery-2-1-1.js"></script>
        <script src="../js/jquery.simplemodal.js"></script>
        <script src="../js/basic.js"></script>
		<style type="text/css">
			form td{
				border-width: 0px;
			}
		</style>		
	</head>	
	<form action="doanh_so.php" method="post" target="_blank">
   	 	<fieldset style="width: 500px">
        <legend>Tạo báo cáo doanh số sản phẩm</legend>
        	<table>
        		<tr>
        			<td><label>Tên báo cáo: </label></td>
        			<td><input type="text" name="tenBaoCao" required></td>
        		</tr>
        		<tr>
        			<td><label>Tên biểu đồ: </label></td>
        			<td><input type="text" name="tenBieuDo" required></td>
        		</tr>
        		<tr>
        			<td><label>Subtitle: </label></td>
        			<td><input type="text" name="subtitle" required></td>
        		</tr>        		
        		<tr>
        			<td><label>yAxis title: </label></td>
        			<td><input type="text" name="yaxis"></td>
        		</tr>
        		<tr>
        			<td><label>xAxis title: </label></td>
        			<td><input type="text" name="xaxis"></td>
        		</tr>
        		<tr>
        			<td><label>Mã sản phẩm: </label></td>
        			<td><input type="text" name="maSanPham" required placeholder="Mã sản phẩm ngăn cách bằng dấu ",""></td>
        		</tr>
        		<tr>
        			<td><label>Từ ngày: </label></td>
        			<td><input type="text" name="tuNgay" required></td>
        		</tr>
        		<tr>
        			<td><label>Đến ngày: </label></td>
        			<td><input type="text" name="denNgay" required></td>
        		</tr>
        		<tr><td><input type="submit" name="submit" value="Tạo"></td></tr>
        	</table>
        </fieldset>
    </form>
       
    <form action="doanh_thu.php" method="post" target="_blank">
   	 	<fieldset style="width: 500px">
        <legend>Tạo báo cáo doanh thu sản phẩm</legend>
        	<table>
        		<tr>
        			<td><label>Tên báo cáo: </label></td>
        			<td><input type="text" name="tenBaoCao" required></td>
        		</tr>
        		<tr>
        			<td><label>Tên biểu đồ: </label></td>
        			<td><input type="text" name="tenBieuDo" required></td>
        		</tr>
        		<tr>
        			<td><label>Subtitle: </label></td>
        			<td><input type="text" name="subtitle" required></td>
        		</tr>        		
        		<tr>
        			<td><label>xAxis title: </label></td>
        			<td><input type="text" name="xaxis"></td>
        		</tr>        		   		
        		<tr>
        			<td><label>Từ ngày: </label></td>
        			<td><input type="text" name="tuNgay" required></td>
        		</tr>
        		<tr>
        			<td><label>Đến ngày: </label></td>
        			<td><input type="text" name="denNgay" required></td>
        		</tr>
        		<tr><td><input type="submit" name="submit" value="Tạo"></td></tr>
        	</table>
        </fieldset>
    </form>
    
    <form action="thu_chi.php" method="post" target="_blank">
   	 	<fieldset style="width: 500px">
        <legend>Tạo báo cáo thu chi cửa hàng</legend>
        	<table>
        		<tr>
        			<td><label>Tên báo cáo: </label></td>
        			<td><input type="text" name="tenBaoCao" required></td>
        		</tr>
        		<tr>
        			<td><label>Tên biểu đồ: </label></td>
        			<td><input type="text" name="tenBieuDo" required></td>
        		</tr>
        		<tr>
        			<td><label>Subtitle: </label></td>
        			<td><input type="text" name="subtitle" required></td>
        		</tr>        		
        		<tr>
        			<td><label>yAxis title: </label></td>
        			<td><input type="text" name="yaxis"></td>
        		</tr>        		   		
        		<tr>
        			<td><label>Từ ngày: </label></td>
        			<td><input type="text" name="tuNgay" required></td>
        		</tr>
        		<tr>
        			<td><label>Đến ngày: </label></td>
        			<td><input type="text" name="denNgay" required></td>
        		</tr>
        		<tr><td><input type="submit" name="submit" value="Tạo"></td></tr>
        	</table>
        </fieldset>
    </form>
	</body>
</html>