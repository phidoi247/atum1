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
		$r.="limit $from,18";
		}
		else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=1 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,18";
		}
	}elseif(strcmp($sub,"vpp")==0){
		if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=2 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit $from,18";
		}
		else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=2 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,18";
		}
	}elseif(strcmp($sub,"dc")==0){
		if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=3 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit $from,18";
		}
		else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=3 and a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,18";
		}
	}
}else{
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit $from,18";
	}else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="where(a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id)";
		$r.="limit 0,18";
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
		$r.="AND(a.ten_sanpham ='$search' ";
		$r.="OR a.sanpham_id='$search' ";
		$r.="OR c.ten_nhacungcap='$search') ";
		$r.="limit $from,18";
		}else{
		$r="select a.sanpham_id,a.ten_sanpham,b.ten_danhmuc,c.ten_nhacungcap,c.nhacungcap_id,";
		$r.="d.ten_donvi,a.gia_nhap,a.gia_ban,a.soluong,a.giam_gia,a.image_link ";
		$r.="from tblsanpham as a,tbldanhmuc as b,tblnhacungcap as c,tbldonvi as d ";
		$r.="WHERE a.danhmuc_id=b.danhmuc_id and a.nhacungcap_id=c.nhacungcap_id and a.donvi_id= d.donvi_id ";
		$r.="AND(a.ten_sanpham ='$search' ";
		$r.="OR a.sanpham_id='$search' ";
		$r.="OR c.ten_nhacungcap='$search') ";
		$r.="limit 0,18";
		}
}
$q=mysqli_query($dbc,$r);?>
<table>
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
    </tr>
    </thead>
<?php while ($row=mysqli_fetch_array($q)){?>
	<tbody>
    	<tr>
        	<td>
            	<input type='text' class="ma_sp" id='ma_sp<?php echo $cnt; ?>' value='<?php echo $row['sanpham_id']; ?>' readonly>
                
                <span>
                    <img width='60px' height='60px' src='<?php echo $row['image_link']; ?>'>
                </span>
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
</div><!---Nav page--->
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
if(isset($_GET['sub'])){
	$sub=$_GET['sub'];
	if(strcmp($sub,"s")==0){
		$r="SELECT count(distinct a.id) as sl FROM `tblsanpham` as a WHERE a.danhmuc_id=1 ";
		$q=mysqli_query($dbc,$r);$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		$modpage=$so_page[0]%18;$page=$so_page[0]/18;		
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
		$modpage=$so_page[0]%18;$page=$so_page[0]/18;		
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
		$modpage=$so_page[0]%18;$page=$so_page[0]/18;		
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
		$r.="AND(a.ten_sanpham ='$search' ";
		$r.="OR a.sanpham_id='$search' ";
		$r.="OR c.ten_nhacungcap='$search') ";
		$q=mysqli_query($dbc,$r);$q=mysqli_query($dbc,$r);
		$so_page=mysqli_fetch_row($q);
		$modpage=$so_page[0]%18;$page=$so_page[0]/18;		
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
		$modpage=$so_page[0]%18;$page=$so_page[0]/18;		
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