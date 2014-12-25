<?php 
	include '../../../../Connections/connect.php';
	if(isset($_POST['chitiet'])){
		$id_hd=$_POST['chitiet'];
		$r="select a.ten_hoadon,c.sanpham_id,c.ten_sanpham,c.gia_nhap,b.soluong,(c.gia_nhap*b.soluong) as thanhtien from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id and b.loaigiaodich_id=2 and a.ten_hoadon ='{$id_hd}'";
		$q=mysqli_query($dbc,$r) or die(mysqli_error($dbc));
		$fet_dm=array();	
        while($row=mysqli_fetch_array($q)){$fet_dm[]=$row;};
			echo json_encode($fet_dm);
	}
?>