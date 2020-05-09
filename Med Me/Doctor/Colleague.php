<!DOCTYPE html>
<head>
<title>Med Me</title>
<link href="merde.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #000; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style1 {font-size: 95%; font-weight: bold; color: #fff; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style3 {font-weight: bold}
-->
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style10 {color: #FFFFFF}
.style12 {font-weight: bold}
-->
</style>
</head>
<body>
<div id="wrapper">
  
  <?php
  include "Header.php";
  ?>
  
  <div id="content">
    <h2><span style="color:#000">Liste des médecins</span></h2>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="27" bgcolor="#098ab0"><span class="style10"><strong>Chercher un médecin particulier  //pas implémenté, crée des users</strong></span></td>
      </tr>
      <tr>
        <td height="26"><form id="form1" name="form1" method="post" action="InsertUser.php">
            <table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="32" >Nom:</td>
                <td><span id="sprytextfield1">
                  <label>
                  <input type="text" name="txtUserName" id="txtUserName" />
                  </label>
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td height="34">Type:</td>
                <td><span id="sprytextfield2">
                  <label>
                  <input type="password" name="txtPassword" id="txtPassword" />
                  </label>
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
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
        <td height="25" bgcolor="#098ab0"><span class="style10"><strong>Médecins</strong></span></td>
      </tr>
      <tr>
        <td><table width="100%" border="1" bordercolor="#000" >
            <tr>
              <th height="32" bgcolor="#0ebaed" class="style3"><div align="left" class="style1 style5"><strong>Spécialité</strong></div></th>
              <th bgcolor="#0ebaed" class="style3"><div align="left" class="style1 style5"><strong>Nom</strong></div></th>
              <th bgcolor="#0ebaed" class="style3"><div align="left" class="style1">Delete</div></th>
            </tr>
            <?php
// Establish Connection with Database
$con = mysqli_connect("localhost","root", "", "doctolib");
// Specify the query to execute
$sql = "select Name, Type from doctor_list";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records 
while($row = mysqli_fetch_array($result))
{
  $Name=$row['Name'];
  $Type=$row['Type'];

?>
            <tr>
              <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Type;?></strong></div></td>
              <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Name;?></strong></div></td>
              <td class="style3"><div align="left" class="style9 style5"><strong><a href="DeleteUser.php?AdminId=<?php echo $Id;?>">Delete</a></strong></div></td>
            </tr>
            <?php
}
// Retrieve Number of records returned
$records = mysqli_num_rows($result);
?>
            <tr>
              <td colspan="4" class="style3"><div align="left" class="style12"><?php echo "Total ".$records." Records"; ?> </div></td>
            </tr>
            <?php
// Close the connection
mysqli_close($con);
?>
        </table></td>
      </tr>
     
    </table>
    <p align="justify">&nbsp;</p>
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
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
</script>
</body>
</html>
