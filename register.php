<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		A
	</title>
</head>
<body>
	<?php 
	require 'identifiants.php';

	if(isset($_POST['login'])&&isset($_POST['mdp'])&&isset($_POST['mdp2'])&&isset($_POST['nom'])&&isset($_POST['prenom'])){  // on vérifie que toutes les informations sont bien passés
		if($_POST["mdp"] != $_POST["mdp2"]){	// on regarde si les mdp correspondent si ce n'est pas le cas on met un message d'erreur
			?>
			<h2>Veuillez rentrez 2 mot de passes identiques</h2>
			<a href="login.php">Réessayer</a>
		<?php
		}
		else{	// si les mdp sont bien différents
			$cptexistant=$connexion->query('SELECT id FROM Adherent WHERE mail="'.$_POST['login'].'"');
			$res=$cptexistant->fetchAll(); //on cherche dans la bd si le mail rentré y es déjà


			foreach ($res as $key => $value) {
			$ligne = $res[$key];
			}
			if(count($res)!=0){ // si c'est le cas on informe l'utilisateur qu'il a déjà un compte
				?>
				<h2>Vous avez déjà un compte</h2>
				<a href="login.php">Se connecter</a>
				<?php
			}
			else{ // sinon on créé dans la BD un compte pour l'utilisateur
				$connexion->query('INSERT INTO Adherent(nom,prenom,mail,pass) VALUES ("'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['login'].'","'.$_POST['mdp'].'")');
				$searchId=$connexion->query('SELECT id FROM Adherent WHERE mail="'.$_POST['login'].'" AND pass="'.$_POST['mdp'].'"');
				$checkIdtab=$searchId->fetchAll();
				foreach ($checkIdtab as $key => $value) {
				$ligneId = $checkIdtab[$key];
				//Je récupère ma colonne id dans ma ligne
				$idCourant=$ligneId['id'].'<br>';
				}
				
				$_SESSION["idGlobal"]=$idCourant;  // et on le connecte par la même occasion
		
				?>
				<h2>Vous êtes bien enregistré(e) et connecté(e)</h2>
				<a href="index.php">redirection vers la page d'accueil</a>
				<?php
			}
		}
	}
	?>
</body>
</html>