<?php
	include '../../../Connections/connect.php';
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
			}
			if(empty($_POST['dateofbirth'])){
				$error[]=" Ngày Sinh";
			}	
			if(empty($error)){
				$name=mysql_escape_string($_POST['name']);
				$position=$_POST['position'];
				$level=mysql_escape_string($_POST['level']);
				$address=mysql_escape_string($_POST['address']);
				$password=mysql_escape_string($_POST['password']);
				$dateofbirth=mysql_escape_string($_POST['dateofbirth']);
				$avatar=$_FILES['avatar']['name'];
			//Link avatar vao upload folder
				$fmten=date('Ymdhis');
				$link='../../../upload/'.$fmten;
				copy($_FILES['avatar']['tmp_name'],$link);
				$src_avatar=substr($link,6);
			$r="SELECT `nhanvien_id` FROM `tblnhanvien` WHERE `nhanvien_id` LIKE '$position%' ORDER BY `nhanvien_id` DESC LIMIT 1";
			$q=mysql_query($r);
			$layid=mysql_fetch_row($q);
			$nhanvien_id_trc=$layid[0];
			if(strpos($nhanvien_id_trc, "00")!==false){
				$nhanvien_id=$position."00".(string)(int)((substr($nhanvien_id_trc, 4))+1);
			}else if(strpos($nhanvien_id_trc, "0")!==false){
				$nhanvien_id=$position."0".(string)(int)((substr($nhanvien_id_trc, 3))+1);
			}else {
				$nhanvien_id=$position.(string)(int)((substr($nhanvien_id_trc, 2))+1);
			}
			echo "Ok";
			$r="INSERT INTO `tblnhanvien` VALUES('$nhanvien_id','$name','$level','$dateofbirth','$address',NOW(),'$src_avatar',SHA1('$password'),'NULL')";
			$q=mysql_query($r) or die("Oopt! ".mysql_error());
			}else {
				echo "Fill full all Fields,Please!";
			}
			
		}
		
		if(isset($_POST['id_emp_del'])){
			$id_emp_del=$_POST['id_emp_del'];
			$r="DELETE FROM `tblnhanvien` WHERE `nhanvien_id`='$id_emp_del'";
			$q=mysql_query($r) or die ("Oopt! ".mysql_error());
		}
		
	}
?>