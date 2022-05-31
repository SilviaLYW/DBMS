<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<?php
$account=$_POST['id'];
$password=$_POST['passwd'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$address=$_POST['address'];

include_once ("db_connect.php");
$conn=mysqli_connect($IP,$ID,$PW,$DB);
mysqli_set_charset($conn, "utf8");
mysqli_select_db($conn,"drink");
$sql="INSERT INTO member(ID, passwd, name, phone, address) VALUES ('$account','$password','$name','$phone','$address')";
/*
變數加值要加當引號，輸入資料值必須為英文OR數字，因為編碼、瀏覽器不支援、資料庫本身設定等因素導致中文會出錯
，網路上有解決方法，但有點繁瑣，若有時間你們可以試試。
*/
if($conn->query($sql)==true)
{
	require_once "restart.html";
}
else {
	echo "Error:".$sql."<br>".$conn->error;
}

$conn->close();

?>
</body>
</html>