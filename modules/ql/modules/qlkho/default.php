<?php 
$cnt=1;
if(isset($_GET['s'])){
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=1 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit $from,10";
	}
	else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=1 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,10";
	}
}elseif(isset($_GET['vpp'])){
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=2 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit $from,10";
	}
	else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=2 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,10";
	}
}elseif(isset($_GET['dc'])){
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=3 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit $from,10";
	}
	else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=3 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,10";
	}
}else{
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit $from,10";
	}else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,10";
	}
}
if(isset($_GET['sp_search'])){
		$search=$_GET['sp_search'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="WHERE a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id ";
		$r.="AND(a.ten_sanpham ='$search' ";
		$r.="OR a.sanpham_id='$search' ";
		$r.="OR c.ten_nhacungcap='$search') ";
		$r.="limit 0,10";
}

$q=mysqli_query($dbc,$r);

?>
<table id="bangsp">
	<thead>
    <tr><td>Mã SP</td><td>Avatar</td><td>Tên SP</td><td>Danh mục</td><td>Nhà CC</td><td>Số lượng</td><td>Đơn vị</td><td>Giá nhập</td><td>Giá bán</td><td>KM</td><td>Tùy chọn</td></tr>
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
				<?php echo $row['ten_sanpham']; ?></td>
            <td>
				<?php echo $row['ten_danhmuc']; ?>
            </td>
            <td>
				<input type="hidden"  id="ncc<?php echo $cnt; ?>" value="<?php echo $row['nhacungcap_id']; ?>"/><?php echo $row['ten_nhacungcap']; ?>
            </td>
            <td>
				<?php echo $row['soluong']; ?>
            </td>
            <td>
				<?php echo $row['ten_donvi']; ?></td><td><?php echo $row['gia_nhap']; ?><td><?php echo $row['gia_ban']; ?>
            </td>
            <td>
				<?php echo $row['giam_gia']; ?>
            </td>
            <td>
            	<input id='edit-sp-but<?php echo $cnt; ?>' onclick='edit_sp(cnt=<?php echo $cnt; ?>);' value='Sửa' type='button' ><input class='delete-sp-but' id='id_del_but<?php echo $cnt; ?>' onclick='delete_sp(cnt=<?php echo $cnt; ?>);' value='Xóa' type='button' >
            </td>
       	</tr>
       </tbody>	
<?php	$cnt++;
}?>

</table>
<div class="ncc-box" >
	<img alt="" class="ncc-close" src="sourse/close.png">
<table>
	<thead>
    	<tr><td>Mã NCC</td><td>Tên NCC</td><td>Tùy chọn</td></tr>
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
            <td>
            	<input class='delete-ncc-but' id='id_ncc_but<?php echo $cnt; ?>' onclick='delete_ncc(cnt=<?php echo $cnt; ?>);' value='Xóa' type='button' >
            </td>
        </tr>
        <?php $cnt++; }?>
    </tbody>
    
</table>

</div>

<!--Begin Addition sp Box--->
<div class="add-sp-box" >
	<img alt="" class="add-sp-close" src="sourse/close.png">
	<form action="" id="add-sp-form" method="post" name="add-sp-form" enctype="multipart/form-data"><table>
	<thead>
            <th colspan="2">
            		Thêm Sản Phẩm
            </th>
         </tr>
    </thead>
	<tbody>
    	  <tr>
          	<th colspan="2" id="add_sp_notify">
            	*************
            </th>
          </tr>
          <tr>
		<tr>
        	<td>
        			Tên Sản phẩm:
        	</td>
        	<td>
        			<input id="add_ten_sp" name="name" type="text">
        	</td>
        </tr>
		<tr>
        	<td>
        			Ảnh:
        	</td>
        	<td>
        		<input id="add_anh_sp" name="avatar" type="file">
        	</td>
        </tr>
        <tr>
        	<td>
        		Danh mục:
        	</td>
        	<td>
    		    <select  name="danhmuc" id="danhmuc" ></select>
	        </td>
        </tr>
		<tr>
        	<td>
        		Đơn vị:
        	</td>
        	<td>
        		<select name="donvi" id="donvi"></select>
        	</td>
        </tr>
		<tr>
        	<td>
        		Nhà cung cấp:
        	</td>
        	<td>
        		<select name="ncc" id="ncc"></select>
        	</td>
        </tr>
		<tr>
            <td>
    	        Giá nhập:
            </td>
            <td>
	            <input id="add_gn_sp" name="gianhap" type="text">
            </td>
        </tr>
		<tr>
        	<td>
        		Giá bán:
        	</td>
        	<td>
        		<input id="add_gb_sp" name="giaban" type="text">
        	</td>
        </tr>
        <tr>
        	<td>
        		Khuyến mại:
        	</td>
        	<td>
        		<input name="km" value="0" type="text">
        	</td>
        </tr>
		<tr>
        	<td>
        	</td>
       		 <th>
        		<input type="reset"><input name="add" id='add-sp-submit' type="submit" value="Thêm">
        	</th>
        </tr>
		</tbody>
	</table></form>
