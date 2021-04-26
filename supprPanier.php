<?php 
	session_start();
	require 'identifiants.php';


	$ref=$_POST['selectId'];
	$qte;
	$prixTotal=0;
	$videRef=0;

	$panierCourant=$_SESSION['panier'];

	foreach ($panierCourant as $key => $value) {
		$ligneCourante=$panierCourant[$key];

		$lignePrix=$connexion->query('SELECT prix FROM panier WHERE ref='.$ligneCourante["ref"]);
		$tabRes=$lignePrix->fetchAll(PDO::FETCH_ASSOC); // on récupère le prix de l'article concerné

		if($ligneCourante["ref"]==$ref){
			$ligneCourante["quantite"]=$ligneCourante["quantite"]-1;
			if($ligneCourante["quantite"]==0){
				$videRef=$ref;
				$qte=0;
				$prixArticle=0; // on doit faire passer une valeur pour la partie ajax donc on l'a met à 0
				unset($panierCourant[$key]);// on dit que cet article ne dois pas apparaitre
			}
			else{
	    		$ligneCourante['ref']=$ref;
				$qte=$ligneCourante["quantite"];			
				$panierCourant[$key]=$ligneCourante;	
				// on calcul le coût de notre article avec la nouvelle qté
				$prixArticle = $tabRes[0]['prix']*$qte;	
			}
		}
	
		$prixTotal=$prixTotal+$tabRes[0]['prix']*$ligneCourante["quantite"];
	}
	

	$_SESSION['panier']=$panierCourant;
	
	echo $ref.";".$qte.";".$prixArticle.";".$prixTotal.";".$videRef;
