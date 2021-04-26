<?php 
	session_start();
	require 'identifiants.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="bootstrap/js/jquery.min.js"></script>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<title></title>
</head>
<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="index.php">
	    <img src="img/logo.png" width="50" height="50">
	  </a>        
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    		<a style="margin-left: 90%" class="nav-link btn btn-primary" href="déconnexion.php">Se déconnecter </a>
	  	</div>
	</nav>

	<?php
	if(isset($_SESSION['panier'])){
		// Controle des stocks des articles
		$testValide=0; // on va vérifier si la commande peut etre passé pour savoir si on peut unset le panier

		$panierValidatation=$_SESSION['panier'];
		foreach ($panierValidatation as $key => $value) { // on parcourt notre panier
			$ligneValidation=$panierValidatation[$key];
			$qteEnlevee=$ligneValidation['quantite'];

			
			$ligneQte=$connexion->query('SELECT quantité FROM panier WHERE ref='.$ligneValidation["ref"]);
			$tabRes=$ligneQte->fetchAll(PDO::FETCH_ASSOC); // on récupère la qté que l'on avait en stock.

			$qte=$tabRes[0]['quantité'];
			$newQte=$qte-$qteEnlevee; // on calcul notre nouvelle qté

			$ligneArticle=$connexion->query('SELECT article FROM panier WHERE ref='.$ligneValidation["ref"]);
			$tabRes=$ligneArticle->fetchAll(PDO::FETCH_ASSOC); // on récupère l'article dans un tableau associatif(pour l'affichage)

			$article=$tabRes[0]['article'];
			

			if($qte<$ligneValidation["quantite"]){ // si jamais nos stocks sont insuffisants on informe l'utilisateur, on ne valide pas la commande et donc on ne set pas nos stocks
				echo "Les stocks de ".$article." sont insuffisants";
				$testValide=1; // la commande n'est pas finalisé on ne touche pas au panier pour laisse à l'utilisateur la main sur son panier
			}
			else{ // si tout vas bien on met à jour notre stock dans la BD
				$connexion->query('UPDATE panier SET quantité='.$newQte.' WHERE ref='.$ligneValidation["ref"]);			
				// on insère l'article commandé dans la notre BD pour notre gestion des commandes en cours qui sera visible uniquement par l'admin
				$connexion->query('INSERT INTO commande(ref,article,quantite,idClient) VALUES ("'.$ligneValidation["ref"].'","'.$article.'","'.$qteEnlevee.'","'.$_SESSION["idGlobal"].'")');

			}
		}
		if($testValide==0){ // si la commande est bien confirmé alors on unset le panier
			unset($_SESSION['panier']);
		}
	}
	echo "<center><h1 class='display-4 mt-3'>La commande a bien été passée, nous mettons vos articles de côté vous pourrez les récupérer au local de la corpo. </h1></center>"; // on confirme la commande
	?>
</body>
</html>