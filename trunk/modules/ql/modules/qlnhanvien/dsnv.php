<?php 
$cnt=1;
if(isset($_GET['sub'])){
	$sub=$_GET['sub'];
	if(strcmp($sub,"nvbh")==0){
		if(isset($_GET['f'])){
			$from=$_GET['f'];
			$r="select m.avatar,m.nhanvien_id,m.ten_nhanvien,";
			$r.="n.tpd,n.tpw,n.tpm,m.level_id,m.ngay_sinh,m.dia_chi,m.ngay_vao_lam,m.SDT ";
			$r.="from tblnhanvien as m left join ";
			$r.="(select a.nhanvien_id,b.tpd,c.tpw,d.tpm ";
			$r.="from tblnhanvien as a,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpd ";
			$r.="from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and date(thoigian)=date(now()) group by hd.nhanvien_id) as b,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpw from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and week(thoigian)=week(now()) group by hd.nhanvien_id) as c,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpm from tblhoadon as hd,tblnhanvien as nv w";;
			$r.="here hd.nhanvien_id=nv.nhanvien_id and month(thoigian)=month(now()) group by hd.nhanvien_id) as d ";
			$r.="where a.nhanvien_id=b.nhanvien_id and a.nhanvien_id=c.nhanvien_id and a.nhanvien_id=d.nhanvien_id ) as n ";
			$r.="on n.nhanvien_id=m.nhanvien_id ";
			$r.="WHERE m.level_id =1 order by m.ngay_vao_lam limit $from,12";
		}else{
			$r="select m.avatar,m.nhanvien_id,m.ten_nhanvien,";
			$r.="n.tpd,n.tpw,n.tpm,m.level_id,m.ngay_sinh,m.dia_chi,m.ngay_vao_lam,m.SDT ";
			$r.="from tblnhanvien as m left join ";
			$r.="(select a.nhanvien_id,b.tpd,c.tpw,d.tpm ";
			$r.="from tblnhanvien as a,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpd ";
			$r.="from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and date(thoigian)=date(now()) group by hd.nhanvien_id) as b,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpw from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and week(thoigian)=week(now()) group by hd.nhanvien_id) as c,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpm from tblhoadon as hd,tblnhanvien as nv w";;
			$r.="here hd.nhanvien_id=nv.nhanvien_id and month(thoigian)=month(now()) group by hd.nhanvien_id) as d ";
			$r.="where a.nhanvien_id=b.nhanvien_id and a.nhanvien_id=c.nhanvien_id and a.nhanvien_id=d.nhanvien_id ) as n ";
			$r.="on n.nhanvien_id=m.nhanvien_id ";
			$r.="WHERE m.level_id =1 order by m.ngay_vao_lam limit 0,12";
		}
	}elseif(strcmp($sub,"nvk")==0){
		if(isset($_GET['f'])){
			$from=$_GET['f'];
			$r="select m.avatar,m.nhanvien_id,m.ten_nhanvien,";
			$r.="n.tpd,n.tpw,n.tpm,m.level_id,m.ngay_sinh,m.dia_chi,m.ngay_vao_lam,m.SDT ";
			$r.="from tblnhanvien as m left join ";
			$r.="(select a.nhanvien_id,b.tpd,c.tpw,d.tpm ";
			$r.="from tblnhanvien as a,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpd ";
			$r.="from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and date(thoigian)=date(now()) group by hd.nhanvien_id) as b,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpw from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and week(thoigian)=week(now()) group by hd.nhanvien_id) as c,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpm from tblhoadon as hd,tblnhanvien as nv w";;
			$r.="here hd.nhanvien_id=nv.nhanvien_id and month(thoigian)=month(now()) group by hd.nhanvien_id) as d ";
			$r.="where a.nhanvien_id=b.nhanvien_id and a.nhanvien_id=c.nhanvien_id and a.nhanvien_id=d.nhanvien_id ) as n ";
			$r.="on n.nhanvien_id=m.nhanvien_id ";
			$r.="WHERE m.level_id =2 order by m.ngay_vao_lam limit $from,12";
		}else{
			$r="select m.avatar,m.nhanvien_id,m.ten_nhanvien,";
			$r.="n.tpd,n.tpw,n.tpm,m.level_id,m.ngay_sinh,m.dia_chi,m.ngay_vao_lam,m.SDT ";
			$r.="from tblnhanvien as m left join ";
			$r.="(select a.nhanvien_id,b.tpd,c.tpw,d.tpm ";
			$r.="from tblnhanvien as a,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpd ";
			$r.="from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and date(thoigian)=date(now()) group by hd.nhanvien_id) as b,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpw from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and week(thoigian)=week(now()) group by hd.nhanvien_id) as c,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpm from tblhoadon as hd,tblnhanvien as nv w";;
			$r.="here hd.nhanvien_id=nv.nhanvien_id and month(thoigian)=month(now()) group by hd.nhanvien_id) as d ";
			$r.="where a.nhanvien_id=b.nhanvien_id and a.nhanvien_id=c.nhanvien_id and a.nhanvien_id=d.nhanvien_id ) as n ";
			$r.="on n.nhanvien_id=m.nhanvien_id ";
			$r.="WHERE m.level_id =2 order by m.ngay_vao_lam limit 0,12";
		}		
	}else{
			if(isset($_GET['f'])){
			$from=$_GET['f'];
			$r="select m.avatar,m.nhanvien_id,m.ten_nhanvien,";
			$r.="n.tpd,n.tpw,n.tpm,m.level_id,m.ngay_sinh,m.dia_chi,m.ngay_vao_lam,m.SDT ";
			$r.="from tblnhanvien as m left join ";
			$r.="(select a.nhanvien_id,b.tpd,c.tpw,d.tpm ";
			$r.="from tblnhanvien as a,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpd ";
			$r.="from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and date(thoigian)=date(now()) group by hd.nhanvien_id) as b,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpw from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and week(thoigian)=week(now()) group by hd.nhanvien_id) as c,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpm from tblhoadon as hd,tblnhanvien as nv w";;
			$r.="here hd.nhanvien_id=nv.nhanvien_id and month(thoigian)=month(now()) group by hd.nhanvien_id) as d ";
			$r.="where a.nhanvien_id=b.nhanvien_id and a.nhanvien_id=c.nhanvien_id and a.nhanvien_id=d.nhanvien_id ) as n ";
			$r.="on n.nhanvien_id=m.nhanvien_id ";
			$r.="WHERE m.level_id =1 OR m.level_id =2 order by m.ngay_vao_lam limit $from,12";
		}else{
			$r="select m.avatar,m.nhanvien_id,m.ten_nhanvien,";
			$r.="n.tpd,n.tpw,n.tpm,m.level_id,m.ngay_sinh,m.dia_chi,m.ngay_vao_lam,m.SDT ";
			$r.="from tblnhanvien as m left join ";
			$r.="(select a.nhanvien_id,b.tpd,c.tpw,d.tpm ";
			$r.="from tblnhanvien as a,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpd ";
			$r.="from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and date(thoigian)=date(now()) group by hd.nhanvien_id) as b,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpw from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and week(thoigian)=week(now()) group by hd.nhanvien_id) as c,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpm from tblhoadon as hd,tblnhanvien as nv w";;
			$r.="here hd.nhanvien_id=nv.nhanvien_id and month(thoigian)=month(now()) group by hd.nhanvien_id) as d ";
			$r.="where a.nhanvien_id=b.nhanvien_id and a.nhanvien_id=c.nhanvien_id and a.nhanvien_id=d.nhanvien_id ) as n ";
			$r.="on n.nhanvien_id=m.nhanvien_id ";
			$r.="WHERE  (m.level_id =1 OR m.level_id =2) order by m.ngay_vao_lam limit 0,12";
		}		
	}
}else{
		if(isset($_GET['f'])){
			$from=$_GET['f'];
			$r="select m.avatar,m.nhanvien_id,m.ten_nhanvien,";
			$r.="n.tpd,n.tpw,n.tpm,m.level_id,m.ngay_sinh,m.dia_chi,m.ngay_vao_lam,m.SDT ";
			$r.="from tblnhanvien as m left join ";
			$r.="(select a.nhanvien_id,b.tpd,c.tpw,d.tpm ";
			$r.="from tblnhanvien as a,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpd ";
			$r.="from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and date(thoigian)=date(now()) group by hd.nhanvien_id) as b,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpw from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and week(thoigian)=week(now()) group by hd.nhanvien_id) as c,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpm from tblhoadon as hd,tblnhanvien as nv w";;
			$r.="here hd.nhanvien_id=nv.nhanvien_id and month(thoigian)=month(now()) group by hd.nhanvien_id) as d ";
			$r.="where a.nhanvien_id=b.nhanvien_id and a.nhanvien_id=c.nhanvien_id and a.nhanvien_id=d.nhanvien_id ) as n ";
			$r.="on n.nhanvien_id=m.nhanvien_id ";
			$r.="WHERE m.level_id =1 OR m.level_id =2 order by m.ngay_vao_lam limit $from,12";
		}else{
			$r="select m.avatar,m.nhanvien_id,m.ten_nhanvien,";
			$r.="n.tpd,n.tpw,n.tpm,m.level_id,m.ngay_sinh,m.dia_chi,m.ngay_vao_lam,m.SDT ";
			$r.="from tblnhanvien as m left join ";
			$r.="(select a.nhanvien_id,b.tpd,c.tpw,d.tpm ";
			$r.="from tblnhanvien as a,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpd ";
			$r.="from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and date(thoigian)=date(now()) group by hd.nhanvien_id) as b,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpw from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and week(thoigian)=week(now()) and month(thoigian)=month(now()) group by hd.nhanvien_id) as c,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpm from tblhoadon as hd,tblnhanvien as nv w";;
			$r.="here hd.nhanvien_id=nv.nhanvien_id and month(thoigian)=month(now()) group by hd.nhanvien_id) as d ";
			$r.="where a.nhanvien_id=b.nhanvien_id and a.nhanvien_id=c.nhanvien_id and a.nhanvien_id=d.nhanvien_id ) as n ";
			$r.="on n.nhanvien_id=m.nhanvien_id ";
			$r.="WHERE  (m.level_id =1 OR m.level_id =2) order by m.ngay_vao_lam limit 0,12";
		}	
}
if(isset($_GET['nv_search'])){
		
		$search=mysqli_real_escape_string($dbc,($_GET['nv_search']));
		if(isset($_GET['f'])){
			$from=$_GET['f'];
		$r="select m.avatar,m.nhanvien_id,m.ten_nhanvien,";
			$r.="n.tpd,n.tpw,n.tpm,m.level_id,m.ngay_sinh,m.dia_chi,m.ngay_vao_lam,m.SDT ";
			$r.="from tblnhanvien as m left join ";
			$r.="(select a.nhanvien_id,b.tpd,c.tpw,d.tpm ";
			$r.="from tblnhanvien as a,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpd ";
			$r.="from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and date(thoigian)=date(now()) group by hd.nhanvien_id) as b,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpw from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and week(thoigian)=week(now()) group by hd.nhanvien_id) as c,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpm from tblhoadon as hd,tblnhanvien as nv w";;
			$r.="here hd.nhanvien_id=nv.nhanvien_id and month(thoigian)=month(now()) group by hd.nhanvien_id) as d ";
			$r.="where a.nhanvien_id=b.nhanvien_id and a.nhanvien_id=c.nhanvien_id and a.nhanvien_id=d.nhanvien_id ) as n ";
			$r.="on n.nhanvien_id=m.nhanvien_id ";
		$r.="WHERE m.nhanvien_id ='$search' ";
		$r.="OR m.ten_nhanvien='$search' ";
		$r.="OR m.dia_chi LIKE '$search' ";
		$r.="OR m.SDT LIKE '$search' ";
		$r.="OR DATE(m.ngay_vao_lam) IN ('".$search."') ";
		$r.="OR DATE(m.ngay_sinh) IN ('".$search."') ";
		$r.="limit $from,12";
		}else{
		$r="select m.avatar,m.nhanvien_id,m.ten_nhanvien,";
			$r.="n.tpd,n.tpw,n.tpm,m.level_id,m.ngay_sinh,m.dia_chi,m.ngay_vao_lam,m.SDT ";
			$r.="from tblnhanvien as m left join ";
			$r.="(select a.nhanvien_id,b.tpd,c.tpw,d.tpm ";
			$r.="from tblnhanvien as a,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpd ";
			$r.="from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and date(thoigian)=date(now()) group by hd.nhanvien_id) as b,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpw from tblhoadon as hd,tblnhanvien as nv ";
			$r.="where hd.nhanvien_id=nv.nhanvien_id and week(thoigian)=week(now()) group by hd.nhanvien_id) as c,";
			$r.="(select hd.nhanvien_id,count(hd.nhanvien_id) as tpm from tblhoadon as hd,tblnhanvien as nv w";;
			$r.="here hd.nhanvien_id=nv.nhanvien_id and month(thoigian)=month(now()) group by hd.nhanvien_id) as d ";
			$r.="where a.nhanvien_id=b.nhanvien_id and a.nhanvien_id=c.nhanvien_id and a.nhanvien_id=d.nhanvien_id ) as n ";
			$r.="on n.nhanvien_id=m.nhanvien_id ";
		$r.="WHERE m.nhanvien_id ='$search' ";
		$r.="OR m.ten_nhanvien='$search' ";
		$r.="OR m.dia_chi LIKE '$search' ";
		$r.="OR m.SDT LIKE '$search' ";
		$r.="OR DATE(m.ngay_vao_lam) IN ('".$search."') ";
		$r.="OR DATE(m.ngay_sinh) IN ('".$search."') ";
		$r.="limit 0,12";	
		}
}
$q=mysqli_query($dbc,$r);?>
<table>
	<thead>
    <tr><td>Mã NV</td>
    <td>Tên NV</td>
    <td>T/D</td>
    <td>T/W</td>
    <td>T/M</td>
    <td>Level</td>
    <td>Địa chỉ</td>
    <td>Phone</td>
    <td>Ngày sinh</td>
    <td>Join Day</td>
    <td>Tùy chọn</td></tr>
    </thead>
    <tbody>
