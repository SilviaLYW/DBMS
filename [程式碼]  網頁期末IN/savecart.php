<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<?php
session_start();  // 啟用交談期
if ( isset($_SESSION["ID"]) ){
   $id = $_SESSION["ID"]; // 取得Session變數,編號
   $name = $_SESSION["Name"];//品名
   $sweet = $_SESSION["sweet"];//甜度
   $temp = $_SESSION["temp"];//冰塊
   $quantity = $_SESSION["Quantity"];//杯數
   $price = $_SESSION["Price"];//金額
   // 儲存選購商品的陣列Cookie
   setcookie($id."[ID]", $id, time()+3600);
   setcookie($id."[Name]", $name, time()+3600);
   setcookie($id."[sweet]", $sweet, time()+3600);
   setcookie($id."[temp]", $temp, time()+3600);
   setcookie($id."[fortified]", $fortified, time()+3600);
   setcookie($id."[Price_add]", $Price_add, time()+3600);
   setcookie($id."[Price]", $price, time()+3600);
   setcookie($id."[Quantity]", $quantity, time()+3600);
  
}
header("Location: shoppingcart.php");  // 轉址
?>
</body>
</html>