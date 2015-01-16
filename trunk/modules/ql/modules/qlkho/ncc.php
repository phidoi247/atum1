
<table>
	<thead>
    	<tr><td>Mã Nhà Cung Cấp</td><td>Tên Nhà Cung Cấp</td><td>Tùy chọn</td></tr>
    </thead>
    <tbody>
<?php
	
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select * from tblnhacungcap ";
		$r.="limit $from,12";
	}else{
		$r="select * from tblnhacungcap ";
		$r.="limit 0,12";
	}
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
            	<input class='delete-ncc-but' id='id_ncc_but<?php echo $cnt; ?>' onclick='delete_ncc(cnt=<?php echo $cnt; ?>);' value=' ' type='button' >
            </td>
        </tr>
        <?php $cnt++; }?>
    </tbody>
    
</table>

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
		$r="SELECT count(distinct a.nhacungcap_id) as sl FROM `tblnhacungcap` as a";
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
		
	?>"/>
</div>
</div>