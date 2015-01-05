<?php
	include("../../../../Connections/connect.php");
	if(isset($_POST['msp'])){
		$msp=$_POST['msp'];
		$r="select ten_sanpham,gia_nhap as gia from tblsanpham where sanpham_id='$msp'";
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
		$str_r.="('$ma_hd',2,'".$mang_msp[$i-1]."','".$mang_slsp[$i-1]."'),";		
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
  /*
    // đặt biến ngày giờ 
    $timezone = +6;
    $now = getdate(time() + 3600*($timezone+date("0")));
    //print_r($now);
    $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"]; 
    $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"]; 
    //print_r($now);
    //khai báo biến để truyền giá trị của post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $errors = array();// tạo array để khi có lỗi sẽ truyền lỗi vào array,nếu array lỗi có giá trị sẽ k cho submit
                if(empty($_POST['HD'])){
                    $errors[] = "HD";
                }else{
                    $hoadon = mysqli_real_escape_string($dbc,strip_tags($_POST['HD']));//hàm chữ đỏ để người dùng k đc nhập kí tự lạ kiểu < >
                }
                if(empty($_POST['SPID'])){
                    $errors[] = "SPID";
                }else{
                    $id_sanpham = $_POST['SPID'];
                }
                if(isset($_POST['quantity']) && filter_var($_POST['quantity'], FILTER_VALIDATE_INT,array('min_range' => 1))){ // phải nhập số
                    $soluong = $_POST['quantity'];
                }else{
                    $errors[] = "quantity";
                }
                if(empty($errors)){//nếu array error k có giá trị sẽ cho thực hiện nhập vào database
                    $check = "SELECT ten_hoadon FROM tblhoadon"; //kiểm tra tên hóa đơn trong database
                    $rcheck = mysqli_query($dbc,$check) or die("Query {$check} \n<br/> MYSQL đã bị lỗi!! : " . mysqli_error($dbc));
                        while($checkname = mysqli_fetch_array($rcheck, MYSQLI_ASSOC)){
                            $name [] = $checkname['ten_hoadon'];//những tên hóa đơn có trong database sẽ truyền vào mảng name
                        }
                        if(in_array($hoadon,$name)){//nếu tên hóa đơn vừa nhập đã có trong name thì chỉ thêm dữ liệu vào 2 bảng này
                            $q0 = "INSERT INTO tblchitietdonhang (ten_hoadon,loaigiaodich_id,sanpham_id,soluong) VALUES('$hoadon',2,'$id_sanpham','$soluong')";
                            $r0 = mysqli_query($dbc,$q0) or die ("Query {$q0} \n<br/> MYSQL đã bị lỗi!! : " . mysqli_error($dbc));
                        }else{//nếu không thì thêm cả vào 3 bảng
                            $q0 = "INSERT INTO tblchitietdonhang (ten_hoadon,loaigiaodich_id,sanpham_id,soluong) VALUES('$hoadon',2,'$id_sanpham','$soluong')";
                            $r0 = mysqli_query($dbc,$q0) or die ("Query {$q0} \n<br/> MYSQL đã bị lỗi!! : " . mysqli_error($dbc));  
                            $q1 = "INSERT INTO tblhoadon (ten_hoadon,ngay,gio,nhanvien_id) VALUES ('$hoadon','$currentDate','$currentTime','BH001')";
                            $r1 = mysqli_query($dbc,$q1) or die("Query {$q1} \n<br/> MYSQL đã bị lỗi!! : " . mysqli_error($dbc));
                        }
                    if(mysqli_affected_rows($dbc) == 1){//nếu nhập đc vào thì hiển thị
                        $massages = "<p class='success'>Đã nhập kho thành công!</p>";
                    }else{//nếu không
                        $massages = "<p class='warning'>Nhập kho không thành công!</p>";
                    }
                }else{//nếu array error có giá trị thì hiển thị
                    $massages = "<p class='warning'>Bạn chưa nhập đủ thông tin!</p>";
                }
        }
   */ ?>
