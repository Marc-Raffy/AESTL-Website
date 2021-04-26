<?php
	session_start();
	require 'identifiants.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Panier</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="bootstrap/js/jquery.min.js"></script>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<script src="fonctions.js"></script>
</head>
<body onload="init()">	 
		<?php
		if(!isset($_SESSION['idGlobal'])){
			echo'
			<script type="text/JavaScript">
     			location.href = "login.php";
     			confirm("connectez-vous pour construire votre panier");
 			</script>';
 			
 			// Nécessaire car même si on a pas accès au panier il se remplit quand on clique sur ajouter au panier. Il faut donc le détruire au moment de la demande de connexion
 			if(isset($_SESSION['panier'])){
 				unset($_SESSION['panier']);
 			}
		}
		if (!isset($_SESSION['panier'])) { // si le panier n'est pas encore créé <=> qu'il est vide
			echo '<center><a href="boutique.php" style="margin-top : 15%; margin-bottom : 2%;" class="btn btn-primary">Panier vide retournez à la boutique !</a><br><a href="index.php">
    		<img src="img/logo.png" width="100" height="100">
  		</a><br></center>';
		}
		else{  // si il est bien créé on l'affiche
			$panierAff=$_SESSION['panier'];
			$prixTotal=0; // on va calculer le prix total pour l'afficher lors de la validation
			echo'
				<div id="event" class="mx-auto padding_elements col-sm-12"
				<div class="container" id="affiches"  style="position: relative;">
				<div class="row" id="blocs">

				';
				foreach ($panierAff as $key => $value) { // on parcourt notre panier ligne par ligne
					$ligne = $panierAff[$key];

					$id=$connexion->query('SELECT * FROM panier WHERE ref='.$ligne['ref'].'');
					$idres=$id->fetchAll(); // on récupère dans panier les informations lié à l'article de la référence correspondante
					foreach ($idres as $key => $value) {	//on récupère ensuite le prix, le nom et la référence de l'article
						$ligneId=$idres[$key];
						$article=$ligneId['article'];
						$prix=$ligneId['prix'];
						$ref=$ligneId['ref'];
					}
					$prixTotal=$prixTotal+$prix*$ligne['quantite']; // on fait évolué le prix total
					echo '
					<div class="col-2">
	  					<div class="card-deck ">
	  						<div class="card card-perso" id="article_'.$ref.'">
							<img class="card-img-top" src="img_boutique/'.$ligne['ref'].'.jfif" alt="'.$article.'">
		    					<div class="card-body">
		    					<center>
		    					<h5 class="card-title">
		    					';
		    					echo // on utilise un id pour permettre la mise à jour de l'affichage quand on fera varié les qtés d'articles
		    					'<span id="qte_'.$ref.'">'.$ligne['quantite'].'</span>   '.$article.'<br> Prix unité : '.$prix.'€    Prix total :<span id=prix_'.$ref.'>'.$prix*$ligne['quantite'].'</span>€<br>
		    					<input id="'.$ref.'" value="-" type="button" href="#" onclick="supprPanier('.$ref.');"/>
		    					<input id="'.$ref.'" value="+" type="button" href="#" onclick="ajoutPanier('.$ref.'); "/>	
		    					
		      					</h5>
		      					</center>
		   						</div>
		   					</div>
		   				</div>	
					</div>	
					';
				}
			echo'</tbody></table>
				</div>
				</div>
				</div>
			';

			echo'
			<a href="boutique.php" class="btn btn-secondary btn-lg">Continuez vos emplettes </a> 
			<a href="paiement.php" class="btn btn-secondary btn-lg">Valider votre commande de  <span id="prixTot">'.$prixTotal.'</span>€</a>
			';
		}
		?>
	
</body>
</html>