<?php while ($row=mysqli_fetch_array($q)){?>
	
    	<tr>
        	<td width="60px">
            	<input class="ma_nv" type='text' id='ma_nv<?php echo $cnt; ?>' value='<?php echo $row['nhanvien_id']; ?>' readonly>
                <span>
            		<img height='60px' src='<?php echo $row['avatar']; ?>'>
            	</span>
           </td>
           <td class="td_ten" width="150px">
		   		<?php echo $row['ten_nhanvien']; ?>
           </td>
           <td width="40px">
		  		<?php echo $row['tpd']; ?>
           </td>
           <td width="40px">
		  		<?php echo $row['tpw']; ?>
           </td>
           <td width="40px">
		  		<?php echo $row['tpm']; ?>
           </td>
           <td class="td_level" width="80px">
		  		<?php
				 	if($row['level_id']==3){
						echo "Quản lý";
					}elseif($row['level_id']==1){
						echo "Bán hàng";
					}else{
						echo "Thủ kho";	
					}
				; ?>
           </td>
          <td class="td_diachi">
		  		<?php echo $row['dia_chi']; ?>
          </td>
          <td width="100px">
		  		<?php echo $row['SDT']; ?>
          </td>
           <td width="100px">
		   		<?php $ngay=date('d-m-Y',strtotime($row['ngay_sinh'])); echo $ngay;  ?>
          </td>
          <td width="100px">
		  		<?php $ngay=date('d-m-Y',strtotime($row['ngay_vao_lam'])); echo $ngay; ?>
          </td>
          <td width="70px">
          		<input class="edit-emp-but" id='edit-emp-but<?php echo $cnt; ?>' onclick='edit_emp(cnt=<?php echo $cnt; ?>);' value=' ' type='button' >
                <input class='delete-emp-but' id='id_del_but<?php echo $cnt; ?>' onclick='delete_emp(cnt=<?php echo $cnt; ?>);' value=' ' type='button' >
        </td>
     </tr>
<?php	$cnt++;} ?>
  </tbody>	
