<?php
session_start();

$bdd=new PDO('mysql:host=localhost;dbname=doctolib','root','');

if(isset($_GET['id']) AND $_GET['id']>0)
{
$getid= intval($_GET['id']);
$requser = $bdd->prepare('SELECT * FROM patient_list WHERE MedID = ?');
$requser->execute(array($getid));
$userinfo = $requser->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title> Session</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/7582e41998.js" crossorigin="anonymous"></script>
</head>
<body>
	
<div class="wrapper">
	<div class="sidebar">
		<h2> MED-ME</h2>
		<ul>

			<li><a href="http://localhost/Med%20Me/interface_medecin.php?id=<?php echo $_SESSION['id'];?>"><i class="fas fa-home"></i>Accueil</a></li> 

			<li><a href="#"><i class="far fa-calendar-check"></i> Agenda</a></li> 

			<li><a href="http://localhost/Med%20Me/list_patient.php?id=<?php echo $_SESSION['id'];?>"><i class="fas fa-user-injured"></i>Patients</a></li> 

			<li><a href="#"><i class="fas fa-user"></i>infos</a></li> 

			<li><a href="#"><i class="fas fa-info">aide</i></a></li> 
		
		</ul>

		<div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>

	</div>
	<div class="main_content">
		<div class="header"><h2>vos patients sont : </h2></div>

		<div class="information">
			<?php
			while ($userinfo = $requser->fetch()) {
			?>

			<p>
    <strong>Nom</strong> : <?php echo$userinfo['FirstName'], $userinfo['nom']; ?> &nbsp
    adresse : <?php echo $userinfo['address']; ?> &nbsp <?php echo $userinfo['city']; ?> &nbsp
     mobile : <?php echo $userinfo['mobile']; ?> Sexe : <?php echo $userinfo['Gender']; ?> &nbsp 
    Date de Naissance <?php echo $userinfo['BirthDate']; ?> </br></br>
   </p>
			<?php
			}
			?>

		</div>
	</div>
</div>
</body>
</html>
<?php
}
else
{
	echo "erreur non connecté";
}
?>