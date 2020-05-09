<?php
session_start();

$bdd=new PDO('mysql:host=127.0.0.1;dbname=doctolib', 'root','')

if(isset($_POST['formconnexion']))
{
$mailconnect=htmlspecialchars($_POST['mailconnect']);
$mdpconnect=$_POST['mdpconnect'];
}
if(!empty($mailconnect) AND !empty($mdpconnect))
{
	$requser=$bdd->prepare("SELECT * FROM doctor_list where Email=? AND Password=?");
	$requser->execute(array($mailconnect,$mdpconnect)) ;
	$userexist=$requser->rowCount();
	if($userexist==1)
	{
		$userinfo = $requser->fetch();
		$_SESSION['id'] = $userinfo['MedID'];
		$_SESSION['pseudo'] = $userinfo['Name'];
		$_SESSION['mail'] = $userinfo['Email']
		header("location: profil.php?id=".$_SESSION['id']);
	}
	else
	{
		$erreur="Mauvais mail ou mot de passe":
	}
}
else
{
	$erreur="Tous les champs doivent être complétés !";
}
?>


<html>
<head>
	<title>Log_in_med</title>
	<meta charset="utf-8">
</head>
<body>
	<div align="center">
		<h2> connexion</h2>
		<br/><br/>
		<form method="Post" action="">
			<input type="email" name="pseudoconnect" placeholder="Mail"/>
			<input type="password" name="mdpconnect" placeholder="Mot de passe"/>
			<input type="submit" name="formconnexion" value="Se connecter !"/>

		</form>	




	</body>