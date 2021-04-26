<?php 
	session_start();
	require 'identifiants.php';

	if(isset($_POST['remis'])&&isset($_POST['id'][0])){
		foreach ($_POST['id'] as $key => $value) {
			$connexion->query('DELETE FROM commande WHERE idCommande="'.$_POST['id'][$key].'"');
		}
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Liste des commandes</title>

	<meta charset="utf-8">
	<script src="bootstrap/js/jquery.min.js"></script>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	

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
	    </div>
	</nav>

	<?php if($_SESSION['idGlobal']!=1){ ?>
		<script type="text/JavaScript">
     			location.href = 'index.php';
 		</script>
 	<?php
	}
	?>
	<form method="POST" action="commandeEnCours.php">
	<table class="table">
		<thead>
			<tr>
				<th colspan="6" style="text-align:center">Liste des commandes en cours</th>
			</tr>
			<tr>
				<th style="text-align:center">Articles</th>
				<th style="text-align:center">Quantité</th>
				<th style="text-align:center">Noms</th>
				<th style="text-align:center">Prénoms</th>
				<th style="text-align:center">Mail</th>	
				<th style="text-align:center">Traité</th>		
			</tr>
		</thead>
		<tbody>			
			<?php
			$res=$connexion->query('SELECT * FROM commande ORDER BY idClient');
			$commande=$res->fetchAll();

			

				foreach ($commande as $key => $value) {
					$ligneCommande=$commande[$key];
					$article=$ligneCommande['article'];
					$qte=$ligneCommande['quantite'];
					$id=$ligneCommande['idClient'];
					$idCommande=$ligneCommande['idCommande'];
					$resClient=$connexion->query('SELECT * FROM Adherent WHERE id="'.$id.'"');
					$client=$resClient->fetchAll();

					foreach ($client as $key => $value) {
						$ligneClient=$client[$key];
						$nom=$ligneClient['nom'];
						$prenom=$ligneClient['prenom'];
						$mail=$ligneClient['mail'];
						
					echo'<tr>
							<td style="text-align:center">'.$article.'</td>
							<td style="text-align:center">'.$qte.'</td>
							<td style="text-align:center">'.$nom.'</td>
							<td style="text-align:center">'.$prenom.'</td>
							<td style="text-align:center">'.$mail.'</td>
							<td style="text-align:center"><input value="'.$idCommande.'" name="id[]" type="checkbox"/></td>
						</tr>
					';
					}
				}
			?>
		</tbody>
	</table>
	<center><input type="submit" class="btn btn-secondary mt-3" name="remis" value="Remis"></center>
	</form>
</body>
</html>