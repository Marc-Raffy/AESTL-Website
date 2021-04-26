<?php 
	session_start();
	require 'identifiants.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="bootstrap/js/jquery.min.js"></script>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<script src="fonctions.js"></script>
	
	<title>Boutique</title>
 
</head>
<body onload="init()">


<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
    <img src="img/logo.png" width="50" height="50">
  </a>        
  

  <div class="navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#event">
        	<form action="panier.php">
						<button class="btn btn-success">Consulter panier</button>
					</form>
					<span class="sr-only"></span>
		</a>
      </li>
      
    </ul>
    <?php
    	if(!isset($_SESSION["idGlobal"])){
    		echo'
    		<a class="nav-link btn btn-primary" href="login.php">Se connecter </a>';
    	}
    	else{
    		echo'
    		<a class="nav-link btn btn-primary" href="déconnexion.php">Se déconnecter </a>';
    	}
    ?>
  </div>
</nav>
	<?php
		$panierprov=$connexion->query('SELECT * FROM panier ORDER BY prix');
		$res=$panierprov->fetchAll(); // on récupère l'ensembles de nos articles
		echo'
			<div id="event" class="mx-auto padding_elements col-sm-12"
			<div class="container" id="affiches"  style="position: relative;">
			<div class="row" id="blocs">

			';
			foreach ($res as $key => $value) { // on affiche nos articles 1 par 1
				$ligne = $res[$key];
				echo '
				<div class="col-4 ">
  					<div class="card-deck my-3 mx-auto ">
  						<div class="card">
						<img class="card-img-top" src="img_boutique/'.$ligne['ref'].'.jfif" alt="'.$ligne['article'].'">						
	    					<div class="card-body">
	    					<center>
	      						<h5 class="card-title">'.$ligne['article'].'<br>'.$ligne['prix'].'€</h5>
	      						<input class="btn btn-secondary btn-lg" id="'.$ligne['ref'].'" value="ajouter au panier" type="button" href="#" onclick="ajoutPanier('.$ligne['ref'].');"/> 
								
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

	?>
	
</body>
</html>
	 	
			