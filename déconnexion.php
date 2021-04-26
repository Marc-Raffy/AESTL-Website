<?php
  session_start(); 
  unset($_SESSION["idGlobal"]); // on unset l'id global se qui revient à une déconnexion
  unset($_SESSION["panier"]); //on unset notre panier pour qu'il soit écrasé au moment ou on est déconnecté.
  unset($_SESSION["admin"]);//on unset notre valeur présente dans admin
?>


<!DOCTYPE html>
<html>
    <head>
 		<title>disconnect</title>
 	</head>
	<body>
 		<script type="text/JavaScript">
     		location.href = 'index.php'; // on redirige vers la page d'accueil du site
 		</script>		
 	</body>
</html>