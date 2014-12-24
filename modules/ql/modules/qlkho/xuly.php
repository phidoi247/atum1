<?php
	include '../../../../Connections/connect.php';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		///////GET thông tin////
		if(isset($_POST['get_danhmuc'])){
			$r="select * from tbldanhmuc";
			$q=mysqli_query($dbc,$r);
			$fet_dm=array();
			while($row=mysqli_fetch_assoc($q)){$fet_dm[]=$row;};
			echo json_encode($fet_dm);
		}
		if(isset($_POST['get_donvi'])){
			$r="select * from tbldonvi";
			$q=mysqli_query($dbc,$r);
			$fet_dm=array();
			while($row=mysqli_fetch_assoc($q)){$fet_dm[]=$row;};
			echo json_encode($fet_dm);
		}
		if(isset($_POST['get_ncc'])){
			$r="select * from tblnhacungcap";
			$q=mysqli_query($dbc,$r);
			$fet_dm=array();
			while($row=mysqli_fetch_assoc($q)){$fet_dm[]=$row;};
			echo json_encode($fet_dm);
		}
		
		/////////////////ADD SP/////////////////////////
		if (isset($_POST['name'])){
			$error=array();
			if(empty($_POST['name'])){
				$error[]=" Tên Sản Phẩm";
			}if(empty($_POST['gianhap'])){
				$error[]=" Giá nhập";
			}if(empty($_POST['giaban'])){
				$error[]=" Giá bán";
			}if(empty($_FILES['avatar']['tmp_name'])){
				$error[]=" Ảnh";
			}	
		if(empty($error)){
				$name=mysql_escape_string($_POST['name']);
				$donvi=$_POST['donvi'];
				$ncc=$_POST['ncc'];
				$danhmuc=$_POST['danhmuc'];
				$km=mysql_escape_string($_POST['km']);
				$gianhap=mysql_escape_string($_POST['gianhap']);
				$giaban=mysql_escape_string($_POST['giaban']);
				$avatar=$_FILES['avatar']['name'];
			//Link avatar vao upload folder
				$fmten=date('Ymdhis');
				$link='../../../../upload/'.$fmten;
				copy($_FILES['avatar']['tmp_name'],$link);
				$src_avatar=substr($link,6);
			$r="SELECT `sanpham_id` FROM `tblsanpham`,`tbldanhmuc` WHERE `tblsanpham`.`danhmuc_id`= `tbldanhmuc`.`danhmuc_id` AND`tbldanhmuc`.`danhmuc_id` ='$danhmuc' ORDER BY `sanpham_id` DESC LIMIT 1 ";
			$q=mysqli_query($dbc,$r);
			$layid=mysqli_fetch_row($q);
			$sanpham_id_trc=$layid[0];
			$danhmuc=substr($sanpham_id_trc,0,2);
				$tmp1=$danhmuc."00009";$tmp2=$danhmuc."00099";$tmp3=$danhmuc."00999";$tmp4=$danhmuc."09999";$tmp5=$danhmuc."99999";
			if(strcmp($sanpham_id_trc,$tmp1)==1){
				$sanpham_id=$danhmuc."00010";
			}elseif(strcmp($sanpham_id_trc,$tmp2)==1){
				$sanpham_id=$danhmuc."00100";
			}elseif(strcmp($sanpham_id_trc,$tmp3)==1){
				$sanpham_id=$danhmuc."01000";
			}elseif(strcmp($sanpham_id_trc,$tmp4)==1){
				$sanpham_id=$danhmuc."10000";
			}elseif(strcmp($sanpham_id_trc,$tmp5)==1){
				$sanpham_id="NULL";
			}else{
				$ma_id_tr=substr($sanpham_id_trc,2,7);
				if(intval($ma_id_tr)>10000){
					$ma_id_moi=intval($ma_id_tr)+1;
					$sanpham_id=$danhmuc.$ma_id_moi;
				}elseif(intval($ma_id_tr)>1000){
					$ma_id_moi=intval($ma_id_tr)+1;
					$sanpham_id=$danhmuc."0".$ma_id_moi;
				}elseif(intval($ma_id_tr)>100){
					$ma_id_moi=intval($ma_id_tr)+1;
					$sanpham_id=$danhmuc."00".$ma_id_moi;
				}elseif(intval($ma_id_tr)>10){
					$ma_id_moi=intval($ma_id_tr)+1;
					$sanpham_id=$danhmuc."000".$ma_id_moi;
				}else{
					$ma_id_moi=intval($ma_id_tr)+1;
					$sanpham_id=$danhmuc."0000".$ma_id_moi;
				}
			}
			$danhmuc=$_POST['danhmuc'];
			$r="INSERT INTO `tblsanpham`(sanpham_id,ten_sanpham,danhmuc_id,nhacungcap_id,donvi_id,gia_nhap,gia_ban,giam_gia,image_link) VALUES('$sanpham_id','$name','$danhmuc','$ncc','$donvi','$gianhap','$giaban','$km','$src_avatar')";
			$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));
			echo "Ok";
			}else {
				echo "Fill full all Fields,Please!";
			}
			
		}
		
		if(isset($_POST['id_sp_del'])){
			$id_sp_del=$_POST['id_sp_del'];
			//Xóa file ảnh cũ
			$r="select image_link from tblsanpham where sanpham_id='$id_sp_del'";
			$q=mysqli_query($dbc,$r);
			$fet_avt=mysqli_fetch_row($q);
			$avatar=$fet_avt[0];
			$linkdel="../../".$avatar;
						unlink($linkdel);
			$r="DELETE FROM `tblsanpham` WHERE `sanpham_id`='$id_sp_del'";
			$q=mysqli_query($dbc,$r) or die ("Oopt! ".mysqli_error($dbc));
		}
			
								
	}
?>