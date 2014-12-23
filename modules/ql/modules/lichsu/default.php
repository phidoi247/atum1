<?php 
include '../../Connections/connect.php';
$cnt=1;
$r="SELECT k.ten_hoadon,j.soluong,k.thanhtien,k.ngay,k.nhanvien_id FROM (select tblnhaphang.ten_hoadon,sum(tblnhaphang.soluong) as soluong from tblnhaphang group by tblnhaphang.ten_hoadon) as j, (select a.ten_hoadon,a.ngay,a.nhanvien_id,sum(c.gia_nhap*b.soluong) as thanhtien from tblhoadon as a,tblnhaphang as b,tblsanpham as c where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id group by a.ten_hoadon,a.ngay,a.nhanvien_id ) as k where j.ten_hoadon=k.ten_hoadon  limit 1,10 ";
$q=mysqli_query($dbc,$r);?>
<table>
	<thead>
    <tr><td>Tên Hóa Đơn</td><td>Số lượng</td><td>Giá trị</td><td>Thời gian</td><td>Nhân viên GD</td><td>Tùy chọn</td></tr>
    </thead>
<?php while ($row=mysqli_fetch_array($q)){?>
	<tbody>
    	<tr><td><input type='text' class="ma_ls" id='ma_sp<?php echo $cnt; ?>' value='<?php echo $row['ten_hoadon']; ?>' readonly></td><td><?php echo $row['soluong']; ?></td><td><?php echo $row['thanhtien']; ?></td><td><?php echo $row['ngay']; ?></td><td><?php echo $row['nhanvien_id']; ?></td><td><input id='edit-sp-but<?php echo $cnt; ?>' onclick='edit_emp(cnt=<?php echo $cnt; ?>);' value='Chi tiết' type='button' ></td></tr>
       </tbody>	
<?php	$cnt++;
}?>
</table>
