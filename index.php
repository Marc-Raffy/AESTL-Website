<?php
  session_start(); 
?>
<html lang="fr">
<head>
	<meta charset="utf-8">
   	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
   	<script src="bootstrap/js/jquery.min.js"></script>
   	<script src="fonctions.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
	<title>Accueil corpo</title>
</head>
<body onload="hauteur_affiches()"><!-- On recupere la hauteur des affiches et on affiche les boutons au bon endroit a la moitie de la hauteur -->
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
    <img src="img/logo.png" width="50" height="50">
  </a>        
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<!-- On fait une barre de navigation -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#event">Évènements<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#decouvrir">Nous découvrir<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#contacter">Contact<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="boutique.php"><b>BOUTIQUE </b><span class="sr-only"></span></a>
      </li>
      <!-- On verifie que la personne connectee est bien admin pour acceder a l'historique des commandes -->
      <?php if(isset($_SESSION['admin'])){
        if($_SESSION['admin']==1){ ?>
        <li class="nav-item active">
          <a class="nav-link" href="commandeEnCours.php"><mark>Historique des commandes</mark><span class="sr-only"></span></a>
        </li>
      <?php 
        }
      }
      ?>
    </ul>
    <!-- On affiche le bouton connexion/deconnexion -->
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
<!-- Notre carrousel d'affiches -->
<div id="event" class="mx-auto padding_elements col-sm-12">
 	<div class="container" id="affiches"  style="position: relative;">
 		<button id="bouton_gauche" href="#" onclick="scrollGauche()"><img src="img/fleche.jfif" class="img_fleche_gauche" width="60" height="60"></button>
 		<div class="row scroll-horizontal" id="blocs">
     		<div class="col-4">
  				<div class="card-deck" id="carte_affiche">
  					<div class="card card-perso shadow-sm p-3 mb-5 bg-white rounded">
   					<img class="card-img-top" src="img/desinte.jpg" alt="Card image cap" id="image_affiche">
    					<div class="card-body">
      					<h5 class="card-title">Soirée de désintégration</h5>
     					<p class="card-text">Une dernière soirée pour fêter la fin des partiels. Un before puis rendez-vous à minuit au Buck'</p>
    					</div>
   						
					</div>
				</div>
			</div>
			<div class="col-4">
  				<div class="card-deck">
  					<div class="card card-perso shadow-sm p-3 mb-5 bg-white rounded">
   					<img class="card-img-top" src="img/conference.jpg" alt="Card image cap" id="image_affiche">
    					<div class="card-body">
      					<h5 class="card-title">Conférence</h5>
     					<p class="card-text">Une conférence sur la mémoire afin de mieux comprendres les mécanismes inhérents à l'apprentissage</p>
    					</div>
   						
					</div>
				</div>
			</div>
			<div class="col-4">
  				<div class="card-deck">
  					<div class="card card-perso shadow-sm p-3 mb-5 bg-white rounded">
   					<img class="card-img-top" src="img/gala.jpg" alt="Card image cap" id="image_affiche">
    					<div class="card-body">
      					<h5 class="card-title">Gala</h5>
     					<p class="card-text">Le fameux Gala de la corpo. Cette année on a privatisé le Buck' avec un buffet en libre service. Venez nombreux.</p>
    					</div>
   						
					</div>
				</div>
			</div>
			<div class="col-4">
  				<div class="card-deck">
  					<div class="card card-perso shadow-sm p-3 mb-5 bg-white rounded">
   					<img class="card-img-top" src="img/lan.jpg" alt="Card image cap" id="image_affiche">
    					<div class="card-body">
      					<h5 class="card-title">LAN</h5>
     					<p class="card-text">Venez jouer à pleins de jeux entre amis que ce soit jeux de société ou jeux video avec des tournois pour ceux que ça intéresse !</p>
    					</div>
   						
					</div>
				</div>
			</div>
			<div class="col-4">
  				<div class="card-deck">
  					<div class="card card-perso shadow-sm p-3 mb-5 bg-white rounded">
   					<img class="card-img-top" src="img/postpartiels.jpg" alt="Card image cap" id="image_affiche">
    					<div class="card-body">
      					<h5 class="card-title">POST PARTIELS</h5>
     					<p class="card-text">Que vous ayez échoué aux partiels parce que la Bio c'est dur ou que vous soyez en info où tout est trop facile venez vous changer les idées à la soirée post partiels !</p>
    					</div>
   						
					</div>
				</div>
			</div>
			<div class="col-4">
  				<div class="card-deck">
  					<div class="card card-perso shadow-sm p-3 mb-5 bg-white rounded">
   					<img class="card-img-top" src="img/beaujolais.jpg" alt="Card image cap" id="image_affiche">
    					<div class="card-body">
      					<h5 class="card-title">LE BEAUJOLAIS</h5>
     					<p class="card-text">Venez fêter le beaujolais nouveau au Gousset. C'est un peu glauque mais on s'amuse bien.</p>
    					</div>
   						
					</div>
				</div>
			</div>
			
		<button id="bouton_droite" href="#" onclick="srcollDroite()"><img src="img/fleche.jfif" width="60" height="60"></button>
		</div>
	</div>
