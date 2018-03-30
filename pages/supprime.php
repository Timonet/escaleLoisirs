<?php

if (isset($_GET['code_personne']) && is_numeric($_GET['code_personne'])) {
	$animateur = afficheFicheAnimateur($bdd, $_GET['code_personne']);
	$nom = afficheFicheAnimateur($bdd, $_GET['nom_personne']);
	$prenom = afficheFicheAnimateur($bdd, $_GET['prenom_personne']);

	if(is_null($animateur)) {
		$erreur_code = "Information erronée: impossible d'afficher la page.";
	}

}else{
	$erreur_code = "Information manquante: impossible d'afficher la page.";
}

if($erreur_code) {
	echo '<div class="col-md-12 reponse"><p>'.$erreur_code.'</p><a href="?action=liste-animateurs" class="alert-link">Veuillez réessayer, merci.</a></div>';
} else {  

?>

<div class="col-lg-10">
		<h2 class= "jumbotron jumbotron__h2__admin">Supprimer </h2>

</div>




<?php 
}
?>