<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<?php
include_once("db_connect.php");
$conn=mysqli_connect($IP,$ID,$PW,$DB);
mysqli_set_charset($conn, "utf8");
mysqli_select_db($conn,"drink");
$Acc=$_POST['id'];      //加，取值設入變數
$Pwd=$_POST['passwd'];  //加
//====================連接資料庫判斷帳密是否正確===========
	$result=mysqli_query($conn, "select * from member where ID='".$Acc."'");  
	/*抓取資料庫ID值為使用者輸入之帳號.
	 ex.輸入帳號=A0001 ，抓取值={A0001   ,   1234   ,   Ann   ,   0912345678   ,   No.500,LiufengRd.,Wufeng Dist.}
	*/
	$rec=mysqli_fetch_array($result);    //將抓取值放進陣列中
if($rec[1]==$Pwd)  //抓陣列的第個值(passwd)比對是否與輸入密碼相符
  {
	require_once "welcome.php";
  }
else
	{
	require_once "wrong.html";
  
    }
?>
</body>
</html>