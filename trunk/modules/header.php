
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Demo.Project.One</title>
<link rel="stylesheet" type="text/css" href="../../css/StyleMain.css">
<link rel="icon" href="sourse/icon.ico">
<script type="text/javascript" src="../../js/jquery-2-1-1.js"></script>
<script type="text/javascript" src="../../js/popup.js"></script>
<script type="text/javascript" src="../../js/script1.js"></script>
<script src="../../js/highcharts-3d.js"></script>		
<script src="../../js/ajax1.js"></script>
</head>

<body>
<div class="swapper">
<!--Begin Header-->
<header>
<div class="logo">Logo</div>
<div class="banner"><img alt="Banner" src="../../sourse/banner.jpg"></div>
<div class="nav">
	<?php if(isset($_COOKIE['user'])){echo "Xin chào ".ucfirst($_COOKIE['user']);} ?>
</div>
</header>
<!--End Header-->