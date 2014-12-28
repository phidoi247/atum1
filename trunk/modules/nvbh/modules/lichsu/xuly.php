<?php 
	include '../../../../Connections/connect.php';
	if(isset($_POST['chitiet'])){
		$id_hd=$_POST['chitiet'];
		$r="select a.ten_hoadon,c.sanpham_id,c.ten_sanpham,c.gia_ban,b.soluong,(c.gia_ban*b.soluong) as thanhtien from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id and b.loaigiaodich_id=1 and a.ten_hoadon ='$id_hd' order by a.ten_hoadon";
		$q=mysqli_query($dbc,$r) or die(mysqli_error($dbc));
		$fet_dm=array();
			while($row=mysqli_fetch_assoc($q)){$fet_dm[]=$row;};
			echo json_encode($fet_dm);
	}

?>