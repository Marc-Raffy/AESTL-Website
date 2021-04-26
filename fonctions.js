function hauteur_affiches() {
	var hauteur_affiches= document.getElementById('affiches').clientHeight;
	document.getElementById('bouton_gauche').style.bottom = hauteur_affiches/2;
	document.getElementById('bouton_droite').style.bottom = hauteur_affiches/2;
}

function scrollGauche() {
	document.getElementById('blocs').scrollLeft += -document.getElementById('affiches').clientWidth;
}

function srcollDroite() {
	document.getElementById('blocs').scrollLeft += document.getElementById('affiches').clientWidth;
}


function init()
{

}


function ajoutPanier(selectId){
	confirm("produit ajouté au panier");  

    $.post("ajoutPanier.php",{'selectId' : selectId },traiterReponseServeur);

}

function supprPanier(selectId){
	confirm("produit supprimé du panier");
	
	$.post("supprPanier.php",{'selectId': selectId},traiterReponseServeur);
}



function traiterReponseServeur(donnees)
{
    

    
    var valeurs=donnees.split(";"); /* on récupère dans un tableau les donnés que l'on veut faire passer dans 
     les fonctions supprimer panier et ajouter panier.*/

     console.log(valeurs);

    $("#qte_"+valeurs[0]).empty().append(valeurs[1]); // on modifie la quantité dans l'affichage du panier
    $("#prix_"+valeurs[0]).empty().append(valeurs[2]); // on modifie le prix d'un article suivant sa nouvelle qte
    $("#prixTot").empty().append(valeurs[3]); // on modifie le prix total
    if(valeurs[4]!=0){ 
    	$("#article_"+valeurs[0]).remove(); // on supprime l'article de l'affichage si sa qté tombe à 0 <=> si on
    	// avait un article en une fois et qu'on appel supprPanier
	}
	
}
