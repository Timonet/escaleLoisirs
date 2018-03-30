<?php

// Affichage liste animateurs
function listeAnimateurs($bdd, $orderType, $direction){
	$query = 'SELECT code_personne, nom_personne AS Nom, prenom_personne AS Prenom, courriel_personne AS Courriel, ville_adresse_personne AS Adresse, telephone_personne AS Telephone
	FROM personnes 
	WHERE code_role = 2
	ORDER BY '.$orderType.' '.$direction.'';

	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	return $result;
}


//Function pour valider les inputs POST formulaire animateur (ajout et update)
/*Param:
$post : donnees recues via post
$update : si on est en fiche display ou ajout/modif
*/
function validerAnimateur($post, $update=true){

	$data = [];
		$data['nom_personne'] = valider($post['nom_personne'])?$post['nom_personne']:false;
		$data['prenom_personne'] = valider($post['prenom_personne'])?$post['prenom_personne']:false;
		$data['mot_passe_personne'] = valider($post['mot_passe_personne'])?$post['mot_passe_personne']:false;
		$data['numero_adresse_personne'] = valider($post['numero_adresse_personne'])?$post['numero_adresse_personne']:false;
		$data['rue_adresse_personne'] = valider($post['rue_adresse_personne'])?$post['rue_adresse_personne']:false;
		$data['ville_adresse_personne'] = valider($post['ville_adresse_personne'])?$post['ville_adresse_personne']:false;
		$data['code_postal_adresse_personne'] = valider($post['code_postal_adresse_personne'])?$post['code_postal_adresse_personne']:false;
		$data['courriel_personne'] = valider($post['courriel_personne'])?$post['courriel_personne']:false;
		$data['telephone_personne'] = valider($post['telephone_personne'])?$post['telephone_personne']:false;
		//$data['code_role_personne'] = valider($post['personne'], 'intval')?$post['personne']:false;
		//$data['role'] = valider($post['role'], 'intval')?$post['role']:false;

	return $data;
}


//Function pour afficher la fiche animateur
/*Param:
$bbd : connexion_escaleLoisirs
$code_animateur : code animateur recu via GET*/
function afficheFicheAnimateur($bdd, $code_personne){

	$query = 'SELECT * FROM personnes 
		
	WHERE code_personne = ?';
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'i', $code_personne);
	mysqli_execute($stmt);

	$resultat = mysqli_stmt_get_result($stmt);
	$animateur = mysqli_fetch_assoc($resultat);

	return $animateur;
}



//Function pour UPDATE fiche animateur dans BDD
/*Param:
$bbd : connexion_escaleLoisirs
$data : input du POST validé
*/
function modifAnimateur($bdd, $data){

	$query = "UPDATE personnes SET nom_personne=?, prenom_personne=?, mot_passe_personne=?, numero_adresse_personne=?, rue_adresse_personne=?, ville_adresse_personne=?, code_postal_adresse_personne=?, courriel_personne=?, telephone_personne=? WHERE code_personne=?";
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'ssssssssi', $data['nom_personne'], $data['prenom_personne'], $data['mot_passe_personne'], $data['numero_adresse_personne'], $data['rue_adresse_personne'], $data['ville_adresse_personne'], $data['code_personne'], $data['courriel_personne'], $data['telephone_personne']);
	$insertion = mysqli_execute($stmt);

	return $insertion;
}

//Function pour inserer nouvel animateur BDD, date d'achat suit
/*Param:
$bbd : connexion_escaleLoisirs
$data : input du POST*/
function insererAnimateur($bdd, $data){
	$code_role = 2;
	$query = "INSERT INTO personnes(nom_personne, prenom_personne, mot_passe_personne, numero_adresse_personne, rue_adresse_personne, ville_adresse_personne, code_postal_adresse_personne, courriel_personne, telephone_personne, code_role_personne) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'sssssssssi', $data['nom_personne'], $data['prenom_personne'], $data['mot_passe_personne'], $data['numero_adresse_personne'], $data['rue_adresse_personne'], $data['ville_adresse_personne'], $data['code_personne'], $data['courriel_personne'], $data['telephone_personne'], $code_role);
	$insertion = mysqli_execute($stmt);
	//return $insertion;

	if($insertion){
		return mysqli_insert_id($bdd);
	}else{
		return false;
	}
}