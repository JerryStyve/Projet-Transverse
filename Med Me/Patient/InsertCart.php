<?php
if(!isset($_SESSION))
{
session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DOCTOLIB</title>
<link href="style2.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>
<body>
<div id="wrapper">
  
  <?php
  include "Header.php";
  ?>
  
  <div id="content">
    <h2><span style="color:#003300"> Welcome  <?php echo $_SESSION['Name'];?></span></h2>
    <?php
$Id=$_GET['ID'];
// Establish Connection with Database
$con = mysqli_connect("localhost","root", "", "shopping");
// Specify the query to execute
$sql = "select * from book_master where ID=".$Id."";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records 
while($row = mysqli_fetch_array($result))
{
$Id=$row['ID'];
$Name=$row['BookName'];
$Price=$row['Price'];
$Quantity=$row['Quantity'];
}
?>
    <form id="form1" name="form1" method="post" action="Insert.php?Id=<?php echo $Id;?>">
      <table width="100%" height="407" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td bgcolor="#D99A2C"><strong>Book Name:</strong></td>
          <td bgcolor="#D99A2C"><?php echo $Name;?></td>
        </tr>
        <tr>
          <td bgcolor="#f9d299"><strong>ISBN:</strong></td>
          <td bgcolor="#f9d299"><?php echo $Id;?></td>
        </tr>
        <tr>
          <td bgcolor="#D99A2C"><strong>Quantity:</strong></td>
          <td bgcolor="#D99A2C"><span id="sprytextfield1">
            <label>
            <input type="text" name="txtQty" id="txtQty" value="1" />
            </label>
          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
        </tr>
        <tr>
          <td bgcolor="#f9d299"><strong>Price:</strong></td>
          <td bgcolor="#f9d299"><?php echo $Price;?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><label>
            <input type="submit" name="button" id="button" value="Add To Cart" />
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
    <table width="100%" border="0" cellspacing="3" cellpadding="3">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><p><img src="img/Fiction.jpg" alt="box" width="70" height="100" hspace="10" align="letf" class="imgleft" title="box" /></p></td>
        <td><p><img src="img/thriller.jpg" alt="box" width="70" height="100" hspace="10" align="left" class="imgleft" title="box" /></p></td>
        <td><p><img src="img/romance.jpg" alt="box" width="70" height="100" hspace="10" align="left" class="imgleft" title="box" /></p></td>
      </tr>
      <tr>
        <td height="26" bgcolor="#D99A2C"><div align="left" class="style9">Fiction</div></td>
        <td bgcolor="#D99A2C"><div align="left" class="style9">Thriller</div></td>
        <td bgcolor="#D99A2C"><div align="left" class="style9">Romance</div></td>
      </tr>
    </table>
    <p align="justify">&nbsp;</p>
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
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
</script>
</body>
</html>
