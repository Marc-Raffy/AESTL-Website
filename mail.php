<html lang="fr">
<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<title>Mail envoyé</title>
</head>
<body>
<?php
	$to = '';
	$msg = $_POST['message_contact'];
	$objet = $_POST['objet_contact'];
	$headers = 'From: '.$_POST['mail_contact']."\r\n" .
    'Reply-To: '.$_POST['mail_contact'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	$recu = mail($to,$objet,$msg,$headers);

?>
	<!-- redirection automatique après 10 secondes -->	
	<script type="text/JavaScript">
      setTimeout("location.href = 'index.php';",4500);
 	</script>

 	<!-- redirection manuel possible -->
 	<div class="d-flex justify-content-center mt-5">
 		<div class="text-center">
 		<h1>Votre mail a bien été envoyé à la corpo AESTL, nous vous répondrons dans les plus brefs délais.<br><h1>
 		<h2>Vous serez redirigés vers la page d'accueil dans :
 		<div id="timer" class="display-4"></div></h2>
 		</div>
		<script type="text/JavaScript"> // permet un décompte et son affichage 
			var duree = 4;
			document.getElementById("timer").innerHTML=duree;
			var tpsPasse = null;
			tpsPasse = setInterval(timer, 1000);
			function timer() {
				duree--;	
			    document.getElementById("timer").innerHTML = duree ;	
			} 
		</script>
	</div>

</body>
</html>

<!-- https://stackoverflow.com/questions/5335273/how-to-send-an-email-using-php -->