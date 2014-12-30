<?php 
$cnt=1;
	if(isset($_GET['nh'])){
		if(isset($_GET['f'])){
			$from=$_GET['f'];
			$r="SELECT k.ten_hoadon,j.loaigiaodich_id,j.soluong,k.thanhtien,k.thoigian,k.nhanvien_id FROM (select tblchitietdonhang.ten_hoadon,tblchitietdonhang.loaigiaodich_id,sum(tblchitietdonhang.soluong) as soluong from tblchitietdonhang where tblchitietdonhang.loaigiaodich_id=2 group by tblchitietdonhang.ten_hoadon) as j, (select a.ten_hoadon,a.thoigian,a.nhanvien_id,sum(c.gia_nhap*b.soluong) as thanhtien from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id group by a.ten_hoadon,a.thoigian,a.nhanvien_id ) as k where j.ten_hoadon=k.ten_hoadon limit $from,14";

		}else{
			$r="SELECT k.ten_hoadon,j.loaigiaodich_id,j.soluong,k.thanhtien,k.thoigian,k.nhanvien_id FROM (select tblchitietdonhang.ten_hoadon,tblchitietdonhang.loaigiaodich_id,sum(tblchitietdonhang.soluong) as soluong from tblchitietdonhang where tblchitietdonhang.loaigiaodich_id=2 group by tblchitietdonhang.ten_hoadon) as j, (select a.ten_hoadon,a.thoigian,a.nhanvien_id,sum(c.gia_nhap*b.soluong) as thanhtien from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id group by a.ten_hoadon,a.thoigian,a.nhanvien_id ) as k where j.ten_hoadon=k.ten_hoadon limit 0,14";
		}
	}elseif(isset($_GET['bh'])){
		if(isset($_GET['f'])){
			$from=$_GET['f'];
			$r="SELECT k.ten_hoadon,j.loaigiaodich_id,j.soluong,k.thanhtien,k.thoigian,k.nhanvien_id FROM (select tblchitietdonhang.ten_hoadon,tblchitietdonhang.loaigiaodich_id,sum(tblchitietdonhang.soluong) as soluong from tblchitietdonhang where tblchitietdonhang.loaigiaodich_id=1 group by tblchitietdonhang.ten_hoadon) as j, (select a.ten_hoadon,a.thoigian,a.nhanvien_id,sum(c.gia_nhap*b.soluong) as thanhtien from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id group by a.ten_hoadon,a.thoigian,a.nhanvien_id ) as k where j.ten_hoadon=k.ten_hoadon limit $from,14";

		}else{
			$r="SELECT k.ten_hoadon,j.loaigiaodich_id,j.soluong,k.thanhtien,k.thoigian,k.nhanvien_id FROM (select tblchitietdonhang.ten_hoadon,tblchitietdonhang.loaigiaodich_id,sum(tblchitietdonhang.soluong) as soluong from tblchitietdonhang where tblchitietdonhang.loaigiaodich_id=1 group by tblchitietdonhang.ten_hoadon) as j, (select a.ten_hoadon,a.thoigian,a.nhanvien_id,sum(c.gia_nhap*b.soluong) as thanhtien from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id group by a.ten_hoadon,a.thoigian,a.nhanvien_id ) as k where j.ten_hoadon=k.ten_hoadon limit 0,14";
		}
	}else{
		if(isset($_GET['f'])){
			$from=$_GET['f'];
			$r="SELECT k.ten_hoadon,j.loaigiaodich_id,j.soluong,k.thanhtien,k.thoigian,k.nhanvien_id FROM (select tblchitietdonhang.ten_hoadon,tblchitietdonhang.loaigiaodich_id,sum(tblchitietdonhang.soluong) as soluong from tblchitietdonhang  group by tblchitietdonhang.ten_hoadon) as j, (select a.ten_hoadon,a.thoigian,a.nhanvien_id,sum(c.gia_nhap*b.soluong) as thanhtien from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id group by a.ten_hoadon,a.thoigian,a.nhanvien_id ) as k where j.ten_hoadon=k.ten_hoadon limit $from,14";
		}else{
			$r="SELECT k.ten_hoadon,j.loaigiaodich_id,j.soluong,k.thanhtien,k.thoigian,k.nhanvien_id FROM (select tblchitietdonhang.ten_hoadon,tblchitietdonhang.loaigiaodich_id,sum(tblchitietdonhang.soluong) as soluong from tblchitietdonhang  group by tblchitietdonhang.ten_hoadon) as j, (select a.ten_hoadon,a.thoigian,a.nhanvien_id,sum(c.gia_nhap*b.soluong) as thanhtien from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id group by a.ten_hoadon,a.thoigian,a.nhanvien_id ) as k where j.ten_hoadon=k.ten_hoadon limit 0,14";
		}
	}
