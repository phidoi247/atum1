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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $errors = array();
                if(empty($_POST['HD'])){
                    $errors[] = "HD";
                }else{
                    $hoadon = mysqli_real_escape_string($dbc,strip_tags($_POST['HD']));
                }
                if(empty($_POST['SPID'])){
                    $errors[] = "SPID";
                }else{
                    $id_sanpham = mysqli_real_escape_string($dbc,strip_tags($_POST['SPID']));
                }
                if(isset($_POST['quantity']) && filter_var($_POST['quantity'], FILTER_VALIDATE_INT,array('min_range' => 1))){
                    $soluong = $_POST['quantity'];
                }else{
                    $errors[] = "quantity";
                }
                if(empty($errors)){
                    $now = getdate(); 
                    $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"]; 
                    $currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"]; 
                    $check = "SELECT ten_hoadon FROM tblhoadon";
                    $rcheck = mysqli_query($dbc,$check) or die("Query {$check} \n<br/> MYSQL đã bị lỗi!! : " . mysqli_error($dbc));
                        while($checkname = mysqli_fetch_array($rcheck, MYSQLI_ASSOC)){
                            $name [] = $checkname['ten_hoadon'];
                        }
                        if(in_array($hoadon,$name)){
                            $q = "INSERT INTO tblnhaphang(sanpham_id,ten_hoadon,soluong) VALUES ('$id_sanpham','$hoadon',$soluong)";
                            $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MYSQL đã bị lỗi!! : " . mysqli_error($dbc));
                        }else{
                            $q = "INSERT INTO tblnhaphang(sanpham_id,ten_hoadon,soluong) VALUES ('$id_sanpham','$hoadon',$soluong)";
                            $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MYSQL đã bị lỗi!! : " . mysqli_error($dbc));
                            $q1 = "INSERT INTO tblhoadon (ten_hoadon,loaigiaodich_id,ngay,gio,nhanvien_id) VALUES ('$hoadon',2,'$currentDate','$currentTime',1)";
                            $r1 = mysqli_query($dbc,$q1) or die("Query {$q1} \n<br/> MYSQL đã bị lỗi!! : " . mysqli_error($dbc));
                        }
                    if(mysqli_affected_rows($dbc) == 1){
                        $massages = "<p class='success'>Đã nhập kho thành công!</p>";
                    }else{
                        $massages = "<p class='warning'>Nhập kho không thành công!</p>";
                    }
                }else{
                    $massages = "<p class='warning'>Bạn chưa nhập đủ thông tin!</p>";
                }
        }
    ?>
<div id="container">

<div id="content">
<div id="form">
<?php if(!empty($massages)){ 
    echo $massages;
    }?>
<form action="" method="post">
    <fieldset>
        <legend>Nhập Sản Phẩm</legend>
        <div>
            <label>Nhập Mã Hóa Đơn
            <?php 
                if(isset($errors) && in_array('HD',$errors)){
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
            <input type="text" name="SPID" value=""/>
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
<div id="hoadon">
<h3>Thông tin hóa đơn</h3>
<form id="formHD">   
         <?php 
         if(isset($hoadon)){
         echo "<h3>Mã Hóa đơn: ".$hoadon."</h3>";
         }
         ?>  
         <hr />
         Công ty củ cặc<br />
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
                 if(isset($hoadon)){
            $q2 = "SELECT tblnhaphang.soluong,tblhoadon.ten_hoadon,tblhoadon.ngay,tblhoadon.gio,tblsanpham.sanpham_id,tblsanpham.ten_sanpham,tblsanpham.gia_nhap";
            $q2 .= " FROM tblhoadon";
            $q2 .= " JOIN tblnhaphang";
            $q2 .= " USING(ten_hoadon)";
            $q2 .= " JOIN tblsanpham";
            $q2 .= " USING(sanpham_id)";
            $q2 .= " WHERE tblnhaphang.ten_hoadon = '".$hoadon."'";
            $r2 = mysqli_query($dbc,$q2) or die("Query {$q2} \n<br/> MYSQL Error : " . mysqli_error($dbc));
            while($xuathoadon = mysqli_fetch_array($r2, MYSQLI_ASSOC)){
                $total = $xuathoadon['gia_nhap'];
                $total = $total * $soluong;
                echo "
                <tr id='td'>
                    <td>{$xuathoadon['sanpham_id']}</td>
                    <td>{$xuathoadon['ten_sanpham']}</td>
                    <td>{$xuathoadon['soluong']}</td>
                    <td>$total</td>
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
                    //if(isset($hoadon)){
                //$q3 = "SELECT SUM(Thanh_tien) AS total FROM tblnhaphang WHERE tblnhaphang.ten_hoadon = '".$hoadon."' ";
               // $r3 = mysqli_query($dbc,$q3) or die("Query {$q3} \n<br/> MYSQL Error : " .mysqli_error($dbc));
                //    while($SUM = mysqli_fetch_array($r3, MYSQLI_ASSOC)){
                //        echo "<h3>Tổng là : {$SUM['total']}</h3>";
                //    }       
               //     }
                ?>
                <input type="submit" name="print" value="In hóa đơn"/>
</form>
</div>

</div>


</div>

</body>
</html>