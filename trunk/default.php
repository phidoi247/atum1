<?php
	session_start();
	require('Connections/connect.php');
	if(isset($_POST['logout'])){
			$_SESSION=array();
			session_destroy();
			setcookie("PHPSESSID"," ",time()-3600);
		}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Demo.Project.One</title>
    <link rel="stylesheet" type="text/css" href="CSS/StyleMain.css">
    <link rel="icon" href="sourse/icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico">
    <script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
    <script type="text/javascript" src="js/jquery-2-1-1.js"></script>
    <script type="text/javascript" src="js/popup.js"></script>
    <script type="text/javascript" src="js/script1.js"></script>
    <script src="js/highcharts-3d.js"></script>		
    <script src="js/ajax1.js"></script>
    <script type="text/javascript">
    (function(){
        //////////////////////////////////////////////////Next pre page////////////////////////
        $('.next-page').click(function(){
            var pp=$('.present-page').val();
            var tp=$('.total-page').val();
                <?php
                    if(isset($_GET['nav'])){
                        $nav=$_GET['nav'];
                    }
                ?>
                if(tp==pp){
                    n=(pp-1)*12;
                }else{
                    n=((parseInt(pp))*12);
                }
                var np="default.php?";
                np+="<?php	
                    if(isset($_GET['sub'])){
                        $sub=$_GET['sub'];
                        echo "nav=".$nav."&sub=".$sub;
                    }elseif(isset($_GET['ls_search'])){
                        $ls_search=$_GET['ls_search'];
                        echo "nav=".$nav."&ls_search=".$ls_search;
                    }elseif(isset($_GET['sp_search'])){
                        $sp_search=$_GET['sp_search'];
                        echo "nav=".$nav."&sp_search=".$sp_search;
                    }elseif(isset($_GET['nv_search'])){
                        $nv_search=$_GET['nv_search'];
                        echo "nav=".$nav."&nv_search=".$nv_search;
                    }else{
                        echo "nav=".$nav;
                    }
                ?>";
                np+="&f="+n+"";
                $(this).attr('href',np);
        });
        $('.prev-page').click(function(){
            var pp=$('.present-page').val();
            pp-=2;
                <?php
                    if(isset($_GET['nav'])){
                        $nav=$_GET['nav'];
                    }
                ?>
                var n=((parseInt(pp))*12);
                if(n<0){
                    n=0;
                }
                var np="default.php?";
                np+="<?php	
                    if(isset($_GET['sub'])){
                        $sub=$_GET['sub'];
                        echo "nav=".$nav."&sub=".$sub;
                    }elseif(isset($_GET['ls_search'])){
                        $ls_search=$_GET['ls_search'];
                        echo "nav=".$nav."&ls_search=".$ls_search;
                    }elseif(isset($_GET['sp_search'])){
                        $sp_search=$_GET['sp_search'];
                        echo "nav=".$nav."&sp_search=".$sp_search;
                    }elseif(isset($_GET['nv_search'])){
                        $nv_search=$_GET['nv_search'];
                        echo "nav=".$nav."&nv_search=".$nv_search;
                    }else{
                        echo "nav=".$nav;
                    }
                ?>";
                np+="&f="+n+"";
                $(this).attr('href',np);
        });
    });
    </script>
    <script>
    $(function(){
            var tab="#<?php if(isset($_GET['nav'])){echo (strip_tags($_GET['nav'])); } ?>";
                if(tab.length != 1){
                    $('.tab').removeClass('active-tab');
                    $(tab).addClass('active-tab');
                }
    });
    </script>
</head>

<body>
<div class="swapper">
<!--Begin Header-->
<header>
<div class="logo"><img width="300px" src="sourse/Logo1.jpg"/></div>
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
<input id="log_info" type="text" value="
<?php 
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$error=array();
		if(empty($_POST['username'])){
			$error[]="UserName";
		}
		if(empty($_POST['password'])){
			$error[]="Password";
		}
		if(empty($error)){
			$user=strip_tags($_POST['username']);
			$pass=strip_tags($_POST['password']);
			$q="SELECT nhanvien_id,ten_nhanvien,level_id,avatar FROM tblnhanvien WHERE `nhanvien_id`='$user' AND `password`=SHA1('$pass')";
			$r=mysqli_query($dbc,$q) or die("Oopt! ".mysqli_error($dbc));
			if($f=mysqli_fetch_row($r)){
				
				$_SESSION['idu']=$f[0];
				$_SESSION['nameu']=$f[1];
				$_SESSION['lvu']=$f[2];
				$_SESSION['avu']=$f[3];
				
			}else{
				echo "User Name or PassWords Wrong!";	
			}
		}else{
			echo "Fill all Fields, Please!";
		}
	}
?>"/>
</span>
  <input type="button" value="X" class="cancellog"/>
  <form name="login"  id="form_login" method="POST" action="">
    <table border="0">
      <thead>
        <tr><th colspan="2">Login</th></tr>
      </thead>
      <tbody>
        <tr><td>Mã nhân viên:</td><td><input size="14px" type="text" name="username" id="user" required/></td></tr>
        <tr><td>Password:</td><td><input size="14px" type="password" name="password" required id="pass" /></td></tr>
        <tr><td></td><th></th></tr>
        <tr style="font-size:10px"><td><a href="#">Forget PassWord</a></td><td><input id='login_sub' type="submit" value="Login"/></td></tr>
      </tbody>
      </table>
  </form>
</div>
<div class="user">
<?php
	if(isset($_SESSION['nameu'])){
		echo $_SESSION['nameu'];
	}
?>
</div>
<?php
	
 	if(isset($_SESSION['lvu'])){
		if($_SESSION['lvu']==3){
			include("modules/ql/default.php");
		}else if($_SESSION['lvu']==1){
			include("modules/nvbh/default.php");
		}else if($_SESSION['lvu']==2){
			include("modules/nvk/default.php");
		}else{
			include("intro.php");
					}
	}else{
		include("intro.php");
		}
?>
</section>
<footer>
Copyright &copy; by ATUM Team.
</footer>
</div>
</body>
</html>