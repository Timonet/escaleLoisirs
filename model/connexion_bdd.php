<?php

//je fais la connexion avec les données maison. "password" devrait être effacé pour le serveur HWC
$bdd = @mysqli_connect('localhost', 'root', 'password', 'escaleloisirs');

//pour voir le résultat correctement dans mon navigateur j'ai dû changer l'encoding de latin1 à utf8.
$bdd->set_charset("utf8");

if(!$bdd){
	echo 'Erreur de connexion : '.mysqli_connect_error();
	exit();
}
?>