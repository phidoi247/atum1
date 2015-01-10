<?php 
		$r="select * from tblnhanvien where nhanvien_id='{$_SESSION['idu']}'";
		$q=mysqli_query($dbc,$r);
		$f=mysqli_fetch_row($q);
?>
<table style="width:505px;float:left">
	<thead>
    	<tr>
        	<th colspan="4">Nhân viên: <?php echo $_SESSION['idu']; ?></th>
        </tr>
    </thead>
    <tbody>
    	<tr>
        	<td rowspan="7" colspan="2"><img width="80" height="80" src="<?php echo $f[7] ?>"></td>
        	<td>Họ và tên:</td>
        	<td><?php echo $_SESSION['nameu'] ?></td>
        </tr>
        <tr>
        	<td>Ngày sinh:</td>
        	<td><?php echo $f[4] ?></td>
        </tr>
        <tr> 	
        	<td>Phòng ban:</td><td>Bán hàng</td>
        </tr>
        <tr>
        	<td rowspan="">Level:</td><td><?php echo $_SESSION['lvu'] ?></td>
        </tr>
        <tr>
        	<td>SDT:</td><td><?php echo $f[9] ?></td>
        </tr>
        <tr>
        	<td rowspan="">Địa chỉ:</td><td><?php echo $f[5] ?></td>
        </tr>
        <tr>
        	<td>Ngày làm việc:</td>
        	<td><?php echo $f[6] ?></td>
        </tr>
    </tbody>
</table>
<div class="change-pass-box" style="width:490px;float:left">
	<form id="change_pass_form">
    	<table>
        	<thead>
            	<tr><th colspan="3">Thay mật khẩu<input type="hidden" id="idu" name="idu" value="<?php echo $_SESSION['idu'];?>"></th></tr>
            </thead>
            <tbody>
            	<tr>
                	<td>Nhập mật khẩu cũ:</td><td><input id="old_pass" type="password" required></td><td width="50"><div class="chk_o_p"></span></td>
                </tr>
                <tr>
                	<td>Nhập mật khẩu Mới:</td><td><input id="new_pass" type="password" required></td>
                </tr>
                <tr>
                	<td>Nhập lại mật khẩu Mới:</td><td><input id="re_pass" name="pass" type="password" required></td><td><div class="chk_n_p"></span></td>
                </tr>
                <tr>
                	<td></td><td><input value="Nhập lại" type="reset"></td><td><input value="Sửa" type="submit" name="doi_mk" id="doi_mk"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<div class="change-avt-box" style="width:100%;float:left">
	<form id="change_avt_form">
    	<table>
        	<thead>
            	<tr><th colspan="3">Thay Ảnh<input name="aidu" id="aidu" type="hidden" value="<?php echo $_SESSION['idu'];?>"></th></tr>
            </thead>
            <tbody>
                <tr>
                	<td>Upload ảnh:</td><td><input name="avatar" type="file" required></td>
                	<td><input value="Sửa" type="submit" name="doi_avt"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>