</div>
	<hr id="decouvrir" style="border: 3px solid; margin : 5% 10% 5% 10%">
	<!-- Un paragraphe de presentation de l'association -->
<div >
	<a class="d-flex justify-content-center display-4 my-4">Nous découvrir<br></a>
	<div class="lead d-flex justify-content-center">
		<p class=" col-sm-8 my-4">L'association des étudiants en sciences et techniques de Limoges est une association qui est là pour les étudiants.<br>
		Composée d'un bureau de 10 personnes nous sommes là pour vous aider tout au long de l'année par différents moyens<br><br>
		-Premièrement nous avons 2 locaux. Le premier est situé dans le bâtiment F et met à disposition des étudiants canapés, boissons chaudes/froides et snacks. Le second local est dans le bâtiment F et offre lui aussi des boisons froides/chaudes et snacks.<br>
		-Deuxièmement, nous organisons différentes soirées tout au long de l'année : Soirée d'intégraiton, Barathon d'Halloween, soirée de Noël, Gala, etc...<br>
		-Pour finir, nous nous occupons aussi de nombreux autres évènements : petits déjeuners devant les amphis, conférences, etc...<br><br>
		<a class="lead d-flex justify-content-center">On espère vous voir bientôt dans nos locaux !</a>
		</p>
	</div>
</div>
<!-- Le formulaire pour envoyer un mail -->
<div class="pre-footer" id="contacter">
	<form method="post" action="mail.php" id="posFormulaire" class="col-sm-6">

	    <div class="form-group row">
				<label for="InputMailContact" class="col-sm-4 col-form-label">Votre Mail</label>
				<div class="col-sm-8">
				    <input type="email" id="InputMailContact" name="mail_contact" placeholder="Votre e-mail"  class="form-control" required>
		    	</div>
	    </div>

	    <div class="form-group row">
				<label for="InputObjetContact" class="col-sm-4 col-form-label">Objet</label>
				<div class="col-sm-8">
			    	<input type="text"  id="InputMailContact" name="objet_contact" placeholder="Objet" class="form-control" required>
	        </div>
	    </div>

	    <div class="form-group row">
				<label for="InputMessageContact" class="col-sm-4 col-form-label">Votre Message</label>
				<div class="col-sm-8">
		    		<textarea id="InputMessageContact" name="message_contact" placeholder="Saisissez votre message" class="form-control" required></textarea>
	        </div>
	    </div>

	    <div class="form-group row">
			<div class="col-sm-8">
				<button type="submit" class="btn btn-primary">Envoyer</button>
	        </div>
    	</div>
	</form>
</div>
<!-- Le footer avec les reseaux sociaux -->
	<footer class="pied_page">
		<div class="d-flex justify-content-center">
			<a href="https://www.instagram.com/corpoaestl/"><img src="img/Logo-Instagram.png" width="50" height="50" class="m-3"></a>
			<a href="https://www.facebook.com/corpoaestl/"><img src="img/Logo-Facebook.png" width="50" height="50" class="m-3"></a>
			<a><img src="img/Logo-Snapchat.png" width="50" height="50" class="m-3"></a>
		</div>
	</footer>
</body>

