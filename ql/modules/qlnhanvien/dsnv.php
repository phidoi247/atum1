<?php 
include '../Connections/connect.php';
$cnt=1;
$r="SELECT * FROM `tblnhanvien`";
$q=mysqli_query($dbc,$r);?>
<table>
	<thead>
    <tr><td>Mã NV</td><td>Avatar</td><td>Tên NV</td><td>Level</td><td>Ngày sinh</td><td>Địa chỉ</td><td>Join Day</td><td>Tùy chọn</td></tr>
    </thead>
<?php while ($row=mysqli_fetch_array($q)){?>
	<tbody>
    	<tr><td><input type='text' id='ma_nv<?php echo $cnt; ?>' value='<?php echo $row['nhanvien_id']; ?>' readonly></td><td><img width='30px' height='30px' src='<?php echo $row['avatar']; ?>'></td><td><?php echo $row['ten_nhanvien']; ?></td><td><?php echo $row['level_id']; ?></td><td><?php echo $row['ngay_sinh']; ?></td><td><?php echo $row['dia_chi']; ?></td><td><?php echo $row['ngay_vao_lam']; ?></td><td><input id='edit-emp-but<?php echo $cnt; ?>' onclick='edit_emp(cnt=<?php echo $cnt; ?>);' value='Sửa' type='button' ><input class='delete-emp-but' id='id_del_but<?php echo $cnt; ?>' onclick='delete_emp(cnt=<?php echo $cnt; ?>);' value='Sa thải' type='button' ></td></tr>
       </tbody>	
<?php	$cnt++;
}?>
</table>
