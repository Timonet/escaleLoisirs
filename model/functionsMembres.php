<?php


//Function pour valider les inputs POST creation nouveau membre et modif (profil-membre.php aussi)
/*Param:
$post : donnees recues via post
*/
function validerNouveauMembre($post){
	$data = [];

	$data['nom_membre'] = valider($post['nom_membre'])?$post['nom_membre']:false;
	$data['prenom_membre'] = valider($post['prenom_membre'])?$post['prenom_membre']:false;
	$data['adresse_membre'] = valider($post['adresse_membre'])?$post['adresse_membre']:false;
	$data['rue_membre'] = valider($post['rue_membre'])?$post['rue_membre']:false;
	$data['ville_membre'] = valider($post['ville_membre'])?$post['ville_membre']:false;
	$data['cp_membre'] = valider($post['cp_membre'])?$post['cp_membre']:false;
	$data['tel_membre'] = valider($post['tel_membre'])?$post['tel_membre']:false;
	$data['courriel_membre'] = valider($post['courriel_membre'])?$post['courriel_membre']:false;
	$data['motpasse_membre'] = valider($post['motpasse_membre'])?$post['motpasse_membre']:false;
	$data['motpasse2_membre'] = valider($post['motpasse2_membre'])?$post['motpasse2_membre']:false;

	return $data;
}


//creer juste une fonction valider vec un if
function validerMembre($post){
	$data = [];

	$data['nom_membre'] = valider($post['nom_membre'])?$post['nom_membre']:false;
	$data['prenom_membre'] = valider($post['prenom_membre'])?$post['prenom_membre']:false;
	$data['adresse_membre'] = valider($post['adresse_membre'])?$post['adresse_membre']:false;
	$data['rue_membre'] = valider($post['rue_membre'])?$post['rue_membre']:false;
	$data['ville_membre'] = valider($post['ville_membre'])?$post['ville_membre']:false;
	$data['cp_membre'] = valider($post['cp_membre'])?$post['cp_membre']:false;
	$data['tel_membre'] = valider($post['tel_membre'])?$post['tel_membre']:false;
	$data['courriel_membre'] = valider($post['courriel_membre'])?$post['courriel_membre']:false;

	return $data;
}

function validerConnexion($post){
	$data = [];

	$data['courriel_membre_login'] = valider($post['courriel_membre_login'])?$post['courriel_membre_login']:false;
	$data['motpasse_membre_login'] = valider($post['motpasse_membre_login'])?$post['motpasse_membre_login']:false;

	return $data;
}


function getDonneesConnexion($bdd, $data){
	$query = 'SELECT courriel_personne, code_personne, mot_passe_personne
	FROM personnes
	WHERE courriel_personne = ?';

	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 's', $data['courriel_membre_login']);
	mysqli_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);
	$donnees = mysqli_fetch_assoc($resultat);

	return $donnees;
}


//Function pour inserer nouveau membre BDD
/*Param:
$bbd : connexion_bdd
$data : input du POST*/
function insererNouveauMembre($bdd, $data, $code_role){
	$query = "INSERT INTO personnes(mot_passe_personne, nom_personne, prenom_personne, numero_adresse_personne, rue_adresse_personne, ville_adresse_personne, code_postal_adresse_personne, courriel_personne, telephone_personne, code_role_personne) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'sssssssssi', $data['motpasse_membre'], $data['nom_membre'], $data['prenom_membre'], $data['adresse_membre'], $data['rue_membre'], $data['ville_membre'], $data['cp_membre'], $data['courriel_membre'], $data['tel_membre'], $code_role);
	$insertion = mysqli_execute($stmt);
	
	if($insertion){
		return mysqli_insert_id($bdd);
	}else{
		return false;
	}
}


//Function pour inserer inscription activite
/*Param:
$bbd : connexion_bdd
$data : input du POST
$code_membre: via GET
$code_activite: via GET
$code_paiement: via GET
$paye: boolean, par default, non=0*/
function insererInscription($bdd, $code_paiement, $code_membre, $code_activite, $paye='0'){

	$query = "INSERT INTO inscriptions(paye, code_paiement_inscription, code_personne_inscription, code_activite_inscription) VALUES(?, ?, ?, ?)";
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'iiii', $paye, $code_paiement, $code_membre, $code_activite);
	$insertion = mysqli_execute($stmt);
	
	return $insertion;
}


//Function pour afficher infos membre
/*Param:
$bbd : connexion_bdd
$code_membre : code activite recu via GET*/
function afficheInfosMembre($bdd, $code_membre){

	$query = 'SELECT * FROM personnes 
		WHERE code_personne = ?';
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'i', $code_membre);
	mysqli_execute($stmt);

	$resultat = mysqli_stmt_get_result($stmt);

	return $resultat;
}


//Function pour modifications fiche membre via son profil
/*Param:
$bbd : connexion_bdd
$data : input du POST validé
$code_membre: via le GET
*/
function modifMembre($bdd, $data, $code_membre){

	$query = "UPDATE personnes SET nom_personne=? , prenom_personne=?, numero_adresse_personne=?, rue_adresse_personne=?, ville_adresse_personne=?, code_postal_adresse_personne=?, courriel_personne=?, telephone_personne=? WHERE code_personne=?";
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'ssssssssi', $data['nom_membre'], $data['prenom_membre'], $data['adresse_membre'], $data['rue_membre'], $data['ville_membre'], $data['cp_membre'], $data['courriel_membre'], $data['code_livre'], $code_membre);
	$insertion = mysqli_execute($stmt);

	return $insertion;
}

?>