<?php
	include '../../../../Connections/connect.php';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if (isset($_POST['name'])){
			$error=array();
			if(empty($_POST['name'])){
				$error[]=" Tên Sản Phẩm";
			}if(empty($_POST['km'])){
				$error[]=" KM";
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
			$r="SELECT `sanpham_id` FROM `tblsanpham` WHERE `sanpham_id` LIKE '$donvi%' ORDER BY `sanpham_id` DESC LIMIT 1";
			$q=mysqli_query($dbc,$r);
			$layid=mysqli_fetch_row($q);
			$sanpham_id_trc=$layid[0];
			if(strpos($sanpham_id_trc,"000")==2){
		if(strpos($sanpham_id_trc,"9")==5){
			$sanpham_idstr=substr($sanpham_id_trc,0,4);
			$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
			$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
		}
		else{
			$sanpham_idstr=substr($sanpham_id_trc,0,5);
			$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
			$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
		}
	}
	elseif(strpos($sanpham_id_trc,"000")==3){
			$sanpham_idstr=substr($sanpham_id_trc,0,5);
			$sanpham_id=$sanpham_idstr."1";
	}
	elseif(strpos($sanpham_id_trc,"00")==2){
		if(strpos($sanpham_id_trc,"9")==4){
			if(strpos($sanpham_id_trc,"99")==4){
				$sanpham_idstr=substr($sanpham_id_trc,0,3);
				$sanpham_idstr1=(substr($sanpham_id_trc,4,6)+1);
				$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
			}
			else{
				$sanpham_idstr=substr($sanpham_id_trc,0,5);
				$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
				$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
				}
		}
	}
	elseif(strpos($sanpham_id_trc,"00")==3){
			if(substr_count($sanpham_id_trc,"9")==2){
				$sanpham_idstr=substr($sanpham_id_trc,0,4);
				$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
				$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
			}
			else{
				if(strpos($sanpham_id_trc,"9")==5){
					$sanpham_idstr=substr($sanpham_id_trc,0,4);
					$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
					$sanpham_id=$sanpham_idstr.$sanpham_idstr1;	
				}
			}
	}
	elseif(strpos($sanpham_id_trc,"00")==4){
			$sanpham_idstr=substr($sanpham_id_trc,0,5);
			$sanpham_id=$sanpham_idstr."1";
	}
	elseif(substr_count($sanpham_id_trc,"0")==2){
		if(strpos($sanpham_id_trc,"0")==2){
				if(substr_count($sanpham_id_trc,"9")==2){
					if(strpos($sanpham_id_trc,"9")==3){
					$sanpham_idstr=substr($sanpham_id_trc,0,4);
					$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
					$sanpham_id=$sanpham_idstr.$sanpham_idstr1;	
				}
			}
			else{
					$sanpham_idstr=substr($sanpham_id_trc,0,4);
					$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
					$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
				}
		}
		else{
			$sanpham_idstr=substr($sanpham_id_trc,0,5);
			$sanpham_id=$sanpham_idstr."1";
		}
	}
	elseif(strpos($sanpham_id_trc,"0")==4){
			$sanpham_idstr=substr($sanpham_id_trc,0,4);
			$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
			$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
	}
	elseif(strpos($sanpham_id_trc,"0")==3){
			$sanpham_idstr=substr($sanpham_id_trc,0,3);
			$sanpham_idstr1=(substr($sanpham_id_trc,4,6)+1);
			$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
	}
	elseif(strpos($sanpham_id_trc,"0")==2){
			$sanpham_idstr=substr($sanpham_id_trc,0,2);
			$sanpham_idstr1=(substr($sanpham_id_trc,3,6)+1);
			$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
	}
	else{
			if(strpos($sanpham_id_trc,"9999")==2){
				$sanpham_id="NULL";
			}elseif($sanpham_id_trc==""){
				$sanpham_id=$donvi."0001";
			}else{
				$sanpham_idstr=substr($sanpham_id_trc,0,2);
				$sanpham_idstr1=(substr($sanpham_id_trc,2,6)+1);
				$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
				}
	}
			echo "Ok";
			$r="INSERT INTO `tblsanpham`(sanpham_id,ten_sanpham,danhmuc_id,nhacungcap_id,donvi_id,gia_nhap,gia_ban,giam_gia,image_link) VALUES('$sanpham_id','$name','$danhmuc','$ncc','$donvi','$gianhap','$giaban','$km','$src_avatar')";
			$q=mysqli_query($dbc,$r) or die("Oopt! ".mysql_error());
			}else {
				echo "Fill full all Fields,Please!";
			}
			
		}
		
		if(isset($_POST['id_sp_del'])){
			$id_sp_del=$_POST['id_sp_del'];
			//Xóa file ảnh cũ
			$r="select avatar from tblsanpham where sanpham_id='$id_sp_del'";
			$q=mysqli_query($dbc,$r);
			$fet_avt=mysqli_fetch_row($q);
			$avatar=$fet_avt[0];
			$linkdel="../../".$avatar;
						unlink($linkdel);
			$r="DELETE FROM `tblsanpham` WHERE `sanpham_id`='$id_sp_del'";
			$q=mysqli_query($dbc,$r) or die ("Oopt! ".mysql_error());
		}
		//Sửa thông tin Nhân viên
		
			//Get thông tin
		if(isset($_POST['get_sp_info'])){
			$edit_sanpham_id=$_POST['get_sp_info'];
			$r="SELECT * FROM `tblsanpham` WHERE `sanpham_id`='$edit_sanpham_id'";
			$q=mysqli_query($dbc,$r);
			$edit_array=array();
			$fet=mysqli_fetch_row($q);	
			echo json_encode($fet);
		}
		
			//Sửa thông tin
		if (isset($_POST['eid'])){
			$error=array();
			if(empty($_POST['ename'])){
				$error[]=" Tên Nhân Viên";
			}if(empty($_POST['edonvi'])){
				$error[]=" Vị trí ";
			}if(empty($_POST['encc'])){
				$error[]=" Level";
			}if(empty($_POST['ekm'])){
				$error[]=" Địa chỉ";
			}
			if(empty($_POST['edateofbirth'])){
				$error[]=" Ngày Sinh";
			}	
			if(empty($_POST['egianhap'])){
				$error[]="SDT";
			}
			if(empty($error)){
				$eid=$_POST['eid'];
				$name=mysql_escape_string($_POST['ename']);
				$donvi=$_POST['edonvi'];
				$ncc=mysql_escape_string($_POST['encc']);
				$km=mysql_escape_string($_POST['ekm']);
				$gianhap=mysql_escape_string($_POST['egianhap']);
				$giaban=mysql_escape_string($_POST['egiaban']);
				$dateofbirth=mysql_escape_string($_POST['edateofbirth']);
				$avatar=$_FILES['eavatar']['name'];	
				
			//Lấy sourse ảnh
				$r="select avatar from tblsanpham where sanpham_id='$eid'";
				$q=mysqli_query($dbc,$r);
				$sourse=mysqli_fetch_row($q);
				$pre_avatar=$sourse[0];
			//Kiểm tra xem có thay đổi vị trí k
				$re_id=substr($eid,0,2);
				if(strcmp($eid,$donvi)){
				//Nếu == thì thực hiện update
					if($avatar!=''){//KT ng dùng có thêm ảnh mới k, nếu có thì xóa ảnh cũ đi
						$linkdel="../../".$avatar;
						unlink($linkdel);
						//Update
						$fmten=date('Ymdhis');
						$link='../../../../upload/'.$fmten;
						copy($_FILES['eavatar']['tmp_name'],$link);
						$src_avatar=substr($link,6);
						if($giaban!=''){
							$r="update tblsanpham 		set ten_sp='$name',ncc_id='$ncc',ngay_sinh='$dateofbirth',dia_chi='$km',giaban=SHA1('$giaban'),avatar='$src_avatar',SDT='$gianhap' where sanpham_id='$eid'";
						$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));	
							echo "Ok";
						}else{
							$r="update tblsanpham set ten_sp='$name',ncc_id='$ncc',ngay_sinh='$dateofbirth',dia_chi='$km',avatar='$src_avatar',SDT='$gianhap' where sanpham_id='$eid'"; 	
						$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));
							echo "Ok";
						}
					}else{
						if($giaban!=''){
							$r="update tblsanpham 		set ten_sp='$name',ncc_id='$ncc',ngay_sinh='$dateofbirth',dia_chi='$km',giaban=SHA1('$giaban'),SDT='$gianhap' where sanpham_id='$eid'";
						$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));	
							echo "Ok";
						}else{
							$r="update tblsanpham set ten_sp='$name',ncc_id='$ncc',ngay_sinh='$dateofbirth',dia_chi='$km',SDT='$gianhap' where sanpham_id='$eid'";
						$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));
						
							echo "Ok";
							}					
						}
				}
				else{
				//Nếu != thì Up 1 nhân viên mới
								$r="SELECT `sanpham_id` FROM `tblsanpham` WHERE `sanpham_id` LIKE '$donvi%' ORDER BY `sanpham_id` DESC LIMIT 1";
			$q=mysqli_query($dbc,$r);
			$layid=mysqli_fetch_row($q);
			$sanpham_id_trc=$layid[0];
			if(strpos($sanpham_id_trc,"000")==2){
		if(strpos($sanpham_id_trc,"9")==5){
			$sanpham_idstr=substr($sanpham_id_trc,0,4);
			$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
			$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
		}
		else{
			$sanpham_idstr=substr($sanpham_id_trc,0,5);
			$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
			$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
		}
	}
	elseif(strpos($sanpham_id_trc,"000")==3){
			$sanpham_idstr=substr($sanpham_id_trc,0,5);
			$sanpham_id=$sanpham_idstr."1";
	}
	elseif(strpos($sanpham_id_trc,"00")==2){
		if(strpos($sanpham_id_trc,"9")==4){
			if(strpos($sanpham_id_trc,"99")==4){
				$sanpham_idstr=substr($sanpham_id_trc,0,3);
				$sanpham_idstr1=(substr($sanpham_id_trc,4,6)+1);
				$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
			}
			else{
				$sanpham_idstr=substr($sanpham_id_trc,0,5);
				$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
				$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
				}
		}
	}
	elseif(strpos($sanpham_id_trc,"00")==3){
			if(substr_count($sanpham_id_trc,"9")==2){
				$sanpham_idstr=substr($sanpham_id_trc,0,4);
				$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
				$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
			}
			else{
				if(strpos($sanpham_id_trc,"9")==5){
					$sanpham_idstr=substr($sanpham_id_trc,0,4);
					$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
					$sanpham_id=$sanpham_idstr.$sanpham_idstr1;	
				}
			}
	}
	elseif(strpos($sanpham_id_trc,"00")==4){
			$sanpham_idstr=substr($sanpham_id_trc,0,5);
			$sanpham_id=$sanpham_idstr."1";
	}
	elseif(substr_count($sanpham_id_trc,"0")==2){
		if(strpos($sanpham_id_trc,"0")==2){
				if(substr_count($sanpham_id_trc,"9")==2){
					if(strpos($sanpham_id_trc,"9")==3){
					$sanpham_idstr=substr($sanpham_id_trc,0,4);
					$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
					$sanpham_id=$sanpham_idstr.$sanpham_idstr1;	
				}
			}
			else{
					$sanpham_idstr=substr($sanpham_id_trc,0,4);
					$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
					$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
				}
		}
		else{
			$sanpham_idstr=substr($sanpham_id_trc,0,5);
			$sanpham_id=$sanpham_idstr."1";
		}
	}
	elseif(strpos($sanpham_id_trc,"0")==4){
			$sanpham_idstr=substr($sanpham_id_trc,0,4);
			$sanpham_idstr1=(substr($sanpham_id_trc,5,6)+1);
			$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
	}
	elseif(strpos($sanpham_id_trc,"0")==3){
			$sanpham_idstr=substr($sanpham_id_trc,0,3);
			$sanpham_idstr1=(substr($sanpham_id_trc,4,6)+1);
			$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
	}
	elseif(strpos($sanpham_id_trc,"0")==2){
			$sanpham_idstr=substr($sanpham_id_trc,0,2);
			$sanpham_idstr1=(substr($sanpham_id_trc,3,6)+1);
			$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
	}
	else{
			if(strpos($sanpham_id_trc,"9999")==2){
				$sanpham_id="NULL";
			}elseif($sanpham_id_trc==""){
				$sanpham_id=$donvi."0001";
			}else{
				$sanpham_idstr=substr($sanpham_id_trc,0,2);
				$sanpham_idstr1=(substr($sanpham_id_trc,2,6)+1);
				$sanpham_id=$sanpham_idstr.$sanpham_idstr1;
				}
	}
					if($avatar!=''){//KT ng dùng có thêm ảnh mới k, nếu có thì xóa ảnh cũ đi
						$linkdel="../../".$avatar;
						unlink($linkdel);
						//Update
						$fmten=date('Ymdhis');
						$link='../../../../upload/'.$fmten;
						copy($_FILES['avatar']['tmp_name'],$link);
						$src_avatar=substr($link,6);
						$r="update tblsanpham set sanpham_id='$sanpham_id',ten_sp='$name',ncc_id='$ncc',ngay_sinh='$dateofbirth',dia_chi='$km',avatar='$src_avatar',SDT='$gianhap' where sanpham_id='$eid'";
						$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));
					
						echo "Ok";
					}else{
						$r="update tblsanpham set sanpham_id='$sanpham_id',ten_sp='$name',ncc_id='$ncc',ngay_sinh='$dateofbirth',dia_chi='$km',SDT='$gianhap' where sanpham_id='$eid'";
						$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));
					
						echo "Ok";
					}
				}
			}else {
				echo "Fill full all Fields,Please!";
			}
			
								}
	}
?>