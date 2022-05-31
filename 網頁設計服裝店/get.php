<?php
	session_start();
	$cID = $_SESSION['cID'];
	$pID = $_GET['pID'];
	$pName = $_GET['pName'];
	$pPrice = $_GET['pPrice'];
	$pNum = $_GET['pNum'];

	$con = new mysqli("localhost", "root", "", "friyay");

		if ($con->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

	$rsql = "SELECT * FROM cart WHERE pName = '$pName' AND cID=$cID";
	$result = $con->query($rsql);
	$nowpNum; $in = 0;
	if($row = $result->fetch_assoc()){
		$nowpNum = $row['pNum'];
		$nowpNum = $nowpNum + 1;
		$in = 1;
	}
	if($in)
		$wsql = "UPDATE cart SET pNum = '$nowpNum' WHERE pName = '$pName' AND cID=$cID ";
	else
		$wsql = "INSERT INTO cart (cID,pID, pName, pPrice, pNum) VALUES ('$cID','$pID','$pName','$pPrice','$pNum')";

	$con->query($wsql);

	header("Location: products.php");
?>