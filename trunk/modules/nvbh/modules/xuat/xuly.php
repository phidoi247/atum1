<?php
	include("../../../../Connections/connect.php");
	
   	if(isset($_POST['msp'])){
		$msp=$_POST['msp'];
		$r="select ten_sanpham,gia_ban as gia from tblsanpham where sanpham_id='$msp'";
		$q=mysqli_query($dbc,$r);
		$data=array();
		while($f=mysqli_fetch_assoc($q)){$data[]=$f;};
		echo json_encode($data);
	}
	if(isset($_POST['tsp'])){
		$tsp=$_POST['tsp'];
		$ma_hd=$_POST['ma_hd'];
		$ma_nv=$_POST['idu'];
		$mang_msp=array();
		$mang_slsp=array();
		$str_r="";
		for($i=1;$i<=$tsp;$i++){
		$mang_msp[]=mysql_escape_string(strip_tags($_POST["msp{$i}"]));
		$mang_slsp[]=mysql_escape_string(strip_tags($_POST["slsp{$i}"]));
		$str_r.="('$ma_hd',1,'".$mang_msp[$i-1]."','".$mang_slsp[$i-1]."'),";		
		}
		$str_r=substr($str_r,0,-1);
		//Ghi vao tblhoadon
		$r="INSERT INTO tblhoadon (ten_hoadon,thoigian,nhanvien_id) VALUES ('$ma_hd',NOW(),'$ma_nv');";
		$q= mysqli_query($dbc,$r) ;
		if(mysqli_affected_rows($dbc)){
			//Ghi vao tblchitietdonhang
			$r="INSERT INTO tblchitietdonhang(ten_hoadon,loaigiaodich_id,sanpham_id,soluong) VALUES".$str_r.";";
        	$q= mysqli_query($dbc,$r) ;
			if(mysqli_affected_rows($dbc)){
				echo "Ok";
			}else{
				echo mysqli_error($dbc);	
			}
		}else{
			echo mysqli_error($dbc);
		}
		
	}
?>