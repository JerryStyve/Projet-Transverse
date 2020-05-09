<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
	$Id=$_GET['Id'];
	// Establish Connection with Database
$con = mysqli_connect("localhost","root","","shopping");
// Specify the query to execute
$sql = "select * from book_master where ID=".$Id."";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records 
while($row = mysqli_fetch_array($result))
{
$ISBN=$row['ISBN'];
$Name=$row['BookName'];
$Quantity=$row['Quantity'];
$Price=$row['Price'];
}

	$Qty=$_POST['txtQty'];
	$CID=$_SESSION['ID'];
	
	// Specify the query to Insert Record
	$sql = "insert into shopping_cart(CustomerId, CartId, ItemName,Quantity,Price) values(".$CID.", ".$Id.", '".$Name."',".$Quantity.",".$Price.")";
	// execute query
	mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Item Added To the cart");window.location=\'Products.php\';</script>';

?>
</body>
</html>
