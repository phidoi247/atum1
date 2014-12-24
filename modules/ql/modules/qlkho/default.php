<?php 
include '../../Connections/connect.php';
$cnt=1;
$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d where(a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
$q=mysqli_query($dbc,$r);?>
<table>
	<thead>
    <tr><td>Mã SP</td><td>Avatar</td><td>Tên SP</td><td>Danh mục</td><td>Nhà CC</td><td>Số lượng</td><td>Đơn vị</td><td>Giá nhập</td><td>Giá bán</td><td>KM</td><td>Tùy chọn</td></tr>
    </thead>
<?php while ($row=mysqli_fetch_array($q)){?>
	<tbody>
    	<tr><td><input type='text' class="ma_sp" id='ma_sp<?php echo $cnt; ?>' value='<?php echo $row['sanpham_id']; ?>' readonly></td><td><img width='30px' height='30px' src='<?php echo $row['avatar']; ?>'></td><td><?php echo $row['ten_sanpham']; ?></td><td><?php echo $row['ten_danhmuc']; ?></td><td><?php echo $row['ten_nhacungcap']; ?></td><td><?php echo $row['soluong']; ?></td><td><?php echo $row['ten_donvi']; ?></td><td><?php echo $row['gia_nhap']; ?><td><?php echo $row['gia_ban']; ?></td><td><?php echo $row['giam_gia']; ?></td></td><td><input id='edit-sp-but<?php echo $cnt; ?>' onclick='edit_sp(cnt=<?php echo $cnt; ?>);' value='Sửa' type='button' ><input class='delete-sp-but' id='id_del_but<?php echo $cnt; ?>' onclick='delete_sp(cnt=<?php echo $cnt; ?>);' value='Xóa' type='button' ></td></tr>
       </tbody>	
<?php	$cnt++;
}?>
</table>
<!--Begin Addition sp Box--->
<div class="add-sp-box" >
	<img alt="" class="add-sp-close" src="../../sourse/close.png">
	<form action="" id="add-sp-form" method="post" name="add-sp-form" enctype="multipart/form-data"><table>
		<thead><tr><th colspan="2">Thêm Sản Phẩm</th></tr></thead>
		<tbody>
		<tr><td>Tên Sản phẩm:</td><td><input name="name" type="text"></td></tr>
		<tr><td>Ảnh:</td><td><input name="avatar" type="file"></td></tr>
        <tr><td>Danh mục:</td><td><input name="danhmuc" id="danhmuc" type="text"></td></tr>
		<tr><td>Đơn vị:</td><td><select name="donvi" id="donvi"><option value="Quyển">Quyển</option><option value="Cái">Cái</option><option value="Bộ">Bộ</option></select></td></tr>
		<tr><td>Nhà cung cấp:</td><td><input name="ncc" id="ncc" type="text"></td></tr>
		<tr><td>Giá nhập:</td><td><input name="gianhap" type="text"></td></tr>
		<tr><td>Giá bán:</td><td><input name="giaban" type="text"></td></tr>
        <tr><td>Khuyến mại:</td><td><input name="km" type="text"></td></tr>
		<tr><td></td><th><input type="reset"><input name="add" id='add-sp-submit' type="submit" value="Thêm"></th></tr>
		</tbody>
	</table></form>
</div>
<!--End Addition sp Box--->
<!--Begin Edit sp Box--->

<div class="edit-sp-box" >
	<img alt="" class="edit-sp-close" src="../../sourse/close.png">
	<form action="" id="edit-sp-form" method="post" name="edit-sp-form" enctype="multipart/form-data"><table>
		<thead><tr><th colspan="2">Sửa thông tin nhân viên<input style="width:45px" id="eid" name="eid" type="text"></th></tr></thead>
		<tbody>
        <tr><th><img width="100px" height="50px" id="old_avt" ></th></tr>
		<tr><td>Tên Nhân viên:</td><td><input id="ename" name="ename" type="text"></td></tr>
		<tr><td>Ảnh:</td><td><input name="eavatar" id="eavatar" type="file"></td></tr>
		<tr><td>Loại:</td><td><select name="eposition" id="eposition"><option value="BH">NV Bán Hàng</option><option value="TK">Thủ Kho</option><option value="QL">Quản Lý</option></select></td></tr>
		<tr><td>Level:</td><td><input name="elevel" id="elevel" min="0" type="number"></td></tr>
		<tr><td>Mật khẩu:</td><td><input name="epassword" id="epassword" placeholder="Nhập mật khẩu mới" type="text"></td></tr>
		<tr><td>Địa chỉ:</td><td><input name="eaddress" id="eaddress" type="text"></td></tr>
		<tr><td>Phone:</td><td><input name="ephone" id="ephone" type="text"></td></tr>
        <tr><td>Ngày sinh:</td><td><input name="edateofbirth" id="edateofbirth" type="date" placeholder="mm/dd/yyyy"></td></tr>
		<tr><td></td><th><input type="reset"><input name="edit" id='edit-sp-submit' type="submit" value="Sửa"></th></tr>
		</tbody>
	</table></form>
</div>
<!--End Edit sp Box--->
<!--Begin Delete Sp Box--->
<div class="delete-sp-box"><form id='delete-sp-form' action="" method="post" ><table><tr><th colspan="6">Bạn thật sự muốn xóa SP: <input id="id_sp_del" readonly>?</tr><tr><th></th><th><input class="delete-sp-submit" value="Có" type="button" ></th><th></th><th><input class="delete-sp-close" value="Không" type="button" ></th><th></th><th></th></tr></table></form>
</div>
<!--End Delete Sp Box--->