<?php 
	include '../../../../Connections/connect.php';
	if(isset($_POST['chitiet'])){
		$id_hd=$_POST['chitiet'];
		$loai=$_POST['loai'];
		if($loai=='2'){
			$r="select a.ten_hoadon,c.sanpham_id,c.ten_sanpham,c.gia_nhap as gia,b.soluong,(c.gia_nhap*b.soluong) as thanhtien ";
			$r.="from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c ";
			$r.="where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id and ";
			$r.="b.loaigiaodich_id=2 and a.ten_hoadon ='{$id_hd}'";
		}
		if($loai=='1'){
		$r="select a.ten_hoadon,c.sanpham_id,c.ten_sanpham,c.gia_nhap as gia,b.soluong,(c.gia_nhap*b.soluong) as thanhtien ";
			$r.="from tblhoadon as a,tblchitietdonhang as b,tblsanpham as c ";
			$r.="where a.ten_hoadon=b.ten_hoadon and b.sanpham_id=c.sanpham_id and ";
			$r.="b.loaigiaodich_id=1 and a.ten_hoadon ='{$id_hd}'";
		}
		$q=mysqli_query($dbc,$r) or die(mysqli_error($dbc));
		$fet_dm=array();	
        while($row=mysqli_fetch_array($q)){$fet_dm[]=$row;};
			echo json_encode($fet_dm);
	}
?>