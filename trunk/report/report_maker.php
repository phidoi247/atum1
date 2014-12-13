<?php 	
	include '../connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="Text/html; charset=utf-8">
		<title>Tạo báo cáo</title>
		<style type="text/css">
			form td{
				border-width: 0px;
			}
		</style>		
	</head>
	<body>
	<form action="report.php" method="post">
   	 	<fieldset style="width: 500px">
        <legend>Tạo báo cáo</legend>
        	<table>
        		<tr>
        			<td><label>Tên biểu đồ: </label></td>
        			<td><input type="text" name="tenBieuDo" required="required"></td>
        		</tr>
        		<tr>
        			<td><label>Subtitle: </label></td>
        			<td><input type="text" name="subtitle" required="required"></td>
        		</tr>
        		<tr>
        			<td><label>Value Suffix: </label></td>
        			<td><input type="text" name="suffix"></td>
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
        			<td><input type="text" name="maSanPham" required="required" placeholder="Mã sản phẩm ngăn cách bằng dấu ",""></td>
        		</tr>
        		<tr>
        			<td><label>Từ ngày: </label></td>
        			<td><input type="text" name="tuNgay" required="required"></td>
        		</tr>
        		<tr>
        			<td><label>Đến ngày: </label></td>
        			<td><input type="text" name="denNgay" required="required"></td>
        		</tr>
        		<tr><td><input type="submit" name="submit" value="Tạo"></td></tr>
        	</table>
        </fieldset>
    </form>
	</body>
</html>