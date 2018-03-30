<?php

//Infos pour header clickable liste livres avec display asc/desc par colonne
/*Param:
$ordreType : GET['ordonne_par'] (code, titre,...)
$direction : GET['direction'] (asc ou desc)*/
function afficherAscDesc($ordreType, $direction){

	$ordreCode = $ordreTitre = $ordreCategorie = $ordreAnimateur = $ordrePlaces = $ordrePrix = $ordreDebut = $ordreFin = $ordreNom = $ordrePrenom = $ordreAdresse = $ordreTel = $ordreCourriel = $ordrePaye = 'ASC';
	switch ($ordreType) {
		case 'code':
			$ordreType = 'Code';
			$ordreCode = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;
		case 'titre':
			$ordreType = 'Titre';
			$ordreTitre = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;
		case 'categorie':
			$ordreType = 'Categorie';
			$ordreCategorie = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;
		case 'animateur':
			$ordreType = 'Animateur';
			$ordreAnimateur = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;
		case 'places':
			$ordreType = 'Places';
			$ordrePlaces = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;
		case 'prix':
			$ordreType = 'Prix';
			$ordrePrix = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;
		case 'debut':
			$ordreType = 'Date_debut';
			$ordreDebut = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;
		case 'fin':
			$ordreType = 'Date_fin';
			$ordreFin = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;
		case 'nom':
			$ordreType = 'Nom';
			$ordreNom = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;	
		case 'prenom':
			$ordreType = 'Prenom';
			$ordrePrenom = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;
		case 'adresse':
			$ordreType = 'Adresse';
			$ordreCode = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;
		case 'tel':
			$ordreType = 'Telephone';
			$ordreTel = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;
		case 'courriel':
			$ordreType = 'Courriel';
			$ordreCourriel = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;	
		case 'paye':
			$ordreType = 'paye';
			$ordreCourriel = ($direction == 'ASC') ? 'DESC' : 'ASC';
			break;			
		default:
			$ordreType = 'Code';
			break;
	}

	$return = array(
		'ordreType' => $ordreType,
		'direction'=> $direction,
		'ordreCode'=> $ordreCode,
		'ordreTitre'=> $ordreTitre,
		'ordreCategorie' => $ordreCategorie,
		'ordreAnimateur' => $ordreAnimateur,
		'ordrePlaces' => $ordrePlaces,
		'ordrePrix' => $ordrePrix,
		'ordreDebut' => $ordreDebut,
		'ordreFin' => $ordreFin,
		'ordreNom' => $ordreNom,
		'ordrePrenom' => $ordrePrenom,
		'ordreAdresse' => $ordreAdresse,
		'ordreTel' => $ordreTel,
		'ordreCourriel' => $ordreCourriel,
		'ordrePaye' => $ordrePaye
	);

	return $return;
}

//Display liste activites
function afficheListe($bdd, $ordreType, $direction){
	$query = 'SELECT code_activite AS Code, nom_activite AS Titre, nom_categorie AS Categorie, nom_personne AS Animateur, nb_participants_max_activite AS Places, prix_activite AS Prix, date_debut_activite AS Date_debut, date_fin_activite AS Date_fin, code_personne, code_categorie
	FROM activites
	INNER JOIN personnes ON activites.code_personne_activite = personnes.code_personne
	INNER JOIN categories ON activites.code_categorie_activite = categories.code_categorie
	ORDER BY '.$ordreType.' '.$direction.'';

	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	return $result;
}



// Affichage liste membres
function afficheListeMembres($bdd, $ordreType, $direction){
	$query = 'SELECT code_personne AS Code, nom_personne AS Nom, prenom_personne AS Prenom, ville_adresse_personne AS Adresse, telephone_personne AS Telephone, courriel_personne AS Courriel
	FROM personnes
	WHERE code_role_personne = 3
	ORDER BY '.$ordreType.' '.$direction.'';

	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	return $result;
}

//************* ne fonctionne pas - Affichage liste membres inscrits par activités
function afficheListeInscrits($bdd, $ordreType, $direction, $code_activite){
	$query = 'SELECT * FROM inscriptions 
	INNER JOIN personnes ON code_personne_inscription = code_personne
	INNER JOIN activites ON code_activite_inscription = code_activite
		WHERE code_activite = ?
		ORDER BY '.$ordreType.' '.$direction.'';
	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'i', $code_activite);
	mysqli_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);
	return $resultat;
}




//*********si le temps, creer une selue function pour toutes listes
//*********faudrait changer noms et parametres dans php display

//Display liste animateurs
function afficheListeAnimateurs($bdd, $ordreType, $direction){
	$query = 'SELECT code_personne AS Code, nom_personne AS Nom, prenom_personne AS Prenom, telephone_personne AS Telephone, courriel_personne AS Courriel
	FROM personnes
	WHERE code_role_personne = 2
	ORDER BY '.$ordreType.' '.$direction.'';

	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	return $result;
}