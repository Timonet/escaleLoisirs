<?php

include('../model/connexion_escaleLoisirs.php');
include('../model/fonctions_multi.php');
include('../model/fonctions_animateurs.php');

$error=[];
$envoyer_form = false;

//Vérification inputs utilisateur
if(isset($_POST['enregistrer_ficheAnimateur'])){

	$data = validerAnimateur($_POST, false);
	if(in_array(false, $data)){
		$error = getMessagesErreurs($data);
	}

	//Envoi ou pas des données
	if (!$error){
		$envoyer_form = true;
	}
}

if(!$envoyer_form){
	//les erreurs dans le corps du formulaire
	
?>

<!doctype html>
<html lang="fr">
<!--Projet web 1
	Site web Centre Communautaire / escaleLoisirs
	Page *ajout animateur(trice)* dans gestion pour administrateurs-->

<head>
  <meta charset="utf-8">
  <title>escaleLoisirs / Gestion - ajout animateur(trice)</title>
  <meta name="author" content="Sara Potau">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/stylePerso.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
      <div class="row">

      	<!-- Lateral gauche / Logo et menu pour pages gesion administrateurs-->
        <aside class="col-xl-2 col-lg-3 col-md-4 aside_menu">
          <a href="#"><img class="card-img-top logo" src="../medias/logos/logo_escaleLoisirs.svg" alt="logo" max-width="200"></a>     
          <div class="list-group list-group_menu_admin">
            <a href="#" class="list-group-item list-group-item__admin--sitepublique" id="menu_activite">Site publique</a>
            <a href="#" class="list-group-item list-group-item__admin--membres" id="menu_propos">Membres</a>
            <a href="#" class="list-group-item list-group-item__admin--animateurs" id="menu_contact">Animateurs</a>
            <a href="#" class="list-group-item list-group-item__admin--activites" id="menu_profil">Activités</a>
            <a href="#" class="list-group-item list-group-item__admin--webmestre" id="menu_langue">Contactez le web mestre</a>
          </div>
        </aside>

		<!-- Header simple et contenu principal page-->
		<main class="col-xl-10 col-lg-9 col-md-8 principale main__admin" >
			<h1 class="jumbotron jumbotron__admin">Gestion</h1>
			<div class="row row_main__admin">
				
				<!--colonnes laterales pour centrer le contenu-->
				<div class="col-lg-1"></div>

				<!--contenu central / fiche ajout-->
				<div class="col-lg-10">
					<h2 class= "jumbotron jumbotron__h2__admin">Ajouter un(e) animateur(trice)</h2>

				<!--Espace pour message erreur gral.-->
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<?php
							//Message d'erreur de base, les autres s'affichent sous les champs du formulaire
							if((isset($error) && count($error) > 0)){
								echo '<div class="alert-danger">Oups! Besoin de quelques corrections:</div>';
							}
							?>
						</div>
					</div>

					<form method="post" action="">
<div class="form-row">
							<div class="form-group col-md-6">
								<legend>Nom</legend>
								<input required type="text" class="form-control" name="nom_personne" placeholder="Nom" value="<?php echo (isset($_POST['nom_personne'])) ? $_POST['nom_personne'] : '';?>">
								<small class="alert alert-danger"><?php echo (!empty($error['nom_personne'])) ? $error['nom_personne'] : ''; ?></small>
							</div>
							<div class="form-group col-md-6">
								<legend>Prénom</legend>
								<input required type="text" class="form-control" name="prenom_personne" placeholder="Prénom" value="<?php echo (isset($_POST['prenom_personne'])) ? $_POST['prenom_personne'] : '';?>">
								<small class="alert alert-danger"><?php echo (!empty($error['prenom_personne'])) ? $error['prenom_personne'] : ''; ?></small>
							</div>
						</div>

				  		<div class="form-row">
							<div class="form-group col-md-2">
								<legend>Adresse</legend>
								<input required type="text" class="form-control" name="numero_adresse_personne" placeholder="Adresse" value="<?php echo (isset($_POST['numero_adresse_personne'])) ? $_POST['numero_adresse_personne'] : '';?>">
								<small class="alert alert-danger"><?php echo (!empty($error['numero_adresse_personne'])) ? $error['numero_adresse_personne'] : ''; ?></small>
							</div>
							<div class="form-group col-md-4">
								<legend>Rue</legend>
								<input required type="text" class="form-control" name="rue_adresse_personne" placeholder="Rue" value="<?php echo (isset($_POST['rue_adresse_personne'])) ? $_POST['rue_adresse_personne'] : '';?>">
								<small class="alert alert-danger"><?php echo (!empty($error['rue_adresse_personne'])) ? $error['rue_adresse_personne'] : ''; ?></small>
							</div>
							<div class="form-group col-md-2">
								<legend>Code Postal</legend>
								<input required type="text" class="form-control" name="code_postal_adresse_personne" placeholder="Code Postal" value="<?php echo (isset($_POST['code_postal_adresse_personne'])) ? $_POST['code_postal_adresse_personne'] : '';?>">
								<small class="alert alert-danger"><?php echo (!empty($error['code_postal_adresse_personne'])) ? $error['code_postal_adresse_personne'] : ''; ?></small>
							</div>
							<div class="form-group col-md-4">
								<legend>Ville</legend>
								<input required type="text" class="form-control" name="ville_adresse_personne" placeholder="Ville" value="<?php echo (isset($_POST['ville_adresse_personne'])) ? $_POST['ville_adresse_personne'] : '';?>">
								<small class="alert alert-danger"><?php echo (!empty($error['ville_adresse_personne'])) ? $error['ville_adresse_personne'] : ''; ?></small>
							</div>
					  	</div>

					  	<div class="form-row">	
							<div class="form-group col-md-6">
								<legend>Téléphone</legend>
								<input required type="text" class="form-control" name="telephone_personne" placeholder="Téléphone" value="<?php echo (isset($_POST['telephone_personne'])) ? $_POST['telephone_personne'] : '';?>">
								<small class="alert alert-danger"><?php echo (!empty($error['telephone_personne'])) ? $error['telephone_personne'] : ''; ?></small>
							</div>

							<div class="form-group col-md-6">
								<legend>Courriel</legend>
								<input required type="text" class="form-control" name="courriel_personne" placeholder="Courriel" value="<?php echo (isset($_POST['courriel_personne'])) ? $_POST['courriel_personne'] : '';?>">
								<small class="alert alert-danger"><?php echo (!empty($error['courriel_personne'])) ? $error['courriel_personne'] : ''; ?></small>
							</div>
						</div>
					  	<div class="form-row">	
							<div class="form-group col-md-6">
								<legend>Mot de passe</legend>
								<input required type="text" class="form-control" name="mot_passe_personne" placeholder="Mot de passe" value="<?php echo (isset($_POST['mot_passe_personne'])) ? $_POST['mot_passe_personne'] : '';?>">
								<small class="alert alert-danger"><?php echo (!empty($error['mot_passe_personne'])) ? $error['mot_passe_personne'] : ''; ?></small>
							</div>

							<div class="form-group col-md-6">
								<legend>Confirmation du mot de passe</legend>
								<input required type="text" class="form-control" name="mot_passe_personne" placeholder="Mot de passe" value="<?php echo (isset($_POST['mot_passe_personne'])) ? $_POST['mot_passe_personne'] : '';?>">
								<small class="alert alert-danger"><?php echo (!empty($error['mot_passe_personne'])) ? $error['mot_passe_personne'] : ''; ?></small>
							</div>
						</div>

						<div class="form-row">	
							<div class="form-group col-md-6">
								<input type="reset" name="reset_fiche" value="Nettoyer" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--nettoyer">
							</div>
							<div class="form-group col-md-6">
								<input type="submit" name="enregistrer_ficheAnimateur" value="Ajouter" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--publier">
							</div>
						</div>
					</form>

					<p class="p__admin--pieddepage"><a class="p__a__admin--pieddepage" href="index.php?action=listeAnimateurs">Aller à la liste des animateurs(trices)</a></p>
	     				
	     			<div class="col-lg-1"></div>
				</div>
        	</main>
		</div>
	</div>	 

	<?php
		} else {


			$insertion = insererAnimateur($bdd, $data);

			//vérifie si query ok (returns false or last_id)
			if($insertion){
				echo '<div class="col-md-12 reponse"><p>Fiche correctement enregistrée, merci.</p>
					<p><a href="index.php?action=fiche-animateur&code_personne='.$insertion.'" class="alert-link">Voir la fiche</a></p>
					<p><a href="index.php?action=ajoutAnimateur" class="alert-link">Enregistrer une autre fiche</a></p></div>';
				exit;
			}else{
				echo '<div class="col-md-12 reponse"><p>Erreur lors de la requête, veuillez contacter l\'adminsitrateur de la base de données.</p><a href="?action=ajoutAnimateur" class="alert-link">Enregistrer une autre animateur</a></div>';
			}
		}
	?>       

<!--js Bootstrap-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>