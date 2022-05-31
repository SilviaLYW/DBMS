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
<div style="background-color:#B4A582;width:1200px;height:350px;margin:0 auto;text-align:center;line-height:300px;opacity: 0.8;border-style:double;"><img src="logo.png" width="344" height="350" alt="" style="display:block; margin:auto;"/>
</div>

<div style="background-color:#787878;width:1200px;height:65px;margin:0 auto;opacity: 10;border-style:double;"><img src="two.png" width="594" height="65" alt="" style="display:block; margin:auto;"/></div>

<div style="background-color:#DAC9A6;width:1200px;height:1000px;margin:0 auto;opacity: 0.7;text-align:center;line-height:100px;border-style:double;border-style:solid;">
<table width="800" border="1" colspan=5 align=center><tr>
	<td>功能</td><td>編號</td><td>飲料名稱</td><td>甜度</td><td>溫度</td><td>單杯價格</td><td>數量</td></tr>
<?php
    function sum($x,$y)
	{
		$z=$x*$y;
		return $z;
	}
	$total = 0;
	// 取出所有陣列Cookie
  while ( list($arr, $value) = each($_COOKIE) ) {
  // 檢查COOKIE名稱是否存在，且為陣列
  if ( isset($_COOKIE[$arr]) && is_array($_COOKIE[$arr]) ) 
  {
     echo "<tr><td><a href='delete.php?Id=".$arr."'>";
     echo "刪除</a></td>";
     $price = 0;
     $quantity = 0; // 顯示選購的商品資料
     while ( list($name, $value)=each($_COOKIE[$arr])) {
        // 使用表格顯示
        echo "<td>" . $value . "</td>";
        
		 if ($name == "sweet")  
			$sweet = $value;
		 if ($name == "temp")  
			$temp = $value;
		 if ($name == "Price")
		    $price  = $value;
		 if ($name == "Quantity") 
			$quantity = $value;
		 
     }
     $total += sum($price,$quantity);  // 計算總金額
     echo "</tr>";
  }
}
	?>
	</table>
	<?php
if ($total != 0) {  // 顯示總金額
   echo "總金額 = NT$".$total."元";
}
?>

 <hr/> | <a href="buy.html">繼續購買</a> | <a href="finish.html">送出</a> |
	</div>
	
<div style="background-color:#B4A582;width:1200px;height:30px;margin:0 auto;opacity: 0.8;border-style:double;"></div>
</body>
</html>