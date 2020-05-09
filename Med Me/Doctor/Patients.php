<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Med Me</title>
<link href="merde.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #fff; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style1 {font-size: 95%; font-weight: bold; color: #000; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style10 {color: #FFFFFF}
.style3 {font-weight: bold}
-->
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  
  <?php
  include "Header.php";
  ?>
  
  <div id="content">
    <h2><span style="color:#000"> Category Management</span></h2>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="27" bgcolor="#098ab0"><span class="style10"><strong>Create New Category</strong></span></td>
      </tr>
      <tr>
        <td height="26"><form action="InsertCategory.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="32" >Nom:</td>
                <td><span id="sprytextfield1">
                  <label>
                  <input type="text" name="txtName" id="txtName" />
                  </label>
                  <span class="textfieldRequiredMsg">Enter Category.</span></span></td>
              </tr>
              <tr>
                <td height="32" >Prénom:</td>
                <td><span id="sprytextfield1">
                  <label>
                  <input type="text" name="txtName" id="txtName" />
                  </label>
                  <span class="textfieldRequiredMsg">Enter Category.</span></span></td>
              </tr><tr>
                <td height="32" >Date de naissance:</td>
                <td><span id="sprytextfield1">
                  <label>
                  <input type="text" name="txtName" id="txtName" />
                  </label>
                  <span class="textfieldRequiredMsg">Enter Category.</span></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input type="submit" name="button" id="button" value="Submit" />
                </label></td>
              </tr>
</table>
        </form></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#098ab0"><span class="style10"><strong>Category List</strong></span></td>
      </tr>
      <tr>
        <td><table width="100%" border="1" bordercolor="#003300" >
            <tr>
              <th bgcolor="#0ebaed" class="style3"><div align="left" class="style9 style5"><strong>Nom</strong></div></th>
              <th bgcolor="#0ebaed" class="style3"><div align="left" class="style9 style5"><strong>Prénom</strong></div></th>
              <th bgcolor="#0ebaed" class="style3"><div align="left" class="style9 style5"><strong>Date de naissance</strong></div></th>
              <th bgcolor="#0ebaed" class="style3"><div align="left" class="style9 style5"><strong>Edit</strong></div></th>
            <?php
// Establish Connection with Database
$con = mysqli_connect("localhost","root", "", "doctolib");
// Specify the query to execute
$sql = "select * from patient_list";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records 
while($row = mysqli_fetch_array($result))
{
$Name=$row['Name'];
$FirstName=$row['FirstName'];
$BirthDate=$row['BirthDate'];

?>
            <tr>
              <td class="style3"><div align="left" class="style1 style5"><strong><?php echo $Name;?></strong></div></td>
              <td class="style3"><div align="left" class="style1 style5"><strong><?php echo $FirstName;?></strong></div></td>
              <td class="style3"><div align="left" class="style1 style5"><strong><?php echo $BirthDate;?></strong></div></td>
              <td class="style3"><div align="left" class="style1 style5"><strong><a href="EditCategory.php?CatId=<?php echo $Id;?>">Edit</a></strong></div></td>
            </tr>
            <?php
}
// Retrieve Number of records returned
$records = mysqli_num_rows($result);
?>
            <tr>
              <td colspan="5" class="style3"><div align="left" class="style12"><?php echo "Total ".$records." Records"; ?> </div></td>
            </tr>
            <?php
// Close the connection
mysqli_close($con);
?>
        </table></td>
      </tr>
    
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
  <div style="clear:both;"></div>
   <?php
 include "Footer.php";
 ?>
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
//-->
</script>
</body>
</html>
