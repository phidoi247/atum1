<?php include('includes/mysqli_connect.php');?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	<meta name="author" content="GallerySoft.info" />
    <link rel="stylesheet" href="css/stylenhap.css"/>
	<title>Nhập hàng,hóa đơn</title>
</head>

<body>
    <?php 
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
    ?>
<div id="container">

<div id="content">
<div id="form">
<?php if(!empty($massages)){echo $massages;}?>
<!--tạo form nhập kho -->
<form action="" method="post">
    <fieldset>
        <legend>Nhập Sản Phẩm</legend>
        <div>
            <label>Nhập Mã Hóa Đơn
            <?php 
                if(isset($errors) && in_array('HD',$errors)){//nếu mảng error có giá trị thì hiển thị
                    echo "<p class='warning'>Chưa có mã hóa đơn!</p>";
                }
            ?>
            </label>
            <input type="text" name="HD" value="<?php if(isset($_POST['HD']) && $_POST['HD'] != NULL){ echo $_POST['HD']; } ?>"/>
        </div>
        <div>
            <label>Nhập Mã Sản Phẩm
            <?php 
                if(isset($errors) && in_array('SPID',$errors)){
                    echo "<p class='warning'>Chưa có mã sản phẩm!</p>";
                }
            ?>
            </label>
            <?php 
                $q4 = "SELECT tblsanpham.sanpham_id FROM tblsanpham";
                $r4 = mysqli_query($dbc,$q4) or die("Query {$q4} \n<br/> MYSQL Error : " . mysqli_error($dbc));
                while($IDSP = mysqli_fetch_array($r4,MYSQLI_ASSOC)){
                    $masanpham [] = $IDSP['sanpham_id'];
                }
            ?>
            <select name="SPID">
                <option>Mã sản phẩm</option>
                <?php 
                    foreach($masanpham AS $v){
                        echo "<option>".$v."</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <label>Nhập Số Lượng
            <?php 
                if(isset($errors) && in_array('quantity',$errors)){
                    echo "<p class='warning'>Chưa có số lượng sản phẩm!</p>";
                }
            ?>
            </label>
            <input type="text" name="quantity" value=""/>
        </div>
    <input id="nhap" type="submit" name="submit" value="Nhập"/>
    <a id="link" href="http://localhost/project/nhap.php" style=" text-decoration: none;background-color: #E3F0FC;">
    <span id="onlink" style="color: black;border: 1px solid;border-color: #7EB4EA;" >Hóa Đơn Mới</span>
    </a>
    </fieldset>
</form>
</div>
<!--form hóa đơn-->
<div id="hoadon">
<h3>Thông tin hóa đơn</h3>
<form id="formHD">   
         <?php //nếu tên hóa đơn đc nhập thì hiển thị
         if(isset($hoadon)){
         echo "<h3>Mã Hóa đơn: ".$hoadon."</h3>";
         }
         ?>  
         <hr />
         Công ty chuyên buôn lậu<br />
        <table>
            <div>
                <thead>
                    <tr>
                        <th class="th">Mã Sản Phẩm</th>
                        <th class="th">Tên Sản Phẩm</th>
                        <th class="th">Số Lượng</th>
                        <th class="th">Thành Tiền</th>
                        <th class="th">Ngày</th> 
                        <th class="th">Giờ</th>  
                    </tr>
                </thead>      
                <tbody>
                 <?php 
                 //nối các bảng cần hiển thị trong database
                 if(isset($hoadon)){
            $q2 = "SELECT tblchitietdonhang.soluong,tblhoadon.ten_hoadon,tblhoadon.ngay,tblhoadon.gio,tblsanpham.sanpham_id,tblsanpham.ten_sanpham,tblsanpham.gia_nhap * tblchitietdonhang.soluong AS thanhtien";
            $q2 .= " FROM tblhoadon";
            $q2 .= " JOIN tblchitietdonhang";
            $q2 .= " USING(ten_hoadon)";
            $q2 .= " JOIN tblsanpham";
            $q2 .= " USING(sanpham_id)";
            $q2 .= " WHERE tblchitietdonhang.ten_hoadon = '".$hoadon."'";
            $r2 = mysqli_query($dbc,$q2) or die("Query {$q2} \n<br/> MYSQL Error : " . mysqli_error($dbc));
            while($xuathoadon = mysqli_fetch_array($r2, MYSQLI_ASSOC)){//tạo array xuathoadon để truyền giá trị trong database vào và hiển thị theo từng cột
                echo "
                <tr id='td'>
                    <td>{$xuathoadon['sanpham_id']}</td>
                    <td>{$xuathoadon['ten_sanpham']}</td>
                    <td>{$xuathoadon['soluong']}</td>
                    <td>{$xuathoadon['thanhtien']}</td>
                    <td>{$xuathoadon['ngay']}</td>
                    <td>{$xuathoadon['gio']}</td>
                </tr>
                    ";
            }          
            }
                ?>    
                </tbody>
            </div>
        </table>
        <pre>
            Nhà sách người bé
        </pre>
            <hr />
                 <?php 
                    if(isset($hoadon)){
                $q3 = "SELECT SUM(tblsanpham.gia_nhap * tblchitietdonhang.soluong) AS thanhtien";
                $q3 .= " FROM tblhoadon";
                $q3 .= " JOIN tblchitietdonhang";
                $q3 .= " USING(ten_hoadon)";
                $q3 .= " JOIN tblsanpham";
                $q3 .= " USING(sanpham_id)";
                $q3 .= " WHERE tblchitietdonhang.ten_hoadon = '".$hoadon."'";
                $r3 = mysqli_query($dbc,$q3) or die("Query {$q3} \n<br/> MYSQL Error : " .mysqli_error($dbc));
                    while($SUM = mysqli_fetch_array($r3, MYSQLI_ASSOC)){
                        echo "<h3>Tổng là : {$SUM['thanhtien']}</h3>";
                    }       
                    }
                ?>
                <input type="submit" name="print" value="In hóa đơn"/>
</form>
</div>

</div>


</div>

</body>
</html>