</div>
<!--End Addition sp Box--->
<!--Begin Addition NCC Box--->
<div class="add-ncc-box" >
	<img alt="" class="add-ncc-close" src="sourse/close.png">
	<form action="" id="add-ncc-form" method="post" name="add-sp-form" enctype="multipart/form-data"><table>
		<thead><tr><th colspan="2">Thêm Nhà Cung Cấp</th></tr></thead>
		<tbody>
		<tr><td>Tên NCC:</td><td><input id="ten_ncc" name="name" type="text"></td></tr>
		<tr><td></td><th><input type="reset"><input name="add" id='add-ncc-submit' type="button" value="Thêm"></th></tr>
		</tbody>
	</table></form>
</div>
<!--End Addition NCC Box--->
<!--Begin Edit sp Box--->

<div class="edit-sp-box" >
	<img alt="" class="edit-sp-close" src="sourse/close.png">
	<form action="" id="edit-sp-form" method="post" name="edit-sp-form" enctype="multipart/form-data"><table>
		<thead><tr><th colspan="2">Sửa thông tin Sản phẩm<input style="width:65px" id="eid" name="eid" type="text"></th></tr></thead>
		<tbody>
        <tr><th><img width="100px" height="50px" id="old_avt" ></th></tr>
		<tr><td>Tên Sản phẩm:</td><td><input name="ename" id="ename" type="text"></td></tr>
		<tr><td>Ảnh:</td><td><input name="eavatar" id="eavatar" type="file"></td></tr>
        <tr><td>Danh mục:</td><td><select name="edanhmuc" id="edanhmuc" disabled="disabled"></select></td></tr>
		<tr><td>Đơn vị:</td><td><select name="edonvi" id="edonvi" disabled="disabled"></select></td></tr>
		<tr><td>Nhà cung cấp:</td><td><select name="encc" id="encc"></select></td></tr>
		<tr><td>Giá nhập:</td><td><input name="egianhap" id="egianhap" type="text"></td></tr>
		<tr><td>Giá bán:</td><td><input name="egiaban" id="egiaban" type="text"></td></tr>
        <tr><td>Khuyến mại:</td><td><input name="ekm" id="ekm" type="text"></td></tr>
		<tr><td></td><th><input type="reset"><input name="edit" id='edit-sp-submit' type="submit" value="Sửa"></th></tr>
		</tbody>
	</table></form>
</div>
<!--End Edit sp Box--->
<!--Begin Delete Sp Box--->
<div class="delete-sp-box">
	<form id='delete-sp-form' action="" method="post" >
    	<table>
        	<tr>
            	<th colspan="6">
                	Bạn thật sự muốn xóa SP: <input id="id_sp_del" readonly><input type="hidden" id="id_sp_row" readonly>?
             	 </th>
             </tr>
       
          <tr>
          		<th></th>
          	<th>
            	<input class="delete-sp-submit" value="Có" type="button" ></th><th></th><th><input class="delete-sp-close" value="Không" type="button" >
            </th>
            <th></th><th></th>
         </tr>
       </table>
  	</form>
</div>
<!--End Delete Sp Box--->

<!--BEGIN Delete ncc Box--->
<div class="delete-ncc-box">
	<form id='delete-ncc-form' action="" method="post" >
    	<table>
        	<tr>
            	<th colspan="6">	
                	Bạn thật sự muốn xóa NCC: <input id="id_ncc_del" readonly><input type="hidden" id="id_ncc_row" readonly>?</tr><tr><th></th><th><input class="delete-ncc-submit" value="Có" type="button" >
                 </th>
                 <th></th>
                 <th>
                 	<input class="delete-ncc-close" value="Không" type="button" ></th><th></th><th></th></tr></table></form>
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