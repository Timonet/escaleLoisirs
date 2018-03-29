<?php


//Function pour valider les inputs POST creation nouvelle activite
/*Param:
$post : donnees recues via post
*/
function validerNouvelleActivite($post){

	$data = [];

	//fiche membre
	$data['titre_activite'] = valider($post['titre_activite'])?$post['titre_activite']:false;
	$data['animateur'] = valider($post['animateur'], 'intval')?$post['animateur']:false;
	$data['categorie'] = valider($post['categorie'], 'intval')?$post['categorie']:false;
	$data['salle'] = valider($post['salle'])?$post['salle']:false;
	$data['description'] = valider($post['description'])?$post['description']:false;
	$data['nb_places'] = valider($post['nb_places'], 'numerique')?$post['nb_places']:false;
	$data['prix'] = valider($post['prix'], 'numerique')?$post['prix']:false;
	$data['date_debut'] = valider($post['date_debut'])?$post['date_debut']:false;
	$data['date_fin'] = valider($post['date_fin'])?$post['date_fin']:false;
	$data['hr_debut'] = valider($post['hr_debut'])?$post['hr_debut']:false;
	$data['hr_fin'] = valider($post['hr_fin'])?$post['hr_fin']:false;
	return $data;
}


//Function pour inserer nouvelle activite BDD
/*Param:
$bbd : connexion_bdd
$data : input du POST*/
function insererActivite($bdd, $data){
	$query = "INSERT INTO activites(nom_activite, nb_participants_max_activite, salle_activite, description_activite, prix_activite, date_debut_activite, date_fin_activite, heure_debut_activite, heure_fin_activite, code_personne_activite, code_categorie_activite) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'sississssii', $data['nom_activite'], $data['nb_places'], $data['salle'], $data['description'], $data['prix'], $data['date_debut'], $data['date_fin'], $data['hr_debut'], $data['hr_fin'], $data['animateur'], $data['categorie']);
	$insertion = mysqli_execute($stmt);
	return $insertion;
}