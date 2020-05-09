<?php require_once('Connections/shop.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $con = mysqli_connect("localhost", "root", "", "doctolib");
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($con, $theValue) : mysqli_escape_string($theValue);

 /* switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}*/
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>BOOK SHOPPING</title>
        <link href="style2.css" rel="stylesheet" type="text/css" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
        <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
/*
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
*/
</style>
</head>
<body>


<?php

    if (isset($_POST(['filter_button'])));{

    $title = ($_POST['Name']);
    $autor = ($_POST['autor']);
    $ISBN = ($_POST['ISBN']);



    $sql = "SELECT * FROM book_master WHERE BookName LIKE '$Name' AND Autor LIKE '$autor' AND ISBN like '$ISBN'";
    $result = $shop->query($sql);
    if ($result->num_rows > 0)
    {
      echo "<table id='table'>";
      echo "<tr><td><h3>Name</h3></td><td><h3>Autor</h3></td><td><h3>Validate</h3></td></tr>";

      while ($data = $result->fetch_assoc())

      {
       echo '<tr><td>'.$data["BookName"].'</td><td>'.$data["Autor"].'</td><td>'.$data["ISBN"].'</td><td><form method="post">
       <input type="hidden" value="'.$data['ISBN'].'"name="sendISBN"/>
       <input type="hidden" value="'.$data['Quantity'].'"name="sendQuantity"/>
       <input type="hidden" value="'.$data['Name'].'"name="sendName"/>
        <button type="submit" name="filter" id="filter_button"> Filter </form></a></td></tr>';
      }
      echo "</table>";
    }else{
      echo "0 result";
    }
  }
?>



            <?php
                include "Right.php";
            ?>
            <div style="clear:both";></div>
            <?php
                include "Footer.php";
            ?>
        </div>
    </body>
</html>