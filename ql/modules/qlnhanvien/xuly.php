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
			$r="INSERT INTO `tblnhanvien` VALUES('$nhanvien_id','$name','$level','$dateofbirth','$address',NOW(),'$src_avatar',SHA1('$password'),'NULL')";
			$q=mysqli_query($dbc,$r) or die("Oopt! ".mysql_error());
			}else {
				echo "Fill full all Fields,Please!";
			}
			
		}
		
		if(isset($_POST['id_emp_del'])){
			$id_emp_del=$_POST['id_emp_del'];
			$r="DELETE FROM `tblnhanvien` WHERE `nhanvien_id`='$id_emp_del'";
			$q=mysqli_query($dbc,$r) or die ("Oopt! ".mysql_error());
		}
		
	}
?>