$q=mysqli_query($dbc,$r);?>

<table>
	<thead>
    <tr><td>Tên Hóa Đơn</td><td>Số lượng</td><td>Giá trị</td><td>Thời gian</td><td>Nhân viên GD</td><td>Tùy chọn</td></tr>
    </thead>
<?php while ($row=mysqli_fetch_assoc($q)){?>
	<tbody>
    	<tr>
        	<td>
            	<input type='text' class="ma_ls" id='ma_hd<?php echo $cnt; ?>' value='<?php echo $row['ten_hoadon']; ?>' readonly>
            </td>
            <td class="td_giatri">
				<?php echo $row['soluong']; ?></td><td><?php echo $row['thanhtien']; ?>
            </td>
            <td>
				<?php echo $row['thoigian']; ?>
            </td>
            <td>
				<?php echo $row['nhanvien_id']; ?>
            </td>
            <td>
            	<input type="hidden" value="<?php echo $row['loaigiaodich_id']; ?>" id="loaihd<?php echo $cnt; ?>"/>
                <input id='chitiet-but<?php echo $cnt; ?>' onclick='chitiet(cnt=<?php echo $cnt; ?>);' value='Chi tiết' type='button' >
            </td>
       </tr>
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
<div class="nav-page">
<?php
	if(isset($_GET['bh'])){
		$r="SELECT count(distinct b.id) as sl FROM `tblchitietdonhang` as a,`tblhoadon` as b WHERE a.ten_hoadon=b.ten_hoadon and a.loaigiaodich_id=1 ";
		$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		echo "<a href='default.php?nav=ls&bh&f=0'>Trang1</a>";
		$from=14;$i=1;$modpage=$so_page[0]%14;$page=$so_page[0]/14;
		if($modpage==0 and $page>=1){
			while($i<$page){
				echo "<a href='default.php?nav=ls&bh&f=".$from."'>Trang".($i+1)."</a>";
			$from+=14;
			$i++;
			}
		}
		elseif($page>=1){
			while($i<=($page)){
				echo "<a href='default.php?nav=ls&bh&f=".$from."'>Trang".($i+1)."</a>";
			$from+=14;
			$i++;
			}	
		}	
	}elseif(isset($_GET['nh'])){
		$r="SELECT count(distinct b.id) as sl FROM `tblchitietdonhang` as a,`tblhoadon` as b WHERE a.ten_hoadon=b.ten_hoadon and a.loaigiaodich_id=2 ";
		$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		echo "<a href='default.php?nav=ls&nh&f=0'>Trang1</a>";
		$from=14;$i=1;$modpage=$so_page[0]%14;$page=$so_page[0]/14;
		if($modpage==0 and $page>=1 ){
			while($i<$page){
				echo "<a href='default.php?nav=ls&nh&f=".$from."'>Trang".($i+1)."</a>";
			$from+=14;
			$i++;
			}
		}
		elseif($page>=1){
			while($i<=($page)){
				echo "<a href='default.php?nav=ls&nh&f=".$from."'>Trang".($i+1)."</a>";
			$from+=14;
			$i++;
			}	
		}			
	}else{
		$r="SELECT count(distinct b.id) as sl FROM `tblchitietdonhang` as a,`tblhoadon` as b WHERE a.ten_hoadon=b.ten_hoadon";
		$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		echo "<a href='default.php?nav=ls&f=0'>Trang1</a>";
		$from=14;$i=1;$modpage=$so_page[0]%14;$page=$so_page[0]/14;
		if($modpage==0 and $page>=1 ){
			while($i<$page){
				echo "<a href='default.php?nav=ls&f=".$from."'>Trang".($i+1)."</a>";
			$from+=14;
			$i++;
			}
		}
		elseif($page>=1){
			while($i<=($page)){
				echo "<a href='default.php?nav=ls&f=".$from."'>Trang".($i+1)."</a>";
			$from+=14;
			$i++;
			}	
		}	
	}
?>
</div>