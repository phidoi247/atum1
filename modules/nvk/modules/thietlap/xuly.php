<?php
	include '../../../../Connections/connect.php';
	if(isset($_POST['old_pass'])){
		$oldpass=SHA1($_POST['old_pass']);
		$id=$_POST['idu'];
		$r="select * from tblnhanvien where nhanvien_id='$id' and password='$oldpass'";
		$q=mysqli_query($dbc,$r) or die(mysqli_error($dbc));
		if(mysqli_fetch_row($q)){
			echo "Ok";
		}else{
			echo "Not Ok";
		}
	}
	if(isset($_POST['new_pass'])){
		$newpass=SHA1($_POST['new_pass']);
		$id=$_POST['idu'];
		$r="update tblnhanvien set password='$newpass' where nhanvien_id='$id'";
		$q=mysqli_query($dbc,$r)or die(mysqli_error($dbc));
		if(mysqli_affect_rows($dbc)){
			echo "Ok";
		}
	}
	if(isset($_POST['aidu'])){
		$id=$_POST['aidu'];
		$avt=$_FILES['avatar']['name'];
		//xoa avt cu
		$r="select avatar from tblnhanvien where nhanvien_id='$id'";
			$q=mysqli_query($dbc,$r)or die(mysqli_error($dbc));
			$fet_avt=mysqli_fetch_row($q);
			$avatar=$fet_avt[0];
			$linkdel="../../../../".$avatar;
						unlink($linkdel);
		//them avt moi
		$fmten=date('Ymdhis');
		$link='../../../../upload/'.$fmten;
		copy($_FILES['avatar']['tmp_name'],$link);
		$src_avatar=substr($link,12);
		//update query
		$r="UPDATE tblnhanvien SET avatar='$src_avatar' WHERE nhanvien_id='$id'";
		$q=mysqli_query($dbc,$r) or die(mysqli_error($dbc));
		
	}
?>