<?php 
include '../Connections/connect.php';
$cnt=1;
$r="SELECT * FROM `tblnhanvien`";
$q=mysql_query($r);
echo"<table><thead><tr><td>Mã NV</td><td>Avatar</td><td>Tên NV</td><td>Level</td><td>Ngày sinh</td><td>Địa chỉ</td><td>Join Day</td><td>Tùy chọn</td></tr></thead>";
while ($row=mysql_fetch_array($q)){
	echo "<tbody><tr><td><input type='text' id='ma_nv".$cnt."' value='".$row['nhanvien_id']."' readonly></td><td><img width='30px' height='30px' src='".$row['avatar']."'></td><td>".$row['ten_nhanvien']."</td><td>".$row['level_id']."</td><td>".$row['ngay_sinh']."</td><td>".$row['dia_chi']."</td><td>".$row['ngay_vao_lam']."</td><td><input class='edit-emp-but' value='Sửa' type='button' ><input class='delete-emp-but' id='id_del_but".$cnt."' onclick='delete_emp(cnt=".$cnt.");' value='Sa thải' type='button' ></td></tr></thead>";	
	$cnt++;
}
echo "</table>";
?>
