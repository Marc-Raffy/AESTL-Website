<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Check Validité
	</title>
</head>
<body>
	<?php 
	require 'identifiants.php';


	if(isset($_POST['login'])&&isset($_POST['mdp'])){


		$chercherUser=$connexion->query('SELECT * FROM Adherent WHERE mail="'.$_POST['login'].'" AND pass="'.$_POST['mdp'].'"');
		$res=$chercherUser->fetchAll();
		foreach ($res as $key => $value) {
			$ligne = $res[$key];
			//Je récupère ma colonne id dans ma ligne
			$idCourant=$ligne['id'].'<br>';
			// je récupère si c'est un admin ou pas
			$droit=$ligne['admin'];
		}
		
		
		if(count($res)==1){ // le mdp entré est valide car on aurait select 0 sinon
			$_SESSION["idGlobal"]=$idCourant; //on récup l'id de l'utilisateur
			$_SESSION["admin"]=$droit; // on regarde si c'est un admin pour choisir 
			?>
			<h2>Connexion validée</h2>
				<script type="text/JavaScript">
     			location.href = 'index.php';
 				</script>
			<?php 
		}
		else
		{
			?>
			<h2>Erreur de saisie du mot de passe ou du nom d'utilisateur</h2>
			<a href="login.php">essayez à nouveau</a>
			<?php
		}
	}	

	
	?>
</body>
</html>