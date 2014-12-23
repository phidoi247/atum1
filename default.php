<?php
	if(isset($_GET['logout'])){
			setcookie("user","",time()-3600);
			setcookie("ps","",time()-3600);
		}
	if(isset($_COOKIE['ps'])){
		if($_COOKIE['ps']=="Mannger"){
			header("location:modules/ql/default.php");
		}else if($_COOKIE['ps']=="TK"){
			header("location:modules/nvk/default.php");
		}else{
			header("location:modules/nvbh/default.php");
		}
	}else{
		
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Demo.Project.One</title>
<link rel="stylesheet" type="text/css" href="CSS/StyleMain.css">
<link rel="icon" href="sourse/icon.ico">
<script type="text/javascript" src="js/jquery-2-1-1.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
</head>

<body>
<div class="swapper">
<!--Begin Header-->
<header>
<div class="logo">Logo</div>
<div class="banner"><img alt="Banner" src="sourse/banner.jpg"></div>
<div class="nav">
<input type="button" class="login-but" value="Đăng nhập"/>
</div>
</header>
<!--End Header-->
<section>
<div class="popup"></div>
<div id="logbox">
<span class="notify">
<?php

 require('Connections/connect.php');
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$error=array();
		if(empty($_POST['username'])){
			$error[]="UserName";
		}
		if(empty($_POST['password'])){
			$error[]="Password";
		}
		if(empty($error)){
			$user=mysql_escape_string(strip_tags($_POST['username']));
			$pass=mysql_escape_string(strip_tags($_POST['password']));
			$q="SELECT * FROM tblnhanvien WHERE `nhanvien_id`='$user' AND `password`=SHA1('$pass')";
			$r=mysqli_query($dbc,$q) or die("Oopt! ".mysql_error());
			if($f=mysqli_fetch_row($r)){
				if(strpos($f[0],"QL")!==false){
					setcookie("user","$user",time()+3600);
					setcookie("ps","Mannger",time()+3600);
					header("location:modules/ql/default.php");
				}else if(strpos($f[0],"TK")!==false){
					setcookie("user","$user",time()+3600);
					setcookie("ps","TK",time()+3600);
					header("location:modules/nvk/default.php");
				}else{
					setcookie("user","$user",time()+3600);
					setcookie("ps","BH",time()+3600);
					header("location:modules/nvbh/default.php");
				}
			}else{
				echo "User Name or PassWords Wrong!";	
			}
		}else{
			echo "Fill all Fields, Please!";
		}
	}
	
?>
</span>
  <input type="button" value="X" class="cancellog"/>
  <form name="login" method="POST" action="">
    <table border="0">
      <thead>
        <tr><th colspan="2">Login</th></tr>
      </thead>
      <tbody>
        <tr><td>UserName:</td><td><input size="14px" type="text" name="username" /></td></tr>
        <tr><td>Password:</td><td><input size="14px" type="password" name="password" /></td></tr>
        <tr><td></td><th></th></tr>
        <tr style="font-size:10px"><td><a href="#">Forget PassWord</a></td><td><input type="submit" value="Login"/></td></tr>
      </tbody>
      </table>
  </form>
</div>
</section>
<footer>
Copyright &copy; by Atumt Team.
</footer>
</div>
</body>
</html>