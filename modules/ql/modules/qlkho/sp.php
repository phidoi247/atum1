<?php 
$cnt=1;
if(isset($_GET['sub'])){
	$sub=$_GET['sub'];
	if(strcmp($sub,"s")==0){
		if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=1 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit $from,12";
		}
		else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=1 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,12";
		}
	}elseif(strcmp($sub,"vpp")==0){
		if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=2 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit $from,12";
		}
		else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=2 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,12";
		}
	}elseif(strcmp($sub,"dc")==0){
		if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=3 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit $from,12";
		}
		else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=3 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,12";
		}
	}
}else{
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit $from,12";
	}else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,12";
	}
}
if(isset($_GET['sp_search'])){
		$search=mysqli_escape_string($dbc,$_GET['sp_search']);
		if(isset($_GET['f'])){
		$from=$_GET['f'];
			$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="WHERE a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id ";
		$r.="AND(a.ten_sanpham like '%$search%' ";
		$r.="OR a.sanpham_id='$search' ";
		$r.="OR c.ten_nhacungcap='$search') ";
		$r.="limit $from,12";
		}else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="WHERE a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id ";
		$r.="AND(a.ten_sanpham like '%$search%' ";
		$r.="OR a.sanpham_id='$search' ";
		$r.="OR c.ten_nhacungcap='$search') ";
		$r.="limit 0,12";
		}
}

$q=mysqli_query($dbc,$r);

?>
<table id="bangsp">
	<thead>
    	<tr>
        <td>Mã SP</td>
        <td>Tên SP</td>
        <td>Danh mục</td>
        <td>Nhà CC</td>
        <td>Số lượng</td>
        <td>Đơn vị</td>
        <td>Giá nhập</td>
        <td>Giá bán</td>
        <td>KM</td>
        <td>Tùy chọn</td>
        </tr>
    </thead>
<?php while ($row=mysqli_fetch_array($q)){?>
	<tbody>
    	<tr>
        	<td>
            	<input type='text' class="ma_sp" id='ma_sp<?php echo $cnt; ?>' value='<?php echo $row['sanpham_id']; ?>' readonly>				<span>	
                        <img width='60px' height='60px' src='<?php echo $row['image_link']; ?>'>
                </span>					
          	</td>
            <td class="td_ten">
				<?php echo $row['ten_sanpham']; ?></td>
            <td class="td_ten">
				<?php echo $row['ten_danhmuc']; ?>
            </td>
            <td class="td_ten">
				<input type="hidden"  id="ncc<?php echo $cnt; ?>" value="<?php echo $row['nhacungcap_id']; ?>"/><?php echo $row['ten_nhacungcap']; ?>
            </td>
            <td class="td_sl">
				<?php echo $row['soluong']; ?>
            </td>
            <td >
				<?php echo $row['ten_donvi']; ?></td>
            <td class="td_giatri">
				<?php echo $row['gia_nhap']; ?>
            </td>
            <td class="td_giatri">
				<?php echo $row['gia_ban']; ?>
            </td>
            <td>
				<?php echo $row['giam_gia']; ?>
            </td>
            <td>
            	<input class="edit-sp-but" id='edit-sp-but<?php echo $cnt; ?>' onclick='edit_sp(cnt=<?php echo $cnt; ?>);' value=' ' type='button' >
                <input class='delete-sp-but' id='id_del_but<?php echo $cnt; ?>' onclick='delete_sp(cnt=<?php echo $cnt; ?>);' value=' ' type='button' >
            </td>
       	</tr>
       </tbody>	
<?php	$cnt++;
}?>
</table>
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
    		    <select  name="danhmuc" id="danhmuc" >
                	<?php 
						$r="select * from tbldanhmuc";
						$q=mysqli_query($dbc,$r);
						while($row=mysqli_fetch_array($q)){
							echo "<option value=".$row['danhmuc_id'].">".$row['ten_danhmuc']."</option>";
						};
					?>
                </select>
	        </td>
        </tr>
		<tr>
        	<td>
        		Đơn vị:
        	</td>
        	<td>
        		<select name="donvi" id="donvi">
                <?php 
						$r="select * from tbldonvi";
						$q=mysqli_query($dbc,$r);
						while($row=mysqli_fetch_array($q)){
							echo "<option value=".$row['donvi_id'].">".$row['ten_donvi']."</option>";
						};
				?>
                </select>
        	</td>
        </tr>
		<tr>
        	<td>
        		Nhà cung cấp:
        	</td>
        	<td>
        		<select name="ncc" id="ncc">
                <?php 
						$r="select * from tblnhacungcap";
						$q=mysqli_query($dbc,$r);
						while($row=mysqli_fetch_array($q)){
							echo "<option value=".$row['nhacungcap_id'].">".$row['ten_nhacungcap']."</option>";
						};
				?>
                </select>
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
        		<input id="add_km_sp" name="km" value="0" type="text">
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

