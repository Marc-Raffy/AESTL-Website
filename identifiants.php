<?php
// avoir des erreurs php qui s'affiche vu que par défaut agate fait rien.
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

/*
$hote= 'localhost';   
$login = 'raffy5';
$pass= 'w3gliyuk';
$nomBd= 'raffy5';
*/
$hote='localhost';
$login='fmmdb';
$pass='techwebtiptop';
$nomBd='fmmdb';

Try{
$connexion= new PDO("mysql:host=$hote;dbname=$nomBd", $login, $pass);

$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//avoir un tableau associatif facilite le débugage
$connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE ,
	PDO::FETCH_ASSOC);
	echo'';
	}

CATCH(PDOEXCEPTION $e)
	{
		echo'echec de la connection : '.$e->getMessage();
		die();
	}
	