</table>
<!--Begin Addition Employees Box--->
<div class="add-emp-box" >
		<img alt="" class="add-emp-close" src="sourse/close.png">
	<form action="" id="add-emp-form" method="post" name="add-emp-form" enctype="multipart/form-data"><table>
		<thead>
        	<tr>
            	<th colspan="2">
                	Thêm nhân viên
                </th>
           </tr>
       </thead>
		<tbody>
        	<tr>
            	<th id="add_emp_notify" colspan="2">
                	****************
                </th>
            </tr>
			<tr>
            	<td>
                	Tên Nhân viên:
               </td>
               <td>
               		<input id="add_ten" name="name" type="text">
               </td>
          	</tr>
            <tr>
                <td>
                    Ảnh:
                </td>
                <td>
                        <input id="add_avt" name="avatar" type="file">
                </td>
            </tr>
            <tr>
            	<td>Loại:</td>
                <td>
                	<select name="position"><option value="1">NV Bán Hàng</option><option value="2">Thủ Kho</option></select>
                </td>
            </tr>
            <tr>
            	<td>Mật khẩu:</td>
                <td>
                	<input id="add_pass" name="password" required="required" pattern="{4,12}" title="4-12 ký tự" placeholder="4-12 ký tự" type="password">
                </td>
            </tr>
            <tr>
            	<td>Địa chỉ:</td>
                <td>
                	<input id="add_add" name="address" type="text">
                </td>
            </tr>
            <tr><td>Phone:</td>
            	<td>
                	<input id="add_phone" name="phone" type="text">
                </td>
            </tr>
            <tr>
            	<td>Ngày sinh:</td>
                <td>
                	<input id="add_date" name="dateofbirth" type="date" placeholder="yyyy-mm-dd">
                </td>
            </tr>
            <tr>
            	<td></td>
                <th>
                	<input type="reset"><input name="add" id='add-emp-submit' type="submit" value="Thêm">
                </th>
            </tr>
		</tbody>
	</table></form>
