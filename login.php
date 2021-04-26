<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>Connexion</title>
</head>
<body>

	<form action="verifCo.php" method="post" class="col-sm-5 mx-auto my-4">
		<h1>Connexion</h1>

		<div class="form-group row">
			<label for="email" class="col-sm-5 col-form-label">Mail de connexion</label>
			<div class="col-sm-7">
				<input type="email" name="login" placeholder="Entrer votre adresse mail" class="form-control" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="email" class="col-sm-5 col-form-label">Mot de passe</label>
			<div class="col-sm-7">
				<input type="password" placeholder="Entrer votre mot de passe" name="mdp" class="form-control" required>
			</div>
		</div>


		<input name="co" type="submit" id='submit' value='Se connecter' class="btn btn-primary">
	</form>
	<hr style="border: 3px solid; margin : 5% 10% 5% 10%">

	<form action="register.php" method="post" class="col-sm-5 mx-auto my-4">
		<h1>S'enregistrer</h1>

		<div class="form-group row">
			<label for="login" class="col-sm-5 col-form-label">Rentrez votre mail unilim : </label>
			<div class="col-sm-7">
				<input type="email" name="login" placeholder="adresse unilim.fr" class="form-control" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.unilim.fr" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="nom" class="col-sm-5 col-form-label">Nom : </label>
			<div class="col-sm-7">
				<input type="text" name="nom" placeholder="nom" class="form-control">
			</div>
		</div>

		<div class="form-group row">
			<label for="prenom" class="col-sm-5 col-form-label">Prénom : </label>
			<div class="col-sm-7">
				<input type="text" name="prenom" placeholder="prénom" class="form-control">
			</div>
		</div>

		<div class="form-group row">
			<label for="mdp" class="col-sm-5 col-form-label">Saisissez un mot de passe : </label>
			<div class="col-sm-7">
				<input type="password" placeholder="Entrer votre mot de passe" name="mdp" class="form-control" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="mdp2" class="col-sm-5 col-form-label">Saisissez à nouveau votre mot de passe : </label>
			<div class="col-sm-7">
				<input type="password" placeholder="Entrer votre mot de passe" name="mdp2" class="form-control" required>
			</div>
		</div>


		<input name="register" 	type="submit" id='submit' value='Enregistrement' class="btn btn-primary">
	</form>
	<footer class="pied_page">
		<div class="d-flex justify-content-center">
			<a href="https://www.instagram.com/corpoaestl/"><img src="img/Logo-Instagram.png" width="50" height="50" class="m-3"></a>
			<a href="https://www.facebook.com/corpoaestl/"><img src="img/Logo-Facebook.png" width="50" height="50" class="m-3"></a>
			<a><img src="img/Logo-Snapchat.png" width="50" height="50" class="m-3"></a>
		</div>
	</footer>
</body>
</html>