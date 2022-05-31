<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<style type="text/css">
body {
	background-image: url(context.jpg);
	background-size: cover;
}
</style>
</head>

<body>
<div style="background-color:#DAC9A6;width:1200px;height:30px;margin:0 auto;opacity: 0.7;text-align:center;line-height:100px;border-style:double;border-style:solid;"></div>

<div style="background-color:#B4A582;width:1200px;height:450px;margin:0 auto;text-align:center;line-height:300px;opacity: 0.8;border-style:double"><img src="home.png" width="474" height="450" alt=""/></div>

<div style="background-color:#DAC9A6;width:1200px;height:200px;margin:0 auto;opacity: 0.7;text-align:center;line-height:100px;border-style:double;border-style:solid;">
<span style="font-family:DFKai-sb;padding:0px;font-size:30px;color:#434343;">
WELCOME!
<?php
require("1.php");
echo $rec[2];
?>
<br>
<input type="button" value="MENU" onclick="location.href='menu.php'" style="font-size:30px;border-style:double">
<input type="button" value="建立訂單" onclick="location.href='buy.html'" style="font-size:30px;border-style:double">	
</span>
</div>
</body>
</html>