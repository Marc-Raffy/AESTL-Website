<?php
	
	session_start();
	require 'identifiants.php';


		$testRepeat=0; //Nous permettra d'identifier si c'est un nouvel article ou une hausse de la quantité 
		$qte=0;	
		$prixTotal=0; /* on re calcul entièrement le prix total (évite qu'un utilisateur malveillant puisse intéragir avec le prix, tous se passe côté serveur)*/

		if(isset($_SESSION['panier'])){
			
			
			$panierCourant = $_SESSION["panier"];
			
			foreach ($panierCourant as $key => $value) { // on parcourt le contenu du panier

				$ligneCourant=$panierCourant[$key];

				$lignePrix=$connexion->query('SELECT prix FROM panier WHERE ref='.$ligneCourant["ref"]);
				$tabRes=$lignePrix->fetchAll(PDO::FETCH_ASSOC);	// on créé un tableau associatif d'une ligne contenant le prix
							
				if($ligneCourant["ref"]==$_POST['selectId']){ // incrémentation de la quantité d'articles identique
					$ligneCourant["quantite"]=$ligneCourant["quantite"]+1;
					$ligneCourant["ref"] = $_POST['selectId'];
					$testRepeat=1; // on dit que c'est une modif de qte mais pas un nouvel article
					$qte=$ligneCourant["quantite"];
					$panierCourant[$key]=$ligneCourant;
					// on calcul le nouveau prix sur cet article en fonction de sa qté
					$prixArticle = $tabRes[0]['prix']*$qte;
				}
				
				$prixTotal=$prixTotal+$tabRes[0]['prix']*$ligneCourant["quantite"];

			}
			if($testRepeat==0){ //si c'est un article qui n'a pas encore était ajouté au panier
				$lignePanier["ref"]=$_POST['selectId']; // ajout en fin de tableau
				$lignePanier["quantite"] = 1;
				$qte=1;
				$panierCourant[]= $lignePanier;

				//on select le nouvel element
				$lignePrix=$connexion->query('SELECT prix FROM panier WHERE ref='.$_POST['selectId']);
				$tabRes=$lignePrix->fetchAll(PDO::FETCH_ASSOC);	

				//le prix de l'article est le prix à l'unité 
				$prixArticle = $tabRes[0]['prix'];
				
				//on ajoute le prix de l'element en question
				$prixTotal=$prixTotal+$tabRes[0]['prix'];
			} 
		}
		else{ // dans le cas ou le panier n'a pas encore était créé
			$panierCourant=[];
			$lignePanier=[];
			$lignePanier["ref"] = $_POST['selectId']; // on y met la référence d'un article
			$lignePanier["quantite"] = 1;			// ainsi que le nbr d'article ajouté au panier qu'on initialise à un unique article
			$qte=1;
			$panierCourant[]= $lignePanier;
			
			//on recup le prix 

			$lignePrix=$connexion->query('SELECT prix FROM panier WHERE ref='.$_POST["selectId"]);
			$tabRes=$lignePrix->fetchAll(PDO::FETCH_ASSOC);		
			
			//le prix total dépends de cet unique article dans le panier se sont donc les memes
			$prixArticle = $tabRes[0]['prix'];
			$prixTotal=$tabRes[0]['prix'];
		}

		$videRef=0;
		

		$_SESSION['panier']=$panierCourant;

		//on récupère les données qui sont vouées à changer et qui sont traiter dans le fichier javascript.

		echo $_POST['selectId'].";".$qte.";".$prixArticle.";".$prixTotal.";".$videRef;
		
