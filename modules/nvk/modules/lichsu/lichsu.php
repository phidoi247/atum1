<?php 
$cnt=1;
$r="SELECT k.ten_hoadon,j.soluong,k.thanhtien,k.ngay,k.nhanvien_id FROM (select tblchitietdonhang.ten_hoadon,sum(tblchitietdonhang.soluong) as soluong from tblchitietdonhang where tblchitietdonhang.loaigiaodich_id=2 group by tblchitietdonhang.ten_hoadon) as j, (select a.ten_hoadon,a.ngay,a.nhanvien_id,sum(c.gia_nhap*b.soluong) as thanhtien from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id and a.nhanvien_id='{$_SESSION['idu']}' group by a.ten_hoadon,a.ngay,a.nhanvien_id ) as k where j.ten_hoadon=k.ten_hoadon   ";
$q=mysqli_query($dbc,$r);?>
<table>
	<thead>
    <tr><td>Tên Hóa Đơn</td><td>Số lượng</td><td>Giá trị</td><td>Thời gian</td><td>Nhân viên GD</td><td>Tùy chọn</td></tr>
    </thead>
<?php while ($row=mysqli_fetch_array($q)){?>
	<tbody>
    	<tr><td><input type='text' class="ma_ls" id='ma_hd<?php echo $cnt; ?>' value='<?php echo $row['ten_hoadon']; ?>' readonly></td><td><?php echo $row['soluong']; ?></td><td><?php echo $row['thanhtien']; ?></td><td><?php echo $row['ngay']; ?></td><td><?php echo $row['nhanvien_id']; ?></td><td><input id='chitiet-but<?php echo $cnt; ?>' onclick='nh_chitiet(cnt=<?php echo $cnt; ?>);' value='Chi tiết' type='button' ></td></tr>
       </tbody>	
<?php	$cnt++;
}?>
</table>
<!--Begin Chi tiet Box--->
<div class="chitiet-box">
	<img alt=""  class="chitiet-close" src="sourse/close.png">
	<table>
		<thead><tr><th colspan="5">Chi tiết Hoá đơn:<input id="ma_hd" type="text" style="width:85px" readonly/></th></tr>
			<tr>
        		<td>Mã SP</td><td>Tên Sản phẩm</td><td>Giá</td><td>Số lượng</td><td>Thành tiền</td>
        	</tr>
        </thead>
		<tbody id="tbody_chitiet">
		</tbody>
	</table>
</div>
<!--End Chi tiet Box--->