</div>
<!--End Addition Employees Box--->
<!--Begin Edit Employees Box--->
<div class="edit-emp-box" >
	<img alt="" class="edit-emp-close" src="sourse/close.png">
	<form action="" id="edit-emp-form" method="post" name="edit-emp-form" enctype="multipart/form-data"><table>
		<thead><tr><th colspan="2">Sửa thông tin nhân viên<input style="width:45px" id="eid" name="eid" type="text"></th></tr></thead>
		<tbody>
        	<tr>
            	<th id="edit_emp_notify" colspan="2">
                	****************
                </th>
            </tr>
            <tr>
                <th>
                    <img  height="60px" id="old_avt" >
                </th>
            </tr>
            <tr>
                <td>
                    Tên Nhân viên:
                </td>
                <td>
                	<input id="ename" name="ename" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Ảnh:</td><td><input name="eavatar" id="eavatar" type="file">
                </td>
            </tr>
            <tr>
                <td>
                    Loại:
                </td>
                <td><select disabled="disabled" name="eposition" id="eposition"><option value="1">NV Bán Hàng</option><option value="2">Thủ Kho</option></select>
                </td>
            </tr>
			<tr>
            	<td>Mật khẩu:</td><td><input name="epassword" id="epassword" pattern="{4,12}" placeholder="Nhập mật khẩu mới 4-12 ký tự" type="password"></td></tr>
			<tr>
            	<td>Địa chỉ:</td><td><input name="eaddress" id="eaddress" type="text"></td></tr>
			<tr>
            	<td>
                	Phone:
                </td>
                <td>
                	<input name="ephone" id="ephone" type="text">
                </td>
            </tr>
        	<tr>
            	<td>
                	Ngày sinh:
                </td>
                <td>
                	<input name="edateofbirth" id="edateofbirth" type="date" placeholder="dd-MM-YYYY">
                </td>
            </tr>
			<tr>
            	<td></td>
                <th>
                	<input type="reset"><input name="edit" id='edit-emp-submit' type="submit" value="Sửa">
               </th>
           </tr>
		</tbody>
	</table></form>