<!--Begin Edit sp Box--->

<div class="edit-sp-box" >
	<img alt="" class="edit-sp-close" src="sourse/close.png">
	<form action="" id="edit-sp-form" method="post" name="edit-sp-form">
    	<table>
			<thead>
            	<tr>
                	<th colspan="2">
                    	Sửa thông tin Sản phẩm<input style="width:65px" id="eid" name="eid" type="text">
                   </th>
                </tr>
        </thead>
		<tbody>
        	<tr>
          	<th colspan="2" id="edit_sp_notify">
            	*************
            </th>
        	<tr>
            	<th>
                	<img  height="50px" id="old_avt" >
                </th>
            </tr>
			<tr>
            	<td>
                	Tên Sản phẩm:
                </td>
                <td>
                	<input name="ename" id="ename" type="text">
                </td>
            </tr>
			<tr>
            	<td>Ảnh:</td>
                <td>
                	<input name="eavatar" id="eavatar" type="file">
                </td>
            </tr>
        	<tr>
            	<td>Danh mục:</td>
                <td>
                	<select name="edanhmuc" id="edanhmuc" disabled="disabled">
                    <?php 
						$r="select * from tbldanhmuc";
						$q=mysqli_query($dbc,$r);
						while($row=mysqli_fetch_array($q)){
							echo "<option value=".$row['danhmuc_id'].">".$row['ten_danhmuc']."</option>";
						};
					?>
                    </select>
                </td>
            </tr>
			<tr>
            	<td>Đơn vị:</td>
                <td>
                	<select name="edonvi" id="edonvi" >
                    <?php 
						$r="select * from tbldonvi";
						$q=mysqli_query($dbc,$r);
						while($row=mysqli_fetch_array($q)){
							echo "<option value=".$row['donvi_id'].">".$row['ten_donvi']."</option>";
						};
					?>
                    </select>
                </td>
            </tr>
			<tr>
            	<td>Nhà cung cấp:</td>
                <td>
                	<select name="encc" id="encc">
                    <?php 
						$r="select * from tblnhacungcap";
						$q=mysqli_query($dbc,$r);
						while($row=mysqli_fetch_array($q)){
							echo "<option value=".$row['nhacungcap_id'].">".$row['ten_nhacungcap']."</option>";
						};
					?>
                    </select>
                </td>
            </tr>
			<tr>
            	<td>Giá nhập:</td>
                <td>
                	<input name="egianhap" id="egianhap" type="text">
                </td>
            </tr>
			<tr>
            	<td>Giá bán:</td>
                <td>
                	<input name="egiaban" id="egiaban" type="text">
                </td>
            </tr>
        	<tr>
            	<td>Khuyến mại:</td>
                <td>
                	<input name="ekm" id="ekm" type="text">
                </td>
            </tr>
			<tr>
            	<td></td>
                <th>
                	<input type="reset"><input name="edit" id='edit-sp-submit' type="submit" value="Sửa">
               </th>
             </tr>
		</tbody>
	</table></form>
