<?php 
$cnt=1;
if(isset($_GET['s'])){
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=1 ";
		$r.="and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id) limit $from,10";	
	}else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=1 ";
		$r.="and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id) limit 0,10";
	}
}elseif(isset($_GET['vpp'])){
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=2 ";
		$r.="and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id) limit $from,10";
	}else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=2 ";
		$r.="and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id) limit 0,10";
	}
}elseif(isset($_GET['dc'])){
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=3 ";
		$r.="and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id) limit $from,10";
	}else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=3 ";
		$r.="and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id) limit 0,10";
	}
}else{
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(";
		$r.="a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id) limit $from,10";
	}else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(";
		$r.="a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id) limit 0,10";
	}
}
$q=mysqli_query($dbc,$r);?>
<table>
	<thead>
    <tr><td>Mã SP</td><td>Avatar</td><td>Tên SP</td><td>Danh mục</td><td>Nhà CC</td><td>Số lượng</td><td>Đơn vị</td><td>Giá nhập</td><td>Giá bán</td><td>KM</td></tr>
    </thead>
<?php while ($row=mysqli_fetch_array($q)){?>
	<tbody>
    	<tr>
        	<td>
            	<input type='text' class="ma_sp" id='ma_sp<?php echo $cnt; ?>' value='<?php echo $row['sanpham_id']; ?>' readonly>							
           </td>
           <td>
           		<img width='30px' height='30px' src='<?php echo $row['image_link']; ?>'>
           </td>
           <td class="td_tensp">
		   		<?php echo $row['ten_sanpham']; ?>
           </td>
           <td>
		   		<?php echo $row['ten_danhmuc']; ?>
           </td>
           <td>
		   		<?php echo $row['ten_nhacungcap']; ?>
           </td>
           <td>
		   		<?php echo $row['soluong']; ?>
           </td>
           <td>
		   		<?php echo $row['ten_donvi']; ?>
           </td>
           <td>
		   		<?php echo $row['gia_nhap']; ?>
           </td>
           <td>
		   		<?php echo $row['gia_ban']; ?>
           </td>
           <td>
		   		<?php echo $row['giam_gia']; ?>
           </td>
        </tr>
       </tbody>	
<?php	$cnt++;
}?>
</table>

</table>
<div class="ncc-box" >
	<img alt="" class="ncc-close" src="sourse/close.png">
<table>
	<thead>
    	<tr><td>Mã NCC</td><td>Tên NCC</td></tr>
    </thead>
    <tbody>
<?php
	$r="select * from tblnhacungcap";
	$q=mysqli_query($dbc,$r);
	$cnt=1;
	while ($row=mysqli_fetch_array($q)){
?>
    	<tr>
        	<td>
            	<input type='text' style="width:35px" class="ma_ncc" id='ma_ncc<?php echo $cnt; ?>' value='<?php echo $row['nhacungcap_id']; ?>' readonly="readonly" />
            </td>
            <td>
            	<?php echo $row['ten_nhacungcap']; ?>
            </td>
        </tr>
        <?php $cnt++; }?>
    </tbody>
    
</table>
</div>
<div class="nav-page">
<?php
	if(isset($_GET['s'])){
		$r="SELECT count(distinct a.id) as sl FROM `tblsanpham` as a WHERE a.danhmuc_id=1 ";
		$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		echo "<a href='default.php?nav=k&s&f=0'>Trang1</a>";
		$from=10;$i=1;$modpage=$so_page[0]%10;$page=$so_page[0]/10;
		if($modpage==0 and $page>=1){
			while($i<$page){
				echo "<a href='default.php?nav=k&s&f=".$from."'>Trang".($i+1)."</a>";
				$from+=10;
			$i++;
			}
		}
		elseif($page>=1){
			while($i<=($page)){
				echo "<a href='default.php?nav=k&s&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}	
		}	
	}elseif(isset($_GET['vpp'])){
		$r="SELECT count(distinct a.id) as sl FROM `tblsanpham` as a WHERE a.danhmuc_id=2 ";
		$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		echo "<a href='default.php?nav=k&vpp&f=0'>Trang1</a>";
		$from=10;$i=1;$modpage=$so_page[0]%10;$page=$so_page[0]/10;
		if($modpage==0 and $page>=1 ){
			while($i<$page){
				echo "<a href='default.php?nav=k&vpp&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}
		}
		elseif($page>=1){
			while($i<=($page)){
				echo "<a href='default.php?nav=k&vpp&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}	
		}	
	}elseif(isset($_GET['dc'])){
		$r="SELECT count(distinct a.id) as sl FROM `tblsanpham` as a WHERE a.danhmuc_id=3 ";
		$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		echo "<a href='default.php?nav=k&dc&f=0'>Trang1</a>";
		$from=10;$i=1;$modpage=$so_page[0]%10;$page=$so_page[0]/10;
		if($modpage==0 and $page>=1 ){
			while($i<$page){
				echo "<a href='default.php?nav=k&dc&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}
		}
		elseif($page>=1){
			while($i<=($page)){
				echo "<a href='default.php?nav=k&dc&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}	
		}	
	}else{
		$r="SELECT count(distinct a.id) as sl FROM `tblsanpham` as a";
		$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		echo "<a href='default.php?nav=k&f=0'>Trang1</a>";
		$from=10;$i=1;$modpage=$so_page[0]%10;$page=$so_page[0]/10;
		if($modpage==0 and $page>=1 ){
			while($i<$page){
				echo "<a href='default.php?nav=k&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}
		}
		elseif($page>=1){
			while($i<=($page)){
				echo "<a href='default.php?nav=k&f=".$from."'>Trang".($i+1)."</a>";
			$from+=10;
			$i++;
			}	
		}	
	}
?>
</div>