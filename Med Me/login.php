<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
session_start();
$UserName=$_POST['txtUserName'];
$Password=$_POST['txtPassword'];
$UserType=$_POST['rdType'];
if ($UserType==""){$UserType = "Patient";}
if($UserType=="Médecin")
{
$con = mysqli_connect("localhost","root", "", "doctolib");
$sql = "SELECT * FROM doctor_list where Name='".$UserName."' and Password='".$Password."'";
$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Nom d\u2019utilisateur ou mot de passe erroné");window.location=\'index.php\';</script>';
}
else
{
$_SESSION['id'] = $row['MedID'];
$_SESSION['Name'] = $row['Name'];
$_SESSION['Email'] = $row['Email'];
header("location:interface_medecin.php?id=".$_SESSION['id']);
} 
mysqli_close($con);
}
else if($UserType=="Patient")
{
$con = mysqli_connect("localhost","root","", "doctolib");
$sql = "select * from patient_list where UserName='".$UserName."' and Password='".$Password."' ";
$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Nom d\u2019utilisateur ou mot de passe erroné");window.location=\'index.php\';</script>';
}
else
{
$_SESSION['ID']=$row['CustomerId'];
$_SESSION['Name']=$row['CustomerName'];
header("location:Patient/index.php");
} 
mysqli_close($con);
}

?>

</body>
</html>