</div>
<!--End Edit sp Box--->
<!--Begin Delete Sp Box--->
<div class="delete-sp-box">
	<form id='delete-sp-form' action="" method="post" >
    	<table>
        	<thead>
            <tr>
            	<th colspan="6">
                	Bạn thật sự muốn xóa SP: <input id="id_sp_del" readonly><input type="hidden" id="id_sp_row" readonly>?
             	 </th>
             </tr>
       		</thead>
            <tbody>
          <tr>
          		<th></th>
          	<th>
            	<input class="delete-sp-submit" value="Có" type="button" ></th><th></th><th><input class="delete-sp-close" value="Không" type="button" >
            </th>
            <th></th><th></th>
         </tr>
         </tbody>
       </table>
  	</form>
</div>
<!--End Delete Sp Box--->
<!---Nav page--->
 <div class="nav-page">
 <div class="swap-nav">
	<a href="" class="prev-page"></a>
    
	<input type="text" readonly="readonly" class="present-page" 
    	value="<?php 
			if(isset($from)){
				$pst_page=$from/12;
				echo (int)$pst_page+1;
			}else{echo 1;} 
		?>"/>
<a href=""  class="next-page"> </a>
<label> Của </label>
<input type="text" readonly="readonly" class="total-page" 
    	value="<?php
if(isset($_GET['sub'])){
	$sub=$_GET['sub'];
	if(strcmp($sub,"s")==0){
		$r="SELECT count(distinct a.id) as sl FROM `tblsanpham` as a WHERE a.danhmuc_id=1 ";
		$q=mysqli_query($dbc,$r);$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		$modpage=$so_page[0]%12;$page=$so_page[0]/12;		
		if($modpage==0 and $page>=1){
			$tt_page=intval($page);
			echo $tt_page;
		}
		elseif($modpage<>0 and $page>=1){
			$tt_page=intval($page)+1;
			echo $tt_page;	
			
		}else{
			echo 1;	
		}	
	}elseif(strcmp($sub,"vpp")==0){
		$r="SELECT count(distinct a.id) as sl FROM `tblsanpham` as a WHERE a.danhmuc_id=2 ";
		$q=mysqli_query($dbc,$r);$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		$modpage=$so_page[0]%12;$page=$so_page[0]/12;		
		if($modpage==0 and $page>=1){
			$tt_page=intval($page);
			echo $tt_page;
		}
		elseif($modpage<>0 and $page>=1){
			$tt_page=intval($page)+1;
			echo $tt_page;	
			
		}else{
			echo 1;	
		}	
	}elseif(strcmp($sub,"dc")==0){
		$r="SELECT count(distinct a.id) as sl FROM `tblsanpham` as a WHERE a.danhmuc_id=3 ";
		$q=mysqli_query($dbc,$r);$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		$modpage=$so_page[0]%12;$page=$so_page[0]/12;		
		if($modpage==0 and $page>=1){
			$tt_page=intval($page);
			echo $tt_page;
		}
		elseif($modpage<>0 and $page>=1){
			$tt_page=intval($page)+1;
			echo $tt_page;	
			
		}else{
			echo 1;	
		}	
	}
}elseif(isset($_GET['sp_search'])){
		$r="select count(a.sanpham_id) ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="WHERE a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id ";
		$r.="AND(a.ten_sanpham like '%$search%' ";
		$r.="OR a.sanpham_id='$search' ";
		$r.="OR c.ten_nhacungcap='$search') ";
		$q=mysqli_query($dbc,$r);$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		$modpage=$so_page[0]%12;$page=$so_page[0]/12;		
		if($modpage==0 and $page>=1){
			$tt_page=intval($page);
			echo $tt_page;
		}
		elseif($modpage<>0 and $page>=1){
			$tt_page=intval($page)+1;
			echo $tt_page;	
			
		}else{
			echo 1;	
		}
}
else{
		$r="SELECT count(distinct a.id) as sl FROM `tblsanpham` as a";
		$q=mysqli_query($dbc,$r);$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		$modpage=$so_page[0]%12;$page=$so_page[0]/12;		
		if($modpage==0 and $page>=1){
			$tt_page=intval($page);
			echo $tt_page;
		}
		elseif($modpage<>0 and $page>=1){
			$tt_page=intval($page)+1;
			echo $tt_page;	
			
		}else{
			echo 1;	
		}
		
	}?>"/>
</div>
</div>