</div>
<!--End Edit Employees Box--->
<!--Begin Delete Employees Box--->
<div class="delete-emp-box">
	<form id='delete-emp-form'  action="" method="post" >
    	<table>
        	<thead><tr>
            	<th colspan="6">
                	Bạn thật sự muốn Sa thải NV 
                    <input id="id_emp_del" readonly><input type="hidden" id="id_emp_row" readonly>?
                </th>
           </tr></thead>
           		<tbody><th></th>
                <th>
                	<input class="delete-emp-submit" value="Có" type="button" >
               </th>
               <th></th>
               <th>
               		<input class="delete-emp-close" value="Không" type="button" >
              </th>
              <th></th><th></th>
          </tr>
          </tbody>
      </table>
	</form>
</div>
<!--End Delete Employees Box--->
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
	if(strcmp($sub,"nvbh")==0){
		$r="SELECT count(a.nhanvien_id) as sl FROM `tblnhanvien` as a WHERE a.level_id=1 ";
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
	}elseif(strcmp($sub,"nvk")==0){
		$r="SELECT count(a.nhanvien_id) as sl FROM `tblnhanvien` as a WHERE a.level_id=2 ";
		$q=mysqli_query($dbc,$r);
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
	}else{
		$r="SELECT count(a.nhanvien_id) as sl FROM `tblnhanvien` as a WHERE level_id=2 or level_id=1";
		$q=mysqli_query($dbc,$r);
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
}elseif(isset($_GET['nv_search'])){
		$r="SELECT count(nhanvien_id) FROM `tblnhanvien` ";
		$r.="WHERE nhanvien_id ='$search' ";
		$r.="OR ngay_vao_lam='$search' ";
		$r.="OR ten_nhanvien='$search' ";
		$r.="OR dia_chi LIKE '$search' ";
		$r.="OR SDT LIKE '$search' ";
		$q=mysqli_query($dbc,$r);
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
		$r="SELECT count(a.nhanvien_id) as sl FROM `tblnhanvien` as a WHERE level_id=2 or level_id=1";
		$q=mysqli_query($dbc,$r);
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
?>"/>
</div>
</div>