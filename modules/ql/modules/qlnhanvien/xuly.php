<?php
	include '../../../../Connections/connect.php';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if (isset($_POST['name'])){
			$error=array();
			if(empty($_POST['name'])){
				$error[]=" Tên Nhân Viên";
			}if(empty($_POST['password'])){
				$error[]=" Password";
			}if(empty($_POST['position'])){
				$error[]=" Vị trí ";
			}if(empty($_POST['level'])){
				$error[]=" Level";
			}if(empty($_POST['address'])){
				$error[]=" Địa chỉ";
			}if(empty($_POST['dateofbirth'])){
				$error[]=" Ngày Sinh";
			}if(empty($_FILES['avatar']['tmp_name'])){
				$error[]=" Ảnh";
			}if(empty($_POST['phone'])){
				$error[]=" SDT";
			}	
			if(empty($error)){
				$name=mysql_escape_string($_POST['name']);
				$position=$_POST['position'];
				$level=mysql_escape_string($_POST['level']);
				$address=mysql_escape_string($_POST['address']);
				$phone=mysql_escape_string($_POST['phone']);
				$password=mysql_escape_string($_POST['password']);
				$dateofbirth=mysql_escape_string($_POST['dateofbirth']);
				$avatar=$_FILES['avatar']['name'];
			//Link avatar vao upload folder
				$fmten=date('Ymdhis');
				$link='../../../../upload/'.$fmten;
				copy($_FILES['avatar']['tmp_name'],$link);
				$src_avatar=substr($link,12);
			$r="SELECT `nhanvien_id` FROM `tblnhanvien` WHERE `nhanvien_id` LIKE '$position%' ORDER BY `nhanvien_id` DESC LIMIT 1";
			$q=mysqli_query($dbc,$r);
			$layid=mysqli_fetch_row($q);
			$nhanvien_id_trc=$layid[0];
			if(strpos($nhanvien_id_trc,"000")==2){
		if(strpos($nhanvien_id_trc,"9")==5){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
			$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
			$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
		}
		else{
			$nhanvien_idstr=substr($nhanvien_id_trc,0,5);
			$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
			$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
		}
	}
	elseif(strpos($nhanvien_id_trc,"000")==3){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,5);
			$nhanvien_id=$nhanvien_idstr."1";
	}
	elseif(strpos($nhanvien_id_trc,"00")==2){
		if(strpos($nhanvien_id_trc,"9")==4){
			if(strpos($nhanvien_id_trc,"99")==4){
				$nhanvien_idstr=substr($nhanvien_id_trc,0,3);
				$nhanvien_idstr1=(substr($nhanvien_id_trc,4,6)+1);
				$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
			}
			else{
				$nhanvien_idstr=substr($nhanvien_id_trc,0,5);
				$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
				$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
				}
		}
	}
	elseif(strpos($nhanvien_id_trc,"00")==3){
			if(substr_count($nhanvien_id_trc,"9")==2){
				$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
				$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
				$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
			}
			else{
				if(strpos($nhanvien_id_trc,"9")==5){
					$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
					$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
					$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;	
				}
			}
	}
	elseif(strpos($nhanvien_id_trc,"00")==4){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,5);
			$nhanvien_id=$nhanvien_idstr."1";
	}
	elseif(substr_count($nhanvien_id_trc,"0")==2){
		if(strpos($nhanvien_id_trc,"0")==2){
				if(substr_count($nhanvien_id_trc,"9")==2){
					if(strpos($nhanvien_id_trc,"9")==3){
					$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
					$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
					$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;	
				}
			}
			else{
					$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
					$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
					$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
				}
		}
		else{
			$nhanvien_idstr=substr($nhanvien_id_trc,0,5);
			$nhanvien_id=$nhanvien_idstr."1";
		}
	}
	elseif(strpos($nhanvien_id_trc,"0")==4){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
			$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
			$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
	}
	elseif(strpos($nhanvien_id_trc,"0")==3){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,3);
			$nhanvien_idstr1=(substr($nhanvien_id_trc,4,6)+1);
			$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
	}
	elseif(strpos($nhanvien_id_trc,"0")==2){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,2);
			$nhanvien_idstr1=(substr($nhanvien_id_trc,3,6)+1);
			$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
	}
	else{
			if(strpos($nhanvien_id_trc,"9999")==2){
				$nhanvien_id="NULL";
			}elseif($nhanvien_id_trc==""){
				$nhanvien_id=$position."0001";
			}else{
				$nhanvien_idstr=substr($nhanvien_id_trc,0,2);
				$nhanvien_idstr1=(substr($nhanvien_id_trc,2,6)+1);
				$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
				}
	}
			echo "Ok";
			$r="INSERT INTO `tblnhanvien` VALUES(null,'$nhanvien_id','$name','$level','$dateofbirth','$address',NOW(),'$src_avatar',SHA1('$password'),'$phone')";
			$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));
			}else {
				echo "Fill full all Fields,Please!";
			}
			
		}
		
		if(isset($_POST['id_emp_del'])){
			$id_emp_del=$_POST['id_emp_del'];
			//Xóa file ảnh cũ
			$r="select avatar from tblnhanvien where nhanvien_id='$id_emp_del'";
			$q=mysqli_query($dbc,$r);
			$fet_avt=mysqli_fetch_row($q);
			$avatar=$fet_avt[0];
			$linkdel="../../../../".$avatar;
						unlink($linkdel);
			$r="DELETE FROM `tblnhanvien` WHERE `nhanvien_id`='$id_emp_del'";
			$q=mysqli_query($dbc,$r) or die ("Oopt! ".mysqli_error($dbc));
		}
		//Sửa thông tin Nhân viên
		
			//Get thông tin
		if(isset($_POST['get_emp_info'])){
			$edit_emp_id=$_POST['get_emp_info'];
			$r="SELECT * FROM `tblnhanvien` WHERE `nhanvien_id`='$edit_emp_id'";
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
			}if(empty($_POST['eposition'])){
				$error[]=" Vị trí ";
			}if(empty($_POST['elevel'])){
				$error[]=" Level";
			}if(empty($_POST['eaddress'])){
				$error[]=" Địa chỉ";
			}
			if(empty($_POST['edateofbirth'])){
				$error[]=" Ngày Sinh";
			}	
			if(empty($_POST['ephone'])){
				$error[]="SDT";
			}
			if(empty($error)){
				$eid=$_POST['eid'];
				$name=mysql_escape_string($_POST['ename']);
				$position=$_POST['eposition'];
				$level=mysql_escape_string($_POST['elevel']);
				$address=mysql_escape_string($_POST['eaddress']);
				$phone=mysql_escape_string($_POST['ephone']);
				$password=mysql_escape_string($_POST['epassword']);
				$dateofbirth=mysql_escape_string($_POST['edateofbirth']);
				$avatar=$_FILES['eavatar']['name'];	
				
			//Lấy sourse ảnh
				$r="select avatar from tblnhanvien where nhanvien_id='$eid'";
				$q=mysqli_query($dbc,$r);
				$sourse=mysqli_fetch_row($q);
				$pre_avatar=$sourse[0];
			//Kiểm tra xem có thay đổi vị trí k
				$re_id=substr($eid,0,2);
				if(strcmp($eid,$position)){
				//Nếu == thì thực hiện update
					if($avatar!=''){//KT ng dùng có thêm ảnh mới k, nếu có thì xóa ảnh cũ đi
						$linkdel="../../".$avatar;
						unlink($linkdel);
						//Update
						$fmten=date('Ymdhis');
						$link='../../../../upload/'.$fmten;
						copy($_FILES['eavatar']['tmp_name'],$link);
						$src_avatar=substr($link,12);
						if($password!=''){
							$r="update tblnhanvien 		set ten_nhanvien='$name',level_id='$level',ngay_sinh='$dateofbirth',dia_chi='$address',password=SHA1('$password'),avatar='$src_avatar',SDT='$phone' where nhanvien_id='$eid'";
						$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));	
							echo "Ok";
						}else{
							$r="update tblnhanvien set ten_nhanvien='$name',level_id='$level',ngay_sinh='$dateofbirth',dia_chi='$address',avatar='$src_avatar',SDT='$phone' where nhanvien_id='$eid'"; 	
						$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));
							echo "Ok";
						}
					}else{
						if($password!=''){
							$r="update tblnhanvien 		set ten_nhanvien='$name',level_id='$level',ngay_sinh='$dateofbirth',dia_chi='$address',password=SHA1('$password'),SDT='$phone' where nhanvien_id='$eid'";
						$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));	
							echo "Ok";
						}else{
							$r="update tblnhanvien set ten_nhanvien='$name',level_id='$level',ngay_sinh='$dateofbirth',dia_chi='$address',SDT='$phone' where nhanvien_id='$eid'";
						$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));
						
							echo "Ok";
							}					
						}
				}
				else{
				//Nếu != thì Up 1 nhân viên mới
								$r="SELECT `nhanvien_id` FROM `tblnhanvien` WHERE `nhanvien_id` LIKE '$position%' ORDER BY `nhanvien_id` DESC LIMIT 1";
			$q=mysqli_query($dbc,$r);
			$layid=mysqli_fetch_row($q);
			$nhanvien_id_trc=$layid[0];
			if(strpos($nhanvien_id_trc,"000")==2){
		if(strpos($nhanvien_id_trc,"9")==5){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
			$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
			$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
		}
		else{
			$nhanvien_idstr=substr($nhanvien_id_trc,0,5);
			$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
			$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
		}
	}
	elseif(strpos($nhanvien_id_trc,"000")==3){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,5);
			$nhanvien_id=$nhanvien_idstr."1";
	}
	elseif(strpos($nhanvien_id_trc,"00")==2){
		if(strpos($nhanvien_id_trc,"9")==4){
			if(strpos($nhanvien_id_trc,"99")==4){
				$nhanvien_idstr=substr($nhanvien_id_trc,0,3);
				$nhanvien_idstr1=(substr($nhanvien_id_trc,4,6)+1);
				$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
			}
			else{
				$nhanvien_idstr=substr($nhanvien_id_trc,0,5);
				$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
				$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
				}
		}
	}
	elseif(strpos($nhanvien_id_trc,"00")==3){
			if(substr_count($nhanvien_id_trc,"9")==2){
				$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
				$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
				$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
			}
			else{
				if(strpos($nhanvien_id_trc,"9")==5){
					$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
					$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
					$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;	
				}
			}
	}
	elseif(strpos($nhanvien_id_trc,"00")==4){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,5);
			$nhanvien_id=$nhanvien_idstr."1";
	}
	elseif(substr_count($nhanvien_id_trc,"0")==2){
		if(strpos($nhanvien_id_trc,"0")==2){
				if(substr_count($nhanvien_id_trc,"9")==2){
					if(strpos($nhanvien_id_trc,"9")==3){
					$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
					$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
					$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;	
				}
			}
			else{
					$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
					$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
					$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
				}
		}
		else{
			$nhanvien_idstr=substr($nhanvien_id_trc,0,5);
			$nhanvien_id=$nhanvien_idstr."1";
		}
	}
	elseif(strpos($nhanvien_id_trc,"0")==4){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,4);
			$nhanvien_idstr1=(substr($nhanvien_id_trc,5,6)+1);
			$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
	}
	elseif(strpos($nhanvien_id_trc,"0")==3){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,3);
			$nhanvien_idstr1=(substr($nhanvien_id_trc,4,6)+1);
			$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
	}
	elseif(strpos($nhanvien_id_trc,"0")==2){
			$nhanvien_idstr=substr($nhanvien_id_trc,0,2);
			$nhanvien_idstr1=(substr($nhanvien_id_trc,3,6)+1);
			$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
	}
	else{
			if(strpos($nhanvien_id_trc,"9999")==2){
				$nhanvien_id="NULL";
			}elseif($nhanvien_id_trc==""){
				$nhanvien_id=$position."0001";
			}else{
				$nhanvien_idstr=substr($nhanvien_id_trc,0,2);
				$nhanvien_idstr1=(substr($nhanvien_id_trc,2,6)+1);
				$nhanvien_id=$nhanvien_idstr.$nhanvien_idstr1;
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
						$r="update tblnhanvien set nhanvien_id='$nhanvien_id',ten_nhanvien='$name',level_id='$level',ngay_sinh='$dateofbirth',dia_chi='$address',avatar='$src_avatar',SDT='$phone' where nhanvien_id='$eid'";
						$q=mysqli_query($dbc,$r) or die("Oopt! ".mysqli_error($dbc));
					
						echo "Ok";
					}else{
						$r="update tblnhanvien set nhanvien_id='$nhanvien_id',ten_nhanvien='$name',level_id='$level',ngay_sinh='$dateofbirth',dia_chi='$address',SDT='$phone' where nhanvien_id='$eid'";
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