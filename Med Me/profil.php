<?php
session_start();

$bdd=new PDO('mysql:host=localhost ;dbname=doctolib','root','');

if(isset($_GET['id']) AND $_GET['id']>0)
{
$getid= intval($_GET['id']);
$requser = $bdd->prepare('SELECT * FROM doctor_list WHERE id = ?');
$requser->execute(array($getid));
$userinfo = $requser->fetch();
?>


<html>
<head>
	<title>espace</title>
	<meta charset="utf-8">
</head>
<body>
	<div align="center">
		<h2>Profil de <?php echo $userinfo['Name'] ?></h2>
		<br/><br/>
		Pseudo=...
		<br/>
		Mail=...

<?php
if(isset($erreur))
{
	echo '<font color= "red">'.$erreur."</font>";
}


</div>
	</body>
	</html>
	<?php
	}
	?>
