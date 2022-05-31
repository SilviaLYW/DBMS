<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>

<?php
session_start();  // 啟用交談期
// 檢查是否是表單送回
if ( isset($_POST["Item"],$_POST["sweet"],$_POST["temp"]) ) {
   // 取得購買的數量
   $_SESSION["Quantity"] = $_POST["Quantity"];
   $id = $_POST["Item"];  // 取得選擇商品
   $_SESSION["ID"] = $id; // 建立Session變數
   switch (strtoupper($id)) {
      case "A001":
         $_SESSION["Name"] = "紅茶(M)";
         $_SESSION["Price"] = 20;
         break;
      case "A002":
         $_SESSION["Name"] = "綠茶(M)";
         $_SESSION["Price"] = 20;
         break;
      case "A003":
         $_SESSION["Name"] = "奶茶(M)";
         $_SESSION["Price"] = 25;
         break;   
	 case "A004":
         $_SESSION["Name"] = "紅茶(L)";
         $_SESSION["Price"] = 25;
         break;
      case "A005":
         $_SESSION["Name"] = "綠茶(L)";
         $_SESSION["Price"] = 25;
         break;
      case "A006":
         $_SESSION["Name"] = "奶茶(L)";
         $_SESSION["Price"] = 30;
         break;   
   }  
	$sweet = $_POST["sweet"];  // 取得選擇商品
   switch (strtoupper($sweet)) {
      case "A007":
         $_SESSION["sweet"] = "正常";
         break;
      case "A008":
         $_SESSION["sweet"] = "半糖";
         break;
      case "A009":
         $_SESSION["sweet"] = "微糖";
         break;   
	 case "A010":
         $_SESSION["sweet"] = "無糖";
         break;
   } 
	$temp = $_POST["temp"];  // 取得選擇商品
   switch (strtoupper($temp)) {
      case "A011":
         $_SESSION["temp"] = "熱";
         break;
      case "A012":
         $_SESSION["temp"] = "溫";
         break;
      case "A013":
         $_SESSION["temp"] = "正常冰";
         break;   
	  case "A014":
         $_SESSION["temp"] = "去冰";
         break;
	  case "A015":
         $_SESSION["temp"] = "少冰";
         break;
   } 
   header("Location: savecart.php");  // 轉址
}
?>
</body>
</html>