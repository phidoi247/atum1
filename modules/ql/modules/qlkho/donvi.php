
<table>
	<thead>
    	<tr><td>Mã Đơn vị</td><td>Tên Đơn vị</td><td>Tùy chọn</td></tr>
    </thead>
    <tbody>
<?php
	
	if(isset($_GET['f'])){
		$from=$_GET['f'];
		$r="select * from tbldonvi ";
		$r.="limit $from,12";
	}else{
		$r="select * from tbldonvi ";
		$r.="limit 0,12";
	}
	$q=mysqli_query($dbc,$r);
	$cnt=1;
	while ($row=mysqli_fetch_array($q)){
?>
    	<tr>
        	<td>
            	<input type='text' style="width:35px;" class="ma_dv" id='ma_dv<?php echo $cnt; ?>' value='<?php echo $row['donvi_id']; ?>' readonly="readonly" />
            </td>
            <td class="td_tendv">
            	<?php echo $row['ten_donvi']; ?>
            </td>
            <td>
            	<input class='delete-dv-but' id='id_dv_but<?php echo $cnt; ?>' onclick='delete_dv(cnt=<?php echo $cnt; ?>);' value=' ' type='button' >
            </td>
        </tr>
        <?php $cnt++; }?>
    </tbody>
    
</table>

<!--BEGIN Delete dv Box--->
<div class="delete-dv-box">
	<form id='delete-dv-form' action="" method="post" >
    	<table>
        	<tr>
            	<th colspan="6">	
                	Bạn thật sự muốn xóa Đơn vị: <input id="id_dv_del" readonly><input type="hidden" id="id_dv_row" readonly>?</tr><tr><th></th><th><input class="delete-dv-submit" value="Có" type="button" >
                 </th>
                 <th></th>
                 <th>
                 	<input class="delete-dv-close" value="Không" type="button" ></th><th></th><th></th></tr></table></form>
</div>

<!--Begin Addition Đơn vị Box--->
<div class="add-dv-box" >
	<img alt="" class="add-dv-close" src="sourse/close.png">
	<form action="" id="add-dv-form" method="post" name="add-sp-form" enctype="multipart/form-data"><table>
		<thead><tr><th colspan="2">Thêm Đơn Vị</th></tr></thead>
		<tbody>
		<tr><td>Tên Đơn vị:</td><td><input id="ten_dv" name="name" type="text"></td></tr>
		<tr><td></td><th><input type="reset"><input name="add" id='add-dv-submit' type="button" value="Thêm"></th></tr>
		</tbody>
	</table></form>
</div>
<!--End Addition Đơn vị Box--->
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
		$r="SELECT count(distinct a.donvi_id) as sl FROM `tbldonvi` as a";
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