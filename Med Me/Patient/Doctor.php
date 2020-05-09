<?php require_once('../Connections/watch.php'); ?>
<?php require_once('Connections/watch.php'); ?>
<?php
session_start();
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $con = mysqli_connect("localhost", "root", "", "doctolib");
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($con, $theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
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
}
}

$colname_Recordset1 = "-1";
if (isset($_GET['CategoryId'])){
  $colname_Recordset1 = $_GET['CategoryId'];
}

$query_Recordset1 = sprintf("SELECT Name, Type, Adresse, Ville FROM doctor_list WHERE CategoryId = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($shop, $query_Recordset1) or die(mysqli_error($shop));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);


$query_Recordset2 = "SELECT Name, Type, Adresse, Ville FROM doctor_list";
$Recordset2 = mysqli_query($shop, $query_Recordset2) or die(mysql_error($shop));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

?><!DOCTYPE html >
<html>
<head>
<title>Med Me</title>
<link href="merde.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style10 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<div id="wrapper">
  
  <?php
  include "Header.php";
  ?>
  
  <div id="content">
    <h2><span style="color:black">Médecins <?php echo $_SESSION['Name'];?></span></h2>
    <table width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="#D99A2C">
      <tr>
        <td bordercolor="#098ab0" bgcolor="#098ab0"><span class="style10">Nom</span></td>
        <td bordercolor="#098ab0" bgcolor="#098ab0"><span class="style10">Type</span></td>
        <td bordercolor="#098ab0" bgcolor="#098ab0"><span class="style10">Adresse</span></td>
        <td bordercolor="#098ab0" bgcolor="#098ab0"><span class="style10">Ville</span></td>
        <td bordercolor="#098ab0" bgcolor="#098ab0"><span class="style10">Voir</span></td><strong></strong>
      </tr>

      <?php
	  if(isset($_GET['CategoryId']))
	  { 
	  do 
	  { 
	  ?>
        <tr>
          <td><?php echo $row_Recordset1['Name']; ?></td>
          <td><?php echo ($row_Recordset1['Type']) ; ?></td>
          <td><?php echo $row_Recordset1['Adresse']; ?></td>
          <td><?php echo $row_Recordset1['Ville']; ?></td>
          <td><a href="InsertCart.php?ID=<?php echo $row_Recordset1['ID']; ?>"><img src="img/shopping-cart.png"/></a></td><strong></strong>
         </tr>
        <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
		}
		else
		{ 
		do 
	  { 
	  ?>
        <tr>
          <td><?php echo $row_Recordset2['Name']; ?></td>
          <td><?php echo ($row_Recordset2['Type']) ; ?></td>
          <td><?php echo $row_Recordset2['Adresse']; ?></td>
          <td><?php echo $row_Recordset2['Ville']; ?></td>
          <td><a href="InsertCart.php?ID=<?php echo $row_Recordset2['ID']; ?>"><img src="img/shopping-cart.png"/></a></td>
        </tr>
        <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
		}
        
        ?>
    </table>
    <table width="100%" border="0" cellspacing="3" cellpadding="3">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
 <?php
 include "Right.php";
 ?>
  <div style="clear:both;"></div>
   <?php
 include "Footer.php";
 ?>
</div>
<blockquote>&nbsp;	</blockquote>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);
?>
