<?php

//pour tests
function show($data){
    echo "<pre>";
	echo ($data);
    echo "</pre>";
}


//Valider les inputs des formulaires
/*Param:
value : input du POST
type : validation is_num... via autres functions ci-bas*/
function valider($value, $type='alpha'){
	switch ($type) {
		//strings, etc
		case 'alpha':
			return estAlpha($value);
			break;
		//integers, etc
		case 'numerique':
			return estNumerique($value);
			break;
		//deroulants dont donnes = code de la BDD
		case 'intval':
			return estIntval($value);
			break;
		default:
			return (!empty($value));
	}	
}

function estAlpha($value){
	return is_string(trim($value));
}

function estNumerique($value){
	return is_numeric(trim($value));
}

function estIntval($value){
	intval($value);
	return is_numeric(trim($value));
}


//Pour gerer les messages d'erreur en lien aus inputs du POST
/*Param:
$data : tableau returne de validerNouveauMembre avec, par exemple:
$data['nom_membre'] = valider($post['nom_membre'])?$post['nom_membre']:false;
*/
function messagesErreurs($data){
	$erreurs = [];
	foreach ($data as $key => $value) {
		if(!$value){
			switch ($key) {
				//pour les modifications, pas le nouvelles fiches
				case 'code_membre':
					$erreurs['code_membre'] =  'Erreur dans le traitement de la fiche. Réessayez, SVP';
					break;
				case 'nom_membre':
					$erreurs['nom_membre'] = 'Veuillez entrer votre nom';
					break;
				case 'prenom_membre':
					$erreurs['prenom_membre'] = 'Veuillez entrer votre prénom';
					break;
				case 'adresse_membre':
					$erreurs['adresse_membre'] = 'Veuillez entrer le numéro de votre adesse';
					break;
				case 'rue_membre':
					$erreurs['rue_membre'] = 'Veuillez entrer le nom de votre rue';
					break;
				case 'ville_membre':
					$erreurs['ville_membre'] = 'Veuillez indiqeur votre ville de résidence';
					break;
				case 'cp_membre':
					$erreurs['cp_membre'] = 'Veuillez introduire votre code postal';
					break;
				case 'tel_membre':
					$erreurs['tel_membre'] = 'Veuillez indiquer un numéro de téléphone';
					break;
				case 'courriel_membre':
					$erreurs['courriel_membre'] = 'Veuillez indiquer votre courriel';
					break;
				case 'motpasse_membre':
					$erreurs['motpasse_membre'] = 'Veuillez choisir votre mot de passe';
					break;	
				case 'motpasse2_membre':
					$erreurs['motpasse2_membre'] = 'Veuillez vérifier votre mot de passe';
					break;		
			}
		}
	}
	return $erreurs;
}


//Pour afficher les champs deroulants des <form>
/*
$type = categorie / animateur
$bdd = connexion a la BDD
$bouton = du formulaire
$post = code (type) du post 
$ get = code (type) du get
*/
function getSelect($bdd, $bouton, $post, $get, $type){
	switch ($type){
		case 'categorie':
			$input_name = 'categorie';
			$query = "SELECT code_categorie AS code, nom_categorie AS nom from categories ORDER BY nom ASC";
			$default_option ='Selectionnez une catégorie';
			break;
		case 'animateur':
			$input_name = 'animateur';
			$query = "SELECT code_personne AS code, CONCAT (nom_personne, ', ', prenom_personne) AS nom FROM personnes WHERE code_role_personne = 2 ORDER BY nom ASC";
			$default_option ='Selectionnez un(e) animateur(trice)';
			break;
	}

	$string = '<select class="custom-select" name="'.$input_name.'">
	<option value="0">'.$default_option.'</option>';

	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_execute($stmt);
	$resultat = mysqli_stmt_get_result($stmt);
	//pour garder les infos POST déjà choisies par utilisateur, même si le formulaire ne part pas, à cause d'autres erreurs sur la page
	while($donnees = mysqli_fetch_assoc($resultat)){
		if($bouton){
			$selected = ($donnees['code'] == $post)?'SELECTED=SELECTED':'';
			$string .= '<option value="'.$donnees['code'].'" '.$selected.'>'.$donnees['nom'].'</option>';
		}else{
			$selected = ($donnees['code'] == $get)?'SELECTED=SELECTED':'';
			$string .= '<option value="'.$donnees['code'].'" '.$selected.'>'.$donnees['nom'].'</option>';
		}
	}
	$string .='</select>';

	return $string;
}


//Pour effectuer la recherche provenant du champ de recherche/go
/*Param:
$bdd: connexion_biblio
$input : texte recherche via GET*/
function rechercher($bdd, $input){
	$rechercher = '([[:space:]]|[_-]|[\']|[é]|[a-zA-Z0-9]|^)'.$input.'([[:space:]]|[_-]|[\']|[é]|[a-zA-Z0-9]|$)';
	
	$query = 'SELECT code_livre AS Code, titre_livre AS Titre, nom_auteur AS Auteur, nom_genre AS Genre, nom_editeur AS Editeur, date_publication AS Publication, code_auteur, prenom_auteur
	FROM livres 
	INNER JOIN auteurs ON livres.code_auteur_livres = auteurs.code_auteur
	INNER JOIN genres ON livres.code_genre_livres = genres.code_genre
	INNER JOIN editeurs ON livres.code_editeur_livres = editeurs.code_editeur 
	WHERE titre_livre REGEXP ? OR nom_auteur REGEXP ? OR prenom_auteur REGEXP ? OR nom_editeur REGEXP ?
	ORDER BY titre_livre';

	$stmt = mysqli_prepare($bdd, $query);
	mysqli_stmt_bind_param($stmt, 'ssss', $rechercher, $rechercher, $rechercher, $rechercher);
	mysqli_execute($stmt);
	$resultat= mysqli_stmt_get_result($stmt);

	return $resultat;
}

// $heure de la forme hh:mm:ss
// on enleve les secondes
function heureMinute($heure) {
   $arrayheure = explode(':',$heure);
   $newheure = $arrayheure[0].':'.$arrayheure[1];
   return $newheure; // de la forme hh:mm
}

?>