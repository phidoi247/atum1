
<div class="Bar">
<div id="form">

<!--tạo form nhập kho -->
<form id="form_nhap_xuat" action="" method="post">
    <fieldset>
        <legend>Nhập Sản Phẩm</legend>
        <table>
        	<tr><td id="chk" style="color:red">***********</td></tr>
            <tr><td>Mã Hóa Đơn
            <?php 
                $r="select ten_hoadon from tblhoadon where ten_hoadon like 'HĐNH%' order by id 	 desc limit 1";
				$q=mysqli_query($dbc,$r) or die(mysqli_error($dbc));
				$fet=mysqli_fetch_row($q);
				$id_hd_tr=$fet[0];
				$tmp1="HĐNH0000009";$tmp2="HĐNH0000099";$tmp3="HĐNH0000999";$tmp4="HĐNH0009999";$tmp5="HĐNH0099999";
				$tmp6="HĐNH0999999";$tmp7="HĐNH9999999";
				if(strcmp($id_hd_tr,$tmp1)==0){
						$id_hd="HĐNH0000010";
					}elseif(strcmp($id_hd_tr,$tmp2)==0){
						$id_hd="HĐNH0000100";
					}elseif(strcmp($id_hd_tr,$tmp3)==0){
						$id_hd="HĐNH0001000";
					}elseif(strcmp($id_hd_tr,$tmp4)==0){
						$id_hd="HĐNH0010000";
					}elseif(strcmp($id_hd_tr,$tmp5)==0){
						$id_hd="HĐNH0100000";
					}elseif(strcmp($id_hd_tr,$tmp6)==0){
						$id_hd="HĐNH1000000";
					}elseif(strcmp($id_hd_tr,$tmp7)==0){
						$id_hd="NULL";
				}else{// HDBH0000043 đây là cái tên hóa đơn mình lấy làm mốc
					$ma_id_tr=substr($id_hd_tr,5,11);// cắt chuỗi từ vị trí thứ 4 đến vị trí thứ 11 là : 0000043
					if(intval($ma_id_tr)>=1000000){// biến cái chuỗi mình vừa cắt thành số -> 43 rồi so sánh với 1tr,100k....
						$ma_id_moi=intval($ma_id_tr)+1;
						$id_hd="HĐNH".$ma_id_moi;
					}elseif(intval($ma_id_tr)>=100000){
						$ma_id_moi=intval($ma_id_tr)+1;
						$id_hd="HĐNH"."0".$ma_id_moi;
					}elseif(intval($ma_id_tr)>=10000){
						$ma_id_moi=intval($ma_id_tr)+1;
						$id_hd="HĐNH"."00".$ma_id_moi;
					}elseif(intval($ma_id_tr)>=1000){
						$ma_id_moi=intval($ma_id_tr)+1;
						$id_hd="HĐNH"."000".$ma_id_moi;
					}elseif(intval($ma_id_tr)>=100){
						$ma_id_moi=intval($ma_id_tr)+1;
						$id_hd="HĐNH"."0000".$ma_id_moi;
					}elseif(intval($ma_id_tr)>=10){// đến đây đúng thì + thêm 1 rồi nối chuỗi -> 0000044
						$ma_id_moi=intval($ma_id_tr)+1;
						$id_hd="HĐNH"."00000".$ma_id_moi;
					}else{
						$ma_id_moi=intval($ma_id_tr)+1;
						$id_hd="HĐNH"."000000".$ma_id_moi;	
					}
				}
            ?>
            </td></tr>
            <tr><td>
            <input type="text" style="border:none;font-size:16px" name="HD" value="<?php echo $id_hd; ?>" readonly/>
            </td></tr>
            <tr><td id="chk_msp">Nhập Mã Sản Phẩm</td></tr>
            <tr><td><input id="nhap_msp" type="text" required/></td></tr>
        
            <tr><td>Giá</td></tr>
            <tr><td><input id="gia_sp" type="text" value="0" readonly/></td></tr>  
            <tr><td><input id="ten_sp" type="hidden" readonly/></td></tr>        
       
            <tr><td>Nhập Số Lượng</td></tr>
            <tr><td><input type="number" min="0" id="sl_sp" name="quantity" value="" required/></td></tr>
     
    		<tr><td><input type="number" style="display:none" value="0" id="solanclick"/><input id="nhap_hd" type="button" name="submit" value="Nhập"/></td></tr></table>

    </fieldset>
</form>
</div>
<!--form hóa đơn-->
<div id="hoadon">
<h3>Thông tin hóa đơn</h3>
<form id="formHDnhap">   
         <h3><?php echo $id_hd ?><input type="hidden" name="ma_hd" value="<?php echo $id_hd ?>"/></h3>  
         <hr />
         Công ty chuyên buôn lậu<br />
        <table class="nhap_xuat">
                <thead>
                    <tr>
                        <th class="th">Mã Sản Phẩm</th>
                        <th class="th">Tên Sản Phẩm</th>
                        <th class="th">Số Lượng</th>
                        <th class="th">Thành Tiền</th>
                        <th></th>  
                    </tr>
                </thead>      
                <tbody id="detail_hd">
                     
                </tbody>
        </table>
        	<input type="hidden" value="<?php echo $_SESSION['idu'] ?>" name="idu"/>
        	<input type="hidden" name="tsp" id="slhd"/>
        	<input type="button" id="hgd_but"  value="Hủy giao dịch"/>
            <input type="submit" id="gd_but"  value="Giao dich" />
</form>
</div>
<div class="thongbao"></div>
</div>




