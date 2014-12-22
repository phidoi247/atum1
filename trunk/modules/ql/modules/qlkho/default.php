<?php 
include '../../Connections/connect.php';
$cnt=1;
$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d where(a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
$q=mysqli_query($dbc,$r);?>
<table>
	<thead>
    <tr><td>Mã SP</td><td>Avatar</td><td>Tên SP</td><td>Danh mục</td><td>Nhà CC</td><td>Đơn vị</td><td>Giá nhập</td><td>Giá bán</td><td>KM</td></tr>
    </thead>
<?php while ($row=mysqli_fetch_array($q)){?>
	<tbody>
    	<tr><td><input type='text' class="ma_sp" id='ma_sp<?php echo $cnt; ?>' value='<?php echo $row['sanpham_id']; ?>' readonly></td><td><img width='30px' height='30px' src='<?php echo $row['avatar']; ?>'></td><td><?php echo $row['ten_sanpham']; ?></td><td><?php echo $row['ten_danhmuc']; ?></td><td><?php echo $row['ten_nhacungcap']; ?></td><td><?php echo $row['ten_donvi']; ?></td><td><?php echo $row['gia_nhap']; ?><td><?php echo $row['gia_ban']; ?></td><td><?php echo $row['giam_gia']; ?></td></td><td><input id='edit-sp-but<?php echo $cnt; ?>' onclick='edit_emp(cnt=<?php echo $cnt; ?>);' value='Sửa' type='button' ><input class='delete-sp-but' id='id_del_but<?php echo $cnt; ?>' onclick='delete_emp(cnt=<?php echo $cnt; ?>);' value='Xóa' type='button' ></td></tr>
       </tbody>	
<?php	$cnt++;
}?>
</table>
