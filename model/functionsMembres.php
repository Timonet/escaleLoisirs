<?php


//Function pour valider les inputs POST creation nouveau membre
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


function validerConnexion($post){

	$data = [];

	$data['courriel_membre'] = valider($post['courriel_membre'])?$post['courriel_membre']:false;
	$data['motpasse_membre'] = valider($post['motpasse_membre'])?$post['motpasse_membre']:false;

	return $data;
}


//Function pour inserer nouveau livre BDD, date d'achat suit
/*Param:
$bbd : connexion_bdd
$data : input du POST*/
function insererNouveauMembre($bdd, $data, $code_role){
	$query = "INSERT INTO personnes(mot_passe_personne, nom_personne, prenom_personne, numero_adresse_personne, rue_adresse_personne, ville_adresse_personne, code_postal_adresse_personne, courriel_personne, telephone_personne, code_role) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'sssssssssi', $data['motpasse_membre'], $data['nom_membre'], $data['prenom_membre'], $data['adresse_membre'], $data['rue_membre'], $data['ville_membre'], $data['cp_membre'], $data['courriel_membre'], $data['tel_membre'], $code_role);
	$insertion = mysqli_execute($stmt);
	return $insertion;
}


//Function pour afficher fiche livre individuel
/*Param:
$bbd : connexion_biblio
$code_livre : code livre recu via GET*/
function afficheFicheLivre($bdd, $code_livre){

	$query = 'SELECT * FROM livres 
		INNER JOIN auteurs ON livres.code_auteur_livres = auteurs.code_auteur
		INNER JOIN genres ON livres.code_genre_livres = genres.code_genre
		INNER JOIN editeurs ON livres.code_editeur_livres = editeurs.code_editeur 
	WHERE code_livre = ?';
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'i', $code_livre);
	mysqli_execute($stmt);

	$resultat = mysqli_stmt_get_result($stmt);
	$livre = mysqli_fetch_assoc($resultat);

	return $livre;
}


//Function pour UPDATE modifications fiche livre dans BDD
/*Param:
$bbd : connexion_biblio
$data : input du POST validé
*/
function modifLivre($bdd, $data){

	$query = "UPDATE livres SET titre_livre=?, date_publication=?, isbn=?, nombre_pages=?, code_editeur_livres=?, code_auteur_livres=?, code_genre_livres=? WHERE code_livre=?";
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'siiiiiii', $data['titre_livre'], $data['date_publication'], $data['isbn'], $data['nombre_pages'], $data['editeur'], $data['auteur'], $data['genre'], $data['code_livre']);
	$insertion = mysqli_execute($stmt);

	return $insertion;
}

?>