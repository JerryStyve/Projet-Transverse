<!DOCTYPE html>
<head>
<title>Med Me</title>
<link href="merde.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style5 {font-size: 85%; font-weight: bold; color: black; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style3 {font-weight: bold}
.style9 {font-size: 95%; font-weight: bold; color: black; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>
<body>
<div id="wrapper">
  
  <?php
  include "Header.php";
  ?>
  
  <div id="content">
    <h2><span style="color:black">Catégorie de médecins</span></h2>
    
    <table width="100%" border="1" bordercolor="#003300" >
    
      <?php
// Establish Connection with Database
$con = mysqli_connect("localhost","root", "", "doctolib");

// Specify the query to execute
$sql = "select * from doctor_category";
// Execute query
$result = mysqli_query($con, $sql);
// Loop through each records 
while($row = mysqli_fetch_array($result))
{
$Id=$row['CategoryId'];
$CategoryName=$row['CategoryName'];
$Description=$row['Description'];
?>
      <tr>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $CategoryName;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Description;?></strong></div></td>
        <td class="style3"><a href="Doctor.php?CategoryId=<?php echo $Id;?>">Voir médecins</a></td>
      </tr>
      <?php
}
// Retrieve Number of records returned
$records = mysqli_num_rows($result);
?>
     
      <?php
// Close the connection
mysqli_close($con);
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
</body>
</html>
