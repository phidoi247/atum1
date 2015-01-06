<?php 
$cnt=1;
if(isset($_GET['f'])){
	$from=$_GET['f'];
	$r="SELECT k.ten_hoadon,j.soluong,k.thanhtien,k.thoigian,k.nhanvien_id ";
	$r.="FROM (select tblchitietdonhang.ten_hoadon,sum(tblchitietdonhang.soluong) as soluong from tblchitietdonhang where ";
	$r.=" tblchitietdonhang.loaigiaodich_id=2 ";
	$r.="group by tblchitietdonhang.ten_hoadon) as j, ";
	$r.="(select a.ten_hoadon,a.thoigian,a.nhanvien_id,sum(c.gia_nhap*b.soluong) as thanhtien ";
	$r.="from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c ";
	$r.="where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id and a.nhanvien_id='{$_SESSION['idu']}' ";
	$r.="group by a.ten_hoadon,a.thoigian,a.nhanvien_id ) as k ";
	$r.="where j.ten_hoadon=k.ten_hoadon limit $from,18";
}else{
	$r="SELECT k.ten_hoadon,j.soluong,k.thanhtien,k.thoigian,k.nhanvien_id ";
	$r.="FROM (select tblchitietdonhang.ten_hoadon,sum(tblchitietdonhang.soluong) as soluong from tblchitietdonhang where ";
	$r.=" tblchitietdonhang.loaigiaodich_id=2 ";
	$r.="group by tblchitietdonhang.ten_hoadon) as j, ";
	$r.="(select a.ten_hoadon,a.thoigian,a.nhanvien_id,sum(c.gia_nhap*b.soluong) as thanhtien ";
	$r.="from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c ";
	$r.="where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id and a.nhanvien_id='{$_SESSION['idu']}' ";
	$r.="group by a.ten_hoadon,a.thoigian,a.nhanvien_id ) as k ";
	$r.="where j.ten_hoadon=k.ten_hoadon limit 0,18";
}
if(isset($_GET['ls_search'])){
			$search=$_GET['ls_search'];
			$r="SELECT k.ten_hoadon,j.loaigiaodich_id,j.soluong,k.thanhtien,k.thoigian,k.nhanvien_id ";
			$r.="FROM (select y.ten_hoadon,y.loaigiaodich_id,sum(y.soluong) as soluong ";
			$r.="from tblchitietdonhang as y ";
			$r.="group by y.ten_hoadon) as j, ";
			$r.="(select a.ten_hoadon,a.thoigian,a.nhanvien_id,sum(c.gia_nhap*b.soluong) as thanhtien ";
			$r.="from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c ";
			$r.="where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id and a.nhanvien_id='{$_SESSION['idu']}' ";
			$r.="group by a.ten_hoadon,a.thoigian,a.nhanvien_id ) as k ";
			$r.="where j.ten_hoadon=k.ten_hoadon and(";
			$r.="k.ten_hoadon='$search' ";
			$r.="or nhanvien_id='$search' ";
			$r.="or k.nhanvien_id LIKE '$search') ";
			$r.="limit 0,18";
}

$q=mysqli_query($dbc,$r);?>
<table>
	<thead>
    	<tr><td>Tên Hóa Đơn</td><td>Số lượng</td><td>Giá trị</td><td>Thời gian</td><td>Nhân viên GD</td><td>Tùy chọn</td></tr>
    </thead>

	<tbody>
<?php while ($row=mysqli_fetch_array($q)){?>
    	<tr>
        	<td class="td_ten">
            	<input type='text' class="ma_ls" id='ma_hd<?php echo $cnt; ?>' value='<?php echo $row['ten_hoadon']; ?>' readonly>			
           </td>
        <td class="td_sl">
			<?php echo $row['soluong']; ?>
        </td>
        <td class="td_giatri">
			<?php echo $row['thanhtien']; ?>
        </td>
        <td>
			<?php echo $row['thoigian']; ?>
        </td>
        <td>
			<?php echo $row['nhanvien_id']; ?>
        </td>
        <td>
        	<input id='chitiet-but<?php echo $cnt; ?>' onclick='nh_chitiet(cnt=<?php echo $cnt; ?>);' value='Chi tiết' type='button' >
        </td>
      </tr>
<?php	$cnt++;}?>
       </tbody>	

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
<!--NAv PAGE--->
<div class="nav-page">
 <div class="swap-nav">
	<a href="" class="prev-page"></a>
    
	<input type="text" readonly="readonly" class="present-page" 
    	value="<?php 
			if(isset($from)){
				$pst_page=$from/14;
				echo (int)$pst_page+1;
			}else{echo 1;} 
		?>"/>
<a href=""  class="next-page"> </a>
<label> Của </label>
<input type="text" readonly="readonly" class="total-page" 
    	value="<?php
	$r="SELECT count(distinct b.id) as sl FROM `tblchitietdonhang` as a,`tblhoadon` as b WHERE a.ten_hoadon=b.ten_hoadon and a.loaigiaodich_id=2 and b.nhanvien_id='{$_SESSION['idu']}'";
		$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		$modpage=$so_page[0]%18;$page=($so_page[0]/18);
		if($modpage==0 and $page>1){
			$tt_page=intval($page);
			echo $tt_page;
		}
		elseif($modpage<>0 and $page>1){
			$tt_page=intval($page)+1;
			echo $tt_page;	
			
		}else{
			echo 1;	
		}	
?>"/>
</div>
</div>